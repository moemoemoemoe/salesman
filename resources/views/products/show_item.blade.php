@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Products</h1>
          <p>Upload Products Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Products</a></li>
        </ul>
      </div>
  



<div class="tile-body ">
              <div class="form-horizontal" >
                <div class="form-group row">
                  <div  >
                    @if($products->status == 0)
                    <a href="{!! route('publish_item', ['id'=>$products->id]) !!}"><img src="{{asset('images/publish.png')}}" width="30px"></a> 
@else
                    <a href="{!! route('publish_item', ['id'=>$products->id]) !!}"><img src="{{asset('images/published.png')}}" width="30px"></a> 

@endif

                  </div>
                  <div class="col-md-1" >
                  <a href="{{route('add_items')}}"> <img src="{{asset('images/cancel.png')}}" width="30px"></a>
                  </div>
                  <div class="col-md-1" >
                   <a href="{!! route('delete_item', ['id'=>$products->id]) !!}">  <img src="{{asset('images/delete.png')}}" width="30px"></a>
                  </div>
                </div>
              </div>
            </div>



  <hr/>       
<div class="row">

  <div class="col-md-6">
 <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

     <div class="form-group">
                    <label for="NameItem">Product Name</label>
                    <input class="form-control" type="text" placeholder="Product Name" name="name_item" value="{{$products->name}}">
                  </div>


   <div class="form-group">
                       <label for="NameItem">Product Description</label>
                     <textarea cols="80" id="content_item" name="content_item" rows="10" >
                    {{$products->content}}
                  </textarea>    
                  </div>

  <div class="form-group">
                      <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input class="form-control" id="exampleInputAmount" type="text" placeholder="Amount" name="price_item" value="{{$products->price}}">
                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                      </div>
                    </div>


  <div class="form-group">
                      <label class="sr-only" for="exampleInputAmount">Quantity (in Box)</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">qty</span></div>
@if($products->quantity == 0)
<input class="form-control is-invalid" id="exampleInputAmount" type="text" placeholder="Quantity" name="quantity" value="{{$products->quantity}}">
@else
                        <input class="form-control" id="exampleInputAmount" type="text" placeholder="Quantity" name="quantity" value="{{$products->quantity}}">
@endif
                        <div class="input-group-append"><span class="input-group-text">Box</span></div>
                      </div>
                    </div>
 <div class="form-group" style="background-color: #ffffff">
                    
                     <img src="{{asset('upload/product/'.$products->img_name)}}" class="img img-responsive" style="height:200px" />
                  </div>

   <div class="form-group">
                    <label for="exampleInputFile">New Image</label>
                    <input class="form-control" id="exampleInputFile" type="file" aria-describedby="fileHelp" name="photo"><small class="form-text text-muted" id="fileHelp">please upload jpg,png or jpeg image in good quality.</small>
                  </div>
                  <div class="form-group">
                    

            <div class="tile-footer">
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            </div>
                  </div>


    </form>
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


 <script type="text/javascript">
        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;
      CKEDITOR.replace('content_item');
    </script>

@endsection
