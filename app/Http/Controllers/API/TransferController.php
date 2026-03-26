<?php

namespace App\Http\Controllers\API;

use App\Models\Account;
use App\Models\Transfer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transfer = Transfer::where('user_id',auth()->id());
        return $this->sendResponse($transfer);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'=>'integer|gt:0|exists:accounts,id',
            'receiver_rib'=>'required|string|size:24',
            'amount'=>'required|numeric|min:10',
        ]);

        DB::transaction(function()use($request){
            $sender_account = Account::findOrFail($request->id);
            if($sender_account->type->name == 'minor' && $sender_account->type->name != 'guardian'){
                throw new Exception();
            }
            $rec_account = Account::where('rib',$request->receiver_rib)->first();
            
            Transfer::create([
                'sender_account_id'=>$sender_account->id,
                'receiver_account_id'=>$rec_account->id,
                'sender_id'=>auth()->id(),
                'status'=>'pending',
                'amount'=>$request->amount,
            ]);
            
            // if($sender_account->type->name !== 'checking' && $sender_balance < 0){
            //     $this->sendError('you don\'t have enought for this transaction');
            // }
            $sender_account->decrement('balance',$request->amount);
            $rec_account->increment('balance',$request->amount);
        });
        return $this->sendResponse(message:'Transfer Has Been Done Successfully',code:201);
    }
    /**
     * Display the specified resource.
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
}
