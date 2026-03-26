<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    /** @use HasFactory<\Database\Factories\WithdrawFactory> */
    use HasFactory;
    protected $fillable = [
        'account_id', 
        'user_id', 
        'amount'
    ];

    public function account(){
        return $this->belongsTo(Account::class);
    }
}
