@extends('layouts.app')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="card-header">
                <a class="btn btn-primary" href="{{route('post.create')}}">Create</a>
            </div>
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        @foreach($columns as $column)
                            <th scope="col">{{$column}}</th>

                        @endforeach

                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($posts))
                        @foreach($posts as $key=>$post)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->sub_title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td style="width: 50px; height: 50px; border-radius: 50%;"><img
                                        style="width: 50px; height: 50px; border-radius: 50%;"
                                        src="{{ asset('storage/images/'.$post->image) }}"
                                        alt=""></td>
                                <td>
                                <span class="badge bg-{{ $post->status === 1 ? 'success' : 'danger' }}">
                                    {{$post->status === 1 ? 'active' : 'inactive'}}
                                </span>
                                </td>
                                <td>
                                    <a href="{{route('post.show', $post)}}" class="btn btn-secondary">show</a>
                                    <a href="{{route('post.edit', $post)}}" class="btn btn-primary">Edit</a>
                                    <form class="d-inline" action="{{route('post.destroy', $post)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    @endif

                    </tbody>
                </table>
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
