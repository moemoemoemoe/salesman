@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Users</h1>
     
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Users</a></li>
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
       <div class="row">
      
           
                                                                               
@foreach($users as $user)
    <div class="col-md-3">

  <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
 
            <div class="info">
              <h4>{{$user->name}}</h4>
              <p><b>{{$user->phone}} </b></p>
               <p><b>{{$user->email}} </b></p>
                <p><b>{{$user->address}} </b></p>
            </div>

          </div> 
           <a href="{!! route('delete_user', ['the_id'=>$user->id]) !!}" class="btn btn-danger form-control form-group">Delete</a>
        
          
          
     
  </div>


    @endforeach

               

   
    </div> 

@endsection
