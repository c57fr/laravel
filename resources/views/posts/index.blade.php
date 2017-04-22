@extends('layout/default')

@section('titre')
    Mes articles
@endsection

@section('contenu')

    <h1>Articles</h1>

    <ul>
        @foreach($posts as $post)
            <li>
                {{--<h2>{{$post->name}}</h2>--}}
                {{--<p>{{$post->content}}</p>--}}
                {{ucfirst($post->name)}} dans la catégorie {{$post->category_id}}
                {{--{{$post->category->name}}--}}
                {{--                {{dd($post)}}--}}
                <a href=" {{ route('posts.edit', $post->id) }}">Éditer</a>
            </li>
        @endforeach
    </ul>


    <form action="{{ route('posts.index') }}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{old('name')}}"
                   placeholder="Titre de l'article">
        </div>
        <div class="form-group">
            <textarea name="content" class="form-control"
                      placeholder="Contenu de l'article">{{old('content')}}</textarea>
        </div>
        <button class="btn btn-primary">Sauvegarder</button>
    </form>
@endsection

