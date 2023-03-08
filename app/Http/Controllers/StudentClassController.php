<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentClass;
use DB;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = DB::table('studen_classes')->get();
        return response()->json($classes);
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
            'class_name' => 'required||unique:studen_classes|max:value:25',
        ]);

        $data = array();
        $data['class_name'] = $request->class_name;
        $insert = DB::table('studen_classes')->insert($data);
        return response("inserted");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show = DB::table('studen_classes')->where('id', $id)->first();
        return response()->json($show);
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
        $data = array();
        $data['class_name'] = $request->class_name;
        $insert = DB::table('studen_classes')->where('id',$id)->update($data);
        return response("updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('studen_classes')->where('id', $id)->delete();
        return response("deleted");
    }
}
