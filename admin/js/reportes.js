	/*-------------------------
	Autor: Amner Saucedo Sosa
	Web: www.abisoftgt.net
	E-Mail: waptoing7@gmail.com
	---------------------------*/
$(document).ready(function(){
	load(1);
});

function load(page){
	var daterange= $("#daterange").val();
	var category= $("#category").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'./reportes_ajax.php?action=ajax&page='+page+'&daterange='+daterange+'&category='+category,
		beforeSend: function(objeto){
			$('#loader').html('<img src="./images/ajax-loader.gif"> Cargando...');
		},
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');
		}
	})
}
