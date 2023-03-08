<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SectionController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $sections = DB::table('sections')->get();
        return response()->json($sections);
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
        $request->validate([
            'class_id' => 'required',
            'section' => 'required|unique:sections|max:25',
        ]);

        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section'] = $request->section;
        $insert = DB::table('sections')->insert($data);
        return response("Section Added Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $sections = DB::table('sections')->where('id', $id)->first();
        return response()->json($sections);
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
        $request->validate([
            'class_id' => 'required',
            'section' => 'required|unique:sections|max:25',
        ]);

        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section'] = $request->section;
        $insert = DB::table('sections')->where('id',$id)->update($data);
        return response("Section update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('sections')->where('id', $id)->delete();
        return response("Section Deleted Successfully");
    }
}
