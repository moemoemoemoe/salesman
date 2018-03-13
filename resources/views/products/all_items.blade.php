@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> items</h1>
          <p>View Items</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Items</a></li>
        </ul>
      </div>

       <div class="row">
      
           
                                                                               
@foreach($products as $product)
    <div class="col-md-3">

  <div class="widget-small primary"> <img src="{{asset('upload/product/'.$product->img_name)}}" style=" width: 80px;height: 80px" />
 
            <div class="info">
              <h4>{{$product->name}}</h4>
              <p><b>{{$product->price}} $</b></p>
            </div>

          </div> 
           <a href="{!! route('show_item', ['id'=>$product->id]) !!}" class="btn btn-secondary form-control form-group">More ...</a>
        
          
          
     
  </div>
<!-- 

        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <b><span style="color: #4CAF50;font-weight: 900">{{$product->name}}</span></b>
            </div>
          
            <div class="panel-body" style="height:80px; background: url('{{asset('upload/product/'.$product->img_name)}}'); background-size: contain; background-position: center center;background-repeat: no-repeat;">
                
            </div>
          
            <div class="panel-footer text-center">
               <a href="{!! route('show_item', ['id'=>$product->id]) !!}" class="btn btn-primary form-control">More ...</a>
            </div>
           
        </div> -->
  

    @endforeach

               

   
    </div> 

@endsection
