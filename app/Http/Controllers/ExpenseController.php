<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $expense = Expense::paginate(10);
        return view('admin.sales_inventory_expenses.expenses.expensesIndex', ['expense'=>$expense]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.sales_inventory_expenses.expenses.crud.createExpenses');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

            $validateUser = Validator::make($request->all(),
            [
                'materials' => 'required',
                'weight' => 'required|numeric',
                'price' => 'required|numeric',
            ]);
            if($validateUser->fails()){
                return Redirect::back()->withErrors(['error' => $validateUser->errors()]);
            }

            //getting the image ready to upload to the database

            //creating the feeds
            $createproduct = Expense::create([
                'materials'=>$request->materials,
                'price' => $request->price,
                'weight'=>$request->weight,
                'amount'=>$request->weight*$request->price,

            ]);
            if($createproduct){
                return redirect(route('expensesIndex'))->with('success','Expense Added Successfulyy');

            }else{
                return redirect(route('expensesIndex'))->with('error','Something went wrong');

            }
        }catch(Exception $e){
            return redirect(route('expensesIndex'))->with('error','Error: '+$e);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        //
    }


    public function storeApi(Request $request)
    {
        //
        try{

            $validateUser = Validator::make($request->all(),
            [
                'materials' => 'required',
                'weight' => 'required|numeric',
                'price' => 'required|numeric',
            ]);
            if($validateUser->fails()){
                return response([
                    'message' => $validateUser->errors(),
                ], 500);
            }

            //getting the image ready to upload to the database

            //creating the feeds
            $createproduct = Expense::create([
                'materials'=>$request->materials,
                'price' => $request->price,
                'weight'=>$request->weight,
                'amount'=>$request->weight*$request->price,

            ]);
            if($createproduct){
                return response([
                    'status' => 200,
                    'message' => 'Successfully Created! Expense Successfully Added',
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
}
