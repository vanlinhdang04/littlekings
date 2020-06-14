$(document).ready(function(){
	"use strict";
	function editcart(id,amount){
		//var id=info.split("-");
		//alert("a");
		$.ajax({
			type:"post",
			url:"editcart.php",
			data:{id:id,amount:amount},
			success:function(data){
				$('#listcart td[title="total'+id+'"]').html("$"+data);
			}
		});
		//subtotal();
	}
	$("#listcart input").change(function(){
		//alert($(this).val());
		editcart($(this).attr('id'),$(this).val());
		//subtotal();
	});
	$(".minuss").click(function(){
		$("#listcart input#"+$(this).attr('name')).change();
	});
	$(".pluss").click(function(){
		$("#listcart input#"+$(this).attr('name')).change();
	});
	$(".bt-delproduct").click(function(){
		//alert("xoa");
		
		if(!confirm("Are you want to delete this product")){
			return false;
		}
		editcart($(this).attr('name'),0);
	});
//	var subtotal= function(){
//		var subtt=0;
//		$('.totalprice').each(function(){
//			subtt+=parseFloat($(this).html().substring(1));
//			//subtt=subtt.toFixed(2);
//		});
//		subtt=subtt.toFixed(2);
//		$('.subtotal').html("$"+subtt);
//		$('.total').html("$"+subtt);
//	};
	//subtotal();
});