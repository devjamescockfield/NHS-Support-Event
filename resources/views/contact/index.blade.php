@extends('layouts.main-app')

@section('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection

@section('content')
    <div class="text-center section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 wp1">
                    <div class="card shadow-lg">
                        <div class="card-title">
                            <div class="col-md-12">
                                <div class="tab-content p-b-3">
                                    <div class="row mt-md-3">
                                        <div class="col-md-12 mx-auto text-center">
                                            <h1>Your Contact Forms:</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <table class="table table-bordered text-center table-striped" id="myTable" data-order='[[ 0, "asc" ]]' data-page-length='11'>
                                    <thead>
                                    <tr>
                                        <th>Ticket ID</th>
                                        <th>Status</th>
                                        @if(!empty($contactMember))<th> Assigned Staff Member </th>@endif
                                        <th>Created At</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contactCases as $contactCase)
                                            <tr>
                                                <td>{{ $contactCase->id }}</td>
                                                <td style="color: #{{ $contactCase->status()->first()->color }}">{{ $contactCase->status()->first()->name }}</td>
                                                @php $contactMember = \App\User::where('id', $contactCase->assigned_id)->first()@endphp
                                                @if(!empty($contactMember))<td>{{ $contactMember->name }}</td>@endif
                                                <td>{{ $contactCase->created_at }}</td>

                                                <td>
                                                    <a class="btn btn-primary" href="{{ route('contact.contact.show', $contactCase->id) }}">View</a>
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
