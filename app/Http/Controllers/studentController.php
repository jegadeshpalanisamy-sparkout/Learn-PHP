<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;


class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::get();
        return view('Students.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try 
        {
            $data = $request->validate([
                'name' => ['required', 'string'],
                'age' => ['required', 'numeric'],
                'email' => ['required', 'email']

            ]);
            //    dd($data);

            $save = Student::create($data);
            return redirect()->back()->with('success', 'student details added successfuly');
        } catch(\Exception $e) 
        {
            return redirect(route('student.create'))->with('error', 'Error occured:' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        return view('Students.show',compact('student'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        return view('Students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string'],
                'age' => ['required', 'numeric'],
                'email' => ['required', 'email']
            ]);

            $student = Student::findOrFail($id);

            $student->update($data);
            return redirect()->route('student.index')->with('success', 'Student details updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('student.edit', $id)->with('error', 'Error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {

        $student->delete();
        return redirect()->back()->with('success', 'student deatils was deleted');
    }
}
