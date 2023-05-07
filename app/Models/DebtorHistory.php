<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Debtor;

class DebtorHistory extends Model
{
    use HasFactory;
    protected $fillable = ['debtor_id' , 'status' , 'summa'];

    public function debtor()
    {
        $this->belongsTo(Debtor::class);
    }
}
