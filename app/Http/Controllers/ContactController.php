<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
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
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->city = $request->city;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->comments = $request->comments;
        $contact->reason = $request->reason;
        $contact->orgname = $request->orgname;
        $contact->save();

        return response([
            "result" => $contact
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data=Contact::all();
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
