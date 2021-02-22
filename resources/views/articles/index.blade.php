@extends('layout')

@section('content')
<div id="wrapper">
  <div id="page" class="container">
    <div id="content">

      @foreach ($articles as $article)
      <div class="title">
        {{-- <h2><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></h2> --}}
        {{-- Laravel automatically knows which key to use. Why? Because it's defined
        in Article Model. By default it's set to search for id key. --}}
        {{-- <h2><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h2> --}}
        <h2><a href="{{ $article->path() }}">{{ $article->title }}</a></h2>
      </div>
      <p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
      {!! $article->excerpt !!}
      <br><br><br><br><br>
      @endforeach


    </div>
  </div>
</div>
@endsection