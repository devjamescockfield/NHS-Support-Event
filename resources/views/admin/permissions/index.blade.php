@extends('layouts.admin-app')

@section('styles')
	<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
	<script src="{{ asset('DataTables/datatables.min.js') }}"></script>
@endsection

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card shadow-lg">
					<div class="card-header">
						<h1 class="mx-auto" style="width: fit-content;"><i class="fa fa-key"></i>Permission Management</h1>
					</div>
					<div class="card-body">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered table-bordered table-striped" id="myTable" data-order='[[ 0, "asc" ]]' data-page-length='10'>
									<thead>
									<tr>
										<th style="color: black">Permission Name</th>
										<th></th>
										<th></th>
									</tr>
									</thead>
									<tbody>
									@foreach ($permissions as $permission)
										<tr>
											<td style="color: black">{{ $permission->name }}</td>
											<td>
												<a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>
											</td>
											<td>
												{!! Form::open(['method' => 'DELETE', 'route' => ['admin.permissions.destroy', $permission->id] ]) !!}
												{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
												{!! Form::close() !!}
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							<a href="{{ URL::to('permissions/create') }}" class="btn btn-secondary">Add Permission</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
	<script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
	</script>
@endsection
