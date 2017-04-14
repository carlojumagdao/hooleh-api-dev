<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\TransactionHeader;
use App\Models\Enforcer;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SmartCounter;

class enforcerController extends Controller
{
    public function index(){
    	$enforcers = Enforcer::where('blEnforcerDelete', 0)
    		->select('intEnforcerID','strEnforcerFirstname','strEnforcerLastname','datLastSignedin')
            ->orderBy('strEnforcerFirstname', 'asc')
            ->get();
        return view('enforcer.index', ['enforcers' => $enforcers]);
    }

    public function show($id)
    {
        $enforcer = Enforcer::find($id);
        $transactionHeader = TransactionHeader::where('intEnforcerID', $id)
                ->count('intViolationTransactionHeaderID');
        if (!is_null($enforcer)){
            return view('enforcer.show', ['enforcer' => $enforcer, 'transactionHeader' => $transactionHeader]);
        }else{
            return view('errors.404');
        }  
    }

    public function getEnforcerData(){
    	$enforcers = Enforcer::where('blEnforcerDelete', 0)
    		->select('intEnforcerID','strEnforcerFirstname','strEnforcerLastname','datLastSignedin')
            ->orderBy('strEnforcerFirstname', 'asc')
            ->get();
        return $enforcers;
    }

    public function create(Request $request){
    	try{
            DB::beginTransaction();  

            $enforcer = new Enforcer;
            $user = new User;

        	$user->username 			= $request->strEnforcerID;
        	$user->remember_token 		= str_random(60);
            $user->password 			= Hash::make($request->strPassword);
            $user->tinyintIdentifier 	= 0;

            $user->save();
            
            $enforcer->strEnforceridNumber 	= $request->strEnforcerID;
            $enforcer->strEnforcerFirstname = $request->strFirstname;
            $enforcer->strEnforcerLastname 	= $request->strLastname;
            $enforcer->intUserID 			= $user->id;
            $enforcer->save();

            $enforcersNewDataSet = $this->getEnforcerData();
            DB::commit();
            return view('enforcer.Table.enforcerTable', ['enforcers' => $enforcersNewDataSet]);
        }catch (\Illuminate\Database\QueryException $e){
	        DB::rollBack();	
	        //return $e->getMessage(); for debugging
	        return "error";
        }
    }
}