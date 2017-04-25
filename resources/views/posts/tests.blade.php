@extends('layout/default')

@section('titre')
    Mes tests
@endsection

@section('contenu')

    <h1>Test DB::<em>functions()</em></h1>
    <p><em>Éxaminer PostController@tests...</em></p>

    <!-- <pre><?php // print_r($maVar)
    ?></pre> -->
    {{--    {{ dd($posts) }}--}}
    <ul>
        @foreach($elements as $mv)
            <li>
                {{--                <h2>{{dd($posts)}}</h2>--}}

                <h1>{{$mv->name}}</h1>
                <p>{{$mv->email}}</p>

                {{--                <p>{{$post->content}}</p>--}}{{--
                --}}{{--{{ucfirst($post->name)}} dans la catégorie--}}{{--
                --}}{{--                <p>{{$post->category->name}}</p>--}}{{--
                --}}{{--                    {{dd($post)}}--}}{{--
                --}}{{--                <a href=" {{ route('posts.edit', $post->id) }}">Éditer</a>--}}

            </li>
        @endforeach
    </ul>

    @if ($paginator->hasPages())
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"
                                         rel="prev">&laquo;</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
            @endif
        </ul>
    @endif


    {{--
        <ul>
            @foreach($maVar as $mv)
                <li>
                    --}}{{--                                {{$mv}}--}}{{--
                    --}}{{--                <h2>{{dd($posts)}}</h2>--}}{{--
                    {{$mv->password}}
                    --}}{{--                <p>{{$post->content}}</p>--}}{{--
                    --}}{{--{{ucfirst($post->name)}} dans la catégorie--}}{{--
                    --}}{{--                <p>{{$post->category->name}}</p>--}}{{--
                    --}}{{--                    {{dd($post)}}--}}{{--
                    --}}{{--                <a href=" {{ route('posts.edit', $post->id) }}">Éditer</a>--}}{{--
                </li>
            @endforeach
        </ul>--}}
    {{--    {{$mv->links()}}--}}

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

