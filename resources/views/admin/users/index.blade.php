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
                        <h1 class="mx-auto" style="width: fit-content;"><i class="fa fa-key"></i> Users</h1>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-bordered table-striped" id="myTable" data-order='[[ 0, "asc" ]]' data-page-length='10'>
                                    <thead>
                                    <tr>
                                        <th style="color: black">User ID</th>
                                        <th style="color: black">User's Name</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td style="color: black">{{ $user->id }}</td>
                                            <td style="color: black">{{ $user->name }}</td>

                                            <td>
                                                <a class="btn btn-secondary" href="{{ route('admin.users.show', $user->id) }}">view</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
