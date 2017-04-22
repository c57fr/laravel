@extends('layout/default')

@section('titre')
    Édition d'Article
@endsection

@section('contenu')
    <h1>Éditer {{$post->name}}</h1>
    <p>Catégorie: {{$post->category->name}}</p>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
        <div class="form-group">
            <input type="text" name="name" class="form-control" value="{{old('name', $post->name)}}"
                   placeholder="Titre de l'article">
        </div>
        <div class="form-group">
            <textarea name="content" class="form-control"
                      placeholder="Contenu de l'article">{{old('content', $post->content)}}</textarea>
        </div>
        <button class="btn btn-primary">Sauvegarder</button>
    </form>
@endsection

