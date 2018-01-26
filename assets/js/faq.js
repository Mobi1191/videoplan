$("#faq-search-input").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#faq-tab #accordion .panel").filter(function() {
    	//$(this).find(".panel-heading .panel-title a").css('color', '#000');
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      if ($(this).text().toLowerCase().indexOf(value) > -1) {
      	//$(this).find(".panel-heading .panel-title a").css('color', '#f00');
      }
    });
  });