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
                <a class="btn btn-primary" href="{{route('post.create')}}">{{__('columns.create')}}</a>
                <a class="btn btn-primary" href="{{route('logout')}}">{{__('columns.logout')}}</a>
                <a class="btn btn-primary"  href="{{route('category')}}">{{__('columns.category')}}</a>
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
                    @if(isset($posts))
                        @foreach($posts as $key=>$post)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->sub_title }}</td>
                                <td>{{ $post->category }}</td>
                                <td style="width: 50px; height: 50px; border-radius: 50%;"><img
                                        style="width: 50px; height: 50px; border-radius: 50%;"
                                        src="{{ asset('storage/images/'.$post->image) }}"
                                        alt=""></td>
                                <td>
                                <span class="badge bg-{{ $post->status === 1 ? 'success' : 'danger' }}">
                                    {{__('columns.status.'.$post->status)}}
                                </span>
                                </td>
                                <td>
                                    <a href="{{route('post.show', $post)}}"
                                       class="btn btn-secondary">{{__('columns.show')}}</a>
                                    <a href="{{route('post.edit', $post)}}"
                                       class="btn btn-primary">{{__('columns.edit')}}</a>
                                    <form class="d-inline" action="{{route('post.destroy', $post)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{__('columns.delete')}}</button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach
                    @endif

                    </tbody>
                </table>
                <tfoot>
                {{$posts->links() }}
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
