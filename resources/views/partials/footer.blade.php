<footer class="bg-s-stone text-white">
  <div class="container mx-auto">
    <div class="flex flex-col items-center text-white">
      <div id="nav-brand" class="flex items-center pt-16 pb-8">
        <a class="brand hover:opacity-50" href="{{ home_url('/') }}">
          <img class="h-12 md:h-14" src="{{ $options_page->acf_options['footer_logo']['url'] }}" alt="">  
        </a>
      </div>
      <div class="pb-8 md:pb-12 lg:pb-16">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav-footer']) !!}
        @endif
      </div>
      <p class="text-white pb-4 tracking-wide">{!!$options_page->acf_options['copy']!!} <?php echo date("Y"); ?></p>
    </div>
  </div>
  {!! $options_page->acf_options['footer_scripts'] !!}
</footer>
