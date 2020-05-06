@extends('layouts.admin-app')

@section('content')
    <div id="doublebackground"></div>
    <div class="flex-center position-ref">
        <div class="content">
            <div class="title text-center m-b-md">
                <h1>Welcome to JDL's NHS Support Event Admin Panel</h1>
            </div>
            <div class="text-center m-b-mb">
                <a style="font-size: 25px;" class="btn btn-secondary" href="{{url('/')}}">Back to Main Site</a>
            </div>
        </div>
    </div>
@endsection
