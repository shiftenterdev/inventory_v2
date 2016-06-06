<div class="row">
	<div class="col-md-12">

		
			<table class="table table-bordered">
				<thead>
				<tr class="t-imp">
					<th>Sl</th>
					<th>Product Code</th>
					<th>Title</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total</th>
				</tr>
				</thead>
				<tbody>
				<?php setlocale(LC_MONETARY, 'en_IN');?>
				<?php $total=0; ?>
				@foreach($temp_pro as $k => $p)
					<tr>
						<td>{{$k+1}}</td>
						<td>
							{{$p->pro_code}}
							<a href="javascript:" class="text-danger confirm rSI" data-key="{{$k}}"><i class="fa fa-times"></i></a>
						</td>
						<td>{{$p->pro_title}}</td>
						<td>{{money_format('%!i',$p->pro_price)}}</td>
						<td>
							<button class="btn btn-warning btn-xs btn-sub-s"> <i class="fa fa-minus"></i> </button>
							<input type="text" class="input-sm num pq-s" data-code="{{$p->pro_code}}" style="width:40px;text-align: center" value="{{$p->pro_quantity}}">
							<button class="btn btn-success btn-xs btn-add-s"> <i class="fa fa-plus"></i> </button>
						</td>
						<td>{{money_format('%!i',($p->pro_quantity * $p->pro_price))}}</td>
					</tr>
					<?php $total +=  $p->pro_quantity * $p->pro_price?>
				@endforeach
					<tr>
						<td>#</td>
						<td>
							<select name="pro_code" id="pro_code" class="form-control input-sm spo">
								<option value="">Select</option>
								@foreach($products as $p)
									<option value="{{$p->pro_code}}">{{$p->pro_code}}</option>
								@endforeach
							</select>
						</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						
					</tr>
				</tbody>
				<tfooter>
					<tr class="t-imp">

						<th colspan="5" class="text-right">Net Total :</th>
						<th colspan="1">{{money_format('%!i', $total)}}</th>
					</tr>
				</tfooter>
			</table>
			<div class="text-center">
				<a href="javascript:" class="btn btn-primary sell-invoice"><i class="fa fa-print"></i> Invoice</a>
			</div>
		
	</div>
</div>