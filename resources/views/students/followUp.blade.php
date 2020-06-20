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
              <a href="{{route('students.create')}}" style="margin-top:-5px;"><i class="material-icons ml-5" style="margin-top:-5px; font-size:50px">add_circle</i>Add Student</a>
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

                                <form method="POST" action="{{route('students.destroy', $student->id)}}">
                                      @csrf
                                      @method('DELETE')

                                     <button type="submit"><span  class="material-icons text-danger">person_add_disabled</span></button>
                                    </form>

                              &nbsp; | &nbsp;
                                <a href="{{route('students.edit', $student->id)}}"><span  class="material-icons text-success">how_to_reg </span></a>
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
