@extends('admin.dashboard')

@section('content')
<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Student</h5>
              </div>
              <img class="mx-auto d-block" src="{{asset('img/'.$student->picture)}}"  width="80" style="border-radius: 25px;" height="80"  class="img-fluid rounded-circle">
              <div class="card-body">
              <form action="{{route('students.update',$student->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" value="{{$student->firstname}}" class="form-control" name="firstname" id="firstname" placeholder="Firstname">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" value="{{$student->lastname}}" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                      <label>Tutor</label>
                        <select class="form-control" name="tutor">
                            <option selected disabled>Tutor</option>
                            @foreach($users as $user)
                                            @if($user->role== 0)
                                                <option  <?php if($student->user_id == $user->id){?>selected="selected"<?php } ?>  value="{{$user->id}}">{{$user->firstName." ".$user->lastName}}</option>
                                            @endif
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                    <label>Class</label>
                        <select id="class" class="form-control" name="class">
                        <option selected disabled>Choose...</option>
                        <option <?php if($student->class=="2021A"){?>selected="selected"<?php } ?> value="2021A">2021A</option>
                      <option <?php if($student->class=="2021B"){?>selected="selected"<?php } ?> value="2021B">2021B</option>
                      <option <?php if($student->class=="2021C"){?>selected="selected"<?php } ?> value="2021C">2021C</option>
                      <option <?php if($student->class=="2020 WEP-A"){?>selected="selected"<?php } ?> value="2020 WEP-A">2020 WEP-A</option>
                      <option <?php if($student->class=="2020 WEP-B"){?>selected="selected"<?php } ?> value="2020 WEP-B">2020 WEP-B</option>
                      <option <?php if($student->class=="2020 SNA"){?>selected="selected"<?php } ?> value="2020 SNA">2020 SNA</option>
                      </select>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                  <div class="col-md-6 ">
                    <div class="form-group">
                    <label>Profile</label>
                        <input type="file" class="form-control" name="picture" id="picture">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                      <label>Description:</label>
                                <textarea class="form-control" placeholder="Description" name="description">{{$student->description}}</textarea>
                      </div>
                    </div>
                  </div>

                   <a type="submit" href="{{ url('/home') }}" class="btn btn-danger float-right">Close</a>
                  <button type="submit" class="btn btn-success float-right">Update</button>
                </form>
              </div>
            </div>
          </div>

@endsection

























