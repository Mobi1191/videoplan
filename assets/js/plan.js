$(".upgrade-item .upgrade-header .arrow-checkbox").click(function(){
	var checked = $(this).data('checked');
	if (checked == 'unchecked') {
		$(this).attr('src', BASE_URL + "assets/images/checkbox-checked.png");
		$(this).data('checked', 'checked');	
	} else if (checked == 'checked') {
		$(this).attr('src', BASE_URL + "assets/images/checkbox-unchecked.png");
		$(this).data('checked', 'unchecked');	
	}
	
});