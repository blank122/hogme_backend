<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $product = Product::paginate(10);
        return view('admin.sales_inventory_expenses.inventory.inventoryIndex', ['product'=>$product]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.sales_inventory_expenses.inventory.crud.createInventory');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{

            $validateUser = Validator::make($request->all(),
            [
                'feeds_product_name' => 'required',
                'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'product_description' => 'required|min:11',
                'price' => 'required',
                'quantity' => 'required',
            ]);
            if($validateUser->fails()){
                return Redirect::back()->withErrors(['error' => $validateUser->errors()]);
            }

            //getting the image ready to upload to the database
            $product_image = $request->file('product_image');
            $product_image_name = uniqid().$product_image->getClientOriginalName();
            $product_image->move(public_path('productImages'), $product_image_name);
            //creating the feeds
            $createproduct = Product::create([
                'feeds_product_name' => $request->feeds_product_name,
                'product_image' => $product_image_name,
                'product_description' => $request->product_description,
                'price' => $request->price,
                'quantity'=>$request->quantity,

            ]);
            if($createproduct){
                return redirect(route('inventoryIndex'))->with('success','Product Created Sucessfully');
            }else{
                return redirect(route('inventoryIndex'))->with('error','Something went wrong');
            }
        }catch(Exception $e){
            return redirect(route('inventoryIndex'))->with('error', $e);

        }
    }

    public function storeApi(Request $request)
    {
        //
        try{

            $validateUser = Validator::make($request->all(),
            [
                'feeds_product_name' => 'required',
                'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'product_description' => 'required|min:11',
                'price' => 'required',
                'quantity' => 'required',
            ]);
            if($validateUser->fails()){
                return response([
                    'message' => $validateUser->errors(),
                ], 500);
            }

            //getting the image ready to upload to the database
            $product_image = $request->file('product_image');
            $product_image_name = uniqid().$product_image->getClientOriginalName();
            $product_image->move(public_path('productImages'), $product_image_name);
            //creating the feeds
            $createproduct = Product::create([
                'feeds_product_name' => $request->feeds_product_name,
                'product_image' => $product_image_name,
                'product_description' => $request->product_description,
                'price' => $request->price,
                'quantity'=>$request->quantity,

            ]);
            if($createproduct){
                return response([
                    'status' => 200,
                    'message' => 'Successfully Created! Product Successfully Added',
                ], 200);
            }else{
                return response([
                    'message' => 'Something went wrong'
                ], 500);
            }
        }catch(Exception $e){
            return response([
                'message' => $e
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('admin.sales_inventory_expenses.inventory.crud.editInventory', ['product'=>$product]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $validateData = $request->validate([
            'feeds_product_name' => 'required',
            'product_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'product_description' => 'required|min:11',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        $product->update($validateData);
        return redirect(route('inventoryIndex'))->with('success','Product Updated Sucessfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
