@extends('layouts.admin-app')

@section('styles')
	<link href="{{ asset('css/pick-a-color-1.2.3.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container mt-md-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h1 class="mx-auto" style="width: fit-content;">Role Management</h1>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
                            <hr>
                            {{ Form::model($role, array('route' => array('admin.roles.update', $role->id), 'method' => 'PUT')) }}
                            <div class="row mx-auto">
                                <div class="form-group text-center mx-auto col-md-3">
                                    {{ Form::label('name', 'Role Name') }}
                                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                                </div>

                                <div class="form-group text-center mx-auto col-md-2">
                                    {{ Form::label('colour', 'Colour') }}
                                    {{ Form::text('colour', $role->colour, array('class' => 'pick-a-color form-control colour')) }}
                                </div>

                                <div class="form-group text-center mx-auto col-md-2">
                                    {{ Form::label('staff', 'Staff Rank') }}
                                    <select name="staff" class="form-control">
                                        <option selected value="{{ $role->staff }}">@if($role->staff == true)True @else False @endif</option>
                                        <option value="1">True</option>
                                        <option value="0">False</option>
                                    </select>
                                </div>

                                <div class="form-group text-center mx-auto col-md-2">
                                    {{ Form::label('order', 'Order') }}
                                    <select name="order" class="form-control">
                                        @php $i = $roleCount; @endphp
                                        <option selected disabled>{{ $role->order }}</option>
                                        @while($i > 0)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @php $i-- @endphp
                                        @endwhile
                                    </select>
                                </div>

                                <div class="form-group text-center mx-auto col-md-6 h-50">
                                    {{ Form::label('description', 'Description') }}
                                    {{ Form::textarea('description', null, array('class' => 'form-control')) }}
                                </div>
                            </div>

                            <h4 class="text-center"><b>Assign Permissions</b></h4>
                            <div class="row">
                                @php $i = 0; @endphp
                                @foreach ($permissions as $permission)
                                    <div class="card col-md-4">
                                        <div class="card-body col-md-12 pl-0 pr-0">
                                            <div class="col-md-12">
                                                {{Form::label($permission->name, ucfirst($permission->name)) }}
                                                {{Form::checkbox('permissions[]',  $permission->id, $role->permissions, array('class' => 'switch-input', 'id' => 'switch'.$i) ) }}
                                                <label for="switch{{ $i }}" class="switch-label"></label>
                                                <br/>
                                                <p class="text-secondary">{{ $permission->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
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
    <script src="{{ asset('js/tinycolor-0.9.15.min.js') }}"></script>
    <script src="{{ asset('js/pick-a-color-1.2.3.min.js') }}"></script>
    <script>
        $( document ).ready(function(){
            $(".colour").pickAColor();
        });
    </script>
@endsection
