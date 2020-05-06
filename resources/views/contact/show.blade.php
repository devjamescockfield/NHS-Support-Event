@extends('layouts.main-app')

@section('style')
    .shadow-lg{box-shadow:0 1rem 3rem rgba(0,0,0,.175)!important}
    .shadow-none{box-shadow:none!important}
    .page-container{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}
    @media (min-width:576px){.container{max-width:540px}}
    @media (min-width:768px){.container{max-width:720px}}
    @media (min-width:992px){.container{max-width:960px}}
    @media (min-width:1200px){.container{max-width:1140px}}.
    .page-container-fluid{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}
@stop

@section('content')
    <div class="page-container text-center">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-title">
                        <div class="col-md-12">
                            <h1>Contact Form Details</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="row mt-md-3">
                                <div class="col-md-12 mx-auto text-center">
                                    <h3>User's Name: <br> <small>{{ $contactCase->name }}</small></h3>
                                </div>

                                <div class="col-md-12 mx-auto text-center">
                                    <h3>Email: <br> <small>{{ $contactCase->email }}</small></h3>
                                </div>

                                <div class="col-md-12 mx-auto text-center">
                                    <h3>Message: </h3>
                                    <textarea class="form-control" rows="5" disabled>{{ $contactCase->message }}</textarea></h3>
                                </div>

                                <div class="col-md-12 mx-auto text-center">
                                    <h3>Status: <br> <small style="color: #{{ $contactCase->status()->first()->color }}">{{ $contactCase->status()->first()->name }}</small></h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10" style="margin-bottom: 10vh">
                <div class="text-box">
                    <h1 class="heading-primary">
                        <span class="heading-primary-main">Messages for this ticket</span>
                    </h1>
                </div>
            </div>

            @if(!empty($comments))
                @foreach($comments as $comment)
                    @if($comment->admin == true)
                        @php $contactMemberComment = \App\User::where('id', $comment->user_id)->first()@endphp
                        <div class="col-md-10 offset-md-3 pb-sm-2" style="margin-bottom: 2vh">
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
                        <div class="col-md-10 col-md-offset-2 pb-sm-2" style="margin-bottom: 2vh">
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
                <div class="col-md-10 col-md-offset-2">
                    <div class="col-md-10 mx-auto mt-md-2 pb-sm-2">
                        <form method="post" action="{{ route('contact.contact.comment', $contactCase->id) }}">
                            @csrf
                            <textarea style="margin-bottom: 10px" rows="9" cols="50" id="comment" placeholder="Your Comment" name="comment">{{ old('comment') }}</textarea>
                            <br>
                            <input type="hidden" name="ticket_id" value="{{ $contactCase->id }}">
                            <button type="submit" class="p-sm-1 btn btn-secondary">Submit</button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>
        $('textarea').autoResize();
    </script>
    <br>
@stop
