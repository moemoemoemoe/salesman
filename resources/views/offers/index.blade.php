@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Offers</h1>
          <p>
          <a href="{{route('manage_offers')}}" style="color: #fff"><p class="btn btn-primary"> Manage Offers</p></a>
      </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Offers</a></li>
        </ul>
      </div>
<div class="row">

  <div class="col-md-6 ">
 <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="form-group">
     <select class=" form-control" name="sales_id">
  @foreach($products as $product)
                      <option value="{{$product->id}}">{{$product->name}}</option>
                      
                      @endforeach
                    
                    </select>   
                                   </div>


   <div class="form-group">
                     <textarea cols="80" id="content_item" name="content_item" rows="10"  placeholder="Description">
                    {{old('content_item')}}
                  </textarea>    
                  </div>

  <div class="form-group">
                      <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                      <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                        <input class="form-control" id="exampleInputAmount" type="text" placeholder="Amount" name="price_item">
                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                      </div>
                    </div>
   <div class="form-group">
                    <label for="exampleInputFile">Image input</label>
                    <input class="form-control" id="exampleInputFile" type="file" aria-describedby="fileHelp" name="photo"><small class="form-text text-muted" id="fileHelp">please upload jpg,png or jpeg image in good quality.</small>
                  </div>
                  <div class="form-group">
                    

            <div class="tile-footer">
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary form-control" href="{{route('home')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
@endsection
