@extends('layouts.admin-app')

@section('styles')
	<link href="{{ asset('css/pick-a-color-1.2.3.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-white shadow-lg">
                    <div class="card-header">
                        <div class='col-md-12'>

                            <h1 style="color: black"><i class='fa fa-key'></i> Add Role</h1>
                            <hr>

                            {{ Form::open(array('route' => 'admin.roles.store')) }}

                            <div class="row mx-auto">
                                <div class="form-group col-md-4 mx-auto">
                                    {{ Form::label('name', 'Name', ['style' => "color: black"]) }}
                                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group text-center mx-auto col-md-2">
                                    {{ Form::label('colour', 'Colour', ['style' => "color: black"]) }}
                                    {{ Form::text('colour', 'ffffff', array('class' => 'pick-a-color form-control colour')) }}
                                </div>

                                <div class="form-group col-md-12 mx-auto">
                                    <center>{{ Form::label('description', 'Role Description', ['style' => "color: black"]) }}</center>
                                    {{ Form::textarea('description', null, array('class' => 'form-control text-center')) }}
                                </div>
                            </div>

                            <h4 style="color: black" class="text-center"><b>Assign Permissions</b></h4>
                            <div class="row">
                                @php $i = 0; @endphp
                                @foreach ($permissions as $permission)
                                    <div class="card col-md-4">
                                        <div class="card-body col-md-12 pl-0 pr-0">
                                            <div class="col-md-12">
                                                {{Form::label($permission->name, ucfirst($permission->name), ['style' => "color: black"]) }}
                                                {{Form::checkbox('permissions[]',  $permission->id, $permission->name, array('class' => 'switch-input', 'id' => 'switch'.$i, 'style' => "color: black") ) }}
                                                <label for="switch{{ $i }}" class="switch-label"></label>
                                                <br/>
                                            </div>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
                            </div>

                            {{ Form::submit('Add', array('class' => 'btn btn-secondary')) }}

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
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
