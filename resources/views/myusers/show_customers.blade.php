@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
      <h1><i class="fa fa-users"></i> {{$salemans->name}}</h1>
       <h1><i class="fa fa-at"></i> {{$salemans->email}}</h1>
     
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
         
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
                @if(count($users) == 0)
       <div class="row">
      <div class="col-md-12">
                    <span style="font-weight: 900;color: red">No Customer Linked To This Sales Man Return To <a href="{{route('assignstoc_manage')}}">PREVIOUS PAGE</a></span>
                </div>
                @endif
       <div class="row">
           
                                                                               
@foreach($users as $user)
    <div class="col-md-3">

  <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
 
            <div class="info">
              <h4>{{$user->customer->name}}</h4>
              <p><b>{{$user->customer->phone}} </b></p>
               <p><b>{{$user->customer->email}} </b></p>
               <p><b>{{$user->customer->address}} </b></p>

            </div>

          </div> 
           <a href="{!! route('unlink_customer', ['the_id'=>$user->id , 'cus_id'=>$user->customer->id]) !!}" class="btn btn-secondary form-control form-group">UNLINK</a>
        
          
          
     
  </div>


    @endforeach

               

   
    </div> 

@endsection
