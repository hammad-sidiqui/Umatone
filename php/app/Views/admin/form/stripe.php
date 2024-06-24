<?php

$encrypt = \Config\Services::encrypter();

$mod=$key1=$key2=$key3=$key4=$est = "";
$img = base_url("assets/style/img/avatars/1.jpg");

if(isset($cliente) && $cliente['code']==200){
    
        $cliente = $cliente['data'][0];
        
        
        $mod = $cliente['modo'];
        $key1 = $cliente['clave_prueba_1'];
        $key2 = $cliente['clave_prueba_2'];
        $key3 = $cliente['clave_real_1'];
        $key4 = $cliente['clave_real_2'];
        $est = $cliente['estado'];
        
        
}
/*
if(isset($clienteImg->data[0]->ruta) && $clienteImg!=array()){
    $img = base_url($clienteImg->data[0]->ruta);
}
*/


?>

<div class="row">

	<div class="col-md-12 col-xl-6">
		<div class="tab-content">
			<div class="tab-pane fade active show" id="account" role="tabpanel">

				<div class="card">
					<div class="card-body">
						<form id="formUsuario" method="post" enctype="multipart/form-data" >
							<div class="row">
								<div class="col-md-12">
								    
								    
        <div class="tab-pane active" id="tab-stripe">
          <!--You can get all your API keys at Stripe admin panel under Your Account > Account Settings > API Keys-->
           <div class="row m-2">
             <label class="col-sm-3 control-label" for="input-stripe-mode"> <span class="required" data-toggle="tooltip" title="" data-original-title="Use Test to test payments via Stripe payment gateway. Use Live when you are ready to accept payments.">Payment Mode </span></label>
             <div class="col-sm-9">
                <select name="mod" id="modo" class="form-control">
                                    <option value="0" selected="selected"> Test </option>
                                  <option value="1"> Live </option>
               </select>
             </div>
           </div>
           <div class="row m-2 Test">
             <label class="col-sm-3 control-label" for="input-test-key">Secret Key for testing </label>
             <div class="col-sm-9"><input type="text" class="form-control" name="key1" value="<?=$key1;?>" >
                             </div>
           </div>
           <div class="row m-2 Test">
            <label class="col-sm-3 control-label" for="input-test-publish">Publish Key for testing </label>
            <div class="col-sm-9"><input type="text" class="form-control" name="key2" value="<?=$key2;?>" >
                            </div>
           </div>
           <div class="row m-2 Live">
             <label class="col-sm-3 control-label" for="input-live-key">Secret Key for live </label>
             <div class="col-sm-9"><input type="text" class="form-control" name="key3" value="<?=$key3;?>" >
                             </div>
           </div>
           <div class="row m-2 Live">
             <label class="col-sm-3 control-label" for="input-live-publish">Publish Key for live </label>
             <div class="col-sm-9"><input type="text" class="form-control" name="key4" value="<?=$key4;?>" >
                             </div>
           </div>
           <div class="row m-2">
             <label class="col-sm-3 control-label" for="input-stripe-mode"> <span class="required" data-toggle="tooltip" title="" data-original-title="Use Test to test payments via Stripe payment gateway. Use Live when you are ready to accept payments.">Status </span></label>
             <div class="col-sm-9">
                <select name="est" id="estado"  class="form-control">
                <option value="0" selected="selected"> Active </option>
                <option value="1"> Inactive </option>
              </select>
             </div>
           </div>
        </div>
								</div>
								<div class="col-md-4" hidden>
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


$( "#modo" ).change(function() {
  ocultar();
});
ocultar();
function ocultar(){
    if($('#modo').val()==0){
        $('.Test').attr('hidden',true);
        $('.Live').attr('hidden',false);
    }else{
        $('.Test').attr('hidden',false);
         $('.Live').attr('hidden',true);
    }
}

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

$('#modo').val('<?=$mod?>');
$('#estado').val('<?=$est?>');

$( "#formUsuario" ).submit(function( event ) {

    event.preventDefault();
	var formData = new FormData($('#formUsuario')[0]);
    $.ajax({
        url: '<?php if(isset($urlForm)){ echo $urlForm; } ?>',
        type: 'POST',
        success: function (data) {
          window.location.href = "<?= $urlCancelar ?>";
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
    formData.append('tabla','usuarios');
    formData.append('registro_id',idd);
    formData.append('ruta','uploads/users');
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
