<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    use softDeletes;

    protected $fillable = [
        'transactions_id',
        'username',
    ];

    protected $hidden = [];


    public function transaction()
    {

        return $this->belongsTo(transaction::class, 'transactions_id', 'id');
    }
}
