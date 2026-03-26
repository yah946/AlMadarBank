<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Models\Account;
use App\Models\Desposit;
use App\Models\Withdraw;
use DB;
use Illuminate\Http\Request;

class DespositController extends BaseApiController
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
            'rib'=>'required|string|size:24',
            'amount'=>'required|numeric|min:50',
        ]);
        DB::transaction(function()use($request){
            $account = Account::where('rib',$request->rib)->first();
            Desposit::create([
                'receiver_account_id' => $account->id,
                'sender_id' => auth()->id(),
                'amount'=>$request->amount,
            ]);
            $account->increment('balance',$request->amount);
        });
        return $this->sendResponse();
    }

    /**
     * Display the specified resource.
     */
    public function show(Desposit $desposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desposit $desposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Desposit $desposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desposit $desposit)
    {
        //
    }
}
