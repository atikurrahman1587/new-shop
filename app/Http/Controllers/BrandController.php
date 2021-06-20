<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index() {
        return view('admin.brand.add-brand');
    }
    public function saveBrandInfo(Request $request) {
        $this->validate($request, [
            'brand_name'            => 'required',
            'brand_description'     => 'required',
            'publication_status'    => 'required'
        ]);

        $brand = new Brand();

        $brand->brand_name              = $request->brand_name;
        $brand->brand_description       = $request->brand_description;
        $brand->publication_status      = $request->publication_status;
        $brand->save();

        return redirect('/brand/add')->with('massage', 'Brand info save successfully');
    }

    public function manageBrandInfo() {
        $brands = Brand::all();
        return view('admin.brand.manage-brand', ['brands'=>$brands]);
    }

    public function unpublishedBrandInfo($id) {
        $brands = Brand::find($id);
        $brands->publication_status = 0;
        $brands->save();

        return redirect('/brand/manage')->with('massage', 'Brand info unpublished');
    }

    public function publishedBrandInfo($id) {
        $brands = Brand::find($id);
        $brands->publication_status = 1;
        $brands->save();

        return redirect('/brand/manage')->with('massage', 'Brand info published');
    }

    public function editBrandInfo($id) {
        $brands = Brand::find($id);
        return view('admin.brand.edit-brand', ['brands'=>$brands]);
    }

    public function updateBrandInfo(Request $request) {
        $this->validate($request, [
            'brand_name'            => 'required',
            'brand_description'     => 'required',
            'publication_status'    => 'required'
        ]);
        $brand = Brand::find($request->brand_id);

        $brand->brand_name              = $request->brand_name;
        $brand->brand_description       = $request->brand_description;
        $brand->publication_status      = $request->publication_status;
        $brand->save();
        return redirect('/brand/manage')->with('massage', 'Brand info update successfully');
    }

    public function deleteBrandInfo($id) {
        $brands = Brand::find($id);
        $brands->delete();
        return redirect('/brand/manage')->with('massage', 'Brand info delete successfully');
    }

}
