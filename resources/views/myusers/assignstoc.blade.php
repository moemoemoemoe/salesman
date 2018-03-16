@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Assign</h1>
          <p>Upload ,Manage ,Edit , Delete And Others</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Assign Sales To Customers</a></li>
        </ul>
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
<div class="col-md-6">
 <form method="POST" enctype="multipart/form-data"  method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

 <div class="form-group">
                    <label for="NameItem">Sales Name</label>
 <select class=" form-control" name="sales_id">
  @foreach($salesmans as $salesman)
                      <option value="{{$salesman->id}}">{{$salesman->name}}</option>
                      
                      @endforeach
                    
                    </select>   
                                   </div>
<div class="form-group">
                    <label for="NameItem">Customer Names</label>
 <select class=" form-control" name="customer_id[]" multiple="multiple">
                       @foreach($customers as $custumer)
                      <option value="{{$custumer->id}}">{{$custumer->name}}</option>
                      
                      @endforeach
                    
                    </select>                  </div>


            <div class="tile-footer">

              @if(count($customers) == 0 || count($salesmans) == 0)
              <button class="btn btn-danger form-control" disabled="disabled"><i class="fa fa-fw fa-lg fa-check-circle"></i>No Customers Yet!!</button>
              @else
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload</button>
@endif
              &nbsp;&nbsp;&nbsp;

              <a class="btn btn-secondary form-control" href="{{route('home')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
   
        </form>       
      </div>


@endsection
