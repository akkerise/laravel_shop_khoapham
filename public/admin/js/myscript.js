$(document).ready(function() {
	$('#dataTables-example').DataTable({
		responsive: true
	});
});

$("div.alert").delay(3000).slideUp();

function xacnhanxoa(msg){
	if (window.confirm(msg)) {
		return true;
	}else{
		return false;
	}
}

jQuery(document).ready(function($) {
	$('#addImages').click(function(){
		$('#insertImageDetail').append('<div class="form-group"><input type="file" name="fEditDetail[]"></div>');
	})
});


$(document).ready(function() {
	$('a#del_img_demo').on('click', function() {
		var url = "http://localhost:8000/admin/product/delimg/";
		var _token = $("form[name='frmEditProduct']").find('input[name="_token"]').val();
		var idHinh = $(this).parent().find("img").attr('idHinh');
		var img = $(this).parent().find('img').attr('src');
		var rid =$(this).parent().find('img').attr('id');
		$.ajax({
			url: url + idHinh,
			type: 'GET',
			cache: false,
			dataType: 'json',
			data: {"_token":_token,"idHinh":idHinh,"urlHinh":img},
			success: function(data){
				alert(data);
			}
		});
	});
});