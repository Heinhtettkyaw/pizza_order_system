<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class CategoryController extends Controller
{
    //listing Category //list.blade.php
    public function list(){
       $categories= Category::when(request('key'),function($q){
            $q->where('name','like','%'. request('key') .'%');
        })->orderBy('id','asc')
          ->paginate(4);

        return view('Admin.Category.list',compact('categories'));
    }



    //create Category //category_create_page
    public function createPage(){
        return view('Admin.Category.category_create');
    }


    //create category and add to db
    public function create(Request $request){
    Validator::make($request->all(),[
        'categoryName'=>'required|unique:categories,name'
    ])->validate();
    $data=['name'=>$request->categoryName];
    Category::create($data);
    return redirect()->route('category#list')->with(['categorySuccess'=>'Successfully created!!!']);
    }


    //delete category
    public function delete($id){
        Category::where('id',$id)->delete();
        return redirect()->route('category#list')->with(['categoryDelete'=>'Successfully deleted!!!']);;
    }

    //edit category
    public function edit($id){
        $category= Category::where('id',$id)->first();
        return view('Admin.Category.category_edit',compact('category'));
    }

    //update
    public function update(Request $request){

        $id=$request->categoryId;

        Validator::make($request->all(),[
            'categoryName'=>'required|unique:categories,name,'.$id
        ])->validate();
        $data=['name'=>$request->categoryName];

        Category::where('id',$id)->update($data);
        return redirect()->route('category#list');
    }
}
