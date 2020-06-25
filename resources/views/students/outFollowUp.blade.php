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
                  <table class="table text-center">
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
                    @if($student->activeFollowup == 0)

                            <tr>
                                <td>{{$student->id}}</td>
                                <td><img src="{{asset('img/'.$student->picture)}}" width="40" style="border-radius: 25px;" height="40" /></td>
                                <td>{{$student->firstname}}.{{$student->lastname}}</td>
                                <td>{{$student->class}}</td>
                                <td >
                                <a href="{{route('returnFollowUp', $student->id)}}"><i><span class="material-icons text-danger">backup</span></i></a>
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
