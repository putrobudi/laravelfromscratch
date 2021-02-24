@extends('layout')

@section('content')
<div id="wrapper">
  <div id="page" class="container">
    <div id="content">
      <div class="title">
        <h2>{{ $article->title }}</h2>
      </div>
      {{-- Again we don't use relative link in our src image --}}
      <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>

      {{ $article->body }}

      <p style="margin-top: 1em ">
        @foreach ($article->tags as $tag)
        {{-- <a href="/articles?tag={{ $tag->name }}">{{ $tag->name }}</a> --}}
        {{-- Just a reminder. The parameter passed on route function is for the route defined on web.php and for 
          passing data as part of route url example query string. --}}
        <a href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
        @endforeach
      </p>

    </div>
  </div>
</div>
@endsection