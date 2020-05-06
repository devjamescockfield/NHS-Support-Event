@extends('layouts.admin-app')

@section('content')
    <div class="container mt-md-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card text-white shadow-lg">
                    <div class="card-header">
                        <div class='col-md-12 mx-auto'>
                            <h1 style="color: black" class="text-center"><i class='fa fa-key'></i> Add Permission</h1>

                            {{ Form::open(array('route' => 'admin.permissions.store')) }}
                            <div class="row col-md-12">
                                <div class="form-group mx-auto">
                                    <center>{{ Form::label('name', 'Name', ['style' => "color: black"]) }}</center>
                                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group col-md-12 mx-auto">
                                    <center>{{ Form::label('description', 'Permission Description', ['style' => "color: black"]) }}</center>
                                    {{ Form::textarea('description', null, array('class' => 'form-control text-center')) }}
                                </div>
                            </div>
                            <br>
                            @if(!$roles->isEmpty())
                                <h4 class="text-center" style="color: black">Assign Permission to Roles</h4>
                                <div class="row col-md-12 mt-md-4">
                                    @foreach ($roles as $role)
                                        <div class="col-sm-4">
                                            {{ Form::checkbox('roles[]',  $role->id ) }}
                                            {{ Form::label($role->name, ucfirst($role->name), ['style' => "color: black"]) }}
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <br>
                            {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
