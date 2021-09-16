<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductStatus;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::with(['category_id', 'status_id'])->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category_ids = ProductCategory::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $status_ids = ProductStatus::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.create', compact('category_ids', 'status_ids'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category_ids = ProductCategory::pluck('category_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $status_ids = ProductStatus::pluck('status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('category_id', 'status_id');

        return view('admin.products.edit', compact('category_ids', 'status_ids', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('category_id', 'status_id');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
