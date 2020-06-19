
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center text-primary"><strong>Student Follow Up</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <!-- Nav tabs -->
                    <ul class="nav nav-tabs ">
                        <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/home') }}">Student Follow Up</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('returnOutFollow')}}">Student Out Follow Up</a>
                        </li>
                    </ul>
                    <br>
                    <!-- Tab panes -->
                    <div class="tab-content">
                            <div class="container">
                                <table class="table table-dark text-center table-hover">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Profile</th>
                                    <th>Username</th>
                                    <th>Class</th>
                                    <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($students as $student)
                          @if($student->activeFolloup == 0)

                            <tr>
                                <td>{{$student->id}}</td>
                                <td><img src="{{asset('img/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                                <td>{{$student->firstname}}.{{$student->lastname}}</td>
                                <td>{{$student->class}}</td>
                                <td class=" text-center">
                                <a href=""><span class="material-icons text-success">how_to_reg </span></a>
                                </td>
                                @endif

                        </tr>
                        @endforeach
                        </tbody>
                         </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection