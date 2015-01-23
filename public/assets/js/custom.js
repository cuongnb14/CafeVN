function getPage(url){
	var services = [];
	var purports = [];
	var i = 0;
	$('input:checkbox[name="service[]"]:checked').each(function(){
		services[i] = $(this).val();
		i++;
	});
	i = 0;
	$('input:checkbox[name="purport[]"]:checked').each(function(){
		purports[i] = $(this).val();
		i++;
	});
	
	var data = {
			'services': services,
			'purports': purports
	}
	
	$.post(url, data, function(data, status){
		$('#list-place').html(data);
		console.log(1);
	});

}

function getDistricts(){
	var province_id = $('#provinces').val();
	
	
}

$(document).ready(function(){
	$('input:checkbox').click(function(){
		getPage('/Cafevn/ajax/tim-kiem?t="+Math.random()');
		
	});
	
	
	
});


