var inicio=function ()  {
	$(".cantidad").keyup(function(e){
		if ($(this).val()!='') {
			if (e.keyCode==13) {
				var id=$(this).attr('data-id');
				var Price=$(this).attr('data-precio');
				var Canti=$(this).val();
				$(this).parentsUntil('.producto').find('.subtotal').text('$'+(Price*Canti));
				$.post('modificarDatos.php',{
					id:id,
					Price:Price,
					Canti:Canti
				},function(e){
					$("#total").text('$'+e);
				});
			}
		}
	});
}
$(document).on('ready',inicio);