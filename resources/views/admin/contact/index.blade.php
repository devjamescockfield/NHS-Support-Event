@extends('layouts.admin-app')

@section('content')
    <div class="container col-md-9 mt-xl-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            @if ($contactCases->count() > 0)
                                <table class="table table-bordered text-center table-striped" id="myTable" data-order='[[ 0, "asc" ]]' data-page-length='11'>
                                    <thead>
                                        <tr>
                                            <th style="color: black">Ticket ID</th>
                                            <th style="color: black">Status</th>
                                            <th style="color: black">Assigned Staff Member</th>
                                            <th style="color: black">Created At</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contactCases as $contactCase)
                                        <tr>
                                            <td style="color: black">{{ $contactCase->id }}</td>
                                            <td style="color: #{{ $contactCase->status()->first()->color }}">{{ $contactCase->status()->first()->name }}</td>
                                            @php $contactMember = \App\User::where('id', $contactCase->assigned_id)->first()@endphp
                                            <td style="color: black">@if(!empty($contactMember)){{ $contactMember->name }}@endif</td>
                                            <td style="color: black">{{ $contactCase->created_at }}</td>

                                            <td>
                                                <a class="btn btn-secondary" href="{{ route('admin.contact-tickets.show', $contactCase->id) }}">View</a>
                                            </td>
                                            <td>
                                                <form method="post" action="{{ route('admin.contact-tickets.destroy', $contactCase->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h3>No Contact Tickets Found</h3>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
