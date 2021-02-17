$(document).ready(function () {
	//Ficar events de click al botó tancar i editar contrasenya
	reiniciar_events_botons();
	jQuery('input[type=search]').keypress(function() {
		reiniciar_events_botons();
	});
	jQuery('.paginate_button').children('a').click(function() {
		setTimeout(function(){ reiniciar_events_botons(); }, 100);
	});

  //Que al tancar el modal es torni a ficar el codi de id contrasenya del formulari a random per evitar sobre editar
  $('.boto-tancar').click(function() {
      document.getElementById("formulariContrasenyes").reset();
      $('#idcontra').val(Math.floor(Math.random() * 9999999999999999) + 999999999999);
  });
  $('.close').click(function() {
      document.getElementById("formulariContrasenyes").reset();
      $('#idcontra').val(Math.floor(Math.random() * 9999999999999999) + 999999999999);
  });

});

function reiniciar_events_botons(){
	//Treiem els events i els tornem a ficar quan utilitza el filtre
	$( ".btn_editarContrasenya" ).off();
	$( ".btn_eliminarContrasenya" ).off();

	$( ".btn_editarContrasenya" ).click(function() {
		var idcontra = $(this).attr('data_id');

		var data = {'valorIdcontra': idcontra}

		$.ajax({
			type: "POST",
			url: config.rutes[0].ajax_consultar_contrasenya,
			data: data,
			dataType: "text",
			cache:false,
			success: function(response) {

				var contrasenya = JSON.parse(response);

				$('#idcontra').val(idcontra);
				$('#usuari_contra').val(contrasenya['usuari']);
				$('#password').val(contrasenya['contrasenya']);
				$('#categoria').val(contrasenya['categoria']);
				$('#descri').val(contrasenya['descripcio']);
				$('#link').val(contrasenya['link']);
				$('#comentari').val(contrasenya['comentari']);

				jQuery('.modalcontrasenyes').modal();

			},
			error: function(response){
				console.log(response);
			}

		});
	});

	$( ".btn_eliminarContrasenya" ).click(function() {
		Swal.fire({
			title: 'Seguro que quieres eliminar la contrasenya?',
			text: "Se eliminará de la base de datos!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#28B463',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Cancel·lar',
			confirmButtonText: 'Si, eliminar!'
		}).then((result) => {
			if (result.value) {
				var idcontra = $(this).attr('data_id');

				var data = {'valorIdcontra': idcontra}

				$.ajax({
					type: "POST",
					url: config.rutes[0].ajax_eliminar_contrasenya,
					data: data,
					dataType: "text",
					cache:false,
					success: function(response) {

						var resposta = JSON.parse(response);

						if(resposta == true){
							alertify.success("Eliminada");
							setTimeout(function(){ location.reload(); }, 2000);

						}else{
							alertify.error("Error al eliminar la contrasenya!");
						}

					},
					error: function(response){
						console.log(response);
					}

				});
			}
		});
	});
}
