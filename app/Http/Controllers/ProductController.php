<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //Product Page
    public function index(){
        return view('pages.dashboard.product-page');
    }
    //get Product
    public function getProduct(Request $request){
        try{
            $user_id = $request->header('id');
            $product = Product::where('user_id',$user_id)->get();
            return response()->json([
                'data' => $product,
                'status' => 'success',
                'message' => 'Product List Get Successfully'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500);
        }

    }
    public function productAdd(Request $request){
        try{
            $user_id = $request->header('id');
            $category_id = $request->input('category_id');
            $productName = $request->input('name');
            $productPrice = $request->input('price');
            $productDescription = $request->input('unit');
            $product_image = $request->file('image_url');
            $fileName = time().'.'.$product_image->getClientOriginalExtension();
            $path = $product_image->storeAs('public/product_images', $fileName);
            $createProduct = Product::create([
                'user_id' => $user_id,
                'name' => $productName,
                'price' => $productPrice,
                'unit' => $productDescription,
                'category_id' => $category_id,
                'image_url' => $fileName
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Product added successfully!',
                'data' => $createProduct
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'false',
                'message' => $e->getMessage()
            ],500);
        }
    }

    //delete product
    public function productDelete(Request $request){
        try{
            $user_id = $request->header('id');
            $product_id = $request->input('product_id');
            $file_path = $request->input('file_path');
            File::delete($file_path);
            Product::where('user_id',$user_id)->where('id',$product_id)->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Product deleted successfully!'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'false',
                'message' => $e->getMessage()
            ],500);
        }
    }
    //ID By Product
    public function getByIdProduct(Request $request)
    {
        try{
            $user_id = $request->header('id');
            $product_id = $request->input('product_id');
            $result = Product::where('user_id',$user_id)->where('id',$product_id)->first();
            return response()->json([
                'data' => $result,
                'status' => 'success',
                'message' => 'Product Get Successfully'
            ],200);
        }catch (Exception $e){
            return response()->json([
                'status' => 'false',
                'message' => $e->getMessage()
            ],500);
        }
    }
    //update Product
    public function updateProduct(Request $request){
        try{
            $user_id = $request->header('id');
            $product_id = $request->input('product_id');
            $product = Product::where('user_id',$user_id)->where('id',$product_id)->first();
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->unit = $request->input('unit');
            $product->category_id = $request->input('category_id');
            if($request->hasFile('image_url')){
                if($product->image_url && Storage::exists('public/product_images/'.$product->image_url)){
                    Storage::delete('public/product_images/'.$product->image_url);
                }
                $file = $request->file('image_url');
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $path = $file->storeAs('public/product_images', $fileName);
                $product->image_url = $fileName;
            }
            $product->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Product updated successfully!'
            ],200);
        }catch (Exception $e){
            return response()->json([
                'status' => 'false',
                'message' => $e->getMessage()
            ],500);
        }
    }
}
