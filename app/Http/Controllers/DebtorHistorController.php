<?php

namespace App\Http\Controllers;

use App\Interfaces\IDebtorHistoryRepository;
use App\Models\Debtor;
use App\Models\DebtorHistory;
use Illuminate\Http\Request;

class DebtorHistorController extends Controller
{



    public function index($debtor_id)
    {
        $debtorHistory = DebtorHistory::where('debtor_id' , $debtor_id)->get();
        return response()->json([
            'success'=> true,
            'data'=> $debtorHistory,
        ],200);
    }
    public function store(Request $request)
    {
        $add = DebtorHistory::create($request->all());
            $debtor = Debtor::find($request->debtor_id);
            if($request->status == false){
                // false summa to'layabdi
                if($request->summa > $debtor->price){
                    return response()->json([
                        'msg'=> 'tolov summasi qarzidan katta iltimos tekshiring'
                    ]);
                }
                $debtor->update([
                    'qoldiq_summa' => $debtor->price - $request->summa
                ]);
            }
            if($request->status == true){
                // true qarz ustuga yana qarz
                if($debtor->qoldiq_summa == 0){
                    $debtor->update([
                        'price'=> $debtor->price + $request->summa,
                    ]);
                }
                if($debtor->qoldiq_summa > 0){
                        $debtor->update([
                            'price'=> $debtor->price + $request->summa,
                            'qoldiq_summa' => $debtor->qoldiq_summa + $request->summa
                ]);
                }
            }
            return response()->json([
                'success'=> true,
                'data'=> $add
            ]);
    }
    public function update(Request $request ,  $id)
    {
        $debtorHistoryById = DebtorHistory::find($id);
        $debtorHistoryById->update($request->all());
        return response()->json([
            'success'=> true,
            'data' => $debtorHistoryById
        ]);
    }
    public function delete( $id)
    {
        $debtorById = DebtorHistory::find($id);
        $debtorById->delete();
        return response()->json([
            'success'=>true
        ]);

    }

}
