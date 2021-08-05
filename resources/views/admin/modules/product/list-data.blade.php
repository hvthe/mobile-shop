<div id="toolbar" class="btn-group">
	<a href="{{ route('create-product')}}" class="btn btn-success">
		<i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
	</a>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<table data-toolbar="#toolbar" data-toggle="table">
					<thead>
						<tr>
							<th data-field="id" data-sortable="true">ID</th>
							<th data-field="name" data-sortable="true">Tên sản phẩm</th>
							<th data-field="price" data-sortable="true">Giá</th>
							<th>Ảnh</th>
							<th>Trạng thái</th>
							<th>Danh mục</th>
							<th>Cập nhật</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						@foreach($products as $key => $product)
						<tr>
							<td class="align-middle">{{$product->prd_id}}</td>
							<td class="align-middle">{{$product->prd_name}}</td>
							<td class="align-middle">{{ number_format($product->prd_price)}} vnd</td>
							<td class="align-middle" style="text-align: center"><img height="100" src="{{ asset('admin/images/'.$product->prd_image)}}" /></td>
							@if ($product->prd_status == 1)
							<td class="align-middle"><span class="label label-success">Còn hàng</span></td>
							@else
							<td class="align-middle"><span class="label label-danger">Hết hàng</span></td>
							@endif
							<td class="align-middle">{{$product->category->cat_name}}</td>
							<td class="align-middle">{{$product->updated_at}}</td>
							<td class="form-group align-middle">
								<a href="{{ route ('show-product', ['id' => $product->prd_id]) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
								<a data-target="#delete-{{ $product->prd_id }}" data-toggle="modal" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
							</td>
							<div class="modal" tabindex="-1" id="delete-{{ $product->prd_id }}">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header bg-primary">
											<h5 class="modal-title">Xóa sản phẩm</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<p>Bạn muốn xóa {{$product->prd_name}}?</p>
										</div>
										<div class="modal-footer">
											<button class="btn btn-secondary" data-dismiss="modal">Close</button>
											<a href="{{ route('delete-product', ['id' => $product->prd_id]) }}" class="btn btn-danger">Xóa</a>
										</div>
									</div>
								</div>
							</div>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!--/.row-->
<div class="panel-footer">
	{{ $products->links() }}
</div>

<script src="{{ asset ('admin/js/bootstrap-table.js') }}"></script>
<script type="text/javascript">
$(document).ready(function (){
	var pageLinks = document.querySelectorAll('a.page-link');
	console.log(pageLinks[0])
	for (var i = 0; i < pageLinks.length; i++) {
		var pageLink = pageLinks[i];
		pageLink.onclick = function(event) {
			event.preventDefault();
			link = this.href;
			console.log(2)
			$.ajax({
				url: link,
				type: "GET",
				dataType: 'html',
			}).done(function(data) {
				$('#list-data').html(data);
				// document.querySelector('#list-data').innerHTML = data
			});
		}

	}
})
</script>