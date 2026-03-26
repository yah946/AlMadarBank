<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desposit extends Model
{
    /** @use HasFactory<\Database\Factories\DespositFactory> */
    use HasFactory;
    protected $fillable = [
        'receiver_account_id',
        'sender_id',
        'amount'
    ];
    public function account(){
        return $this->belongsTo(Account::class);
    }
}
