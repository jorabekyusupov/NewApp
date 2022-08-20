<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('styles')
    <title>{{app()->getLocale()}}</title>
    @php
        $locale = app()->getLocale();
        $languages = config('app.locales');
    @endphp
</head>
<body>
<div class="card">

    <form action="{{route('set.locale')}}" method="post" >
        @csrf
        @method('post')
        <select name="lang" id="" onchange="this.form.submit()">
            @foreach($languages as $key => $language)
                <option value="{{$language}}" {{$locale === $language ? 'selected' : ''}}>{{$language}}</option>
            @endforeach
                <option value="kz">kz</option>
        </select>

    </form>
</div>

@yield('content')

@yield('scripts')
</body>
</html>
