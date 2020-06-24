<footer class="bg-s-stone text-white">
  <div class="container mx-auto">
    <div class="flex flex-col items-center text-white pt-12 pb-8 lg:pt-16">
      <div class="text-center">
        <div class="text-2xl font-medium mb-2 lg:text-3xl">{!! $options_page->acf_options['footer_subtitle'] !!}</div>
        <div class="flex items-center justify-center space-x-2 lg:text-3xl">
            <svg class="text-s-yellow h-8 w-8 lg:h-10 lg:w-10" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
            <a class="hover:text-s-yellow" href="tel:{!! $options_page->acf_options['footer_phone'] !!}"><span class="text-2xl font-medium lg:text-3xl">{!! $options_page->acf_options['footer_phone'] !!}</span></a>
          </div>
      </div>
      <div id="nav-brand" class="flex items-center py-8 pt-12">
        <a class="brand hover:opacity-50" href="{{ home_url('/') }}">
          <img class="h-12 md:h-14" src="{{ $options_page->acf_options['footer_logo']['url'] }}" alt="">  
        </a>
      </div>
      <div class="pb-8 md:pb-12 lg:pb-16">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-footer']) !!}
        @endif
      </div>
      
      <div class="pb-12 lg:max-w-2xl xl:max-w-3xl">
        <div class="grid grid-cols-1 md:grid-cols-3">
          @foreach($options_page->acf_options['footer_logos'] as $logo)
          <div>
            <img class="block object-contain max-w-xs mx-auto px-12 md:px-8 w-full h-full" src="{!! $logo['url'] !!}" alt="">
          </div>
          @endforeach
        </div>
      </div>

      <p class="text-white pb-4 tracking-wide">{!!$options_page->acf_options['copy']!!} <?php echo date("Y"); ?></p>
    </div>
  </div>
  {!! $options_page->acf_options['footer_scripts'] !!}
</footer>
