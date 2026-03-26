<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Models\Account;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WithdrawController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'=>'required|integer|gt:0|exists:accounts,id',
            'amount'=>'required|numeric|min:100',
        ]);
        DB::transaction(function()use($request){
            $account = Account::findOrFail($request->id);
            if($account->balance - $request->amount < 0){
                return $this->sendError('you don\'t have enought mony to withdraw');
            }
            Withdraw::create([
                'account_id' => $account->id,
                'user_id' => auth()->id(),
                'amount'=>$request->amount,
            ]);
            $account->decrement('balance',$request->amount);
        });
        return $this->sendResponse();
    }

    /**
     * Display the specified resource.
     */
    public function show(Withdraw $withdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Withdraw $withdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Withdraw $withdraw)
    {
        //
    }
}
