@extends('admin.index')
@section('title', 'Mobile Shop - Administrator')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">{{__('list-users')}}</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">{{__('list-users')}}</h1>
			</div>
		</div><!--/.row-->
		@if(session()->exists('success'))
		@foreach(session()->get('success') as $message)
		<p class="alert alert-success" role="alert">{{ $message }}</p>
		@endforeach
		@endif
		<div id="toolbar" class="btn-group">
            <a href="{{ route('add-user') }}" class="btn btn-success">
                <i class="glyphicon glyphicon-plus"></i> {{__('add-user')}}
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
						        <th data-field="name"  data-sortable="true">{{__('fullname')}}</th>
                                <th data-field="price" data-sortable="true">Email</th>
                                <th>{{__('role')}}</th>
                                <th>{{__('action')}}</th>
						    </tr>
                            </thead>
                            <tbody>
								@foreach($users as $user)
                                <tr>
                                    <td>{{ $user->user_id }}</td>
                                    <td>{{ $user->username}}</td>
                                    <td>{{ $user->email }}</td>
									@if( $user->user_level == 1)
                                    <td><span class="label label-danger">Admin</span></td>
									@else
                                    <td><span class="label label-warning">Member</span></td>
									@endif
                                    <td class="form-group">
                                        <a href="{{ route('show-user', ['id' => 1]) }}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a class="btn btn-danger" data-target = "#delete-{{ $user->user_id }}" data-toggle = "modal"><i class="glyphicon glyphicon-remove"></i></a>
                                        <div class="modal" tabindex="-1" id="delete-{{ $user->user_id }}">
											<div class="modal-dialog" >
												<div class="modal-content">
													<div class="modal-header bg-primary">
														<h5 class="modal-title">Xóa danh mục</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<p>Bạn muốn xóa {{ $user->username}}?</p>
													</div>
													<div class="modal-footer">
														<button class="btn btn-secondary" data-dismiss="modal">Close</button>
														<a href	= "{{ route('delete-user', ['id' => 1]) }}" class="btn btn-danger">Xóa</a>
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
                        {{ $users->links()}}
                    </div>
				</div>
			</div>
		</div><!--/.row-->	
	</div>
@endsection