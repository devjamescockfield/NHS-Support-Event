@extends('layouts.admin-app')

@section('content')
    <div class="container col-md-9 mt-xl-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center table-striped" id="myTable" data-order='[[ 0, "asc" ]]' data-page-length='11'>
                                <thead>
                                <tr>
                                    <th style="color: black">Status ID</th>
                                    <th style="color: black">Name</th>
                                    <th style="color: black">Created At</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($statuses as $status)
                                    <tr>
                                        <td style="color: black">{{ $status->id }}</td>
                                        <td style="color: #{{ $status->color }}">{{ $status->name }}</td>
                                        <td style="color: black">{{ $status->created_at }}</td>

                                        <td>
                                            <a class="btn btn-secondary" href="{{ route('admin.contact-statuses.show', $status->id) }}">View</a>
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('admin.contact-statuses.destroy', $status->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <a class="btn btn-secondary" href="{{ route('admin.contact-statuses.create') }}">Add New Status</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
