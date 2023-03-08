<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = DB::table('subjects')->get();
        return response()->json($subjects);
        
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
            'subject' => 'required|unique:subjects|max:25',
            'subject_code' => 'required',
        ]);

        $data = array();
        $data['class_id'] = $request->class_id;
        $data['subject'] = $request->subject;
        $data['subject_code'] = $request->subject_code;
        $insert = DB::table('subjects')->insert($data);
        return response("Subject Added Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $subjects = DB::table('subjects')->where('id', $id)->first();
        return response()->json($subjects);
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
        $data['class_id'] = $request->class_id;
        $data['subject'] = $request->subject;
        $data['subject_code'] = $request->subject_code;
        $insert = DB::table('subjects')->where('id',$id)->update($data);
        return response("Subject Update Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('subjects')->where('id', $id)->delete();
        return response("Subject Deleted Successfully");
    }
}
