<?php

namespace App\Http\Controllers;
use App\User;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::all();
        // $students = Student::all();
        // return view('students.followUp', compact('students', 'users'));
    }
    public function viewOutFollow(){
        $users = User::all();
        $students = Student::all();
        return view('students.outFollowUp', compact('students', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('students.addStudent', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student;
        request()->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('/img/'), $imageName);

        $student -> firstname = $request -> get('firstname');
        $student -> lastname = $request -> get('lastname');
        $student -> class = $request -> get('class');
        $student -> description = $request -> get('description');
        $student -> user_id = $request -> get('tutor');
        $student->activeFollowup = 1;
        $student -> picture = $imageName;
        $student -> save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $users = User::all();
        return view('students.editStudent', compact('student', 'users'));
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
        $student = Student::find($id);
        $imageName = time().'.'.request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('/img/'), $imageName);

        $student -> firstname = $request -> get('firstname');
        $student -> lastname = $request -> get('lastname');
        $student -> class = $request -> get('class');
        $student -> description = $request -> get('description');
        $student -> user_id = $request -> get('tutor');
        $student -> picture = $imageName;
        $student -> save();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student -> delete();
        return redirect('/home');
    }
}



