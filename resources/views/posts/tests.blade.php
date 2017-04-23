@extends('layout/default')

@section('titre')
    Mes tests
@endsection

@section('contenu')

    <h1>Test DB::<em>functions()</em></h1>

    {{--    {{ dd($posts) }}--}}
    <pre><?php print_r($maVar)?></pre>
    <ul>
        {{--        @foreach($maVar as $mv)--}}
        <li>
            {{--                                {{$mv}}--}}
            {{--                <h2>{{dd($posts)}}</h2>--}}
            {{--                <p>{{$post->name}}</p>--}}
            {{--                <p>{{$post->content}}</p>--}}
            {{--{{ucfirst($post->name)}} dans la catégorie--}}
            {{--                <p>{{$post->category->name}}</p>--}}
            {{--                    {{dd($post)}}--}}
            {{--                <a href=" {{ route('posts.edit', $post->id) }}">Éditer</a>--}}
        </li>
        {{--@endforeach--}}
    </ul>


    {{--<form action="{{ route('posts.index') }}" method="POST">--}}
    {{--{{csrf_field()}}--}}
    {{--<div class="form-group">--}}
    {{--<input type="text" name="name" class="form-control" value="{{old('name')}}"--}}
    {{--placeholder="Titre de l'article">--}}
    {{--</div>--}}
    {{--<div class="form-group">--}}
    {{--<textarea name="content" class="form-control"--}}
    {{--placeholder="Contenu de l'article">{{old('content')}}</textarea>--}}
    {{--</div>--}}
    {{--<button class="btn btn-primary">Sauvegarder</button>--}}
    {{--</form>--}}
@endsection

