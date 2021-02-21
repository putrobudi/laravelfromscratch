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
      
      
    </div>
  </div>
</div>
@endsection