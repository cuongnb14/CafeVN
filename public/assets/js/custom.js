function getPage(url){
	var services = [];
	var purports = [];
	var districts = [];
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
	i = 0;
	$('input:checkbox[name="districts[]"]:checked').each(function(){
		districts[i] = $(this).val();
		i++;
	});
	
	var data = {
			'services': services,
			'purports': purports,
			'districts': districts
	}
	
	$.post(url, data, function(data, status){
		$('#list-place').html(data);
	});

}

function getDistricts(){
	var province_id = $('#provinces').val();
	if (province_id==0) {
		$('#list-district').html("");
	} else {
		var data = {
			'province_id': province_id	
		};
		
		$.post('/Cafevn/ajax/quan-huyen?t='+Math.random(), data, function(data, status){
			$('#list-district').html(data);
		});
	}
}

$(document).ready(function(){
	$('input:checkbox').click(function(){
		getPage('/Cafevn/ajax/tim-kiem?t='+Math.random());
		
	});
	
	
	
});


