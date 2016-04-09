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
    <h5>Customer Information</h5>
    Name: <strong>{{$customer->customer_name}}</strong><br>
    Address: <strong>{{$customer->customer_address}}</strong><br>
    Phone: <strong>{{$customer->customer_phone}}</strong><br>
    <br>
    <h5>Product Details</h5>
    <table class="table">
      <thead>
        <tr>
          <th>SL</th>
          <th>Product Info</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th>Total Price</th>
        </tr>
      </thead>
      <tbody>
          @foreach($products as $k => $p)
            <tr>
              <td>{{$k+1}}</td>
              <td>{{$p->pro_title}}</td>
              <td>{{$p->pro_quantity}}</td>
              <td>{{$p->pro_price}}</td>
              <td>{{$p->pro_price * $p->pro_quantity}}</td>
            </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection