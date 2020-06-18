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
                        <a class="nav-link active" data-toggle="tab" href="#home">Student Follow Up</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Student Out Follow Up</a>
                        </li>
                    </ul>
                    <br>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane container active" id="home"> 
                            <div class="container">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Student</button>
                                <br><br>    
                                <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>Profile</th>
                                    <th>Username</th>
                                    <th>Class</th>
                                    <th>Active FollowUp</th>
                                    </tr>
                                </thead>
                                

                                
                                <tbody>
                                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href=""><span class="material-icons text-danger">person_add_disabled</span></a>
                                        <a href=""><span class="material-icons text-success">how_to_reg </span></a>
                                    </td>
                                    </tr>
                                </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="menu1">
                            <div class="container">
                                <table class="table table-dark table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Profile</th>
                                        <th>Username</th>
                                        <th>Class</th>
                                        <th>Active FollowUp</th>
                                    </tr>
                                    </thead>
                                    

                                    
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href=""><span class="material-icons text-success">how_to_reg </span></a>             
                                        </td>
                                    </tr>
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
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center">Add student to follow up</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form>
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
  
@endsection