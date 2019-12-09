<form role="search" method="get" class="search-form pb-10 md:hidden md:pb-0" action="<?php echo home_url( '/' ); ?>">
  <label>
    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
    <input type="search" class="search-input p-2 border-2 border-s-sand rounded-lg"
        placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>"
        value="<?php echo get_search_query() ?>" name="s"
        title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
  </label>
  <button type="submit">
    <svg class="h-4 w-4 fill-current text-s-stone ml-2 hover:text-s-yellow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg>
  </button>
</form>