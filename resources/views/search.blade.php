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

  <div class="container mx-auto search-results py-8">
    <div class="md:pb-12">
      <h1 class="text-2xl text-s-yellow text-center pb-4 lg:text-3xl">{!! App::title() !!}</h1>
      @include('partials.search-form')
    </div>
    
    <div class="px-8 lg:px-0">
    @while(have_posts()) @php the_post() @endphp
      @include('partials.content-search')
    @endwhile
    </div>

  {!! get_the_posts_navigation() !!}
  </div>
@endsection
