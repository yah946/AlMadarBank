<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    /** @use HasFactory<\Database\Factories\TransferFactory> */
    use HasFactory;
    protected $fillable = [
        'sender_account_id',
        'receiver_account_id',
        'sender_id',
        'status',
        'amount',
    ];
    public function account(){
        return $this->belongsTo(Account::class);
    }
}
