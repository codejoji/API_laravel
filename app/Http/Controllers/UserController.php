<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        $user=User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        $token=$user->createToken('mytoken')->plainTextToken;

        return response([
            'user'=>$user,
            'token'=>$token,
            'status'=>"success"
        ],201);
    }


    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user = User::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password,$user->password))
        {
            return response([
                "message"=>"The credentials are incorrect"
            ],401);
        }

        $token=$user->createToken('mytoken')->plainTextToken;
        return response([
            'user'=>$user,
            'token'=>$token,
            'status'=>"success",
        ],200);
    }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data=User::where('id', $id)->get();
        // $data = DB::select('select * from students where id = ?',[$id]);
        return response([
            "result" => $data,
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
