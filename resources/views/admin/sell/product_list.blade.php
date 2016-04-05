<div class="row">
	<div class="col-md-10 col-md-offset-1">

		@if(empty($temp_pro))
			<h5 class="alert alert-warning">No Product</h5>
		@else
			<table class="table">
				<thead>
				<tr class="t-imp">
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
				<?php $total=0; ?>
				@foreach($temp_pro as $k => $p)
					<tr>
						<td>{{$k+1}}</td>
						<td>{{$p->pro_code}}</td>
						<td>{{$p->pro_title}}</td>
						<td>{{$p->pro_price}}</td>
						<td>{{$p->pro_quantity}}</td>
						<td>{{$p->pro_quantity * $p->pro_price}}</td>
						<td><a href="javascript:" class="btn btn-xs btn-danger rI" data-key="{{$k}}"><i class="fa fa-times"></i></a></td>
					</tr>
					<?php $total +=  $p->pro_quantity * $p->pro_price?>
				@endforeach
				</tbody>
				<tfooter>
					<tr class="t-imp">
						<th colspan="5">Grand Total :</th>
						<th colspan="2">{{$total}}</th>
					</tr>
				</tfooter>
			</table>
		@endif
	</div>
</div>