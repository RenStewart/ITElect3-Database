<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\grades;
use App\Models\studentinfo;
use App\Models\enrolledsubjects;

class gradesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $grades = grades:: join('studentinfo','grades.sno', '=', 'studentinfo.sno')->get();
        return view('grades.index' , compact('grades'));
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
        
        $grades = new grades();
        $grades->sno=$request->xsno;
        $grades->esNo=$request->xesNo;
        $grades->prelim=$request->xprelim;
        $grades->midterm=$request->xmidterm;
        $grades->finals=$request->xfinals;
        $grades->remarks=$request->xremarks;

        $grades ->save();
        return redirect()->route('grades');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $grades = grades::where('gNo', $id)->get();
        return view('grades.show', compact('grades'));
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
        
        $grades = grades::where('esNo', $id)
        ->update(
             [  'prelim'=>$request->xprelim,
                'midterm'=>$request->xmidterm,
                'finals'=>$request->xfinals,
                'remarks'=>$request->xremarks
             ]);

        return redirect()->route('grades');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function getsubjectinfo(){
        $enrolledsubjects = enrolledsubjects::all();
        $studentinfo = studentinfo::all();
        return view('grades.add', compact('enrolledsubjects', 'studentinfo'));
}
}