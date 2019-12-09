export default {
  init() {
    // JavaScript to be fired on the home page
    $('#input_3_6').change(function(e) {
      $("label[for='input_3_6").text(e.target.files[0].name)
    });
    $('#input_3_6').after('<p class="file-types">Suitable files are doc, docx, & pdf</p>');
    $("#input_3_7").prop("readonly", true);
    $("#input_3_8").prop("readonly", true);
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
