@extends('admin.dashboard')

@section('title')
@endsection

@section('content')
<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title text-center"> Student Follow Up</h4>
              </div>
              <a class="btn btn-primary" href="{{route('students.create')}}" style="margin-left:10px;margin-top:-5px;">Add Student</a>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Profile
                      </th>
                      <th>
                        Username
                      </th>
                      <th >
                        Class
                      </th>
                      <th >
                        Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                          @if($student->activeFolloup == 0)

                            <tr>
                                <td>{{$student->id}}</td>
                                <td><img src="{{asset('img/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                                <td>{{$student->firstname}}.{{$student->lastname}}</td>
                                <td>{{$student->class}}</td>
                                <td >
                                     <a class="material-icons text-danger" >person_add_disabled</a>   |
                                      <a href="{{route('addStudent', $student->id)}}"  class="material-icons text-success">how_to_reg</a> |
                                      <a href="{{route('students.show', $student->id)}}"class="material-icons text-info">visibility</a>

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
      </div>
@endsection

@section('scripts')
@endsection
