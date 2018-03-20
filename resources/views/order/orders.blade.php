@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Orders</h1>
          <p>Upload ,Manage ,Edit , Delete And Others</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Orders</a></li>
        </ul>
      </div>

        <div class="row">
      
           
                                                                               
@foreach($carts as $cart)
   
  
    <div class="col-md-3">
  <div class="widget-small primary">
 
            <div class="info">
              <h4>#{{$cart->inv_nummber}}</h4>
              <p><b>{{$cart->sales->name}} <span style="color: #000;font-weight: 900">To </span>{{$cart->customer->name}}  .</b></p>
              @if($cart->status == 0)
              
                            <h5 style="color: pink;text-align: center;">No Action</h5>
                          
                          @endif


            </div>

          </div> 
                     <a href="{!! route('view_orders', ['id'=>$cart->inv_nummber]) !!}" class="btn btn-danger form-control form-group">View</a>
</div>

        
          
          
     

  

    @endforeach

               

   
    </div> 

@endsection
