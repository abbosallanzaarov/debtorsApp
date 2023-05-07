<?php

namespace App\Http\Controllers;

use App\Models\Debtor;
use App\Http\Requests\StoreDebtorRequest;
use App\Http\Requests\UpdateDebtorRequest;
use Illuminate\Http\Request;

class DebtorController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $debtor = Debtor::where('user_id' , auth()->user()->id)->get();
        return response()->json([
            'success' => true,
            'data' => $debtor
        ]);
    }

    public function store(Request $request)
    {
        $add = Debtor::create([
            'user_id'=> auth()->user()->id,
            'name'=> $request->name,
            'phone'=> $request->phone,
            'desc'=> $request->desc,
            'price'=> $request->price,
            'qoldiq_summa'=> 0
        ]);
        return response()->json([
            'success' => true,
            'data' => $add
        ]);
    }

    public function show(Debtor $debtor)
    {
        //
    }


    public function update(Request $request, Debtor $debtor)
    {
        $update = $debtor->update($request->all());
        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Debtor $debtor)
    {
        $debtor->delete();
        return response()->json([
            'success'=> true
        ]);

    }
}
