<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
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
        $location = new Cart;
        $location->user_id = $request->user_id;
        $location->plantdetail_id = $request->plantdetail_id;
        $location->save();
        return response([
            "result" => $location,
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=Cart::where('user_id', $id)->get();
        // $data = DB::select('select * from students where id = ?',[$id]);
        if(isset($data)){
            return response([
                "result" => $data,
            ],200);
            }
        else{
            return response([
                "result"=>"no response",
            ],200);
            }
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
        $student = Cart::where('plantdetail_id', $id)->delete();
        return response([
          "result" => $id,
      ],200);
    }


    public function destroyall()
    {
    
    Cart::truncate();
      return response([
        "result" => "success",
    ],200);
  
}
}