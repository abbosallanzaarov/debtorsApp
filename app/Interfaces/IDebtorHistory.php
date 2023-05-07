<?php

namespace App\Interfaces;
interface IDebtorHistoryRepository
{
    public function getAllDebtorHistory($id);
    public function addHistory($data);
    public function update($id , $data);
    public function delete($id);


}
