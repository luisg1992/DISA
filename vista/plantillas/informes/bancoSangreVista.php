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
<style>
  .nav-tabs>li {
    height:90px;
}
.nav-tabs>li>a, .nav-tabs>li>a>div {
    height:100%;
    display:table;
}
.nav-tabs>li>a span {
    display:table-cell;
    vertical-align:middle;
}
</style>
<div style="float: left; max-width: 85%; min-width: 80%; margin-left: 1%;padding: 1%;text-align: center;">
  
  <div class="row">
    <div class="col-xs-12">
      <?php echo $this->breadcrumb; ?>
      <!-- aqui definir el contenido de la vista -->
        <h3>
          <?php echo $this->tituloGeneral;?>
        </h3>
        <button onclick="window.open('<?php echo ('../../DISA/archivos/formatos/INSTRUCTIVOB.S..xls'); ?>', '_blank');">DESCARGAR INSTRUCTIVO</button>
        
        <hr>

        <div class="row">
          <div class="col-md-8 col-sm-12 col-xs-12" style="margin-bottom: 1%;">
           <div class="ui-widget">
               <label>NOMBRE INSTITUCION</label>
               <div class="input-group" id="class1">
                <input type="text" class="form-control" placeholder="Institucion" id="buscarInstitucion" name="buscarInstitucion" aria-describedby="sizing-addon2" style="border-right: none;" autofocus required>
                <span class="input-group-addon" id="sizing-addon2">           
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </span>
              </div> 
              <br> 
              <div class="input-group" id="class2">
                <input type="text" class="form-control" placeholder="Institucion" id="institucionPrueba" name="institucionPrueba" aria-describedby="sizing-addon2" style="border-right: none;" readonly >
                <span class="input-group-addon" id="sizing-addon2">           
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </span>
              </div>  
            </div>
          </div>
          <div class="col-md-3 col-sm-12 col-xs-12" style="margin-bottom: 1%;">
            <div class="ui-widget">
              <label>CODIGO RENAES</label>
             <div class="input-group" id="class11">
                <input type="text" class="form-control" placeholder="Codigo Renaes" id="buscarRenaes" name="buscarRenaes" aria-describedby="sizing-addon2" style="border-right: none;" autofocus required>
                <span class="input-group-addon" id="sizing-addon2">           
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                  </span>
                </div>
                <br>   
              <div class="input-group" id="class22">
                <input type="text" class="form-control" placeholder="Codigo Renaes" id="buscarRenaesprueba" name="buscarRenaesprueba" aria-describedby="sizing-addon2" style="border-right: none;" readonly >
                <span class="input-group-addon" id="sizing-addon2">           
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                </span>
              </div>    
            </div>
          </div>
        </div>
        <hr>

        <!-- tablas -->       

        <?php echo $this->cuerpoBS;?>

      <!-- fin del contenido -->
    </div>
  </div>
</div>



<!-- js -->
<script type="text/javascript" src="<?php echo BASE_URL . 'libreria' . DS . 'jquery-ui' . DS . 'jquery-ui.min.js';?>"></script> 

<script type="text/javascript">
  $(document).ready(function() {
//alert();
    $("#tipo2").hide();

      $.ajax({
      url: '<?php echo BASE_URL . 'informes/BuscarRenaes/';?>',
      type: 'POST',
      dataType: 'json',
      data: {},
      success: function(data)
      {
        if(data.NOMBRE==null){
          $("#class2").hide();
          $("#class22").hide();
        }
        else{$("#class1").hide();$("#class11").hide();}
        $("#institucionPrueba").val(data.NOMBRE);
        $("input[name='idEstablecimientoGrabar']").val(data.ID);
        $("input[name='buscarRenaesprueba']").val(data.ID);
        $("input[name='JefeBancoGrabar']").val(data.RESPONSABLE);
        $("input[name='TelefonoBS']").val(data.TELEFONO);
        $("input[name='DISABS']").val(data.DISA);
        $("input[name='CorreoBS']").val(data.CORREO);
        $("input[name='UDRMBS']").val(data.UDRM);

        var $radios = $('input:radio[name=hemoterapiaBS]');
            if(data.HEMOTERAPIA == '1') 
            {
              $radios.filter('[value=1]').prop('checked', true);
              $("#tipo1").fadeOut(0);
              $("#tipo2").fadeIn(1000);
            }
            if(data.HEMOTERAPIA == '2') 
            {
              $radios.filter('[value=2]').prop('checked', true);
              $("#tipo2").fadeOut(0);
              $("#tipo1").fadeIn(1000);
            }

        var $radioss = $('input:radio[name=sectorBS]');
            if(data.SECTOR == '1') 
            {
              $radioss.filter('[value=1]').prop('checked', true);
            }
            if(data.SECTOR == '2') 
            {
              $radioss.filter('[value=2]').prop('checked', true);
            }
            if(data.SECTOR == '3') 
            {
              $radioss.filter('[value=3]').prop('checked', true);
            }
            if(data.SECTOR == '4') 
            {
              $radioss.filter('[value=4]').prop('checked', true);
            }
        return false;
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
            $("input[name='idEstablecimientoGrabar']").val(ui.item.idestablecimiento);
            $("input[name='buscarRenaes']").val(ui.item.idestablecimiento);
            //$("input[name='NombreEstablecimientoGrabar']").val(ui.item.Nombre);
            $("input[name='JefeBancoGrabar']").val(ui.item.Responsable);
            $("input[name='TelefonoBS']").val(ui.item.Telefono);
            $("input[name='DISABS']").val(ui.item.Disa);
            $("input[name='CorreoBS']").val(ui.item.Correo);
            $("input[name='UDRMBS']").val(ui.item.udrm);
            //$("input[name='responsableBS']").val(ui.item.Responsable);
            $("#nombreRP").text(ui.item.Nombre);//css('background-color', '#00FFFF');
        $("#direccionRP").text(ui.item.Direccion);
        $("#DistritoRP").text(ui.item.Distrito);

        var $radios = $('input:radio[name=hemoterapiaBS]');
        
              if(ui.item.HEMOTERAPIA == '1') 
              {
                  $radios.filter('[value=1]').prop('checked', true);
                   $("#tipo1").fadeOut(0);
                   $("#tipo2").fadeIn(1000);
              }
              if(ui.item.Hemoterapia == '2') 
              {
                  $radios.filter('[value=2]').prop('checked', true);
                  $("#tipo2").fadeOut(0);
                  $("#tipo1").fadeIn(1000);
              }

              var $radioss = $('input:radio[name=sectorBS]');

              if(ui.item.Sector == '1') 
              {
                  $radioss.filter('[value=1]').prop('checked', true);
              }
              if(ui.item.Sector == '2') 
              {
                  $radioss.filter('[value=2]').prop('checked', true);
              }
              if(ui.item.Sector == '3') 
              {
                  $radioss.filter('[value=3]').prop('checked', true);
              }
              if(ui.item.Sector == '4') 
              {
                  $radioss.filter('[value=4]').prop('checked', true);
              }

        return false;
          }

      })
      .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
          .append( "<div>" + item.Nombre + "</div>" )
          .appendTo( ul );
      };

      $("input[name$='hemoterapiaBS']").click(function() {
        $hemo=($('input:radio[name=hemoterapiaBS]:checked').val());
        if($hemo==1){
          $("#tipo1").fadeOut(0);
          $("#tipo2").fadeIn(1000);
        }
        if($hemo==2){
          $("#tipo2").fadeOut(0);
          $("#tipo1").fadeIn(1000);
        }

      }); 

     $("#buscarRenaes").autocomplete({
        minLength: 2,
        source: "<?php echo BASE_URL . 'informes/BusquedaDeInstitucionxId';?>",
      focus: function( event, ui ) {
            $("#buscarRenaes").val( ui.item.idestablecimiento );
            return false;
          },
          select: function( event, ui ) {
            $("input[name='idEstablecimientoGrabar']").val(ui.item.idestablecimiento);
            //$("input[name='buscarRenaes']").val(ui.item.idestablecimiento);
            $("input[name='buscarInstitucion']").val(ui.item.Nombre);
            $("input[name='JefeBancoGrabar']").val(ui.item.Responsable);
            $("input[name='TelefonoBS']").val(ui.item.Telefono);
            $("input[name='DISABS']").val(ui.item.Disa);
            $("input[name='CorreoBS']").val(ui.item.Correo);
            $("input[name='UDRMBS']").val(ui.item.udrm);
            //$("input[name='responsableBS']").val(ui.item.Responsable);
            $("#nombreRP").text(ui.item.Nombre);//css('background-color', '#00FFFF');
        $("#direccionRP").text(ui.item.Direccion);
        $("#DistritoRP").text(ui.item.Distrito);

        var $radios = $('input:radio[name=hemoterapiaBS]');
        
              if(ui.item.Hemoterapia == '1') 
              {
                  $radios.filter('[value=1]').prop('checked', true);
                   $("#tipo1").fadeOut(0);
                   $("#tipo2").fadeIn(1000);
              }
              if(ui.item.Hemoterapia == '2') 
              {
                  $radios.filter('[value=2]').prop('checked', true);
                  $("#tipo2").fadeOut(0);
                  $("#tipo1").fadeIn(1000);
              }

              var $radioss = $('input:radio[name=sectorBS]');

              if(ui.item.Sector == '1') 
              {
                  $radioss.filter('[value=1]').prop('checked', true);
              }
              if(ui.item.Sector == '2') 
              {
                  $radioss.filter('[value=2]').prop('checked', true);
              }
              if(ui.item.Sector == '3') 
              {
                  $radioss.filter('[value=3]').prop('checked', true);
              }
              if(ui.item.Sector == '4') 
              {
                  $radioss.filter('[value=4]').prop('checked', true);
              }

        return false;
          }

      })
      .autocomplete( "instance" )._renderItem = function( ul, item ) {
        return $( "<li>" )
          .append( "<div>" + item.idestablecimiento + "</div>" )
          .appendTo( ul );
      };


  });

  //CALIDAD DE DATOS BANCO DE SANGRE
   $('input[name=202_1],input[name=203_1],input[name=204_1]').change(function() { 
      $val1=parseInt($('input:text[name=202_1]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=203_1]').val()); if (isNaN($val2)) {   $val2=0; }
      $val3=parseInt($('input:text[name=204_1]').val()); if (isNaN($val3)) {   $val3=0; }
      $("#201_1").val($val1+$val2+$val3);
      });

  $('input[name=202_2],input[name=203_2],input[name=204_2]').change(function() { 
      $val1=parseInt($('input:text[name=202_2]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=203_2]').val()); if (isNaN($val2)) {   $val2=0; }
      $val3=parseInt($('input:text[name=204_2]').val()); if (isNaN($val3)) {   $val3=0; }
      $("#201_2").val($val1+$val2+$val3);
    });

  $('input[name=202_3],input[name=203_3],input[name=204_3]').change(function() { 
      $val1=parseInt($('input:text[name=202_3]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=203_3]').val()); if (isNaN($val2)) {   $val2=0; }
      $val3=parseInt($('input:text[name=204_3]').val()); if (isNaN($val3)) {   $val3=0; }
      $("#201_3").val($val1+$val2+$val3);
    });

  $('input[name=202_4],input[name=203_4],input[name=204_4]').change(function() { 
      $val1=parseInt($('input:text[name=202_4]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=203_4]').val()); if (isNaN($val2)) {   $val2=0; }
      $val3=parseInt($('input:text[name=204_4]').val()); if (isNaN($val3)) {   $val3=0; }
      $("#201_4").val($val1+$val2+$val3);
    });

    $('input[name=302_5],input[name=303_5]').change(function() { 
      $val1=parseInt($('input:text[name=302_5]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=303_5]').val()); if (isNaN($val2)) {   $val2=0; }
      $("#301_5,#401_1,#401_3,#401_5,#401_7,#401_9,#401_11,#401_13,#401_15,#401_17,#401_19").val($val1+$val2);
    });
    $('input[name=302_6],input[name=303_6]').change(function() { 
      $val1=parseInt($('input:text[name=302_6]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=303_6]').val()); if (isNaN($val2)) {   $val2=0; }
      $("#301_6,#402_1,#402_3,#402_5,#402_7,#402_9,#402_11,#402_13,#402_15,#402_17,#402_19").val($val1+$val2);
    });
    $('input[name=302_7],input[name=303_7]').change(function() { 
      $val1=parseInt($('input:text[name=302_7]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=303_7]').val()); if (isNaN($val2)) {   $val2=0; }
      $("#301_7,#403_1,#403_3,#403_5,#403_7,#403_9,#403_11,#403_13,#403_15,#403_17,#403_19").val($val1+$val2);
    });
    $('input[name=302_8],input[name=303_8]').change(function() { 
      $val1=parseInt($('input:text[name=302_8]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=303_8]').val()); if (isNaN($val2)) {   $val2=0; }
      $("#301_8,#404_1,#404_3,#404_5,#404_7,#404_9,#404_11,#404_13,#404_15,#404_17,#404_19").val($val1+$val2);
    });

  $('input[name=502_23],input[name=503_23]').change(function() { 
      $val1=parseInt($('input:text[name=502_23]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=503_23]').val()); if (isNaN($val2)) {   $val2=0; }
      $("#501_23").val($val1+$val2);
    });    
    $('input[name=502_24],input[name=503_24]').change(function() { 
      $val1=parseInt($('input:text[name=502_24]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=503_24]').val()); if (isNaN($val2)) {   $val2=0; }
      $("#501_24").val($val1+$val2);
    });   
    $('input[name=502_25],input[name=503_25]').change(function() { 
      $val1=parseInt($('input:text[name=502_25]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=503_25]').val()); if (isNaN($val2)) {   $val2=0; }
      $("#501_25").val($val1+$val2);
    });   
    $('input[name=502_26],input[name=503_26]').change(function() { 
      $val1=parseInt($('input:text[name=502_26]').val()); if (isNaN($val1)) {   $val1=0; }
      $val2=parseInt($('input:text[name=503_26]').val()); if (isNaN($val2)) {   $val2=0; }
      $("#501_26").val($val1+$val2);
    });   

    $("#exportarReporteBS,#exportarReporteBS1").click(function(event) {
       if ($('input[name=idEstablecimientoGrabar]').val() === '') {
        alert('El campo establecimiento esta vacio');
      }else if($('input[name=anio]').val() === ''){
         alert('El campo año esta vacio');
      }else{

      var renaes = $('input[name=idEstablecimientoGrabar]').val();
      var anio = $('input[name=anio]').val();
      var mes = $('select[name=mes]').val();
        //alert(mes);
      window.open('<?php echo BASE_URL . "informes/GenerarInformeBS"?>' + '/' + renaes + '/' + anio + '/' + mes, '_blank');      }
    });

    //VISTA PREVIAAA
    $("#vistaPrevia,#vistaPrevia1").click(function(event) {
      var hemo = $('input[name=hemoterapiaBS]:checked').val();
      var establecimiento = $('input[name=idEstablecimientoGrabar]').val();
      var mes = $('select[name=mes]').val();
      var anio = $('input[name=anio]').val();


      if(hemo==null){alert("Ingrese un Tipo de Hemoterapia");exit();}
      if(establecimiento==null){alert("Ingrese un Establecimiento");exit();}
      if(anio==null || anio==0){alert("Ingrese un año");exit();}

      var a201_1 = $('input[name=201_1]').val(); if(a201_1==0){a201_1="00";}
      var a201_2 = $('input[name=201_2]').val(); if(a201_2==0){a201_2="00";}
      var a201_3 = $('input[name=201_3]').val(); if(a201_3==0){a201_3="00";}
      var a201_4 = $('input[name=201_4]').val(); if(a201_4==0){a201_4="00";}

      var a202_1 = $('input[name=202_1]').val(); if(a202_1==0){a202_1="00";}
      var a202_2 = $('input[name=202_2]').val(); if(a202_2==0){a202_2="00";}
      var a202_3 = $('input[name=202_3]').val(); if(a202_3==0){a202_3="00";}
      var a202_4 = $('input[name=202_4]').val(); if(a202_4==0){a202_4="00";}

      var a203_1 = $('input[name=203_1]').val(); if(a203_1==0){a203_1="00";}
      var a203_2 = $('input[name=203_2]').val(); if(a203_2==0){a203_2="00";}
      var a203_3 = $('input[name=203_3]').val(); if(a203_3==0){a203_3="00";}
      var a203_4 = $('input[name=203_4]').val(); if(a203_4==0){a203_4="00";}

      var a204_1 = $('input[name=204_1]').val(); if(a204_1==0){a204_1="00";}
      var a204_2 = $('input[name=204_2]').val(); if(a204_2==0){a204_2="00";}
      var a204_3 = $('input[name=204_3]').val(); if(a204_3==0){a204_3="00";}
      var a204_4 = $('input[name=204_4]').val(); if(a204_4==0){a204_4="00";}


      var a301_5 = $('input[name=301_5]').val(); if(a301_5==0){a301_5="00";}
      var a301_6 = $('input[name=301_6]').val(); if(a301_6==0){a301_6="00";}
      var a301_7 = $('input[name=301_7]').val(); if(a301_7==0){a301_7="00";}
      var a301_8 = $('input[name=301_8]').val(); if(a301_8==0){a301_8="00";}

      var a302_5 = $('input[name=302_5]').val(); if(a302_5==0){a302_5="00";}
      var a302_6 = $('input[name=302_6]').val(); if(a302_6==0){a302_6="00";}
      var a302_7 = $('input[name=302_7]').val(); if(a302_7==0){a302_7="00";}
      var a302_8 = $('input[name=302_8]').val(); if(a302_8==0){a302_8="00";}

      var a303_5 = $('input[name=303_5]').val(); if(a303_5==0){a303_5="00";}
      var a303_6 = $('input[name=303_6]').val(); if(a303_6==0){a303_6="00";}
      var a303_7 = $('input[name=303_7]').val(); if(a303_7==0){a303_7="00";}
      var a303_8 = $('input[name=303_8]').val(); if(a303_8==0){a303_8="00";}

      var a401_1 = $('input[name=401_1]').val(); if(a401_1==0){a401_1="00";}
      var a401_2 = $('input[name=401_2]').val(); if(a401_2==0){a401_2="00";}
      var a401_3 = $('input[name=401_3]').val(); if(a401_3==0){a401_3="00";}
      var a401_4 = $('input[name=401_4]').val(); if(a401_4==0){a401_4="00";}
      var a401_5 = $('input[name=401_5]').val(); if(a401_5==0){a401_5="00";}
      var a401_6 = $('input[name=401_6]').val(); if(a401_6==0){a401_6="00";}
      var a401_7 = $('input[name=401_7]').val(); if(a401_7==0){a401_7="00";}
      var a401_8 = $('input[name=401_8]').val(); if(a401_8==0){a401_8="00";}
      var a401_9 = $('input[name=401_9]').val(); if(a401_9==0){a401_9="00";}
      var a401_10 = $('input[name=401_10]').val(); if(a401_10==0){a401_10="00";}
      var a401_11 = $('input[name=401_11]').val(); if(a401_11==0){a401_11="00";}
      var a401_12 = $('input[name=401_12]').val(); if(a401_12==0){a401_12="00";}
      var a401_13 = $('input[name=401_13]').val(); if(a401_13==0){a401_13="00";}
      var a401_14 = $('input[name=401_14]').val(); if(a401_14==0){a401_14="00";}
      var a401_15 = $('input[name=401_15]').val(); if(a401_15==0){a401_15="00";}
      var a401_16 = $('input[name=401_16]').val(); if(a401_16==0){a401_16="00";}
      var a401_17 = $('input[name=401_17]').val(); if(a401_17==0){a401_17="00";}
      var a401_18 = $('input[name=401_18]').val(); if(a401_18==0){a401_18="00";}
      var a401_19 = $('input[name=401_19]').val(); if(a401_19==0){a401_19="00";}
      var a401_20 = $('input[name=401_20]').val(); if(a401_20==0){a401_20="00";}

      var a402_1 = $('input[name=402_1]').val(); if(a402_1==0){a402_1="00";}         
      var a402_2 = $('input[name=402_2]').val(); if(a402_2==0){a402_2="00";}         
      var a402_3 = $('input[name=402_3]').val(); if(a402_3==0){a402_3="00";}        
      var a402_4 = $('input[name=402_4]').val(); if(a402_4==0){a402_4="00";}       
      var a402_5 = $('input[name=402_5]').val(); if(a402_5==0){a402_5="00";}         
      var a402_6 = $('input[name=402_6]').val(); if(a402_6==0){a402_6="00";}         
      var a402_7 = $('input[name=402_7]').val(); if(a402_7==0){a402_7="00";}         
      var a402_8 = $('input[name=402_8]').val(); if(a402_8==0){a402_8="00";}        
      var a402_9 = $('input[name=402_9]').val(); if(a402_9==0){a402_9="00";}      
      var a402_10 = $('input[name=402_10]').val(); if(a402_10==0){a402_10="00";}
      var a402_11 = $('input[name=402_11]').val(); if(a402_11==0){a402_11="00";}
      var a402_12 = $('input[name=402_12]').val(); if(a402_12==0){a402_12="00";}
      var a402_13 = $('input[name=402_13]').val(); if(a402_13==0){a402_13="00";}
      var a402_14 = $('input[name=402_14]').val(); if(a402_14==0){a402_14="00";}
      var a402_15 = $('input[name=402_15]').val(); if(a402_15==0){a402_15="00";}
      var a402_16 = $('input[name=402_16]').val(); if(a402_16==0){a402_16="00";}
      var a402_17 = $('input[name=402_17]').val(); if(a402_17==0){a402_17="00";}
      var a402_18 = $('input[name=402_18]').val(); if(a402_18==0){a402_18="00";}
      var a402_19 = $('input[name=402_19]').val(); if(a402_19==0){a402_19="00";}
      var a402_20 = $('input[name=402_20]').val(); if(a402_20==0){a402_20="00";}

      var a403_1 = $('input[name=403_1]').val(); if(a403_1==0){a403_1="00";}    
      var a403_2 = $('input[name=403_2]').val(); if(a403_2==0){a403_2="00";}    
      var a403_3 = $('input[name=403_3]').val(); if(a403_3==0){a403_3="00";}    
      var a403_4 = $('input[name=403_4]').val(); if(a403_4==0){a403_4="00";}    
      var a403_5 = $('input[name=403_5]').val(); if(a403_5==0){a403_5="00";}    
      var a403_6 = $('input[name=403_6]').val(); if(a403_6==0){a403_6="00";}    
      var a403_7 = $('input[name=403_7]').val(); if(a403_7==0){a403_7="00";}    
      var a403_8 = $('input[name=403_8]').val(); if(a403_8==0){a403_8="00";}    
      var a403_9 = $('input[name=403_9]').val(); if(a403_9==0){a403_9="00";}    
      var a403_10 = $('input[name=403_10]').val(); if(a403_10==0){a403_10="00";}  
      var a403_11 = $('input[name=403_11]').val(); if(a403_11==0){a403_11="00";}  
      var a403_12 = $('input[name=403_12]').val(); if(a403_12==0){a403_12="00";}  
      var a403_13 = $('input[name=403_13]').val(); if(a403_13==0){a403_13="00";}  
      var a403_14 = $('input[name=403_14]').val(); if(a403_14==0){a403_14="00";}  
      var a403_15 = $('input[name=403_15]').val(); if(a403_15==0){a403_15="00";}  
      var a403_16 = $('input[name=403_16]').val(); if(a403_16==0){a403_16="00";}  
      var a403_17 = $('input[name=403_17]').val(); if(a403_17==0){a403_17="00";}  
      var a403_18 = $('input[name=403_18]').val(); if(a403_18==0){a403_18="00";}  
      var a403_19 = $('input[name=403_19]').val(); if(a403_19==0){a403_19="00";}  
      var a403_20 = $('input[name=403_20]').val(); if(a403_20==0){a403_20="00";}

      var a404_1 = $('input[name=404_1]').val(); if(a404_1==0){a404_1="00";}    
      var a404_2 = $('input[name=404_2]').val(); if(a404_2==0){a404_2="00";}    
      var a404_3 = $('input[name=404_3]').val(); if(a404_3==0){a404_3="00";}    
      var a404_4 = $('input[name=404_4]').val(); if(a404_4==0){a404_4="00";}    
      var a404_5 = $('input[name=404_5]').val(); if(a404_5==0){a404_5="00";}    
      var a404_6 = $('input[name=404_6]').val(); if(a404_6==0){a404_6="00";}    
      var a404_7 = $('input[name=404_7]').val(); if(a404_7==0){a404_7="00";}    
      var a404_8 = $('input[name=404_8]').val(); if(a404_8==0){a404_8="00";}    
      var a404_9 = $('input[name=404_9]').val(); if(a404_9==0){a404_9="00";}    
      var a404_10 = $('input[name=404_10]').val(); if(a404_10==0){a404_10="00";}  
      var a404_11 = $('input[name=404_11]').val(); if(a404_11==0){a404_11="00";}  
      var a404_12 = $('input[name=404_12]').val(); if(a404_12==0){a404_12="00";}  
      var a404_13 = $('input[name=404_13]').val(); if(a404_13==0){a404_13="00";}  
      var a404_14 = $('input[name=404_14]').val(); if(a404_14==0){a404_14="00";}  
      var a404_15 = $('input[name=404_15]').val(); if(a404_15==0){a404_15="00";}  
      var a404_16 = $('input[name=404_16]').val(); if(a404_16==0){a404_16="00";}  
      var a404_17 = $('input[name=404_17]').val(); if(a404_17==0){a404_17="00";}  
      var a404_18 = $('input[name=404_18]').val(); if(a404_18==0){a404_18="00";}  
      var a404_19 = $('input[name=404_19]').val(); if(a404_19==0){a404_19="00";}  
      var a404_20 = $('input[name=404_20]').val(); if(a404_20==0){a404_20="00";}    


      var a501_23 = $('input[name=501_23]').val(); if(a501_23==0){a501_23="00";}
      var a501_24 = $('input[name=501_24]').val(); if(a501_24==0){a501_24="00";}
      var a501_25 = $('input[name=501_25]').val(); if(a501_25==0){a501_25="00";}
      var a501_26 = $('input[name=501_26]').val(); if(a501_26==0){a501_26="00";}

      var a502_23 = $('input[name=502_23]').val(); if(a502_23==0){a502_23="00";}
      var a502_24 = $('input[name=502_24]').val(); if(a502_24==0){a502_24="00";}
      var a502_25 = $('input[name=502_25]').val(); if(a502_25==0){a502_25="00";}
      var a502_26 = $('input[name=502_26]').val(); if(a502_26==0){a502_26="00";}

      var a503_23 = $('input[name=503_23]').val(); if(a503_23==0){a503_23="00";}
      var a503_24 = $('input[name=503_24]').val(); if(a503_24==0){a503_24="00";}
      var a503_25 = $('input[name=503_25]').val(); if(a503_25==0){a503_25="00";}
      var a503_26 = $('input[name=503_26]').val(); if(a503_26==0){a503_26="00";}
      

      var a601_33 = $('input[name=601_33]').val(); if(a601_33==0){a601_33="00";}
      var a601_34 = $('input[name=601_34]').val(); if(a601_34==0){a601_34="00";}
      var a601_35 = $('input[name=601_35]').val(); if(a601_35==0){a601_35="00";}
      var a601_36 = $('input[name=601_36]').val(); if(a601_36==0){a601_36="00";}
      var a601_37 = $('input[name=601_37]').val(); if(a601_37==0){a601_37="00";}
      var a601_38 = $('input[name=601_38]').val(); if(a601_38==0){a601_38="00";}
      var a601_39 = $('input[name=601_39]').val(); if(a601_39==0){a601_39="00";}

      var a602_33 = $('input[name=602_33]').val(); if(a602_33==0){a602_33="00";}
      var a602_34 = $('input[name=602_34]').val(); if(a602_34==0){a602_34="00";}
      var a602_35 = $('input[name=602_35]').val(); if(a602_35==0){a602_35="00";}
      var a602_36 = $('input[name=602_36]').val(); if(a602_36==0){a602_36="00";}
      var a602_37 = $('input[name=602_37]').val(); if(a602_37==0){a602_37="00";}
      var a602_38 = $('input[name=602_38]').val(); if(a602_38==0){a602_38="00";}
      var a602_39 = $('input[name=602_39]').val(); if(a602_39==0){a602_39="00";}

      var a603_33 = $('input[name=603_33]').val(); if(a603_33==0){a603_33="00";}
      var a603_34 = $('input[name=603_34]').val(); if(a603_34==0){a603_34="00";}
      var a603_35 = $('input[name=603_35]').val(); if(a603_35==0){a603_35="00";}
      var a603_36 = $('input[name=603_36]').val(); if(a603_36==0){a603_36="00";}
      var a603_37 = $('input[name=603_37]').val(); if(a603_37==0){a603_37="00";}
      var a603_38 = $('input[name=603_38]').val(); if(a603_38==0){a603_38="00";}
      var a603_39 = $('input[name=603_39]').val(); if(a603_39==0){a603_39="00";}

      var a604_33 = $('input[name=604_33]').val(); if(a604_33==0){a604_33="00";}
      var a604_34 = $('input[name=604_34]').val(); if(a604_34==0){a604_34="00";}
      var a604_35 = $('input[name=604_35]').val(); if(a604_35==0){a604_35="00";}
      var a604_36 = $('input[name=604_36]').val(); if(a604_36==0){a604_36="00";}
      var a604_37 = $('input[name=604_37]').val(); if(a604_37==0){a604_37="00";}
      var a604_38 = $('input[name=604_38]').val(); if(a604_38==0){a604_38="00";}
      var a604_39 = $('input[name=604_39]').val(); if(a604_39==0){a604_39="00";}

      var a605_33 = $('input[name=605_33]').val(); if(a605_33==0){a605_33="00";}
      var a605_34 = $('input[name=605_34]').val(); if(a605_34==0){a605_34="00";}
      var a605_35 = $('input[name=605_35]').val(); if(a605_35==0){a605_35="00";}
      var a605_36 = $('input[name=605_36]').val(); if(a605_36==0){a605_36="00";}
      var a605_37 = $('input[name=605_37]').val(); if(a605_37==0){a605_37="00";}
      var a605_38 = $('input[name=605_38]').val(); if(a605_38==0){a605_38="00";}
      var a605_39 = $('input[name=605_39]').val(); if(a605_39==0){a605_39="00";}

      var a606_33 = $('input[name=606_33]').val(); if(a606_33==0){a606_33="00";}
      var a606_34 = $('input[name=606_34]').val(); if(a606_34==0){a606_34="00";}
      var a606_35 = $('input[name=606_35]').val(); if(a606_35==0){a606_35="00";}
      var a606_36 = $('input[name=606_36]').val(); if(a606_36==0){a606_36="00";}
      var a606_37 = $('input[name=606_37]').val(); if(a606_37==0){a606_37="00";}
      var a606_38 = $('input[name=606_38]').val(); if(a606_38==0){a606_38="00";}
      var a606_39 = $('input[name=606_39]').val(); if(a606_39==0){a606_39="00";}

      var a607_33 = $('input[name=607_33]').val(); if(a607_33==0){a607_33="00";}
      var a607_34 = $('input[name=607_34]').val(); if(a607_34==0){a607_34="00";}
      var a607_35 = $('input[name=607_35]').val(); if(a607_35==0){a607_35="00";}
      var a607_36 = $('input[name=607_36]').val(); if(a607_36==0){a607_36="00";}
      var a607_37 = $('input[name=607_37]').val(); if(a607_37==0){a607_37="00";}
      var a607_38 = $('input[name=607_38]').val(); if(a607_38==0){a607_38="00";}
      var a607_39 = $('input[name=607_39]').val(); if(a607_39==0){a607_39="00";}

      var a608_33 = $('input[name=608_33]').val(); if(a608_33==0){a608_33="00";}
      var a608_34 = $('input[name=608_34]').val(); if(a608_34==0){a608_34="00";}
      var a608_35 = $('input[name=608_35]').val(); if(a608_35==0){a608_35="00";}
      var a608_36 = $('input[name=608_36]').val(); if(a608_36==0){a608_36="00";}
      var a608_37 = $('input[name=608_37]').val(); if(a608_37==0){a608_37="00";}
      var a608_38 = $('input[name=608_38]').val(); if(a608_38==0){a608_38="00";}
      var a608_39 = $('input[name=608_39]').val(); if(a608_39==0){a608_39="00";}

      var a609_33 = $('input[name=609_33]').val(); if(a609_33==0){a609_33="00";}
      var a609_34 = $('input[name=609_34]').val(); if(a609_34==0){a609_34="00";}
      var a609_35 = $('input[name=609_35]').val(); if(a609_35==0){a609_35="00";}
      var a609_36 = $('input[name=609_36]').val(); if(a609_36==0){a609_36="00";}
      var a609_37 = $('input[name=609_37]').val(); if(a609_37==0){a609_37="00";}
      var a609_38 = $('input[name=609_38]').val(); if(a609_38==0){a609_38="00";}
      var a609_39 = $('input[name=609_39]').val(); if(a609_39==0){a609_39="00";}

      var a610_33 = $('input[name=610_33]').val(); if(a610_33==0){a610_33="00";}
      var a610_34 = $('input[name=610_34]').val(); if(a610_34==0){a610_34="00";}
      var a610_35 = $('input[name=610_35]').val(); if(a610_35==0){a610_35="00";}
      var a610_36 = $('input[name=610_36]').val(); if(a610_36==0){a610_36="00";}
      var a610_37 = $('input[name=610_37]').val(); if(a610_37==0){a610_37="00";}
      var a610_38 = $('input[name=610_38]').val(); if(a610_38==0){a610_38="00";}
      var a610_39 = $('input[name=610_39]').val(); if(a610_39==0){a610_39="00";}


      var a701_40 = $('input[name=701_40]').val(); if(a701_40==0){a701_40="00";}
      var a701_41 = $('input[name=701_41]').val(); if(a701_41==0){a701_41="00";}
      var a701_42 = $('input[name=701_42]').val(); if(a701_42==0){a701_42="00";}
      var a701_43 = $('input[name=701_43]').val(); if(a701_43==0){a701_43="00";}
      var a701_44 = $('input[name=701_44]').val(); if(a701_44==0){a701_44="00";}
      var a701_45 = $('input[name=701_45]').val(); if(a701_45==0){a701_45="00";}
      var a701_46 = $('input[name=701_46]').val(); if(a701_46==0){a701_46="00";}

      var a702_40 = $('input[name=702_40]').val(); if(a702_40==0){a702_40="00";}
      var a702_41 = $('input[name=702_41]').val(); if(a702_41==0){a702_41="00";}
      var a702_42 = $('input[name=702_42]').val(); if(a702_42==0){a702_42="00";}
      var a702_43 = $('input[name=702_43]').val(); if(a702_43==0){a702_43="00";}
      var a702_44 = $('input[name=702_44]').val(); if(a702_44==0){a702_44="00";}
      var a702_45 = $('input[name=702_45]').val(); if(a702_45==0){a702_45="00";}
      var a702_46 = $('input[name=702_46]').val(); if(a702_46==0){a702_46="00";}

      var a703_40 = $('input[name=703_40]').val(); if(a703_40==0){a703_40="00";}
      var a703_41 = $('input[name=703_41]').val(); if(a703_41==0){a703_41="00";}
      var a703_42 = $('input[name=703_42]').val(); if(a703_42==0){a703_42="00";}
      var a703_43 = $('input[name=703_43]').val(); if(a703_43==0){a703_43="00";}
      var a703_44 = $('input[name=703_44]').val(); if(a703_44==0){a703_44="00";}
      var a703_45 = $('input[name=703_45]').val(); if(a703_45==0){a703_45="00";}
      var a703_46 = $('input[name=703_46]').val(); if(a703_46==0){a703_46="00";}

      var a704_40 = $('input[name=704_40]').val(); if(a704_40==0){a704_40="00";}
      var a704_41 = $('input[name=704_41]').val(); if(a704_41==0){a704_41="00";}
      var a704_42 = $('input[name=704_42]').val(); if(a704_42==0){a704_42="00";}
      var a704_43 = $('input[name=704_43]').val(); if(a704_43==0){a704_43="00";}
      var a704_44 = $('input[name=704_44]').val(); if(a704_44==0){a704_44="00";}
      var a704_45 = $('input[name=704_45]').val(); if(a704_45==0){a704_45="00";}
      var a704_46 = $('input[name=704_46]').val(); if(a704_46==0){a704_46="00";}

      var a705_40 = $('input[name=705_40]').val(); if(a705_40==0){a705_40="00";}
      var a705_41 = $('input[name=705_41]').val(); if(a705_41==0){a705_41="00";}
      var a705_42 = $('input[name=705_42]').val(); if(a705_42==0){a705_42="00";}
      var a705_43 = $('input[name=705_43]').val(); if(a705_43==0){a705_43="00";}
      var a705_44 = $('input[name=705_44]').val(); if(a705_44==0){a705_44="00";}
      var a705_45 = $('input[name=705_45]').val(); if(a705_45==0){a705_45="00";}
      var a705_46 = $('input[name=705_46]').val(); if(a705_46==0){a705_46="00";}

      var a706_40 = $('input[name=706_40]').val(); if(a706_40==0){a706_40="00";}
      var a706_41 = $('input[name=706_41]').val(); if(a706_41==0){a706_41="00";}
      var a706_42 = $('input[name=706_42]').val(); if(a706_42==0){a706_42="00";}
      var a706_43 = $('input[name=706_43]').val(); if(a706_43==0){a706_43="00";}
      var a706_44 = $('input[name=706_44]').val(); if(a706_44==0){a706_44="00";}
      var a706_45 = $('input[name=706_45]').val(); if(a706_45==0){a706_45="00";}
      var a706_46 = $('input[name=706_46]').val(); if(a706_46==0){a706_46="00";}


      var a801_21 = $('input[name=801_21]').val(); if(a801_21==0){a801_21="00";}
      var a801_22 = $('input[name=801_22]').val(); if(a801_22==0){a801_22="00";}
      var a801_23 = $('input[name=801_23]').val(); if(a801_23==0){a801_23="00";}
      var a801_24 = $('input[name=801_24]').val(); if(a801_24==0){a801_24="00";}
      var a801_25 = $('input[name=801_25]').val(); if(a801_25==0){a801_25="00";}
      var a801_26 = $('input[name=801_26]').val(); if(a801_26==0){a801_26="00";}
      var a801_27 = $('input[name=801_27]').val(); if(a801_27==0){a801_27="00";}
      var a801_28 = $('input[name=801_28]').val(); if(a801_28==0){a801_28="00";}

      var a802_21 = $('input[name=802_21]').val(); if(a802_21==0){a802_21="00";} 
      var a802_22 = $('input[name=802_22]').val(); if(a802_22==0){a802_22="00";} 
      var a802_23 = $('input[name=802_23]').val(); if(a802_23==0){a802_23="00";} 
      var a802_24 = $('input[name=802_24]').val(); if(a802_24==0){a802_24="00";} 
      var a802_25 = $('input[name=802_25]').val(); if(a802_25==0){a802_25="00";} 
      var a802_26 = $('input[name=802_26]').val(); if(a802_26==0){a802_26="00";} 
      var a802_27 = $('input[name=802_27]').val(); if(a802_27==0){a802_27="00";} 
      var a802_28 = $('input[name=802_28]').val(); if(a802_28==0){a802_28="00";} 

      var a803_21 = $('input[name=803_21]').val(); if(a803_21==0){a803_21="00";} 
      var a803_22 = $('input[name=803_22]').val(); if(a803_22==0){a803_22="00";} 
      var a803_23 = $('input[name=803_23]').val(); if(a803_23==0){a803_23="00";} 
      var a803_24 = $('input[name=803_24]').val(); if(a803_24==0){a803_24="00";} 
      var a803_25 = $('input[name=803_25]').val(); if(a803_25==0){a803_25="00";} 
      var a803_26 = $('input[name=803_26]').val(); if(a803_26==0){a803_26="00";} 
      var a803_27 = $('input[name=803_27]').val(); if(a803_27==0){a803_27="00";} 
      var a803_28 = $('input[name=803_28]').val(); if(a803_28==0){a803_28="00";} 

      var a804_21 = $('input[name=804_21]').val(); if(a804_21==0){a804_21="00";}  
      var a804_22 = $('input[name=804_22]').val(); if(a804_22==0){a804_22="00";}  
      var a804_23 = $('input[name=804_23]').val(); if(a804_23==0){a804_23="00";}  
      var a804_24 = $('input[name=804_24]').val(); if(a804_24==0){a804_24="00";}  
      var a804_25 = $('input[name=804_25]').val(); if(a804_25==0){a804_25="00";}  
      var a804_26 = $('input[name=804_26]').val(); if(a804_26==0){a804_26="00";}  
      var a804_27 = $('input[name=804_27]').val(); if(a804_27==0){a804_27="00";}  
      var a804_28 = $('input[name=804_28]').val(); if(a804_28==0){a804_28="00";}  

      var a805_21 = $('input[name=805_21]').val(); if(a805_21==0){a805_21="00";} 
      var a805_22 = $('input[name=805_22]').val(); if(a805_22==0){a805_22="00";} 
      var a805_23 = $('input[name=805_23]').val(); if(a805_23==0){a805_23="00";} 
      var a805_24 = $('input[name=805_24]').val(); if(a805_24==0){a805_24="00";} 
      var a805_25 = $('input[name=805_25]').val(); if(a805_25==0){a805_25="00";} 
      var a805_26 = $('input[name=805_26]').val(); if(a805_26==0){a805_26="00";} 
      var a805_27 = $('input[name=805_27]').val(); if(a805_27==0){a805_27="00";} 
      var a805_28 = $('input[name=805_28]').val(); if(a805_28==0){a805_28="00";} 

      //////////////////////////////////////////////

      var a701_40_2 = $('input[name=701_40_2]').val(); if(a701_40_2==0){a701_40_2="00";}  
      var a701_41_2 = $('input[name=701_41_2]').val(); if(a701_41_2==0){a701_41_2="00";}
      var a701_42_2 = $('input[name=701_42_2]').val(); if(a701_42_2==0){a701_42_2="00";}
      var a701_43_2 = $('input[name=701_43_2]').val(); if(a701_43_2==0){a701_43_2="00";}
      var a701_44_2 = $('input[name=701_44_2]').val(); if(a701_44_2==0){a701_44_2="00";}
      var a701_45_2 = $('input[name=701_45_2]').val(); if(a701_45_2==0){a701_45_2="00";}
      var a701_46_2 = $('input[name=701_46_2]').val(); if(a701_46_2==0){a701_46_2="00";}

      var a702_40_2 = $('input[name=702_40_2]').val(); if(a702_40_2==0){a702_40_2="00";}
      var a702_41_2 = $('input[name=702_41_2]').val(); if(a702_41_2==0){a702_41_2="00";}
      var a702_42_2 = $('input[name=702_42_2]').val(); if(a702_42_2==0){a702_42_2="00";}
      var a702_43_2 = $('input[name=702_43_2]').val(); if(a702_43_2==0){a702_43_2="00";}
      var a702_44_2 = $('input[name=702_44_2]').val(); if(a702_44_2==0){a702_44_2="00";}
      var a702_45_2 = $('input[name=702_45_2]').val(); if(a702_45_2==0){a702_45_2="00";}
      var a702_46_2 = $('input[name=702_46_2]').val(); if(a702_46_2==0){a702_46_2="00";}

      var a703_40_2 = $('input[name=703_40_2]').val(); if(a703_40_2==0){a703_40_2="00";}
      var a703_41_2 = $('input[name=703_41_2]').val(); if(a703_41_2==0){a703_41_2="00";}
      var a703_42_2 = $('input[name=703_42_2]').val(); if(a703_42_2==0){a703_42_2="00";}
      var a703_43_2 = $('input[name=703_43_2]').val(); if(a703_43_2==0){a703_43_2="00";}
      var a703_44_2 = $('input[name=703_44_2]').val(); if(a703_44_2==0){a703_44_2="00";}
      var a703_45_2 = $('input[name=703_45_2]').val(); if(a703_45_2==0){a703_45_2="00";}
      var a703_46_2 = $('input[name=703_46_2]').val(); if(a703_46_2==0){a703_46_2="00";}

      var a704_40_2 = $('input[name=704_40_2]').val(); if(a704_40_2==0){a704_40_2="00";}
      var a704_41_2 = $('input[name=704_41_2]').val(); if(a704_41_2==0){a704_41_2="00";}
      var a704_42_2 = $('input[name=704_42_2]').val(); if(a704_42_2==0){a704_42_2="00";}
      var a704_43_2 = $('input[name=704_43_2]').val(); if(a704_43_2==0){a704_43_2="00";}
      var a704_44_2 = $('input[name=704_44_2]').val(); if(a704_44_2==0){a704_44_2="00";}
      var a704_45_2 = $('input[name=704_45_2]').val(); if(a704_45_2==0){a704_45_2="00";}
      var a704_46_2 = $('input[name=704_46_2]').val(); if(a704_46_2==0){a704_46_2="00";}

      var a705_40_2 = $('input[name=705_40_2]').val(); if(a705_40_2==0){a705_40_2="00";}
      var a705_41_2 = $('input[name=705_41_2]').val(); if(a705_41_2==0){a705_41_2="00";}
      var a705_42_2 = $('input[name=705_42_2]').val(); if(a705_42_2==0){a705_42_2="00";}
      var a705_43_2 = $('input[name=705_43_2]').val(); if(a705_43_2==0){a705_43_2="00";}
      var a705_44_2 = $('input[name=705_44_2]').val(); if(a705_44_2==0){a705_44_2="00";}
      var a705_45_2 = $('input[name=705_45_2]').val(); if(a705_45_2==0){a705_45_2="00";}
      var a705_46_2 = $('input[name=705_46_2]').val(); if(a705_46_2==0){a705_46_2="00";}

      var a706_40_2 = $('input[name=706_40_2]').val(); if(a706_40_2==0){a706_40_2="00";}
      var a706_41_2 = $('input[name=706_41_2]').val(); if(a706_41_2==0){a706_41_2="00";}
      var a706_42_2 = $('input[name=706_42_2]').val(); if(a706_42_2==0){a706_42_2="00";}
      var a706_43_2 = $('input[name=706_43_2]').val(); if(a706_43_2==0){a706_43_2="00";}
      var a706_44_2 = $('input[name=706_44_2]').val(); if(a706_44_2==0){a706_44_2="00";}
      var a706_45_2 = $('input[name=706_45_2]').val(); if(a706_45_2==0){a706_45_2="00";}
      var a706_46_2 = $('input[name=706_46_2]').val(); if(a706_46_2==0){a706_46_2="00";}


      var a801_21_2 = $('input[name=801_21_2]').val(); if(a801_21_2==0){a801_21_2="00";}
      var a801_22_2 = $('input[name=801_22_2]').val(); if(a801_22_2==0){a801_22_2="00";}
      var a801_23_2 = $('input[name=801_23_2]').val(); if(a801_23_2==0){a801_23_2="00";}
      var a801_24_2 = $('input[name=801_24_2]').val(); if(a801_24_2==0){a801_24_2="00";}
      var a801_25_2 = $('input[name=801_25_2]').val(); if(a801_25_2==0){a801_25_2="00";}
      var a801_26_2 = $('input[name=801_26_2]').val(); if(a801_26_2==0){a801_26_2="00";}
      var a801_27_2 = $('input[name=801_27_2]').val(); if(a801_27_2==0){a801_27_2="00";}
      var a801_28_2 = $('input[name=801_28_2]').val(); if(a801_28_2==0){a801_28_2="00";}

      var a802_21_2 = $('input[name=802_21_2]').val(); if(a802_21_2==0){a802_21_2="00";}
      var a802_22_2 = $('input[name=802_22_2]').val(); if(a802_22_2==0){a802_22_2="00";}
      var a802_23_2 = $('input[name=802_23_2]').val(); if(a802_23_2==0){a802_23_2="00";}
      var a802_24_2 = $('input[name=802_24_2]').val(); if(a802_24_2==0){a802_24_2="00";}
      var a802_25_2 = $('input[name=802_25_2]').val(); if(a802_25_2==0){a802_25_2="00";}
      var a802_26_2 = $('input[name=802_26_2]').val(); if(a802_26_2==0){a802_26_2="00";}
      var a802_27_2 = $('input[name=802_27_2]').val(); if(a802_27_2==0){a802_27_2="00";}
      var a802_28_2 = $('input[name=802_28_2]').val(); if(a802_28_2==0){a802_28_2="00";}

      var a803_21_2 = $('input[name=803_21_2]').val(); if(a803_21_2==0){a803_21_2="00";}
      var a803_22_2 = $('input[name=803_22_2]').val(); if(a803_22_2==0){a803_22_2="00";}
      var a803_23_2 = $('input[name=803_23_2]').val(); if(a803_23_2==0){a803_23_2="00";}
      var a803_24_2 = $('input[name=803_24_2]').val(); if(a803_24_2==0){a803_24_2="00";}
      var a803_25_2 = $('input[name=803_25_2]').val(); if(a803_25_2==0){a803_25_2="00";}
      var a803_26_2 = $('input[name=803_26_2]').val(); if(a803_26_2==0){a803_26_2="00";}
      var a803_27_2 = $('input[name=803_27_2]').val(); if(a803_27_2==0){a803_27_2="00";}
      var a803_28_2 = $('input[name=803_28_2]').val(); if(a803_28_2==0){a803_28_2="00";}

      var a804_21_2 = $('input[name=804_21_2]').val(); if(a804_21_2==0){a804_21_2="00";}
      var a804_22_2 = $('input[name=804_22_2]').val(); if(a804_22_2==0){a804_22_2="00";}
      var a804_23_2 = $('input[name=804_23_2]').val(); if(a804_23_2==0){a804_23_2="00";}
      var a804_24_2 = $('input[name=804_24_2]').val(); if(a804_24_2==0){a804_24_2="00";}
      var a804_25_2 = $('input[name=804_25_2]').val(); if(a804_25_2==0){a804_25_2="00";}
      var a804_26_2 = $('input[name=804_26_2]').val(); if(a804_26_2==0){a804_26_2="00";}
      var a804_27_2 = $('input[name=804_27_2]').val(); if(a804_27_2==0){a804_27_2="00";}
      var a804_28_2 = $('input[name=804_28_2]').val(); if(a804_28_2==0){a804_28_2="00";}

      var a805_21_2 = $('input[name=805_21_2]').val(); if(a805_21_2==0){a805_21_2="00";}
      var a805_22_2 = $('input[name=805_22_2]').val(); if(a805_22_2==0){a805_22_2="00";}
      var a805_23_2 = $('input[name=805_23_2]').val(); if(a805_23_2==0){a805_23_2="00";}
      var a805_24_2 = $('input[name=805_24_2]').val(); if(a805_24_2==0){a805_24_2="00";}
      var a805_25_2 = $('input[name=805_25_2]').val(); if(a805_25_2==0){a805_25_2="00";}
      var a805_26_2 = $('input[name=805_26_2]').val(); if(a805_26_2==0){a805_26_2="00";}
      var a805_27_2 = $('input[name=805_27_2]').val(); if(a805_27_2==0){a805_27_2="00";}
      var a805_28_2 = $('input[name=805_28_2]').val(); if(a805_28_2==0){a805_28_2="00";}
 

      ///////////////////////////////////////////////

      window.open('<?php echo BASE_URL . "informes/GenerarVistaPreviaBS"?>'+'/'+hemo+'/'+a201_1+'/'+a201_2+'/'+a201_3+'/'+a201_4+'/'+a202_1+'/'+a202_2+'/'+a202_3+'/'+a202_4+'/'+a203_1+'/'+a203_2+'/'+a203_3+'/'+a203_4+'/'+a204_1+'/'+a204_2+'/'+a204_3+'/'+a204_4+'/'+a301_5+'/'+a301_6+'/'+a301_7+'/'+a301_8+'/'+a302_5+'/'+a302_6+'/'+a302_7+'/'+a302_8+'/'+a303_5+'/'+a303_6+'/'+a303_7+'/'+a303_8+'/'+a401_1+'/'+a401_2+'/'+a401_3+'/'+a401_4+'/'+a401_5+'/'+a401_6+'/'+a401_7+'/'+a401_8+'/'+a401_9+'/'+a401_10+'/'+a401_11+'/'+a401_12+'/'+a401_13+'/'+a401_14+'/'+a401_15+'/'+a401_16+'/'+a401_17+'/'+a401_18+'/'+a401_19+'/'+a401_20+'/'+a402_1+'/'+a402_2+'/'+a402_3+'/'+a402_4+'/'+a402_5+'/'+a402_6+'/'+a402_7+'/'+a402_8+'/'+a402_9+'/'+a402_10+'/'+a402_11+'/'+a402_12+'/'+a402_13+'/'+a402_14+'/'+a402_15+'/'+a402_16+'/'+a402_17+'/'+a402_18+'/'+a402_19+'/'+a402_20+'/'+a403_1+'/'+a403_2+'/'+a403_3+'/'+a403_4+'/'+a403_5+'/'+a403_6+'/'+a403_7+'/'+a403_8+'/'+a403_9+'/'+a403_10+'/'+a403_11+'/'+a403_12+'/'+a403_13+'/'+a403_14+'/'+a403_15+'/'+a403_16+'/'+a403_17+'/'+a403_18+'/'+a403_19+'/'+a403_20+'/'+a404_1+'/'+a404_2+'/'+a404_3+'/'+a404_4+'/'+a404_5+'/'+a404_6+'/'+a404_7+'/'+a404_8+'/'+a404_9+'/'+a404_10+'/'+a404_11+'/'+a404_12+'/'+a404_13+'/'+a404_14+'/'+a404_15+'/'+a404_16+'/'+a404_17+'/'+a404_18+'/'+a404_19+'/'+a404_20+'/'+a501_23+'/'+a501_24+'/'+a501_25+'/'+a501_26+'/'+a502_23+'/'+a502_24+'/'+a502_25+'/'+a502_26+'/'+a503_23+'/'+a503_24+'/'+a503_25+'/'+a503_26+'/'+a601_33+'/'+a601_34+'/'+a601_35+'/'+a601_36+'/'+a601_37+'/'+a601_38+'/'+a601_39+'/'+a602_33+'/'+a602_34+'/'+a602_35+'/'+a602_36+'/'+a602_37+'/'+a602_38+'/'+a602_39+'/'+a603_33+'/'+a603_34+'/'+a603_35+'/'+a603_36+'/'+a603_37+'/'+a603_38+'/'+a603_39+'/'+a604_33+'/'+a604_34+'/'+a604_35+'/'+a604_36+'/'+a604_37+'/'+a604_38+'/'+a604_39+'/'+a605_33+'/'+a605_34+'/'+a605_35+'/'+a605_36+'/'+a605_37+'/'+a605_38+'/'+a605_39+'/'+a606_33+'/'+a606_34+'/'+a606_35+'/'+a606_36+'/'+a606_37+'/'+a606_38+'/'+a606_39+'/'+a607_33+'/'+a607_34+'/'+a607_35+'/'+a607_36+'/'+a607_37+'/'+a607_38+'/'+a607_39+'/'+a608_33+'/'+a608_34+'/'+a608_35+'/'+a608_36+'/'+a608_37+'/'+a608_38+'/'+a608_39+'/'+a609_33+'/'+a609_34+'/'+a609_35+'/'+a609_36+'/'+a609_37+'/'+a609_38+'/'+a609_39+'/'+a610_33+'/'+a610_34+'/'+a610_35+'/'+a610_36+'/'+a610_37+'/'+a610_38+'/'+a610_39+'/'+a701_40+'/'+a701_41+'/'+a701_42+'/'+a701_43+'/'+a701_44+'/'+a701_45+'/'+a701_46+'/'+a702_40+'/'+a702_41+'/'+a702_42+'/'+a702_43+'/'+a702_44+'/'+a702_45+'/'+a702_46+'/'+a703_40+'/'+a703_41+'/'+a703_42+'/'+a703_43+'/'+a703_44+'/'+a703_45+'/'+a703_46+'/'+a704_40+'/'+a704_41+'/'+a704_42+'/'+a704_43+'/'+a704_44+'/'+a704_45+'/'+a704_46+'/'+a705_40+'/'+a705_41+'/'+a705_42+'/'+a705_43+'/'+a705_44+'/'+a705_45+'/'+a705_46+'/'+a706_40+'/'+a706_41+'/'+a706_42+'/'+a706_43+'/'+a706_44+'/'+a706_45+'/'+a706_46+'/'+a801_21+'/'+a801_22+'/'+a801_23+'/'+a801_24+'/'+a801_25+'/'+a801_26+'/'+a801_27+'/'+a801_28+'/'+a802_21+'/'+a802_22+'/'+a802_23+'/'+a802_24+'/'+a802_25+'/'+a802_26+'/'+a802_27+'/'+a802_28+'/'+a803_21+'/'+a803_22+'/'+a803_23+'/'+a803_24+'/'+a803_25+'/'+a803_26+'/'+a803_27+'/'+a803_28+'/'+a804_21+'/'+a804_22+'/'+a804_23+'/'+a804_24+'/'+a804_25+'/'+a804_26+'/'+a804_27+'/'+a804_28+'/'+a805_21+'/'+a805_22+'/'+a805_23+'/'+a805_24+'/'+a805_25+'/'+a805_26+'/'+a805_27+'/'+a805_28+'/'+a701_40_2+'/'+a701_41_2+'/'+a701_42_2+'/'+a701_43_2+'/'+a701_44_2+'/'+a701_45_2+'/'+a701_46_2+'/'+a702_40_2+'/'+a702_41_2+'/'+a702_42_2+'/'+a702_43_2+'/'+a702_44_2+'/'+a702_45_2+'/'+a702_46_2+'/'+a703_40_2+'/'+a703_41_2+'/'+a703_42_2+'/'+a703_43_2+'/'+a703_44_2+'/'+a703_45_2+'/'+a703_46_2+'/'+a704_40_2+'/'+a704_41_2+'/'+a704_42_2+'/'+a704_43_2+'/'+a704_44_2+'/'+a704_45_2+'/'+a704_46_2+'/'+a705_40_2+'/'+a705_41_2+'/'+a705_42_2+'/'+a705_43_2+'/'+a705_44_2+'/'+a705_45_2+'/'+a705_46_2+'/'+a706_40_2+'/'+a706_41_2+'/'+a706_42_2+'/'+a706_43_2+'/'+a706_44_2+'/'+a706_45_2+'/'+a706_46_2+'/'+a801_21_2+'/'+a801_22_2+'/'+a801_23_2+'/'+a801_24_2+'/'+a801_25_2+'/'+a801_26_2+'/'+a801_27_2+'/'+a801_28_2+'/'+a802_21_2+'/'+a802_22_2+'/'+a802_23_2+'/'+a802_24_2+'/'+a802_25_2+'/'+a802_26_2+'/'+a802_27_2+'/'+a802_28_2+'/'+a803_21_2+'/'+a803_22_2+'/'+a803_23_2+'/'+a803_24_2+'/'+a803_25_2+'/'+a803_26_2+'/'+a803_27_2+'/'+a803_28_2+'/'+a804_21_2+'/'+a804_22_2+'/'+a804_23_2+'/'+a804_24_2+'/'+a804_25_2+'/'+a804_26_2+'/'+a804_27_2+'/'+a804_28_2+'/'+a805_21_2+'/'+a805_22_2+'/'+a805_23_2+'/'+a805_24_2+'/'+a805_25_2+'/'+a805_26_2+'/'+a805_27_2+'/'+a805_27_2+'/'+establecimiento+'/'+mes+'/'+anio,'_blank');  
    });

</script>