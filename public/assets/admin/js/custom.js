$(document).ready(function() {

});

function getDistricts(){
	var province_id = $('#province').val();
	if (province_id==0) {
		$('#district').html("<option>Chọn quận/huyện</option>");
	} else {
		var data = {
			'province_id': province_id	
		};
		
		$.post('/Cafevn/admin/ajax/quan-huyen?t='+Math.random(), data, function(data, status){
			$('#district').html(data);
		});
	}
}

function deletePlace(id){
	var data = {
			'id': id	
		};
	$.post('/Cafevn/admin/ajax/delete-place?t='+Math.random(), data, function(data, status){
		
				$('#notification').html(data);
				$("#p-"+id).remove();
		
		});
}