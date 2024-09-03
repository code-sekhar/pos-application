<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Scalar\String_;

class CategoryController extends Controller
{
    public function CategoryPage(){
        return view('pages.dashboard.category-page');
    }
    public function createCategory(Request $request){
        try{
            $user_id = $request->header('id');
            $category_name = $request->input("category_name");
            $image = $request->file("image");
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $fileName);
            $categoryRecords = Category::create([
                'user_id' => $user_id,
                'category_name' => $category_name,
                'image' => $fileName
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Category created successfully',
                'data' => $categoryRecords
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ],500);
        }
    }
    //Get Category
    public function getCategory(Request $request){
        try{
            $user_id = $request->header('id');
            $category = Category::where('user_id', $user_id)->get();
            return response()->json([
                'status' => 'success',
                'data' => $category,
                'message' => 'Category retrieved successfully'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ],500);
        }
    }
    //Delete Category
    public function deleteCategory(Request $request){
        try{

            $user_id = $request->header('id');
            $category_id = $request->input("id");
            Category::where('id', $category_id)->where('user_id', $user_id)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Category deleted successfully'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ],500);
        }
    }
    //Update Category
    public function updateCategory(Request $request){
        try{
            $user_id = $request->header('id');
            $category_id = request()->input("id");
            $category = Category::where('id', $category_id)->where('user_id', $user_id)->first();
//            if($category){
//                return response()->json([
//                    'status' => 'failed',
//                    'message' => 'Category not found'
//                ],404);
//            }
            $category->category_name = $request->input("category_name");
            if($request->hasFile("image")){
                if($category->image && Storage::exists('public/images/'.$category->image)){
                    Storage::delete('public/images/'.$category->image);
                }
                $image = $request->file("image");
                $fileName = time().'.'.$image->getClientOriginalExtension();
                $path = $image->storeAs('public/images', $fileName);
                $category->image = $fileName;
            }
            $category->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Category updated successfully'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ],500);
        }
    }
    //category_by_id
    public function getCategoriesbyId(Request $request){
        try{
            $user_id = $request->header('id');
            $category_id = $request->input("id");
            return Category::where('id', $category_id)->where('user_id', $user_id)->first();
        }catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ],500);
        }
    }
}
//
