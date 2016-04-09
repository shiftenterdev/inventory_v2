<div class="row">
	<div class="col-md-12">

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
					<th width="6%">Action</th>
				</tr>
				</thead>
				<tbody>
				<?php setlocale(LC_MONETARY, 'en_IN');?>
				<?php $total=0; ?>
				@foreach($temp_pro as $k => $p)
					<tr>
						<td>{{$k+1}}</td>
						<td>{{$p->pro_code}}</td>
						<td>{{$p->pro_title}}</td>
						<td>{{money_format('%!i',$p->pro_price)}}</td>
						<td>{{$p->pro_quantity}}</td>
						<td>{{money_format('%!i',($p->pro_quantity * $p->pro_price))}}</td>
						<td><a href="javascript:" class="btn btn-xs btn-danger rSI" data-key="{{$k}}"><i class="fa fa-times"></i></a></td>
					</tr>
					<?php $total +=  $p->pro_quantity * $p->pro_price?>
				@endforeach
				</tbody>
				<tfooter>
					<tr class="t-imp">

						<th colspan="5">Grand Total :</th>
						<th colspan="2">{{money_format('%!i', $total)}}</th>
					</tr>
				</tfooter>
			</table>
			<div class="text-center">
				<a href="javascript:" class="btn btn-primary sell-invoice"><i class="fa fa-print"></i> Invoice</a>
			</div>
		@endif
	</div>
</div>