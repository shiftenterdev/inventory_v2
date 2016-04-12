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
   
    <table>
      <tr>
        <td>Name </td><td> : <strong>{{$customer->customer_name}}</strong></td> </tr>
        <tr>
        <td>Address </td><td> : <strong>{{$customer->customer_address}}</strong></td>
        </tr>
        <tr>
        <td>Phone </td><td> : <strong>{{$customer->customer_phone}}</strong></td>
      </tr>
    </table>
    <br>
    <h5>Product Details</h5>
     <form action="purchase/store" method="post">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>SL</th>
          <th>Product Info</th>
          <th>Quantity</th>
          <th>Unit Price</th>
          <th width="20%">Total Price</th>
        </tr>
      </thead>
      <tbody>
          <?php $total = 0; ?>
          @foreach($products as $k => $p)
            <tr>
              <td>{{$k+1}}</td>
              <td>{{$p->pro_title}}</td>
              <td>{{$p->pro_quantity}}</td>
              <td>{{$p->pro_price}}</td>
              <td>{{$p->pro_price * $p->pro_quantity}}</td>
              <?php $total += $p->pro_price * $p->pro_quantity ?>
            </tr>
          @endforeach
        <tr>
          <th colspan="4" class="text-right">Net Total</th>
          <th class="total">{{$total}}</th>
        </tr>
        <tr>
          <th colspan="4" class="text-right">Sales Tax (%)</th>
          <th><input type="text" class="form-control input-sm s-t" name="sells_discount" placeholder="5.00"></th>
        </tr>
        <tr>
          <th colspan="4" class="text-right ">Payment Option</th>
          <th>
            <select name="payment_option" class="form-control input-sm" required>
              <option value="">Payment Option</option>
              <option value="CARD">CARD</option>
              <option value="CASH">CASH</option>
            </select>
          </th>
        </tr>
        <tr>
          <th colspan="4" class="text-right">Gross Total</th>
          <th class="g-t">{{$total}}</th>
        </tr>
      </tbody>
    </table>
    <div class="text-center">
      <button class="btn btn-primary" type="submit"><i class="fa fa-shopping-bag"></i> Confirm Purchase</button>
      </form>
    </div>
    <div style="margin-bottom: 150px"></div>
  </div>
</div>

@endsection

@section('script')
@parent
<script>
  $('.s-t').on('keyup',function(){
      var tax = $(this).val()==''?0:$(this).val();
      tax = parseFloat(tax);
      var total = parseFloat($('.total').text());
      $('.g-t').text((total+tax*total/100).toFixed(2));
  });
</script>
@endsection