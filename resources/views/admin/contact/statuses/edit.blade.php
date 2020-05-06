@extends('layouts.admin.default')

@section('title', 'Edit Statuses')

@section('styles')
    <link href="{{ asset('css/pick-a-color-1.2.3.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div class="container mb-xl-6">
        <div class="row m-y-2 ">
            <div class="col-lg-12 push-lg-4 mb-xl-4">
                <div class="mx-auto mt-xl-3 mb-xl-4 col-md-auto text-white">
                    <h1 class="mx-auto text-center">Edit Status</h1>
                </div>
                <form method="post" action="{{ route('admin.feedback-statuses.update', $status->id) }}">
                    @csrf
                    @method('PATCH')
                    @include('admin.feedback.statuses.form')
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('admin/js/tinycolor-0.9.15.min.js') }}"></script>
    <script src="{{ asset('admin/js/pick-a-color-1.2.3.min.js') }}"></script>
    <script>
        $( document ).ready(function(){
            $(".colour").pickAColor();
        });
    </script>

@endsection
