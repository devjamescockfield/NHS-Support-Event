{{-- \resources\views\admin\users\create.blade.php --}}
@extends('layouts.admin-app')

@section('title', 'contact Messages')

@section('styles')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
@endsection

@section('content')
    <div class="container col-md-10 mt-md-2 offset-md-2">
        <div class="row justify-content-center mt-md-5">
            <div class="col-md-12">
                <a class="btn btn-secondary" href="{{ route('admin.contact-messages.create') }}">New Preset Message</a>
            </div>
        </div>

        <div class="row justify-content-center mt-md-5">
            <div class="col-md-12">
                <div class="text-white">
                    <div>
                        <h4 class="mx-auto text-center"><i class="fa fa-comment-dots"></i> Preset Messages</h4>
                    </div>

                    <div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center" id="Messages" data-order='[[ 0, "asc" ]]'>
                                    <thead>
                                    <tr>
                                        <th style="color: black;">ID</th>
                                        <th style="color: black;">Description</th>
                                        <th style="color: black;">Language</th>
                                        <th style="color: black;">Created By</th>
                                        <th style="color: black;">Last Updated At</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($messages as $message)
                                        <tr class="content">
                                            <td style="color: black;" data-class-name="priority">{{ $message->id }}</td>
                                            <td style="color: black;">{{ $message->description }}</td>
                                            <td style="color: black;">{{ $message->language }}</td>
                                            @php $user = \App\User::where('id', $message->created_by)->first() @endphp
                                            <td style="color: black;">{{ $user->name }}</td>
                                            <td style="color: black;">{{ $message->updated_at }}</td>
                                            <td>
                                                <a class="btn btn-outline-secondary p-1" href="{{ route('admin.contact-messages.edit', $message->id) }}">Edit</a>
                                            </td>
                                            <td>
                                                <a class="btn btn-secondary p-1" href="{{ route('admin.contact-messages.show', $message->id) }}">View</a>
                                            </td>
                                            <td>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['admin.contact-messages.destroy', $user->id] ]) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
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
            $('#Messages').DataTable();
        } );
    </script>
@endsection

