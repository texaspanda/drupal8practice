(function ($, Drupal) {
  Drupal.behaviors.clearForm = {
    attach: function (context, settings) {
      $('#reset').click(function() {
        $(this).closest('form').find("input[type=text], textarea").val("");
      });
    }
  };
})(jQuery, Drupal);