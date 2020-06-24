@extends('admin.dashboard')

@section('content')
<div class="col-md-4"></div>
<div class="col-md-4">
            <div class="card card-user">
            <div class="card-header">
                    <h5>Edit Comment</h5>
            </div>
              <div class="card-body">
                <form action="{{route('comments.update', $comment->id)}}" method="post">
                        @csrf
                        @method('put')
                            <div class="form-group">
                                <label>Comment:</label>
                                <textarea class="form-control" placeholder="Comment" name="comment">{{$comment->comment}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-info float-right">Edit</button>
                            <a href="{{route('students.show', $comment->student['id'])}}" class="btn btn-danger float-right">Cancel</a>
                        </form>
              </div>
         </div>

         <div class="col-md-4"></div>
  @endsection






