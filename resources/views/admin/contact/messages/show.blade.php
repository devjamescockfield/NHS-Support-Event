{{-- \resources\views\admin\support\messages\show.blade.php --}}
@extends('layouts.admin-app')

@section('title', 'Preset Message '.$message->id)

@section('content')
    <div class="container col-md-10 mt-md-2 offset-md-2">
        <div class="row justify-content-center mt-md-5">
            <div class="col-md-12">
                <div class="text-white">
                    <div>
                        <h1 class="mx-auto text-center"><i class="fa fa-comment-dots"></i> Preset Message {{ $message->id }}</h1>
                    </div>

                    <div>
                        <div class="col-md-12 mt-md-4">
                            <div class="row col-md-12">
                                <div class="col-md-4 mx-auto">
                                    <div class="col-md-6 text-center mx-auto">
                                        {{ $message->description }}
                                    </div>
                                </div>
                                <div class="col-md-2 mx-auto">
                                    <div>
                                        {{ $message->Language }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-10 mt-md-4 mx-auto">
                                <div class="col-md-12 mx-auto support-comment box">
                                    {!! $message->message !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('textarea').autoResize();
    </script>
@endsection

