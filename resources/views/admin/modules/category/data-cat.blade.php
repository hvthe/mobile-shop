<div id="toolbar" class="btn-group">
		<a href="{{ route('create-category') }}" class="btn btn-success">
			<i class="glyphicon glyphicon-plus"></i> {{__('add-category')}}
		</a>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table data-toolbar="#toolbar" data-toggle="table">

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
								<td >{{ $category->cat_id }}</td>
								<td >{{ $category->cat_name }}</td>
								<td class="form-group">
									<a href="{{ route('show-category', ['id' => $category->cat_id]) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
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
    <script src="{{ asset ('admin/js/bootstrap-table.js') }}"></script>
    <script>
        var pageLinks = document.querySelectorAll('.page-link');
        for(var i = 0; i < pageLinks.length; i++){
        var pageLink = pageLinks[i];
            pageLink.onclick = function (event){
                event.preventDefault();
                link = this.href;
                console.log(link)
                $.ajax({
                    url: link,
                    type: "GET",
                    dataType: 'html',
                }).done(function(data){
                        $('#data-cat').html(data);
                    });
            }
        }
    </script>