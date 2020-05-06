@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <div class='col-md-12 mx-auto'>
                            <h1 class="text-center"><i class='fa fa-key'></i> Edit {{$permission->name}}</h1>
                            <br>
                            {{ Form::model($permission, array('route' => array('admin.permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}
                            <div class="row">
                                <div class="form-group col-md-6 mx-auto">
                                    <center>{{ Form::label('name', 'Permission Name') }}</center>
                                    {{ Form::text('name', null, array('class' => 'form-control text-center')) }}
                                </div>
                                <div class="form-group col-md-12 mx-auto">
                                    <center>{{ Form::label('description', 'Permission Description') }}</center>
                                    {{ Form::textarea('description', null, array('class' => 'form-control text-center')) }}
                                </div>
                            </div>
                            <br>
                            {{ Form::submit('Update', array('class' => 'btn btn-secondary')) }}

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
