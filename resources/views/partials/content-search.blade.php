<article @php post_class() @endphp>
  <div class="container mx-auto">
    <header>
      <h2 class="entry-title text-s-yellow text-xl hover:text-s-stone"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
      @if (get_post_type() === 'post')
        @include('partials/entry-meta')
      @endif
    </header>
    <div class="entry-summary">
      @php the_excerpt() @endphp
    </div>
  </div>
</article>
