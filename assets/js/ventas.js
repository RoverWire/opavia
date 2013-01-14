function agregar_articulo(btn){
	$.ajax({
		type: 'post',
		url: '/ventas/agregar_articulo',
		dataType: 'json',
		data: {
			id: btn.attr('data-id')
		},
		success: function (data) {
			if (data.status) {
				btn.html('Eliminar');
				btn.removeClass('add-articulo').addClass('btn-danger').addClass('del-articulo');
				btn.unbind('click');
				btn.click(function(){
					eliminar_articulo( $(this) );
				});
				$('#counter').html(data.total);
			} else {
				alert('No se pudo Agregar');
			}
		}
	});
}

function eliminar_articulo(btn) {
	$.ajax({
		type: 'post',
		url: '/ventas/eliminar_articulo',
		dataType: 'json',
		data: {
			id: btn.attr('data-id')
		},
		success: function (data) {
			if (data.status) {
				btn.html('Agregar');
				btn.removeClass('del-articulo').removeClass('btn-danger').addClass('add-articulo');
				btn.click(function(){
					agregar_articulo( $(this) );
				});
				$('#counter').html(data.total);
			} else {
				alert('No se pudo Agregar');
			}
		}
	});
}

function validate_number(event) {
	var key = window.event ? event.keyCode : event.which;

	if (event.keyCode == 8 || event.keyCode == 46
	 || event.keyCode == 37 || event.keyCode == 39) {
		return true;
	}
	else if ( key < 48 || key > 57 ) {
		return false;
	}
	else return true;
};

$(function() {
	$('button.add-articulo').click(function() {
		agregar_articulo( $(this) );
	});

	$('button.del-articulo').click(function() {
		eliminar_articulo( $(this) );
	});

	$('#fecha_entrega').datepicker({
		format:'yyyy-mm-dd'
	}).on('changeDate', function(){
		$('#fecha_entrega').datepicker('hide');
	});

	$('.number-only').keypress(function(event) {
		var key = window.event ? event.keyCode : event.which;
		var con = $(this).attr('data-i');
		var total = 0;
		$('#total' + con).val( $('#unitario' + con).val() * $(this).val() );
		$('.total').each(function(){
			total = total + $(this).val() * 1;
		});

		$('#total').val(total);

		if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
			return true;
		} else if ( key < 48 || key > 57 ) {
			return false;
		} else {
			return true;
		}
	});

	$('.total').keypress(function() {
		var total = 0;
		$('.total').each(function(){
			total = total + $(this).val() * 1;
		});

		$('#total').val(total);
	});

	$('#cotizar').click(function() {
		$('#tipo_operacion').val('cotizar');
		$('#form_venta').submit();
	});

	$('#efectuar_venta').click(function() {
		$('#tipo_operacion').val('venta');
		$('#form_venta').submit();
	});
});