<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    
    public function index()
    {
        return view('admin/finance/index', [
            'transactions' => Finance::all()
        ]);
    }


    public function create()
    {
        return view('admin/finance/createTransaction', ['users' => User::orderBy('name')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        Finance::create([
            'type' => $request->type,
            'added_by' => Auth::user()->id,
            'user_id' => $request->user,
            'amount' => $request->amount,
            'description' => $request->description,
            'transaction_date' => strtotime($request->date),
        ]);

        if($request->type == 'debit' && $request->user != 0){
            $newBalance = User::find($request->user)->balance + $request->amount;
            User::where('id', $request->user)
            ->update(['balance' => $newBalance]); 
        }
        else if($request->type == 'kredit' && $request->user == 0){
            DB::table('users')->decrement('balance', $request->amount);
        }

       
        session()->flash('success', 'Transaksi berhasil!');
        return redirect()->route('finance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show(Finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        Finance::destroy($finance->id);
        session()->flash('success', 'Event telah dihapus!');
        return back();
    }
}
