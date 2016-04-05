<div class="row">
	<div class="col-md-10 col-md-offset-1">

		@if($temp_pro==0)
			<h5 class="alert alert-warning">No Product</h5>
		@else
			<table class="table">
				<thead>
				<tr>
					<th>Sl</th>
					<th>Core</th>
					<th>Title</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				@foreach($temp_pro as $k => $p)
					<tr>
						<td>{{$k+1}}</td>
						<td>{{$p->pro_code}}</td>
						<td>{{$p->pro_title}}</td>
						<td>{{$p->pro_price}}</td>
						<td>{{$p->pro_quantity}}</td>
						<td>{{$p->pro_quantity * $p->pro_price}}</td>
						<td><button class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button></td>
					</tr>
				@endforeach
				</tbody>
			</table>
		@endif
	</div>
</div>