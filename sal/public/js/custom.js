function submitForm(form, cb = "", eb = "") {
	let data = {};
	form.find('input, select, checkbox, radio, textarea').each(function(index, value) {
		$(this).css('border', '1px solid #ccc');
		if($(this).val() == "" || $(this).val() == null){
			$(this).css('border', '1px solid brown');
		}else{
			data[$(this).attr('name')] = $(this).val();
		}
		$(this).off("focus").on('focus', function(e){
			$(this).css('border', '1px solid #ccc');
		});
	});
	$.post(form.attr('action'), data, function(data, textStatus, xhr) {
		if(data.code == 200 && typeof cb === "function")
			cb(data);
		if(data.code == 500 && typeof eb === "function")
			eb(data);
	});
}

$(document).off('click', '.change-password')
	.on('click', '.change-password', function(event) {
		event.preventDefault();
		$('div.password').toggleClass('d-none');
	});

$(document).off('click', '#main-form')
	.on('click', '#main-form', function(event) {
		event.preventDefault();
		if($('div.password').hasClass('d-none'))
			$('div.password').remove();

		$(this).closest('form').trigger('submit');
	});

setInterval(function(){
	let val = "-=200";
	if($('#slider .row').position().left < -580)
		val = 20;

	$('#slider .row').animate({
		"left": val + "px"
	},1000);

}, 5000);

$(document).off('click', '#create-forum').on('click', '#create-forum', function(event) {
	event.preventDefault();
	if($(".new-forum").hasClass('d-none'))
		$(".new-forum").removeClass('d-none').hide().slideDown();
	else
		$(".new-forum").slideUp(function(){
			$(this).addClass('d-none');
		});
});