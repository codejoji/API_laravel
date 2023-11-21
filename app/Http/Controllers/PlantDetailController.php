<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlantDetail;
use App\Models\Cart;

class PlantDetailController extends Controller
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

        $location = new PlantDetail;
        $location->title = $request->title;
        $location->nooftrees = $request->nooftrees;
        $location->name = $request->name;
        $location->occasion = $request->occasion;
        $location->location_id = $request->location_id;
        $location->save();

        return response([
            "result" => $location,

        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data=PlantDetail::all();
        return response([
            "result" => $data
        ],200);
    }

    public function showbyid($id)
    {
        $data=PlantDetail::where('location_id', $id)->get();
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
    public function update(Request $request, $id)
    {
        $student = PlantDetail::find($id);
        $student->nooftrees = $request->nooftrees;
        $student->update();
        return response([
            "result" => $student,
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = PlantDetail::where('id', $id)->delete();
          return response([
            "result" => $id,
        ],200);
    }
}
