@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Users</h1>
          <p>Upload ,Manage ,Edit , Delete And Others</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Users Form</a></li>
        </ul>
      </div>
      <form method="POST" enctype="multipart/form-data"  method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
  
       <div class="col-md-5">
          <div class="tile">
            <h3 class="tile-title">New User</h3>
            <div class="tile-body">
              <form class="form-horizontal">
                <div class="form-group row">
                  <label class="control-label col-md-3">Name</label>
                  <div class="col-md-8">
                    <input class="form-control" type="text" placeholder="Enter full name" name="name">
                  </div>
                </div>
                 <div class="form-group row">
                  <label class="control-label col-md-3">Mobile Number</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="number" placeholder="Enter Mobile Number" name="phone">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input class="form-control col-md-8" type="email" placeholder="Enter email address" name="email">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Address</label>
                  <div class="col-md-8">
                    <textarea class="form-control" rows="4" placeholder="Enter your address" name="address"></textarea>
                  </div>
                </div>
                  <div class="form-group row">
                    <label class="control-label col-md-3">Example select</label>
                    <select class="col-md-8 form-control" name="type">
                      <option value="1">Sales Employee</option>
                      <option value="2">Delivery Employee</option>
                      <option value="3">Customer</option>
                    
                    </select>
                  </div>
               
           
              </form>
            </div>
            <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save User</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{route('home')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="col-md-6">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger" >
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session::has('success'))
                        <p class="alert alert-success">{{Session('success')}}</p>
                    @endif
                   
                </div>
        </div>
        </form>
       

@endsection
