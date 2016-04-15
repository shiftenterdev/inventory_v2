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
        <div class="col-md-6">
        <h5>Sell Highlight</h5>
          <table class="table">
            <tr>
              <th>Invoice ID</th>
              <th>Product Qty</th>
            </tr>
            @foreach($sells as $s)
            <tr>
              <td>{{$s->invoice_id}}</td>
              <td>{{count($s->products)}}</td>
            </tr>
            @endforeach
          </table>
        </div>
        <div class="col-md-6">
        <h5>Purchase Highlight</h5>
          <table class="table">
            <tr>
              <th>Invoice ID</th>
              <th>Product Qty</th>
            </tr>

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