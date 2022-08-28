@extends('layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="card-header">
                <a class="btn btn-primary" href="{{route('home')}}">{{__('columns.home')}}</a>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        @foreach($columns as $column)
                            <th scope="col">{{__('columns.'.$column)}}</th>

                        @endforeach

                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($permissions))
                        @foreach($permissions as $key=>$role)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>

                            </tr>

                        @endforeach
                    @endif

                    </tbody>
                </table>
                <tfoot>
                {{$permissions->links() }}
                </tfoot>
            </div>

        </div>
    </div>






    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                alert('{{$error}}');
            </script>
        @endforeach
    @endif

@endsection
