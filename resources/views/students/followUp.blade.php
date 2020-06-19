
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
                        <a class="nav-link active"  href="#home">Student Follow Up</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('returnOutFollow')}}">Student Out Follow Up</a>
                        </li>
                    </ul>
                    <br>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane container active" id="home">
                            <div class="container">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">Add Student</button>
                                <br><br>
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
                                <a href=""><span class="material-icons text-danger">person_add_disabled</span></a>&nbsp; | &nbsp;
                                <a href="{{route('students.edit', $student->id)}}"><span data-toggle="modal" data-target="#edit" class="material-icons text-success">how_to_reg </span></a>
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

<!-- The Modal -->
<div class="modal" id="add">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
       <div class="modal-header">
          <h4 class="modal-title text-center">Add Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form action=" {{route('students.store')}} " method="POST">
    @csrf
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="firstname">Firstname</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="lastname">Lastname</label>
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="picture">Picture</label>
                    <input type="file" class="form-control" name="picture" id="picture">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="class">Class</label>
                    <select id="class" class="form-control" name="class">
                      <option selected>Choose...</option>
                      <option>2021A</option>
                      <option>2021B</option>
                      <option>2021C</option>
                      <option>2020 WEP-A</option>
                      <option>2020 WEP-B</option>
                      <option>2020 SNA</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-right">Add Student</button>
              </form>
        </div>
      </div>
    </div>
  </div>




<!-- The Modal -->
<div class="modal" id="edit">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
       <div class="modal-header">
          <h4 class="modal-title text-center">Edit Student</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form method="POST" action="{{route('students.update', $student->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="firstname">Firstname</label>
                    <input type="text" value="{{$student->firstname}} class="form-control" name="firstname" id="firstname" placeholder="Firstname">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="lastname">Lastname</label>
                    <input type="text" value="{{$student->lastname}} class="form-control" name="lastname" id="lastname" placeholder="Lastname">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="picture">Picture</label>
                    <input type="file" class="form-control" name="picture" id="picture">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="class">Class</label>
                    <select id="class" class="form-control" name="class">
                      <option selected>Choose...</option>
                      <option <?php if($student->class=="2021A"){?>selected="selected"<?php } ?> value="2021A">2021A</option>
                      <option <?php if($student->class=="2021B"){?>selected="selected"<?php } ?> value="2021B">2021B</option>
                      <option <?php if($student->class=="2021C"){?>selected="selected"<?php } ?> value="2021C">2021C</option>
                      <option <?php if($student->class=="2020 WEP-A"){?>selected="selected"<?php } ?> value="2020 WEP-A">2020 WEP-A</option>
                      <option <?php if($student->class=="2020 WEP-B"){?>selected="selected"<?php } ?> value="2020 WEP-B">2020 WEP-B</option>
                      <option <?php if($student->class=="2020 SNA"){?>selected="selected"<?php } ?> value="2020 SNA">2020 SNA</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" value="{{$student->decription}} id="description" name="description" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary float-right">Add Student</button>
              </form>
        </div>
      </div>
    </div>
  </div>


@endsection




