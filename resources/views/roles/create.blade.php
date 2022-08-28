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
                            <form method="post" action="{{route('role.store')}}" enctype="multipart/form-data">
                                @method('POST')
                                @csrf

                                <div class="controls">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_name">name *</label>
                                                <input id="form_name" type="text" name="name"
                                                       class="form-control  @error('name') is-invalid @enderror"
                                                       placeholder="Please enter your name *"
                                                       data-error="title is required."
                                                       value="{{old('name')}}">

                                                @error('name')
                                                <span style="color: red">{{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form_lastname">gourd name *</label>
                                                <input id="form_lastname" type="text" name="guard_name"
                                                       class="form-control @error('guard_name') is-invalid @enderror"
                                                       placeholder="Please enter your guard_name *"
                                                       data-error="sub_title is required."
                                                       value="{{old('guard_name')}}">

                                                @error('guard_name')
                                                <span style="color: red">{{$message}} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="form_message">permission *</label>
                                                <select name="permissions[]" id="form_message" class="form-control mt-1" multiple>
                                                    <option hidden>Select permissions</option>
                                                    @foreach($permissions as $permission)
                                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('permission_id')
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

