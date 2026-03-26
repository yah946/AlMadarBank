<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /** @use HasFactory<\Database\Factories\TypeFactory> */
    use HasFactory;
    protected $fillable = ['type_id','rib'];
    public function users(){
        return $this->belongsToMany(User::class)->withPivot('role_id','accept_closure');
    }
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function transfers(){
        return $this->hasMany(Transfer::class);
    }
    public function withdraws(){
        return $this->hasMany(Withdraw::class);
    }
    public function desposit(){
        return $this->hasMany(Desposit::class);
    }
}
