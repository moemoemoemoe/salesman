@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Order Details</h1>
          <p>Upload ,Manage ,Edit , Delete And Others</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Details</a></li>
        </ul>
      </div>
 <div class="row">
      <h4 style="color: #009688;font-weight: 900;text-align: center;">Total :  <?php echo $total_inv + $total_inv_offer."$"; ?>


      </h4>
 </div>

        <div class="row">
      
           
                                                                               
@foreach($carts as $cart)
   
  
    <div class="col-md-3">
                    <h4>{{$cart->products->name}}</h4>

  <div class="widget-small primary"> <img src="{{asset('upload/product/'.$cart->products->img_name)}}" style=" width: 80px;height: 80px" />
 
            <div class="info">
              <p><b> {{$cart->products->price}} $ --> {{$cart->qty}} box </b></p>
             
                   <p><b><?php echo $cart->products->price * $cart->qty."$"; ?></b></p>

            </div>

          </div> 
<!--                      <a href="{!! route('delete_offer', ['id'=>$cart->products->id]) !!}" class="btn btn-danger form-control form-group">Delete</a>
 --></div>
      
          
          
     
  


    @endforeach
                                                                               
@foreach($carts_offers as $cart)
   
  
    <div class="col-md-3">
                    <h4>{{$cart->offers->title}}</h4>

  <div class="widget-small primary"> <img src="{{asset('upload/offer/'.$cart->offers->img_name)}}" style=" width: 80px;height: 80px" />
 
            <div class="info">
              <p><b> {{$cart->offers->price}} $ --> {{$cart->qty}} box </b></p>
             
                   <p><b><?php echo $cart->offers->price * $cart->qty."$"; ?></b></p>

            </div>

          </div> 
 --></div>
      
          
          
     
  


    @endforeach
               

   
    </div> 

@endsection
