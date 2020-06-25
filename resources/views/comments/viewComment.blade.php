@extends('admin.dashboard')

@section('content')

<div class="col-md-12">
            <div class="card card-user">
              <div class="card-body">
                <div class="author">
                  <a href="#">
                  <img class="avatar border-gray" src="{{asset('img/'.$student->picture)}}">
                    <h5 class="title">{{$student->firstname." ".$student->lastname}} - {{$student->class}}</h5>
                  </a>

                </div>
                <p class="description">
                 Description: {{$student->description}}
                  </p>
                @if($student->user_id != "")
                        <p>Tutor By: {{$student->user['firstname']." ".$student->user['lastname']}}</p>
                        @else
                        <p>Tutor By: No</p>
                        @endif

                        <form action="{{route('addComment', $student->id)}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label>Comment:</label>
                                <textarea class="form-control" placeholder="Type your comment..." name="comment" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </form><br>
                        @foreach($comments as $comment)
                            <h5>{{$comment->user['firstname']}} {{($comment->created_at)}}</h5>
                            <p><b>Comment: </b>{{$comment->comment}}</p>

                            @if(auth::id() == $comment->user_id)
                            <a href="{{route('updateComment', $comment->id)}}">Edit</a> |
                            <a href="{{route('removeComment', $comment->id)}}">Remove</a>
                            <hr>
                            @endif


                            @endforeach
              </div>



@endsection
