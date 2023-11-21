<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
class Payment1Controller extends Controller
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
        $payment = new Payment;
        $payment->Payment_id = $request->payment_id;
        $payment->User_id = $request->user_id;
        $payment->Amount = $request->amount;
        $payment->save();

        return response([
            "result" => $payment
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data=Payment::all();
        return response([
            "result" => $data
        ],200);    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
