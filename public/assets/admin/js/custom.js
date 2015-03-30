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

function deleteUser(id){
	var data = {
			'id': id	
	};
	$.post('/Cafevn/admin/ajax/delete-user?t='+Math.random(), data, function(data, status){
		
				$('#notification').html(data);
				$("#p-"+id).remove();
		
		});
}

function changeUser(place_id){
	user_id = $('#new-'+place_id).val();
	var data = {
			'place_id': place_id,
			'user_id': user_id
	};
	$.post('/Cafevn/admin/ajax/change-user?t='+Math.random(), data, function(data, status){
				$('#notification').html(data);
		});
}