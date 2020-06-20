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
                <h5 class="title">Add Student</h5>
              </div>
              <div class="card-body">
              <form  action="{{route('students.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                      <label for="description">{{ __('Tutor') }}</label>
                        <select class="form-control" name="tutor">
                            <option selected disabled>Tutor</option>
                          @foreach($users as $user)
                                @if($user->role== 0)
                                    <option value="{{$user->id}}">{{$user->firstname." ".$user->lastname}}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Class</label>
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
                        <label>Description</label>
                        <textarea rows="4" cols="80" class="form-control" name="description" id="description" placeholder="Here can be your description" value=""></textarea>
                      </div>
                    </div>
                  </div>
                 <a type="submit" href="{{ url('/home') }}" class="btn btn-danger float-right">Close</a>
                  <button type="submit" class="btn btn-success float-right">Save</button>
                </form>
              </div>
            </div>
          </div>

@endsection

@section('scripts')
@endsection









