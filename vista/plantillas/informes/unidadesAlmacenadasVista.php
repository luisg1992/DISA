<link href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.css';?>" rel="stylesheet">
<link href="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.theme.min.css';?>" rel="stylesheet">

<!-- estructura basica para la creacion de vista -->

<?php if($this->mensajeAlerta): ?>
  <script type="text/javascript">
    $(document).ready(function() {
      mostrarAlertaDeInformacion('<?php echo $this->mensajeAlerta; ?>' + '<br><a href="GenerarInformeBS>hola</a> ');
      return false;
    });
  </script>
<?php endif; ?>
<div style="float: left; max-width: 85%; min-width: 80%; margin-left: 1%;padding: 1%;text-align: center;">
  <div class="row">
      <div class="col-xs-12">
        <?php echo $this->breadcrumb; ?>
        <!-- aqui definir el contenido de la vista -->
          <h3>
            <?php echo $this->tituloGeneral;?>
          </h3>
          <div class="row" style="text-align: left;">
            <form class="form-horizontal" role="form" action="post" id="GrabarUnidadesAlmacenadas" method="post">
            <!--FECHA-->
              <div class="form-group">
                <label for="fecha" class="col-lg-2 control-label"">Fecha</label>
                <div class="col-lg-2">
                  <input type="date" value=<?php echo date("Y-m-d");?> class="form-control" name="fecha" id="fecha" placeholder="fecha" disabled>
                  <input type="hidden" value=<?php echo date("Y-m-d");?> class="form-control" name="fecha1" id="fecha1">
                </div>
              </div>
              <div class="form-group">
                <label for="fecha" class="col-lg-2 control-label"">Hora</label>
                <div class="col-lg-2">
                  <input type="text" value=<?php echo date("g:i:s");?> class="form-control" name="hora" id="hora" placeholder="hora" disabled>
                  <input type="hidden" value=<?php echo date("g:i:s");?> class="form-control" name="hora1" id="hora1">
                </div>
              </div>
            <!--ESTABLECIMIENTO DE SALUD-->
              <div class="form-group">
                <label for="establecimiento" class="col-lg-2 control-label">Establecimiento de Salud</label>
                <div class="col-lg-4" id="case1">
                  <input type="text" class="form-control" placeholder="Institucion" id="buscarInstitucion" name="buscarInstitucion" aria-describedby="sizing-addon2" autofocus>  
                  <input type="hidden" class="form-control" placeholder="Institucion" id="buscarID" name="buscarID" aria-describedby="sizing-addon2";">  
                </div>
                <div class="col-lg-4" id="case2">
                  <input type="text" class="form-control" placeholder="Institucion" id="institucionPrueba" name="institucionPrueba" aria-describedby="sizing-addon2" readonly>
                  <input type="hidden" class="form-control" placeholder="Institucion" id="pruebaID" name="pruebaID" aria-describedby="sizing-addon2";">  
                </div>
              </div>
            <!--TIPO DE INSTITUCION-->
              <div class="form-group">
                <label for="sector" class="col-lg-2 control-label">Institución</label>
                <div class="col-lg-4">
                  <select id="sector" name="sector" class="form-control">
                  <option value="">--SECTOR--</option>
                </select>
                </div>
              </div>
            <!--HEMOCOMPONENTE-->
              <div class="form-group">
                <label for="hemocomponente" class="col-lg-2 control-label">Hemocomponente</label>
                <div class="col-lg-4">
                  <select id="hemocomponente" name="hemocomponente" class="form-control">
                </select>
                </div>
              </div>
              <hr>

              <?php echo $this->cuerpoUA;?>  
                   
  
              <div class="form-group">
                <div class="col-lg-offset-4 col-lg-10">
                  <button type="submit" class="btn btn-success">Entrar</button>
                </div>
              </div>
              
            </form>
          </div>
      </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="mensajeAlerta">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp;DISA Lima Metropolitana
      </div>
      <div class="modal-body">
        <div id="mensajeModalResultado"></div>
      </div>
      <div class="modal-footer">
        <button type="button" id="AceptarMensajeAlerta" class="btn btn-primary"onclick="$('#mensajeAlerta').modal('hide');">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<!-- js -->
<script type="text/javascript" src="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.js';?>"></script>
<script type="text/javascript">
  $(document).ready(function() {

      $("#case1").hide();
      $("#case2").hide();

      $.ajax({
          url: '<?php echo BASE_URL . 'reportes/BuscarRenaes/';?>',
          type: 'POST',
          dataType: 'json',
          data: {},
          success: function(data)
          {
            if(data.NOMBRE==null){
                $("#case1").show();
            }
            else{
             $("#case2").show();
             $("buscarID").val(1);
             $("buscarInstitucion").val(1);
              //$("#filtroBusquedaReportesBS").hide();
            }
            $("#institucionPrueba").val(data.NOMBRE);
            $("#pruebaID").val(data.ID);
            return false;
          }
        });

      $("#sector").append('');
          $.ajax({
            url: '<?php echo BASE_URL . 'reportes/crearOpcionesSector'; ?>',
            type: 'POST',
            dataType: 'json',
            data: {},
            success: function(data)
            {
              $("#sector").html(data);
            }
          });

          $("#hemocomponente").append('');
          $.ajax({
            url: '<?php echo BASE_URL . 'informes/crearOpcionesHemocomponente'; ?>',
            type: 'POST',
            dataType: 'json',
            data: {},
            success: function(data)
            {
              $("#hemocomponente").html(data);
            }
          });

          $("#buscarInstitucion").autocomplete({
        minLength: 2,
        source: "<?php echo BASE_URL . 'informes/BusquedaDeInstitucion';?>",
      focus: function( event, ui ) {
            $("#buscarInstitucion").val( ui.item.Nombre );
            return false;
          },
          select: function( event, ui ) {
            $("input[name='buscarID']").val(ui.item.idestablecimiento);
           
          


        return false;
          }

      })
      .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
          .append( "<div>" + item.Nombre + "</div>" )
          .appendTo( ul );
      };

      $("#GrabarUnidadesAlmacenadas").submit(function(event) {
      $.ajax({
        url: '<?php echo BASE_URL . 'informes/generarUnidadesAlmacenadas'?>',
        type: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success: function(data)
        {
          $("#mensajeModalResultado").html(data);
          $("#mensajeAlerta").modal('show');
        }
      });
      return false;           
    });
    });
</script>