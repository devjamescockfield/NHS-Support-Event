@extends('layouts.admin-app')

@section('styles')
	<link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
	<script src="{{ asset('DataTables/datatables.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('DataTables/Select-1.3.1/css/select.dataTables.min.css') }}">
    <script src="{{ asset('DataTables/Select-1.3.1/js/dataTables.select.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('DataTables/Buttons-1.5.6/css/buttons.dataTables.min.css') }}">
    <script src="{{ asset('DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('DataTables/Buttons-1.5.6/js/buttons.colVis.min.js') }}"></script>
@endsection

@section('content')
	<div class="container col-md-10 offset-md-2">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card shadow-lg">
					<div class="card-header">
						<h1 class="mx-auto" style="width: fit-content; color: black"><i class="fa fa-key"></i> Role Management</h1>
					</div>
					<div class="card-body">
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered table-striped display" id="myTable" data-order='[[ 0, "asc" ]]' data-page-length='8'>
									<thead>
									<tr>
										<th style="color: black">ID</th>
										<th style="color: black">Role</th>
                                        <th style="color: black">Permissions</th>
										<th></th>
										<th></th>
									</tr>
									</thead>
									<tbody>
									@foreach ($roles as $role)
										<tr>
											<td style="color: black" data-class-name="priority">{{ $role->id }}</td>
											<td style="color:{{'#'. $role->colour }}; width: 12.9%;">{{ $role->name }}</td>
											<td style="color: black">{{ str_replace(array('[',']','"'),' ', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                                            <td>
												<a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-secondary pull-left" style="margin-right: 3px;">Edit</a>
											</td>
											<td>
												{!! Form::open(['method' => 'DELETE', 'route' => ['admin.roles.destroy', $role->id] ]) !!}
												{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
												{!! Form::close() !!}
											</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
							<a href="{{ route('admin.roles.create') }}" class="btn btn-secondary">Add Role</a>
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
            var table = $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'columnsToggle'
                ],
                columnDefs: [
                    {
                        targets: 2,
                        visible: false
                    }
                ]
            } );

            table.on( 'buttons-action', function () {
                $("body").getNiceScroll().resize();
            } );
        });
	</script>
@endsection
