<?php

$encrypt = \Config\Services::encrypter();

$num=$tip=$nom=$ape=$ema=$cla=$tel=$dir=$cat=$est = "";
$img = base_url("assets/style/img/avatars/1.jpg");

if(isset($cliente) && $cliente!=array()){

        $num = $cliente->data[0]->num_documento;
        $tip = $cliente->data[0]->tip_documento;
        $nom = $cliente->data[0]->nombre;
        $ape = $cliente->data[0]->apellido;
        $ema = $cliente->data[0]->correo;
        //$cla = $encrypt->decrypt(base64_decode($cliente->data[0]->clave));
        $tel = $cliente->data[0]->telefono;
        $dir = $cliente->data[0]->direccion;
        $car = $cliente->data[0]->rol;
        $est = $cliente->data[0]->estado;
        if(file_exists($cliente->data[0]->foto)){
            $img = $cliente->data[0]->foto;
        }

}

?>

<div class="row">

	<div class="col-md-12 col-xl-10">
		<div class="tab-content">
			<div class="tab-pane fade active show" id="account" role="tabpanel">

				<div class="card">
					<div class="card-body">
						<form id="formUsuario" method="post" enctype="multipart/form-data" >
							<div class="row">
								<div class="col-md-8">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="inputFirstName"><?= lang('idioma.txtNumDocumento') ?></label>
                                            <input type="text" class="form-control" placeholder="<?= lang('idioma.txtNumDocumento') ?>" name="num" value="<?=$num?>" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="15" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="inputLastName"><?= lang('idioma.txtTipDocumento') ?></label>
                                            <select class="form-control" name="tip" required="">
                                                <option value="CEDULA DE CIUDADANIA">CEDULA DE CIUDADANIA</option>
                                                <option value="CEDULA EXTRANJERA">CEDULA EXTRANJERA</option>
                                            </select>
                                        </div>
                                    </div>
									<div class="row">
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputFirstName"><?= lang('idioma.txtNombre') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtNombre') ?>" name="nom" value="<?=$nom?>" required>
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtApellido') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtApellido') ?>" name="ape" value="<?=$ape?>" required>
        								</div>
        							</div>
									<div class="row">
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputFirstName"><?= lang('idioma.txtEmail') ?></label>
        									<input type="email" class="form-control" placeholder="<?= lang('idioma.txtEmail') ?>" name="ema" value="<?=$ema?>" required>
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtClave') ?></label>
        									<input type="password" class="form-control" placeholder="<?= lang('idioma.txtClave') ?>" name="cla" value="<?=$cla?>" minlength="6" maxlength="15"  required>
        								</div>
        							</div>
        							<div class="row">
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputFirstName"><?= lang('idioma.txtTelefono') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtTelefono') ?>" name="tel" value="<?=$tel?>" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="15" required>
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName"><?= lang('idioma.txtDireccion') ?></label>
        									<input type="text" class="form-control" placeholder="<?= lang('idioma.txtDireccion') ?>" name="dir" value="<?=$dir?>"  required>
        								</div>
        							</div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="inputFirstName"><?= lang('idioma.txtCargo') ?></label>
                                            <select class="form-control" name="car" required="">
                                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                                <option value="PERSONAL">PERSONAL</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="inputLastName"><?= lang('idioma.txtEstado') ?></label>
                                            <select class="form-control" name="est" required="">
                                                <option value="HABLITADO">HABLITADO</option>
                                                <option value="DESHABILITADO">DESHABILITADO</option>
                                            </select>
                                        </div>
                                    </div>

								</div>
								<div class="col-md-4">
									<div class="text-center">
										<img  src="<?=$img?>" id="imgPerfil" class="rounded-circle img-responsive mt-2" width="128" height="128">
										<div class="mt-2">
											<span class="btn btn-primary imagen"><i class="fas fa-upload"></i> <?= lang('idioma.txtSubirImagen') ?></span>
											<input type="file" class="form-control" id="img" accept="image/jpeg" name="img" hidden>
										</div>
										<small>
										    <?= lang('idioma.txtRequisitosImagen') ?>
										</small>
									</div>
								</div>

							</div>

							<button type="submit" class="btn btn-primary"><?= lang('idioma.txtGuardar') ?></button>
							<button type="button" onclick="location.href='<?= $urlCancelar ?>'" class="btn btn-secondary"><?= lang('idioma.txtCancelar') ?></button>
						</form>

					</div>
				</div>


			</div>
		</div>
	</div>
</div>
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
            $('#modalcarga').modal({backdrop: 'static', keyboard: false});
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
</script>
