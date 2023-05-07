<?php

namespace App\Repositoryies;
use App\Interfaces\IDebtorHistoryRepository;
use App\Models\Debtor;
use App\Models\DebtorHistory;

class DebtorHistoryRepository implements IDebtorHistoryRepository
{

    public function getAllDebtorHistory($id)
    {

    }

    public function addHistory($data)
    {
        $add = DebtorHistory::create(
            [
                'debtor_id'=> $data['debtor_id'],
                'summa'=> $data['summa'],
                'status'=> $data['status'],
            ]
            );
            $this->debtorSumma($data['id'] , $data['summa'] , $data['status'] );
            return $add;
    }
    public function update($id , $data )
    {

    }
    public function delete($id)
    {

    }
    private function debtorSumma($id , $summa , $status)
    {
        $debtor = Debtor::find($id);
        // qarz 100 summ
        if($status == false){
            // false summa tolayabdi
            if($debtor->price > $summa){
                return false;
            }
            $debtor->update([
                'qoldiq_summa' => $debtor->price - $summa
            ]);
        }
        if($status == true){
            // true qarz ustuga yana qarz
            $debtor->update([
                'qoldiq_summa' => $debtor->qoldiq_summa + $summa,
                'price'=> $debtor->price + $summa,
            ]);
        }
    }
}


