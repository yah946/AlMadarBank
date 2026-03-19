<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Desposit;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function desposit(DespositRequest $request) {
        $receiver_account_id = Account::where('rib',$request->rib)->first()->id;
        Desposit::create([
            'sender_id'=>auth()->id(),
            'receiver_account_id' =>$receiver_account_id,
            'amount'=>$request->amount,
        ]);
    }
    public function withdraw(WithdrawRequest $request) {
        Withdraw::create([
            'user_id'=>auth()->id(),
            'account_id' =>auth()->user()->account->id,
            'amount'=>$request->amount,
        ]);
    }
    public function transfers(TransferRequest $request) {
        $receiver_account_id = Account::where('rib',$request->rib)->first()->id;
        Transfer::create([
            'sender_id'=>auth()->id(),
            'sender_account_id' =>$receiver_account_id,
            'receiver_account_id' =>$receiver_account_id,
            'amount'=>$request->amount,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        //
    }
}
