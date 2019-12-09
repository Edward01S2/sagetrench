@extends('layouts.app')

@section('content')
  <div class="bg-s-sand">
    <section id="hero">
      <div class="" style="background: center / cover url('{!! App::featImage() !!}')">
        <div class="container mx-auto flex justify-center items-center px-8">
          <h2 class="text-4xl leading-tight lg:text-5xl font-medium py-16 md:py-24 lg:py-28 xl:py-32">{!! $title !!}</h2>
        </div>
      </div>
    </section>

  
    <div class="container mx-auto px-8 -mt-8 md:-mt-10">
      <div class="page-contact bg-white flex flex-col text-center pt-8 pb-4 lg:max-w-3xl lg:mx-auto">
        <h2 class="uppercase text-2xl font-medium pb-4 tracking-wider xl:text-3xl">Locations:</h2>
        <div class="md:flex md:justify-between md:text-left md:px-24 lg:py-4">
          @foreach($locations as $loc)
            <div class="contact-location pb-8">
              {!! $loc->location !!}
            </div>
          @endforeach
      </div>
      </div>
    </div>

    <section id="contact">
      <div class="container mx-auto">
        <div class="">
          <div class="flex flex-col mx-auto items-center py-16 lg:py-16 md:w-3/4 lg:w-3/5 xl:w-1/2">
            <div class="contact-content">
              {{-- @while(have_posts()) @php the_post() @endphp
                @include('partials.content-page')
              @endwhile --}}
              {!! $options_page->acf_options['career_form_content'] !!}
            </div>
            
            @php
              gravity_form_enqueue_scripts($form->id, true);
              gravity_form($form->id, false, false, false, '', true, 1);
            @endphp
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="bg-white">
    <div class="container mx-auto">
      <p class="py-12 px-8 lg:px-32 text-center text-xl md:text-lg lg:text-xl">{!! $pre_footer_text !!}</p>
    </div>
  </div>
  {{-- @debug --}}

@endsection
