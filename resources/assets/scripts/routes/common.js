export default {
  init() {
    $('#nav-toggle').click(function() {
      $('#main-nav').toggle();
    });

    //Get file name from upload resume and display
    $('#input_2_9').change(function(e) {
      $("label[for='input_2_9").text(e.target.files[0].name)
    });

    $('.search-button').click(function() {
      // $('.search-submit').val('')
      $('.search-form').css('display', 'flex');
      $(this).toggle();
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
