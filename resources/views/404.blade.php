@extends('layouts.app')

@section('content')

  @if (!have_posts())
    <div class="container mx-auto py-24 text-center px-8 lg:py-36 xl:py-48">
      <h1 class="text-5xl text-s-yellow uppercase">{!! App::title() !!}</h1>
      <div class="alert alert-warning pb-12 text-xl">
        {{ __('Sorry, but the page you were trying to view does not exist.', 'sage') }}
      </div>
      @include('partials.search-form')
    </div>
  @endif
@endsection
