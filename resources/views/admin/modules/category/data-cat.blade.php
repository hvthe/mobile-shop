<div id="toolbar" class="btn-group">
	<a href="" data-target="#add-category-modal" data-toggle="modal" class="btn btn-success">
		<i class="glyphicon glyphicon-plus"></i> {{__('add-category')}}
	</a>
	<div class="modal" tabindex="-1" id="add-category-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title">Thêm danh mục</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<label>Tên danh mục:</label>
					@csrf
					<input type="text" name="cat_name" class="form-control" value="" placeholder="Tên danh mục...">
					<p class="errorMessageAdd text-danger"></p>
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" data-dismiss="modal">Close</button>
					<a href="{{route('store-category')}}" id="add-category" class="btn btn-success">Add</a>
				</div>

			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<table data-toolbar="#toolbar" data-toggle="table" id="data-table">

					<thead>
						<tr>
							<th data-field="id" data-sortable="true">ID</th>
							<th>{{__('brand')}}</th>
							<th>{{__('action')}}</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>{{ $category->cat_id }}</td>
							<td>{{ $category->cat_name }}</td>
							<td class="form-group">
								<button href="" class="btn btn-primary show-category" data-toggle="modal" data-target="#show-{{$category->cat_id}}"><i class="glyphicon glyphicon-pencil"></i></button>
								<div class="modal" tabindex="-1" id="show-{{$category->cat_id}}">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-primary">
												<h5 class="modal-title">Update</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<label>Tên danh mục:</label>
												@csrf
												<input type="text" name="cat_name-{{$category->cat_id}}" class="form-control" value="{{$category->cat_name}}" placeholder="Tên danh mục...">
												<p class="errorMessageAdd text-danger"></p>
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button onclick = "updateCategory('{{ $category->cat_id }}')" id="" class="btn btn-primary update-btn">Update</button>
											</div>

										</div>
									</div>
								</div>
								<a class="btn btn-danger" data-toggle="modal" data-target="#delete-{{$category->cat_id}}"><i class="glyphicon glyphicon-remove"></i></a>
								<div class="modal" tabindex="-1" id="delete-{{$category->cat_id}}">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header bg-primary">
												<h5 class="modal-title">Xóa danh mục</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<p>Bạn muốn xóa ?</p>
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" data-dismiss="modal">Close</button>
												<a href="{{ route('delete-category', ['id' => $category->cat_id])}}" class="btn btn-danger">Xóa</a>
											</div>
										</div>
									</div>
								</div>
								
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>

			<div class="panel-footer">
				{{ $categories->links()}}
			</div>
		</div>
	</div>
</div>

	<!-- <script src="{{ asset ('admin/js/lumino.glyphs.js') }}"></script> -->
<script src="{{ asset ('admin/js/bootstrap-table.js') }}"></script>
<script src="{{ asset ('admin/js/crud-ajax.js') }}"></script>
