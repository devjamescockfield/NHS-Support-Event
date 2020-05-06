@extends('layouts.admin-app')

@section('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
@endsection

@section('content')
    <div class="container col-md-10 mt-md-4">
        <div class="row m-y-2">
            <div class="col-lg-7 offset-md-1">
                <div class="card shadow-lg">
                    <div class="card-title">
                        <div class="col-md-12">
                            <div class="tab-content p-b-3">
                                <div class="row mt-md-3">
                                    <div class="col-md-12 mx-auto text-center">
                                        <h3>User ID: <br> <small>{{ $user->id }}</small></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="tab-content p-b-3">
                                <div class="row mt-md-3">
                                    <div class="col-md-12 mx-auto text-center">
                                        <h3>Name: <br> <small>{{ $user->name }}</small></h3>
                                    </div>
                                    <br>
                                    <div class="col-md-12 mx-auto text-center">
                                        <h4>Email:</h4>
                                        <div class="text-center col-md-12 p-sm-2">{{ $user->email }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @can('Edit User Permissions')
            <br>
            <br>
            @can('Change Role')
                <div class="row m-y-2">
                    <div class="col-lg-7 offset-md-1">
                        <div class="card shadow-lg">
                            <div class="card-title">
                                <div class="col-md-12">
                                    <div class="tab-content p-b-3">
                                        <div class="row mt-md-3">
                                            <div class="col-md-12 mx-auto text-center">
                                                <h3>Edit Users Role:</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mx-auto mt-sm-2 p-2 card-body shadow-lg text-center col-sm-6">
                                <div class="col-sm-12 mx-auto">
                                    Current Role: <p style="display: initial;font-weight: bold;color:{{ '#'.$user->roles()->pluck('colour')->implode(' ') }};">{{ $user->roles()->pluck('name')->implode(' ') }}</p>
                                    <form method="post" action="{{ route('admin.users.update', $user->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <select class="custom-select select-css mt-sm-2" name="role">
                                            <option value="{{ $user->roles()->pluck('id')->implode(' ') }}">{{ $user->roles()->pluck('name')->implode(' ') }}</option>
                                            @foreach ($roles as $role)
                                                <option style="color:{{'#'. $role->colour }};" value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>

                                        <div class="col-sm-auto mt-sm-2 mx-auto text-white">
                                            <button type="submit" class="btn btn-success shadow-lg">Change</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        @endcan
    </div>

    <script type="text/javascript">
        function preset_message(clicked_id)
        {
            var message = document.getElementById(clicked_id).value;

            var textarea = document.getElementById("comment");

            textarea.value = message;

            $("body").getNiceScroll().resize();
        }
    </script>
@endsection
