<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = DB::table('students')->get();
        return response()->json($student);
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
            'name' => 'required',
            'email' => 'required|unique:students',
            'phone' => 'required|unique:students',
        ]);
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['photo'] = $request->photo;

        $student = DB::table('students')->insert($data);
        return response()->json($student);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = array();
        $data['class_id'] = $request->class_id;
        $data['section_id'] = $request->section_id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = hash::make($request->password);
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['gender'] = $request->gender;
        $data['photo'] = $request->photo;

        $student = DB::table('students')->insert($data);
        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('students')->where('id', $id)->delete();
        return response()->json('Student Deleted');
    }
}
