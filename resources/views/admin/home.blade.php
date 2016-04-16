@extends('admin.layout.index')


@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
<div class="col-md-9 mB">
  <ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Product</li>
  </ul>
  <div class="cN">
    <div class="row">
        <div class="slick">
          @foreach($products as $p)
        <div class="col-md-3 text-center">

          <div class="card">
          <div class="corner-ribbon top-right turquoise shadow">New</div>
          @if(empty($p->image))
            <img src="/default/product.png">
          @else
            <img src="/uploads/{{$p->image}}">
          @endif
          <h5>{{$p->pro_title}}</h5>
          </div>
        </div>
      @endforeach
        </div>
        <div class="col-md-12">
        <legend>Recent Sells</legend>
          <table class="table table-bordered">
            <tr>
              <th>Invoice ID</th>
              <th>Customer</th>
              <th>Customer ID</th>
              <th>Product Qty</th>
              <th>Total Price</th>
              <th>View Invoice</th>
            </tr>
            @foreach($sells as $s)
            <tr>
              <td>{{$s->invoice_id}}</td>
              <td>{{$s->customer->customer_name}}</td>
              <td>{{$s->customer->customer_id}}</td>
              <td>{{count($s->products)}}</td>
              <td>{{$s->amount}}</td>
              <td><a href="sell/view/{{$s->invoice_id}}" class="btn btn-xs btn-primary"><i class="fa fa-file"></i></a></td>
            </tr>
            @endforeach
          </table>
        </div>
    </div>
  </div>
</div>

@endsection

@section('script')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
<script>
  $('.slick').slick({
    infinite: true,
  slidesToShow: 4,
  slidesToScroll: 2,
  autoplay:true
  });
</script>
@endsection