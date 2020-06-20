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
                <h4 class="card-title text-center"> Student Out Of Follow Up</h4>
              </div>
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
                                <a href="{{route('students.edit', $student->id)}}"><span   class="material-icons text-success">how_to_reg </span></a>
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
