@extends('admin.layout.index')


@section('content')
<style>
  
</style>
<div class="col-md-9 mB">
  <ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Product</li>
  </ul>
  <div class="cN">
    <div class="row">
      @foreach($products as $p)
        <div class="col-md-3 text-center">

          <div class="card">
          <div class="corner-ribbon top-right turquoise shadow">New</div>
            <img src="/uploads/{{$p->image}}">
          <h5>{{$p->pro_title}}</h5>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

@endsection