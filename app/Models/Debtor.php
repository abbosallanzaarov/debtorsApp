<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DebtorHistory;

class Debtor extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'user_id' , 'phone' , 'desc' , 'price' , 'qoldiq_summa'];

    public function debtorHistory()
    {
        $this->hasMany(DebtorHistory::class);
    }
}
