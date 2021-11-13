<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductDetailRequest;
use App\Http\Requests\StoreProductDetailRequest;
use App\Http\Requests\UpdateProductDetailRequest;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductsDetailsImages;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductDetailsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productDetails = $this->getValues(ProductDetail::with(['product_id'])->get());
        // dd($productDetails);

        return view('admin.productDetails.index', compact('productDetails'));
    }

    private function getImages($collection)
    {
        foreach ($collection as $key => $value) {
            $value->pictures = ProductsDetailsImages::whereNull("deleted_at")->where("product_details_id", $value->id)->get();
        }
    }

    private function getValues($collection) {
        foreach ($collection as $key => $value) {
            $value->product = Product::find($value->product_id);
            $value->pictures = ProductsDetailsImages::whereNull("deleted_at")->where("product_details_id", $value->id)->get();
        }
        return $collection;
    }

    public function create()
    {
        abort_if(Gate::denies('product_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_ids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productDetails.create', compact('product_ids'));
    }

    public function store(StoreProductDetailRequest $request)
    {
        // dd($request->request);
        // dd($request->file("thumbnail"));

        $details = new ProductDetail();
        $details->details = $request->details;
        $details->product_id = $request->product_id;
        $details->save();

        $this->saveImages($request, "product-images", "products_images", "image", $details->id);
        $this->saveImages($request, "thumbnail", "products_thumbnails", "thumbnail", $details->id);

        return redirect()->route('admin.product-details.index');
    }

    private function saveImages($collection, $fileBagName, $directoryName, $pictureType, $detailsId)
    {
        $file = $collection->file($fileBagName);
        if($file != null)
        {
            foreach ($file as $value)
            {
                $fileId = Str::uuid();
                if($value != null) {
                    $fileName = $value->getClientOriginalName();
                    $fileExtension = $value->getClientOriginalExtension();
                }

                $images = new ProductsDetailsImages();
                $images->file_id = $fileId;
                $images->file_name = $fileName;
                $images->file_extension = $fileExtension;
                $images->file_url = env("APP_URL") . "/" . $directoryName . "/" . $fileId . "." . $fileExtension;
                $images->image_url = $fileId . "." . $fileExtension;
                $images->picture_type = $pictureType;
                $images->product_details_id = $detailsId;
                $images->save();

                if(!file_exists(public_path($directoryName))) {
                    mkdir(public_path($directoryName), 0777, true);
                }

                $value->move(public_path($directoryName), $fileId.'.'.$fileExtension);
            }
        }
    }

    public function edit(ProductDetail $productDetail)
    {
        abort_if(Gate::denies('product_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_ids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productDetail->load('product_id');

        return view('admin.productDetails.edit', compact('product_ids', 'productDetail'));
    }

    public function update(UpdateProductDetailRequest $request, ProductDetail $productDetail)
    {
        $productDetail->update($request->all());

        if($request->file()) {
            ProductsDetailsImages::whereNull("deleted_at")->where("product_details_id", $productDetail->id)->delete();
        }
        $this->updateImages($request, "product-images", "products_images", "image", $productDetail->id);
        $this->updateImages($request, "thumbnail", "products_thumbnails", "thumbnail", $productDetail->id);

        return redirect()->route('admin.product-details.index');
    }

    private function updateImages($collection, $fileBagName, $directoryName, $pictureType, $detailsId)
    {
        $file = $collection->file($fileBagName);
        if($file != null)
        {
            foreach ($file as $value)
            {
                $fileId = Str::uuid();
                if($value != null) {
                    $fileName = $value->getClientOriginalName();
                    $fileExtension = $value->getClientOriginalExtension();
                }

                $images = new ProductsDetailsImages();
                $images->file_id = $fileId;
                $images->file_name = $fileName;
                $images->file_extension = $fileExtension;
                $images->file_url = env("APP_URL") . "/" . $directoryName . "/" . $fileId . "." . $fileExtension;
                $images->image_url = $fileId . "." . $fileExtension;
                $images->picture_type = $pictureType;
                $images->product_details_id = $detailsId;
                $images->save();

                if(!file_exists(public_path($directoryName))) {
                    mkdir(public_path($directoryName), 0777, true);
                }

                $value->move(public_path($directoryName), $fileId.'.'.$fileExtension);
            }
        }
    }

    public function show(ProductDetail $productDetail)
    {
        abort_if(Gate::denies('product_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->getValues([$productDetail->load('product_id')]);
        $productImages = $this->getImages([$productDetail]);

        return view('admin.productDetails.show', compact('productDetail', 'productImages'));
    }

    public function destroy(ProductDetail $productDetail)
    {
        abort_if(Gate::denies('product_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductDetailRequest $request)
    {
        ProductDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
