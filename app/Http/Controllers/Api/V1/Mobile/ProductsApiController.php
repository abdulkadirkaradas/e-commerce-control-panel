<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\ApiStatusCodes;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetail;
use App\Models\ProductsDetailsImages;
use App\Models\ProductStatus;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    public function getAllProducts(Request $request)
    {
        $user = LoginApiController::validateUser($request);

        $products = $this->getValues(Product::with(['category_id', 'status_id'])->get());
        foreach ($products as $key => $product) {
            $product->details = $details = ProductDetail::whereNull("deleted_at")->where("product_id", $product->id)->get();
            foreach ($details as $key => $value) {
                $product->images = ProductsDetailsImages::whereNull("deleted_at")->where("product_details_id", $value->id)->get();
            }
        }

        return [
            "status" => ApiStatusCodes::$success,
            "message" => "All products was successfully returned.",
            "data" => $products,
        ];
    }

    private function getValues($collection) {
        foreach ($collection as $key => $value) {
            $value->category = ProductCategory::find($value->category_id);
            $value->status = ProductStatus::find($value->status_id);
        }
        return $collection;
    }

    public function getAllCategories(Request $request)
    {
        // $user = LoginApiController::validateUser($request);
        $categories = ProductCategory::skip(0)->take(6)->get();

        if($categories->isNotEmpty()) {
            return [
                "status" => ApiStatusCodes::$success,
                "message" => "Categories successfully returned",
                "data" => $categories
            ];
        }
    }

    public function getProductsByCategories(Request $request)
    {
        // $user = LoginApiController::validateUser($request);
        $params = $request->all();

        $products = Product::whereNull("deleted_at")->where("category_id", $params["category_id"])->get();
        foreach ($products as $key => $product) {
            $details = ProductDetail::whereNull("deleted_at")->where("product_id", $product->id)->get();
            $product->details = $details;
            foreach ($details as $key => $detail) {
                $product->details_images = [
                    ProductsDetailsImages::whereNull("deleted_at")->where("product_details_id", $detail->id)->get()
                ];
            }
        }

        if($products) {
            return [
                "status" => ApiStatusCodes::$success,
                "message" => "Successfull",
                "data" => $products
            ];
        }
    }
}
