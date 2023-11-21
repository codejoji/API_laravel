<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Storage;
USE App\Models\PlantDetail;
use Illuminate\Support\Facades\Validator;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function createnew(Request $request)
    {
        $imagesName = [];
        $response = [];

        $validator = Validator::make($request->all(),
            [
                'images' => 'required',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]
        );

        if($validator->fails()) {
            return response()->json(["status" => "failed", "message" => "Validation error", "errors" => $validator->errors()]);
        }

        if($request->has('images')) {
            foreach($request->file('images') as $image) {
                $filename = time().rand(3, 9). '.'.$image->getClientOriginalExtension();
                $image->move('uploads/', $filename);

                Image::create([
                    'image_name' => $filename
                ]);
            }

            $response["status"] = "successs";
            $response["message"] = "Success! image(s) uploaded";
        }

        else {
            $response["status"] = "failed";
            $response["message"] = "Failed! image(s) not uploaded";
        }
        return response()->json($response);
    
    }

   
    
    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        // $validated = $request->validate([
        //     'title' => ['required'],
        // ]);
        
        $pimage = $request->file('img')->store('img','public');

        $location = new Location;
        $location->title = $request->title;
        $location->desc = $request->desc;
        $location->cost = $request->cost;
        $location->img = $pimage;
        $location->save();
        return response([
            "result" => $location,
        ],200);
        
    }

    /**
     * Display the specified resource.
     */

    public function showwithplantdetail(){
        $details=Location::with(['PlantDetail'])->get();
        if(isset($details)){
                return response([
                    "result" => $details,
                ],200);

        }
        else{
            return response([
                "result"=>"no response",
            ],200);
        }
    }
    public function show()
    {
        $data=Location::all();
        foreach($data as $data2){
            $url=Storage::url($data2->img);
            $data2->imgpath='https://rasayanudyog.co.in'.''.$url;
        }
        
        // $data = DB::select('select * from students');
 
        // return response([
        //     "message" => $data,
        // ],200);
        return response([
            "result" => $data
        ],200);
    }
    public function showbyid(string $id)
    {
        $data=Location::where('id', $id)->get();
        foreach($data as $data2){
            $url=Storage::url($data2->img);
            $data2->imgpath='http://127.0.0.1:8000'.''.$url;
        }
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
