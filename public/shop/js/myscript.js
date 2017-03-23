$(document).ready(function(){
	$('.update_cart').click(function() {
	  var rowId = $(this).attr('id');
    // var rowId = $('.total').find('a').attr('id');
    var qty = $(this).parent().parent().find('.qty').val();
    // var qty = $('.quantity').find('.qty').val();
    var token = $(this).parent().parent().parent().find('.token').val();
    // var token = $('input[name="_token"]').val();
    $.ajax({
    	url: '/update_cart/' + rowId + '/' + qty,
    	type: 'GET',
    	cache: false,
    	data: {
    		"_token":token,
    		"id":rowId,
    		"qty":qty
    	},
    	success: function(data){
    		data = $.parseJSON(data);
    		if(data == "OK"){
    			window.location = "cart"
    		}
    	}
    });
});
});
$('#flash-message').delay(3000).slideUp();

$(document).ready(function () {
	// var msg = 'Bạn đã thanh toán thành công';
	// var link = 'https://limitless-peak-35722.herokuapp.com/';
    var elementRemove = $('.container');
    $.ajax({
        url: '/thanhtoanthanhcong/',
        type: 'GET',
        cache: false,
        data: {
			// 'msg':msg,
			// 'link':link,
        },
        success: function(data){
            data = $.parseJSON(data);
            console.log(data);
			// elementRemove.children().remove();
			elementRemove.html('');
			elementRemove.append('<h1 class="heading1">'+ data['msg'] +'</h1>'+'<br><a href="'+ data['link'] +'"></a>');
        }
    });
});