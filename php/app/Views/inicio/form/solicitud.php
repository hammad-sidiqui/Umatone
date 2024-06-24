<?php 
$nom = $emp =$ema=$tel=$dir=$dir2=$ciu=$estt=$pos=$asi = $cod = $des = $est =$des =$cat=$mod="";

$categorias="";
if(isset($datos)){
    foreach($datos as $key){
        
        $nom = $key->nombre;
        $emp = $key->empresa;
        $ema = $key->email;
        $tel = $key->telefono;
        $dir = $key->direccion;
        $dir2= $key->direccion2;
        $ciu = $key->ciudad;
        $estt =$key->state; 
        $cod = $key->cod_postal;
        $des = $key->descripcion;
        $est = $key->estado;
        $cat = $key->categorias;
        $mod = $key->modo_trabajo;
        $pos = $key->postulados;
        $asi = $key->asignados;
    }
}

?>
<link href="/assets/js/jquery.flexdatalist.min.css" rel="stylesheet">
<div class="row">

	<div class="col-12">
		<div class="card">
					<div class="card-body">
						<form id="formUsuario" method="post" enctype="multipart/form-data" >
							<div class="row">
								<div class="col-md-12">
									<div class="row">
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputFirstName"><?= lang('idioma.txtNombreCompleto') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtNombreCompleto') ?>" name="nom" value="<?=$nom?>" required>
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtEmpresa') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtEmpresa') ?>" name="emp" value="<?=$emp?>" required>
        								</div>
        							</div>
									<div class="row">
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputFirstName"><?= lang('idioma.txtEmail') ?></label>
        									<input type="email" class="form-control" placeholder="<?= lang('idioma.txtEmail') ?>" name="ema" value="<?=$ema?>" required>
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtTelefono') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtTelefono') ?>" name="tel" value="<?=$tel?>"  required>
        								</div>
        							</div>
        							<div class="row">
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputFirstName"><?= lang('idioma.txtDireccion') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtDireccion') ?>" name="dir" value="<?=$dir?>"  required>
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtDireccion') ?> 2</label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtDireccion') ?> 2" name="dir2" value="<?=$dir2?>"  required>
        								</div>
        							</div>
        							<div class="row">
        								<div class="mb-3 col-md-4">
        									<label class="form-label" for="inputFirstName"><?= lang('idioma.txtCiudad') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtCiudad') ?>" name="ciu" value="<?=$ciu?>"  required>
        								</div>
        								<div class="mb-3 col-md-4">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtEstado') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtEstado') ?>" name="estt" value="<?=$estt?>"  required>
        								</div>
        								<div class="mb-3 col-md-4">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtCodigoPostal') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtCodigoPostal') ?>" name="cod" value="<?=$cod?>"  required>
        								</div>
        							</div>
        							<div class="row">
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtModoTrabajo') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtModoTrabajo') ?>" name="mod" value="<?=$mod?>"  required>
        								</div>
        								
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtEstado') ?></label>
        									<select  class="form-control"  name="est" required>
        									   <option <?php if($est=="PENDIENTE"){ echo "selected";}?> value="PENDIENTE">Pendiente</option> 
        									   <option <?php if($est=="PUBLICO"){ echo "selected";}?> value="PUBLICO">Publico</option> 
        									   <option <?php if($est=="PROCESADO"){ echo "selected";}?>  value="PROCESADO">Procesada</option> 
        									</select>
        								</div>
        							</div>
        							
        							<div class="row">
        							    <div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtDescripcion') ?></label>
        									
        									<textarea class="form-control" placeholder="<?= lang('idioma.txtDescripcion') ?>" name="des" required><?=$des?></textarea>
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputFirstName"><?= lang('idioma.txtCategorias') ?></label>
        									<input type='text' value='<?=$cat?>'   class='flexdatalist'  data-data='<?=$multiCategorias?>' data-search-in='name' data-visible-properties='["name"]' data-selection-required='true'  data-value-property='id' data-text-property=' {name}'  data-min-length='0' multiple='multiple'  name='cat' >
        								
        								</div>
        								
        							</div>
        							<div class="row">
        							    <div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtPostulados') ?></label>
        									<input type='text' value='<?=$pos?>'   class='flexdatalist'  data-data='<?=$multiPostulados?>' data-search-in='name' data-visible-properties='["name"]' data-selection-required='true'  data-value-property='id' data-text-property=' {name}'  data-min-length='0' multiple='multiple'  name='pos' >
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputFirstName"><?= lang('idioma.txtAsignados') ?></label>
        									<input type='text' value='<?=$asi?>'   class='flexdatalist'  data-data='<?=$multiEmpleados?>' data-search-in='name' data-visible-properties='["name"]' data-selection-required='true'  data-value-property='id' data-text-property=' {name}'  data-min-length='0' multiple='multiple'  name='asi' >
        								
        								</div>
        								
        							</div>
				
								</div>
							</div>

							<button type="submit" class="btn btn-primary"><?= lang('idioma.txtActualizar') ?></button>
							<button type="button" onclick="location.href='<?= $urlCancelar ?>'" class="btn btn-secondary"><?= lang('idioma.txtCancelar') ?></button>
						</form>

					</div>
				</div>
	</div>
</div>
<script src="/assets/js/jquery.flexdatalist.min.js"></script>
<script>
$(document).on('click', '.imagen', function() { 
    $("#img").trigger("click");
});

$("#img").change(function () {
    readImage(this);
});
function readImage (input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#imgPerfil').attr('src', e.target.result); 
      }
      reader.readAsDataURL(input.files[0]);
    }
}


$( "#formUsuario" ).submit(function( event ) {
    
    event.preventDefault();
	var formData = new FormData($('#formUsuario')[0]);

    $.ajax({
        url: '<?php if(isset($urlForm)){ echo $urlForm; } ?>',
        type: 'POST',
        beforeSend: function () {
            modalCarga();
        },
        xhr: function() {
            var xhr = $.ajaxSettings.xhr();
            xhr.upload.onprogress = function(event) {
                var perc = Math.round((event.loaded / event.total) * 100);
                $("#porcentagecarga").html(perc+"%");
            };
            return xhr;
        },
        success: function (data) {
            //responce = JSON.parse(data);
            window.location.href = "<?= $urlCancelar ?>";
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });
});

$('.flexdatalist').flexdatalist();

</script>