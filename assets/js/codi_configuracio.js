$(document).ready(function () {

  $( ".boto_backup_bd" ).click(function() {
	  $('.progress_bd').css('display', 'block');
      var rutabackup = $('.input_backupBd').val();

      var data = {'valorRutaBackup': rutabackup}

      $.ajax({
           type: "POST",
           url: config.rutes[0].ajax_realitzar_backupbd,
           data: data,
           dataType: "text",
           cache:false,
           success: function(response) {
           		if (response == true){
					$('.progress_bd').css('display', 'none');
					alertify.success("Copia realizada!");
					setTimeout(function(){ location.reload(); }, 1500);
				}else{
					alertify.error("Error al hacer la copia!");
				}
            },
            error: function(response){
              console.log(response);
            }

        });
  });

	$( ".boto_execute_cron" ).click(function() {
		$('.progress_cron').css('display', 'block');
		var rutabackup = $('.input_backupBd').val();

		var data = {'valorRutaBackup': rutabackup}

		$.ajax({
			type: "POST",
			url: config.rutes[0].ajax_realitzar_crida_cron,
			data: data,
			dataType: "text",
			cache:false,
			success: function(response) {
					$('.progress_cron').css('display', 'none');
					alertify.success("Cron executat!");
			},
			error: function(response){
				alertify.error("Error al hacer la copia!");
				console.log(response);
			}
		});
	});


});
