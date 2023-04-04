<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\studentinfo;

class studentinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $studentinfo = studentinfo::all();

        return view('student.index', compact('studentinfo'));

        
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
        $validatedData = $request->validate([
            'xidNo' => ['required', 'max:8'],
            'xfirstName' => ['required', 'max:20'],
            'xmiddleName' => ['max:15'],
            'xlastName' => ['required', 'max:15'],
            'xsuffix' => ['nullable', 'max:5'],
            'xcourse' => ['required', 'max:15'],
            'xyear' => ['required'],
            'xbirthdate' => ['required', 'date'],
            'xgender' => ['required']
            
            

        ]);
            

    $studentinfo= new studentinfo();
    $studentinfo->idNo = $request->xidNo;
    $studentinfo->firstName = $request->xfirstName;
    $studentinfo->middleName = $request->xmiddleName;
    $studentinfo->lastName = $request->xlastName;
    $studentinfo->suffix = $request->xsuffix;
    $studentinfo->course = $request->xcourse;
    $studentinfo->year = $request->xyear;
    $studentinfo->birthdate = $request->xbirthdate;
    $studentinfo->gender = $request->xgender;

    $studentinfo->save();
    return redirect()->route('student');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $studentinfo = studentinfo::where('sno',$id)->get();
       return view('student.show', compact('studentinfo'));
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
