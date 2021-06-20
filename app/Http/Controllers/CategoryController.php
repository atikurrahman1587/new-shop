<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

//use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {

        return view('admin.category.add-category');
    }
    public function saveCategory(Request $request) {

        $this->validate($request, [
            'category_name'         => 'required',
            'category_description'  => 'required',
            'publication_status'    => 'required'
        ]);

//Eloquent ORM section
//mathod- 1-----



        $category = new category();
        $category->category_name            = $request->category_name;
        $category->category_description     = $request->category_description;
        $category->publication_status       = $request->publication_status;
        $category->save();

        return redirect('/category/add')->with('massage', 'Category info save successfully');


// mathod-2

//        category::create($request->all());

//        end Eloquent ORM section


//Query Builder section

//            DB::table('categories')->insert([
//                'category_name' =>$request ->category_name,
//                'category_description' =>$request ->category_description,
//                'publication_status' =>$request ->publication_status,
//            ]);

//end  Query Builder


    }

    public function manageCategory() {
        $categories= category::all();
        return view('admin.category.manage-category', ['categories'=>$categories]);
    }

    public function unpublishedCategoryInfo($id) {
        $category = category::find($id);
        $category->publication_status = 0;
        $category->save();

        return redirect('/category/manage')->with('massage', 'Category Info Unpublished');
    }

    public function publishedCategoryInfo($id) {
        $category = category::find($id);
        $category->publication_status = 1;
        $category->save();

        return redirect('/category/manage')->with('massage', 'Category Info Published');
    }

    public function editCategoryInfo($id) {
        $category = category::find($id);
        return view('admin.category.edit-category', ['category'=>$category]);
    }

    public function updateCategoryInfo(Request $request) {
        $this->validate($request, [
            'category_name'         => 'required',
            'category_description'  => 'required',
            'publication_status'    => 'required'
        ]);

        $category = category::find($request->category_id);
        $category->category_name            = $request->category_name;
        $category->category_description     = $request->category_description;
        $category->publication_status       = $request->publication_status;
        $category->save();

        return redirect('/category/manage')->with('massage', 'Category info update');
    }

    public function deleteCategoryInfo($id) {
        $category= category::find($id);
        $category->delete();

        return redirect('/category/manage')->with('massage', 'Category info delete');
    }
}
