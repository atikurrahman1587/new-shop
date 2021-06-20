<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class NewShopController extends Controller
{
    public function index() {

        $newProducts = Product::where('publication_status', 1)
                                ->orderBy('id', 'DESC')
//                                ->skip(2)
                                ->take(8)
                                ->get();

        return view('front-end.home.home', [
            'newProducts'   =>$newProducts
        ]);
    }
    public function categoryProduct($id) {
        $categoryProducts = Product::where('category_id', $id)
                                    ->where('publication_status', 1)
                                    ->get();
        return view('front-end.category.category-content', [
            'categoryProducts'=> $categoryProducts
        ]);
    }

    public function brandProduct($id) {
        $brandProducts = Product::where('brand_id', $id)
            ->where('publication_status', 1)
            ->get();
        return view('front-end.category.brand-content', [
            'brandProducts'=> $brandProducts
        ]);
    }


    public function productDetails($id) {
        $product = Product::find($id);
        return view('front-end.product.product-details', ['product'=>$product]);
    }

    public function mailUs() {
        return view('front-end.mail-us.mail-us');
    }
}
