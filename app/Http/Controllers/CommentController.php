<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Student;
use Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function updateComment($id)
    {
        $comment = Comment::find($id);
        return view('comments.editComment', compact('comment'));
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

         $comment = Comment::find($id);
        if(auth::id() == $comment->user_id){
         $comment->comment = $request->comment;
         $comment->save();
         return redirect('students/'.$comment->student['id']);
        }else{
            return "No permission";
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeComment(Request $request, $id)
    {

         $comment = Comment::find($id);
        if(auth::id() == $comment->user_id){
         $comment->delete();
         return back();
        }
    }

//   add comment to student

    public function addComment(Request $request, $id){
        $student = Student::find($id);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->student_id = $student->id;
        $comment->user_id = auth::id();
        $comment->save();
        return redirect('students/'.$student->id);
    }


}
