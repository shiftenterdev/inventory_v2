@extends('admin.layout.index')


@section('content')
<div class="container">
  <div class="col-md-8 col-md-offset-2">
    <div class="homcon">
  <div class="row">
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="product" class="ball"><i class="fa fa-cube"></i><span>Product</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="discount" class="ball"><i class="fa fa-crop"></i><span>Discount</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="brand" class="ball"><i class="ion-ios-star"></i><span>Brand</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="report" class="ball"><i class="ion-ios-browsers"></i><span>Report</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="analysis" class="ball"><i class="ion ion-easel"></i><span>Analysis</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="purchase" class="ball"><i class="ion-briefcase"></i><span>Purchase</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="sell" class="ball"><i class="ion-ios-cart-outline"></i><span>Sell</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="sells-history" class="ball"><i class="ion-ios-paper-outline"></i><span>History</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="stock" class="ball"><i class="fa fa-cubes"></i><span>Stock</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="refund" class="ball"><i class="ion-ios-redo"></i><span>Refund</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="customer" class="ball"><i class="ion-android-people"></i><span>Customer</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="settings" class="ball"><i class="fa fa-cogs"></i><span>Setting</span></a>
    </div>
    <div class="col-md-2" style="background: {{colors()}}">
      <a href="user" class="ball"><i class="fa fa-users"></i><span>User</span></a>
    </div>
  </div>
</div>
  </div>
</div>
@endsection
