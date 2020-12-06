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


});
