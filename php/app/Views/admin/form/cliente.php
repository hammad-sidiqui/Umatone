<?php

$encrypt = \Config\Services::encrypter();

$nom=$ape=$ema=$cla=$tel=$usu=$est = "";
$img = base_url("assets/style/img/avatars/1.jpg");

if(isset($cliente) && $cliente!=array()){

        $nom = $cliente->data[0]->nombre;
        $ape = $cliente->data[0]->apellido;
        $ema = $cliente->data[0]->correo;
        $cla = $encrypt->decrypt(base64_decode($cliente->data[0]->clave));
        $tel = $cliente->data[0]->telefono;
        $usu = $cliente->data[0]->usuario;
        $est = $cliente->data[0]->estado;

}

if(isset($clienteImg->data[0]->ruta) && $clienteImg!=array()){
    $img = base_url($clienteImg->data[0]->ruta);
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
        									<label class="form-label" for="inputFirstName">Name</label>
        									<input type="text" class="form-control" name="nom" value="<?=$nom?>" >
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName">Lastname</label>
        									<input type="text" class="form-control" name="ape" value="<?=$ape?>" >
        								</div>
        							</div>
									<div class="row">
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputFirstName">Email</label>
        									<input type="email" class="form-control" name="ema" value="<?=$ema?>" required>
        								</div>
                        <div class="mb-3 col-md-6">
        									<label class="form-label" for="inputFirstName">Phone number</label>
        									<input type="text" class="form-control" name="tel" value="<?=$tel?>" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="15" >
        								</div>
        							</div>
        							<div class="row">
                        <div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName">Username</label>
        									<input type="text" class="form-control" name="usu" value="<?=$usu?>"  required>
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName">Password</label>
        									<input type="password" class="form-control" name="cla" value="<?=$cla?>" minlength="6" maxlength="15"  required>
        								</div>

        							</div>
                      <div class="row">
                        <div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName">Status</label>
        									<select class="form-control" name="est" required>
                            <option value="enabled">Active</option>
                            <option value="disabled">Inactive</option>
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
							<button type="button" onclick="location.href='<?= $urlCancelar ?>'" class="btn btn-secondary">Cancel</button>
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
        success: function (data) {
          subirImagenes(data);
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });
});

function subirImagenes(idd){
    var formData = new FormData();
    formData.append('images[]',$('#img')[0].files[0]);
    formData.append('creado_id','0');
    formData.append('tabla','clientes');
    formData.append('registro_id',idd);
    formData.append('ruta','uploads/customers');
    formData.append('formato','img');
    formData.append('categoria','perfil');
    formData.append('actualizar','si');

    $.ajax({
        url: 'http://umatone.com/user/api/restconsulta/subirimagenes',
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
        success: function (response) {
           window.location.href = "<?= $urlCancelar ?>";
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });
}
</script>
