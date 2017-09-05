
	var alertInformacion = '<div class="modal fade" tabindex="-1" role="dialog" id="modalBasicInformacion"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title"><i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp;DISA Lima Metropolitana</div><div class="modal-body"><div id="mensajeModalResultado"></div></div><div class="modal-footer"><button type="button" class="btn btn-primary" onclick="$(\'#modalBasicInformacion\').modal(\'hide\');">Aceptar</button></div></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div>';

	function mostrarAlertaDeInformacion(mensaje)
	{
		$("body").append(alertInformacion);
		$("#mensajeModalResultado").html(mensaje);
		$("#modalBasicInformacion").modal('show');
		
	}

	function LimpiarElementos()
	{
		$(":text").each(function(){	
			$($(this)).val('');
		});
		$(":password").each(function(){	
			$($(this)).val('');
		});			
		return false;
	}
