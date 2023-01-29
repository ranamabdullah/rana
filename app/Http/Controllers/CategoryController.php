<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
   
    public function index()
    {
        $data = Category::all();
        return view('category.index',compact('data'));
    }

    
    public function store(Request $request)
    {

        if($request->search){

            // Logic for search

            $query = DB::table('categories');

            if($request->name){
                $query->where('name',$request->name);
            }

            if($request->number){
                $query->where('number',$request->number);
            }

            $data = $query->get();
            return view('category.index',compact('data'));

        }else{
            // Logic for add/edit

            $error_message = "";

            if($request->name == ''){
                $error_message .= " Please enter Name";
            }

            if($request->number ==''){
                $error_message .= " Please enter Number";
            }

            if($error_message != ''){
                $data = Category::all();
                return view('category.index',compact('data','error_message'));
            }


            $name = $request->name;
            $number = $request->number;

            if(isset($request->edit_id)){
                // Logic to update to database
                $category = Category::find($request->edit_id);
                $category->name = $name;
                $category->number = $number;
                $category->update();

            }else{
                // Logic to add to database
                Category::create(['name'=>$name,'number'=>$number]);
            }

            return redirect()->route('category.index');

        }

    }


    public function edit(Request $request,$id){
        $category = Category::find($id);
        $data = Category::all();
        return view('category.index',compact('data','category'));
    }


    
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index');
    }
}
