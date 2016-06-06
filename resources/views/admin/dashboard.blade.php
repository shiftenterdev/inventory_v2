@extends('admin.layout.index')


@section('content')
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <div class="homcon">
  <div class="row">
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <div class="n">13</div>
      <a href="product"><i class="fa fa-cube"></i><span>Product</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="discount"><i class="fa fa-crop"></i><span>Discount</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <div class="n">7</div>
      <a href="brand"><i class="ion-ios-star"></i><span>Brand</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <div class="n">7</div>
      <a href="report"><i class="ion-ios-browsers"></i><span>Report</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="analysis"><i class="ion ion-easel"></i><span>Analysis</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="purchase"><i class="ion-briefcase"></i><span>Purchase</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="sell"><i class="ion-ios-cart-outline"></i><span>Sell</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="payment"><i class="ion-cash"></i><span>Payment</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="sells-history"><i class="ion-ios-paper-outline"></i><span>History</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <div class="n">23</div>
      <a href="stock"><i class="fa fa-cubes"></i><span>Stock</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="refund"><i class="ion-ios-redo"></i><span>Refund</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="customer"><i class="ion-android-people"></i><span>Customer</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <a href="settings"><i class="fa fa-cogs"></i><span>Setting</span></a>
    </div>
    <div class="col-md-2 ball" style="background: {{colors()}}">
      <div class="n">23</div>
      <a href="user"><i class="fa fa-users"></i><span>User</span></a>
    </div>
  </div>
</div>
  </div>
</div>
@endsection
