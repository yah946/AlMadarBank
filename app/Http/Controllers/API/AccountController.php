<?php

namespace App\Http\Controllers\API;

use App\Models\Account;
use App\Models\Desposit;
use App\Models\Role;
use App\Models\Type;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class AccountController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accounts = auth()->user()->accounts;
        return $this->sendResponse($accounts);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'=>'required|in:checking,saving,minor',
            'role'=>'required|in:holder,guardian',
        ]);
        // (new DateTime(now()))->diff(new DateTime(auth()->user()->date_of_birth))->y <= 18
        $type_id = Type::where('name',$request->type)->first()->id;
        $role_id = Role::where('name',$request->role)->first()->id;
        $account = Account::create([
            'type_id' => $type_id,
            'rib' => '008'.'123456789000000000'.$type_id.'24',
        ]);
        $account->users()->attach(auth()->id(),[
            'role_id'=>$role_id,
        ]);
        return $this->sendResponse($account,"Account Has Been Created",201);
    }
    public function addCoOwner(Request $request,$id)
    {
        $request->validate([
            'cin'=>'required|string|exists:users,cin',
        ]);
        if(auth()->user()->role()->name === 'guardian'){
            
        }
        // if($request->role == 'minor' && $request->type == 'checking')
        // if( ((new DateTime(now()))->diff(new DateTime(auth()->user()->date_of_birth))->y) <= 18 && $request->role == 'holder' || 'guardian')
        // if( ((new DateTime(now()))->diff(new DateTime(auth()->user()->date_of_birth))->y) <= 18 && $request->type == 'saving' || 'checking')
        $user = User::where('cin',$request->cin)->first();
        $account = Account::findOrFail($id);
        $account->users()->attach($user->id,[
            'role_id'=>Role::where('name','holder')->first()->id,
        ]);
        return $this->sendResponse($account,"User Has Been Invited",200);
    }
    public function RemoveCoOwner($id,$UserId)
    {
        $account = Account::findOrFail($id);
        $account->users()->where('user_id',$UserId);
        $account->users()->detach($UserId);
        return $this->sendResponse($account,"User Has Been Detached",200);
    }
    public function CvtAccount($id) {
        $account = Account::findOrFail($id);
        $type = Type::where('name','checking')->first();
        // if($account->type_id == $type->id){
        //     $this->sendError('This Account Type is already Checking!');
        // }
        $account->update([
            'type_id'=>$type->id,
        ]);
        $this->sendResponse(message:'Account Type Changed Successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $account = Account::findOrFail($id);
        return $this->sendResponse($account);
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
