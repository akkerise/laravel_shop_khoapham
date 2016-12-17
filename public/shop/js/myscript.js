$(document).ready(function(){
  $('.update_cart').click(function() {
    var rowId = $(this).attr('id');
    // var rowId = $('.total').find('a').attr('id');
    var qty = $(this).parent().parent().find('.qty').val();
    // var qty = $('.quantity').find('.qty').val();
    var token = $(this).parent().parent().parent().find('.token').val();
    // var token = $('input[name="_token"]').val();
    $.ajax({
    	url: '/update_cart/'+rowId+'/'+qty,
    	type: 'GET',
    	cache: false,
    	data: {
    		"_token":token,
    		"id":rowId,
    		"qty":qty
    	},
    	success: function(data){
    		if(data == "OK"){
    			window.location = "cart"
    		}
    	}
    });
  });
});
