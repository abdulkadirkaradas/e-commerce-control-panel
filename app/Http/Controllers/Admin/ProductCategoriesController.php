<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductCategoryRequest;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\SubProductCategories;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductCategoriesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCategories = ProductCategory::all();
        foreach ($productCategories as $key => $categories) {
            foreach ($categories as $key => $value) {
                $categories->sub = SubProductCategories::whereNull("deleted_at")->where("product_category_id", $categories->id)->get();
            }
        }

        return view('admin.productCategories.index', compact('productCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.productCategories.create');
    }

    public function store(StoreProductCategoryRequest $request)
    {
        // dd($request->all());
        $subProductCategory = $request->sub_categories;

        $productCategory = new ProductCategory();
        $productCategory->category_name = $request->category_name;
        $productCategory->save();

        if($subProductCategory) {
            foreach ($subProductCategory as $key => $value) {
                $subProductCategories = new SubProductCategories();
                $subProductCategories->category_name = $value;
                $subProductCategories->sorting = $key;
                $subProductCategories->product_category_id = $productCategory->id;
                $subProductCategories->save();
            }
        }

        return redirect()->route('admin.product-categories.index');
    }

    public function edit(ProductCategory $productCategory)
    {
        abort_if(Gate::denies('product_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCategory->sub = SubProductCategories::whereNull("deleted_at")->where("product_category_id", $productCategory->id)->get();

        return view('admin.productCategories.edit', compact('productCategory'));
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        // dd($request->all());
        $subProductCategory = $request->sub_categories;

        $category = ProductCategory::find($productCategory->id);
        $category->category_name = $request->category_name;
        $category->save();

        if($subProductCategory) {
            SubProductCategories::whereNull("deleted_at")->where("product_category_id", $productCategory->id)->delete();
            foreach ($subProductCategory as $key => $value) {
                $subProductCategories = new SubProductCategories();
                $subProductCategories->category_name = $value;
                $subProductCategories->sorting = $key;
                $subProductCategories->product_category_id = $productCategory->id;
                $subProductCategories->save();
            }
        }

        return redirect()->route('admin.product-categories.index');
    }

    public function show(ProductCategory $productCategory)
    {
        abort_if(Gate::denies('product_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCategory->sub = SubProductCategories::whereNull("deleted_at")->where("product_category_id", $productCategory->id)->get();

        return view('admin.productCategories.show', compact('productCategory'));
    }

    public function destroy(ProductCategory $productCategory)
    {
        abort_if(Gate::denies('product_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductCategoryRequest $request)
    {
        ProductCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
