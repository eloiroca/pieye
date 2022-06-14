<script>
    //Rutes pel JS, per complementar els href
    var config = {
        rutes: [
            {
				ajax_monitoreig_rasoberry: "<?php echo  base_url('intranet/obtenir_monitoreig_raspberry');?>",
              	ajax_enviar_correu: "<?php echo  base_url('intranet/enviar_correu_electronic');?>",
              	ajax_consultar_contrasenya: "<?php echo  base_url('password/obtenir_passsword_concret_user');?>",
              	ajax_eliminar_contrasenya: "<?php echo  base_url('password/eliminar_passsword_concret_user');?>",
			  	ajax_realitzar_backupbd: "<?php echo  base_url('configuracio/realitzar_backupbd');?>",
				ajax_realitzar_crida_cron: "<?php echo  base_url('cron');?>",
            }
        ]
    };
</script>
