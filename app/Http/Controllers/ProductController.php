<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function index() {
        $categories = category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();

        return view('admin.product.add-product', [
            'categories' => $categories,
            'brands'     => $brands,
        ]);
    }


    protected function productInfoValidate($request) {
        $this->validate($request, [
            'category_id'           => 'required',
            'brand_id'              => 'required',
            'product_name'          => 'required',
            'product_price'         => 'required',
            'product_quantity'      => 'required',
            'short_description'     => 'required',
            'long_description'      => 'required',
            'product_image'         => 'required',
            'publication_status'    => 'required',
        ]);
    }

    protected function productImageUpload($request) {
        $productImage   = $request->file('product_image');
        $fileType       = $productImage->getClientOriginalExtension();
        $imageName      = $productImage->getClientOriginalName();
//        $imageName      = $request->product_name.'.'.$fileType;
        $directory      = 'product-images/';
        $imgUrl         = $directory.$imageName;
        //$productImage->move($directory, $imageName);
        Image::make($productImage)->save($imgUrl);
        return $imgUrl;
    }
    protected function saveProductBasicInfo($request, $imgUrl) {
        $product = new Product();
        $product->category_id           = $request->category_id;
        $product->brand_id              = $request->brand_id;
        $product->product_name          = $request->product_name;
        $product->product_price         = $request->product_price;
        $product->product_quantity      = $request->product_quantity;
        $product->short_description     = $request->short_description;
        $product->long_description      = $request->long_description;
        $product->product_image         = $imgUrl;
        $product->publication_status    = $request->publication_status;
        $product->save();
    }

    public function saveProduct(Request $request) {
        $this->productInfoValidate($request);
        $imgUrl = $this->productImageUpload($request);
        $this->saveProductBasicInfo($request, $imgUrl);

        return redirect('/product/add')->with('massage', 'Product Info Save successfully');
    }




    public function manageProduct() {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('Brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->get();
        return view('admin.product.manage-product', ['products'=>$products]);
    }

    public function unpublishedProductInfo($id){
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();
        return redirect('/product/manage')->with('massage', 'Product Info Unpublished');
    }

    public function publishedProductInfo($id){
        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();
        return redirect('/product/manage')->with('massage', 'Product Info published');
    }

    public function editProductInfo($id) {
        $categories = category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        $product = Product::find($id);

        return view('admin.product.edit-product', [
            'categories' => $categories,
            'brands'     => $brands,
            'product'   =>$product,
        ]);
    }

    protected function UpdateProductInfoValidate($request) {
        $this->validate($request, [
            'category_id'           => 'required',
            'brand_id'              => 'required',
            'product_name'          => 'required',
            'product_price'         => 'required',
            'product_quantity'      => 'required',
            'short_description'     => 'required',
            'long_description'      => 'required',
            'publication_status'    => 'required',
        ]);
    }

    protected function updateBasicProductInfo($product, $request, $imgUrl=null) {
        $product->category_id           = $request->category_id;
        $product->brand_id              = $request->brand_id;
        $product->product_name          = $request->product_name;
        $product->product_price         = $request->product_price;
        $product->product_quantity      = $request->product_quantity;
        $product->short_description     = $request->short_description;
        $product->long_description      = $request->long_description;
        if ($imgUrl) {
            $product->product_image     = $imgUrl;
        }
        $product->publication_status    = $request->publication_status;
        $product->save();
    }

    public function updateProductInfo(Request $request) {
        $this->UpdateProductInfoValidate($request);
        $productImage = $request->file('product_image');
        $product = Product::find($request->product_id);
        if ($productImage) {
            unlink($product->product_image);
            $imgUrl = $this->productImageUpload($request);
            $this->updateBasicProductInfo($product, $request, $imgUrl);
        } else {
            $this->updateBasicProductInfo($product, $request);
        }
        return redirect('/product/manage')->with('massage', 'ProductInfo Update Successful');
    }



//    public function viwProductInfoById() {
//        $products = DB::table('products')
//            ->join('categories', 'products.category_id', '=', 'categories.id')
//            ->join('Brands', 'products.brand_id', '=', 'brands.id')
//            ->select('products.*', 'categories.category_name', 'brands.brand_name')
//            ->get();
//
//        return $products;
//        return view('admin.product.viw-product', ['products'=>$products]);
//    }




    public function viwProductInfoById($id) {
        $product = Product::find($id);

        return view('admin.product.viw-product-info', ['product'=>$product]);
    }


    public function deleteProductInfo($id) {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product/manage')->with('massage', 'Product Info Delete');
    }
}
