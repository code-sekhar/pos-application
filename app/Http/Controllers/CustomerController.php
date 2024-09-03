<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //customers page
    public  function customersPage(){
        return view('pages.dashboard.customers-page');
    }
    //get Customers
    public  function customers(Request $request){
        try{
            $userId = $request->header('id');
            $customer = Customer::where('user_id',$userId)->get();
            return response()->json([
                'data' => $customer,
                'status' => 'success'
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500);
        }
    }
    //Create Customers
    public  function createCustomer(Request $request){
        try{
            $user_id = $request->header('id');
            $name = $request->input('name');
            $email = $request->input('email');
            $mobile = $request->input('mobile');
            $customer = Customer::create([
                'name' => $name,
                'email' => $email,
                'mobile' => $mobile,
                'user_ID' => $user_id,
            ]);
            return response()->json([
                'data' => $customer,
                'status' => 'success'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500);
        }
    }
    //CustomerByID
    public function CustomerById(Request $request){
        try{
            $userId = $request->header('id');
            $customerID = $request->input('id');
            $single_Customer = Customer::where('user_id',$userId)->where('id',$customerID)->first();
            return response()->json([
                'data' => $single_Customer,
                'status' => 'success'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
    //Update Customer
    public function updateCustomer(Request $request){
        try{
            $userId = $request->header('id');
            $customerID = $request->input('id');
            $customers = Customer::where('id',$customerID)->where('user_id',$userId)->first();
            $customers->name = $request->input('name');
            $customers->email = $request->input('email');
            $customers->mobile = $request->input('mobile');
            $customers->save();
            return response()->json([
                'data' => $customers,
                'status' => 'success',
                'message' => 'Customer updated successfully'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500);
        }
    }
    //delete Customer
    public function deleteCustomer(Request $request){
        try{
            $userId = $request->header('id');
            $customerID = $request->input('id');
            $deleteCustomer = Customer::where('id',$customerID)->where('user_id',$userId)->delete();
            return response()->json([
                'data' => $deleteCustomer,
                'status' => 'success',
                'message' => 'Customer deleted successfully'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ],500);
        }
    }
}
