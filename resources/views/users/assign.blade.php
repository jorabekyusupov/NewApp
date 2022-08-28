@extends('layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('content')
    <div class="container">


        <div class="row ">
            <div class="col-lg-7 mx-auto">
                <div class="card mt-2 mx-auto p-4 bg-light">
                    <div class="card-body bg-light">

                        <div class="container">
                            <form method="post" action="{{route('assign-role')}}" enctype="multipart/form-data">
                                @method('POST')
                                @csrf

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="form_message">Users *</label>
                                            <select name="user_id" id="form_message" class="form-control mt-1">
                                                <option hidden>Select user</option>
                                                @foreach($users as $permission)
                                                    <option
                                                        value="{{$permission->id}}">{{$permission->username}}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                            <span style="color: red">{{$message}} </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_message">Roles *</label>
                                            <select name="role_id" id="form_message" class="form-control mt-1">
                                                <option hidden>Select Role</option>
                                                @foreach($roles as $permission)
                                                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <span style="color: red">{{$message}} </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-12 m-1">

                                    <input type="submit" class="btn btn-success btn-send  pt-2 btn-block"
                                           value="Create">

                                </div>
                        </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
    </div>
@endsection
@section('scripts')
@endsection

