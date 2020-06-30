<?php

namespace App\Http\Controllers;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use Auth;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    // view info student in out of follow up page
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
        if(auth::user()->role == 1){
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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $comments = $student->comments;
        return view('comments.viewComment', compact('student', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addStudent($id)
    {
        $student = Student::find($id);
        $users = User::all();
        return view('students.updateStudent', compact('student', 'users'));
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
        if(auth::user()->role == 1){
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    //Student out of follow up

    public function outOfFollowStudent($id)
    {
        $student = Student::find($id);
        $student->activeFollowup = 0;
        $student->save();
        return redirect('/home');
    }

    //return to followup

    public function returnFollowUp($id)
    {
        $student = Student::find($id);
        $student->activeFollowup = 1;
        $student->save();
        return redirect('/home');
    }
}



