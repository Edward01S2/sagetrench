export default {
  init() {

    $('#pum-421').one('pumAfterOpen', function() {
      $('.ctct-form-success .ctct-form-header').html('Thank you!<br>Access the product catalog below.');
      $('.ctct-form-success .ctct-form-text').remove();
      $('.ctct-form-success').append('<a class="popup-button" href="https://sagetrench.com/wp-content/uploads/2020/06/Sage-Trench-Brochure.pdf" target="_blank">Download Product Catalog</a>');
    });
   //$('.ctct-form-success .ctct-form-text').append('Got Here');
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
