@extends('layout/default')

@section('titre')
    Mes posts
@endsection

@section('contenu')
    <h1>Posts</h1>
    {{ var_dump($posts) }}
@endsection

