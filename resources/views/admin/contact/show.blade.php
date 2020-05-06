@extends('layouts.admin-app')

@section('style')
    .shadow-lg{box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important}
    .shadow-none{box-shadow:none!important}
    .page-container{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}
    @media (min-width:576px){.page-container{max-width:540px}}
    @media (min-width:768px){.page-container{max-width:720px}}
    @media (min-width:992px){.page-container{max-width:960px}}
    @media (min-width:1200px){.page-container{max-width:1140px}}.
    .page-container-fluid{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}
@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@stop

@section('content')
    @php
        $player = \App\User::where('id', $contactCase->user_id)->first();

        if(!$player){
            $player = new \App\User(['id' => '0', 'name' => 'Deleted Account', 'email' => 'Deleted Account']);
        }
    @endphp
    <div class="container col-md-10 mt-md-4">
        <div class="row m-y-2">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Authenticator Code</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 offset-md-1">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a href="" data-target="#ticket" data-toggle="tab" class="nav-link active">contact Information</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" data-target="#player" data-toggle="tab" class="nav-link">Player Information</a>
                                </li>
                            </ul>
                            <div class="tab-content p-b-3">
                                <div class="tab-pane active" id="ticket">
                                    <div class="row mt-md-3">

                                        <div class="col-md-auto mx-auto text-center mt-md-4">
                                            <h3>Ticket Details:</h3>
                                        </div>

                                        <div class="col-md-12 mx-auto text-center">
                                            <h4>Message:</h4>
                                            <div class="text-center col-md-12 p-sm-2">{{ $contactCase->message }}</div>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                                <div class="tab-pane" id="player">
                                    <div class="row mt-md-3">
                                        <div class="col-md-12 mx-auto">
                                            <h5>User ID: <small>{{ $player->id }}</small></h5>
                                        </div>

                                        <div class="col-md-12 mx-auto">
                                            <h5>Name: <small>{{ $player->name }}</small></h5>
                                        </div>

                                        <div class="col-md-12 mx-auto">
                                            <h5>Email: <small>{{ $player->email }}</small></h5>
                                        </div>
                                    </div>
                                    <!--/row-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-auto text-xs-center split-bottom">
                <div class="card shadow-lg">
                    <div class="card-body text-center">
                        <h5>Ticket ID: <small>{{ $contactCase->id }}</small></h5>

                        <br>
                        <h5>Status: <small style="color: #{{ $contactCase->status()->first()->color }};">{{ $contactCase->status()->first()->name }}</small></h5>

                        <br>

                        <h5>Submitted at: <small>{{ $contactCase->created_at }}</small></h5>
                        @if(!empty($contactCase->assigned_id))
                            @php $contactMember = \App\User::where('id', $contactCase->assigned_id)->first();@endphp
                        @endif
                        <br>
                        <h5>
                            contact Member:
                            <br>
                            <small>@if(!empty($contactMember)){{ $contactMember->name }}@endif</small>
                        </h5>
                    </div>
                    @if($contactCase->status != 4)
                        <div class=" mt-md-2">
                            <div class="text-center">
                                <div class="row col-md-auto">
                                    <div class="col-md-auto mx-auto">
                                        <form method="post" action="{{ route('admin.contact-tickets.update', $contactCase->id) }}">
                                            @csrf
                                            @method('PATCH')

                                            @if(!empty($contactCase->assigned_id) && Auth::id() == $contactMember->id)
                                                <input type="hidden" name="claimed" value="0">
                                                <button type="submit" class="btn btn-danger">Unclaim</button>
                                            @else
                                                <input type="hidden" name="claimed" value="1">
                                                <button type="submit" class="btn btn-success">Claim</button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!empty($contactCase->assigned_id))
                            <div class="mt-md-4">
                                <div class="text-center">
                                    <h6>Change Status</h6>
                                    <div class="row col-md-auto">
                                        <div class="col-md-auto mx-auto">
                                            <form method="post" action="{{ route('admin.contact-tickets.update', $contactCase->id) }}">
                                                <div class="col-md-auto mx-auto">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status" class="select-css">
                                                        <option></option>
                                                        @foreach($statuses_drop as $status)
                                                            <option value="{{$status->name}}">{{$status->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-md-auto mx-auto mt-md-2">
                                                    <br>
                                                    <button type="submit" class="btn btn-success">Update Status</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-md-4">
                                <div class="text-center">
                                    <div class="row col-md-auto">
                                        <div class="col-md-auto mx-auto">
                                            <form method="post" action="{{ route('admin.contact-tickets.update', $contactCase->id) }}">
                                                @csrf
                                                @method('PATCH')

                                                <div class="col-md-auto mx-auto mt-md-2">
                                                    <br>
                                                    <input hidden value="1" name="close" id="close">
                                                    <button type="submit"  class="btn btn-danger">Close Ticket</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endcan
                    @else
                        <div class="mt-md-4">
                            <div class="text-center">
                                <div class="row col-md-auto">
                                    <div class="col-md-auto mx-auto">
                                        <form method="post" action="{{ route('admin.contact-tickets.update', $contactCase->id) }}">
                                            @csrf
                                            @method('PATCH')

                                            <div class="col-md-auto mx-auto mt-md-2">
                                                <br>
                                                <input hidden value="1" name="reopen" id="reopen">
                                                <button type="submit"  class="btn btn-success">Re-open Ticket</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    @endif
                </div>
            </div>

            <div class="col-md-10" style="margin-bottom: 15vh; margin-top: 10vh;">
                <div class="text-box">
                    <h1 class="heading-primary">
                        <span class="heading-primary-main">Messages for this ticket:</span>
                    </h1>
                </div>
            </div>



            @if(!empty($comments))
                @foreach($comments as $comment)
                    @if($comment->admin == true)
                        @php $contactMemberComment = \App\User::where('id', $comment->user_id)->first()@endphp
                        <div class="col-md-10 offset-md-3 pb-sm-2">
                            <div class="card shadow-lg moveRight">
                                <div class="card-header">
                                    <div class="pb-md-4">
                                        <small class="float-right">{{ $contactMemberComment->name }}</small>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 p-sm-2 box">{!! $comment->comment !!}</div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-sm-auto">
                                        <small>Submitted: {{$comment->created_at}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @else
                        @php $player = \App\User::where('id', $contactCase->user_id)->first()@endphp
                        <div class="col-md-10 offset-md-3 pb-sm-2">
                            <div class="card shadow-lg moveLeft">
                                <div class="card-header">
                                    <div>
                                        <div class="pb-md-4"><small class="float-left">{{ $player->name }}</small></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12 p-sm-2 box">{!! $comment->comment !!}</div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-sm-auto">
                                        <small>Submitted: {{$comment->created_at}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif

            <br>

            @if($contactCase->status != 4)
                <div class="col-md-10 mt-xl-6 offset-md-1">
                    <div class="col-md-10 mx-auto mt-md-2 pb-sm-2">
                        <form method="post" action="{{ route('admin.contact-ticket.comment', $contactCase->id) }}">
                            @csrf
                            <textarea rows="9" cols="50" id="comment" name="comment">{{ old('comment') }}</textarea>
                            <br>
                            <input type="hidden" name="ticket_id" value="{{ $contactCase->id }}">
                            <button type="submit" class="p-sm-1 float-right btn btn-secondary">Submit</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
