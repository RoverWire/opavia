$(function(){
	$('#btn-delete').click(function(){
		if($('input[type=checkbox]:checked').length){
			if (confirm('Se eliminarán los elementos seleccionados')) {
				$('#consulta').submit();
			}
		} else {
			alert('No se ha seleccionado ningún elemento.');
		}
	});

	$('a[title=eliminar]').click(function(e){
		if(! confirm('Eliminar el elemento')){
			e.preventDefault();
		}
	});
});