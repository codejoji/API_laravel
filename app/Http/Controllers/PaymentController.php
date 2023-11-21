<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
class PaymentController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $api =new Api("rzp_test_jX05P2Idt8g68k","clmYvEvwezKrBWwlam0o6DOZ");
        // $orderData = [
        //     'receipt'         => 'rcptid_11',
        //     'amount'          => 39900, // 39900 rupees in paise
        //     'currency'        => 'INR'
        // ];
        
        // $razorpayOrder = $api->order->create($orderData);



    //     $response = Http::withHeaders([
    //     'Accept' => 'application/json',
    //     'Content-Type' => 'application/json',
    //     'Authorization'=> 'Basic' .base64_encode("rzp_test_jX05P2Idt8g68k:clmYvEvwezKrBWwlam0o6DOZ"),
    // ])->post('https://api.razorpay.com/v1/orders', [
    //     "amount"=> 500,
    // "currency"=> "INR",
    // "receipt"=> "qwsaq1",
    // "partial_payment"=> true,
    // "first_payment_min_amount"=> 230

    
    // ]);
    // return response([
    //     "result" => $razorpayOrder
    // ],200);
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
