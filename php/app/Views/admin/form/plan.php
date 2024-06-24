<?php

$encrypt = \Config\Services::encrypter();

$tip = "";
$nom=$des=$cos=$est = "";
$img = base_url("assets/style/img/avatars/1.jpg");

if(isset($cliente) && $cliente!=array()){

        $nom = $cliente->data[0]->nombre;
        $des = $cliente->data[0]->descripcion;
        $cos = $cliente->data[0]->valor;
        $est = $cliente->data[0]->estado;
        $tip = $cliente->data[0]->categoria;

}

?>


<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="<?=base_url('assets/libs/imageUploader/image-uploader.css')?>">


<link href="<?= base_url('assets/libs/select2/dist/css/select2.min.css') ?>" rel="stylesheet" type="text/css">

<style>
    .select2-selection.select2-selection--single {
        display: block;
        width: 100%;
        min-height: calc(1.8125rem + 2px);
        font-size: .875rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        -webkit-appearance: none;
        appearance: none;
        border-radius: .2rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out
    }
</style>

<div class="row">

	<div class="col-md-12 col-xl-12">
		<div class="tab-content">
			<div class="tab-pane fade active show" id="account" role="tabpanel">

				<div class="card">
					<div class="card-body">
						
							<div class="row">
								<div class="col-md-8">
                                    <form id="formUsuario" method="post" enctype="multipart/form-data" >
									<div class="row">
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputFirstName">Name</label>
        									<input type="text" class="form-control" name="nom" value="<?=$nom?>" required>
        								</div>
        								<div class=" col-md-6">
        									<label class="form-label" for="inputLastName">Category</label>
        									<select class="form-control" id="tip" name="tip">
        									    <option value="">Choose</option>
        									    <option value="Normal">Normal</option>
        									    <option value="Vegan">Vegan</option>
        									    <option value="Vegetarian">Vegetarian</option>
        									    <option value="Dairy free">Dairy free</option>
        									    <option value="Gluten free">Gluten free</option>
        									</select>
        								</div>
        								<div class="mb-3 col-md-12">
        									<label class="form-label" for="inputLastName">Description</label>
        									<textarea class="form-control" name="des" ><?=$des?></textarea>
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName">Estimated Shopping Cost <i class="fa fa-usd" aria-hidden="true"></i>
</label>
        									<input type="text" class="form-control" name="cos" value="<?=$cos?>" required>
        								</div>
        								<div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName">Status</label>
        									<select class="form-control" name="est" required>
                                                <option value="enabled">Active</option>
                                                 <option value="disabled">Inactive</option>
                                             </select>
        								</div>
        							</div>
									<button type="submit" class="btn btn-primary"><?= lang('idioma.txtGuardar') ?></button>
							        <button type="button" onclick="location.href='<?= $urlCancelar ?>'" class="btn btn-secondary">Cancel</button>
                                    </form>
								</div>
								<div class="col-md-4">
                                    <form id="formImg" method="post" enctype="multipart/form-data" autocomplete="off" >
                                        <div class="text-center">
                                
                                
                                            <div class="row listaImagenes">
                                                <div class="input-images cursor-pointer"></div>
                                            </div>
                                            <div class="m-2" style="line-height:1; font-size:12px;text-align:justify">
                                                <?= lang('idioma.txtRequisitosImagen') ?>
                                            </div>
                                
                                        </div>
                                    </form>
                                </div>

							</div>

							
						

					</div>
				</div>
				
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-6">
							    <h3 id="titulo"><strong>Routine</strong><span> <button type="button" data-toggle="modal" data-target=".Modal1" class="btn btn-primary">Add</button></span> </h3>
                                <ul class="list-group list-group-flush" id="listaRutinas">
                                </ul>
                                
                                
                                
                							    
							</div>
							
							<div class="col-md-6">
							    <h3 id="titulo"><strong>Weekly Shopping List</strong><span> <button type="button" data-toggle="modal" data-target=".Modal2" class="btn btn-primary">Add</button></span> </h3>
                                <ul class="list-group list-group-flush" id="listaCompras">
                                </ul>
                                
                                
                                
                							    
							</div>
							
						</div>
					</div>
				</div>
                

                

			</div>
		</div>
	</div>
</div>


<div class="modal Modal1"   role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  role="document" style="padding-top:20px;margin-top:10%">

        <div class="modal-content" style="background:#E9E9E9">
           
            <div style="text-align: center;margin-top:20px;margin-bottom:20px">
               <h5 style="margin-top:5px;color: #003169;font-weight: bold;">Diet of The Day</h5>
            </div>
            <form id="formModal1" method="post" autocomplete="off" >
                <div class="modal-body" style="padding-top:0px;color: #003169;">
                    
                    <div class="row">
                        <div class="col-12" id="recetas">
                            <div class="row">
                                <div class=" col-md-12">
        							<label class="form-label" for="inputFirstName">Breakfast</label>
        							<select class="form-control select2" id="sel1" required>
        							    <option value="">Choose</option>
        							    <?php 
        							    if(isset($breakfast)){
        							        foreach($breakfast->data as $key){
        							            echo '<option value="'.$key->receta_id.'">'.$key->nombre.' ('.$key->tipo_comida.')</option>';
        							        }
        							    }
        							    ?>
        							</select>
        						</div>
                                <div class=" col-md-12">
        							<label class="form-label" for="inputFirstName">Lunch</label>
        							<select class="form-control select2" id="sel2" required>
        							    <option value="">Choose</option>
        							    <?php 
        							    if(isset($lunch)){
        							        foreach($lunch->data as $key){
        							            echo '<option value="'.$key->receta_id.'">'.$key->nombre.' ('.$key->tipo_comida.')</option>';
        							        }
        							    }
        							    ?>
        							</select>
        						</div>
                                <div class=" col-md-12">
        							<label class="form-label" for="inputFirstName">Snack</label>
        							<select class="form-control select2" id="sel3" required>
        							    <option value="">Choose</option>
        							    <?php 
        							    if(isset($snack)){
        							        foreach($snack->data as $key){
        							            echo '<option value="'.$key->receta_id.'">'.$key->nombre.' ('.$key->tipo_comida.')</option>';
        							        }
        							    }
        							    ?>
        							</select>
        						</div>
        						<div class=" col-md-12">
        							<label class="form-label" for="inputFirstName">Dinner</label>
        							<select class="form-control select2" id="sel4" required>
        							    <option value="">Choose</option>
        							     <?php 
        							    if(isset($dinner)){
        							        foreach($dinner->data as $key){
        							            echo '<option value="'.$key->receta_id.'">'.$key->nombre.' ('.$key->tipo_comida.')</option>';
        							        }
        							    }
        							    ?>
        							</select>
        						</div>
        						<div class=" col-md-12">
        							<label class="form-label" for="inputFirstName">Message</label>
        							<textarea class="form-control" id="sel5" ></textarea>
        						</div>
                            </div>
                        </div>
                        <div class="col-4" id="nutricion" style="display:none">
                            <div>Nutritional information <i class="fa fa-close" onclick="ocultarnutricion()"></i></div>
                            <ul id="listan" style="margin-top: 10px;">
                                
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer"style="border-top:0">
                    <button type="submit" class="btn" style="background:#003169;color:white;font-weight: bold;">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal Modal2"   role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  role="document" style="padding-top:20px;margin-top:10%">

        <div class="modal-content" style="background:#E9E9E9">
           
            <div style="text-align: center;margin-top:20px;margin-bottom:20px">
               <h5 style="margin-top:5px;color: #003169;font-weight: bold;">Add Weekly shopping list</h5>
            </div>
            <form id="formModal2" method="post" autocomplete="off" >
                <div class="modal-body" style="padding-top:0px;color: #003169;">
                    
                    <div class="row">
                        <div class=" col-md-12">
							<label class="form-label" for="inputFirstName">Description</label>
							<input class="form-control" id="descom" required>
							</select>
						</div>
                    </div>
                    
                </div>
                <div class="modal-footer"style="border-top:0">
                    <button type="submit" class="btn" style="background:#003169;color:white;font-weight: bold;">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    var rutina = [];
    var posOferta = null;
    var numOfertas = 0;
    
    <?php 
    $imm = "";
    if(isset($rutina->data)){
        foreach($rutina->data as $key){
     ?>
        var fila = [];
        fila[0]  = '<?=$key->plan_receta_id ?>';
        fila[1]  = '<?=$key->breakfast ?>';
        fila[2]  = '<?=$key->lunch ?>';
        fila[3]  = '<?=$key->snack ?>';
        fila[4]  = '<?=$key->dinner ?>';
        fila[5]  = '<?=$key->mensaje ?>';

        numOfertas = rutina.length;
        rutina[numOfertas]=fila;
     <?php       
        }
    }
    ?>
    refrescarRutinas();
    
    
    $( "#formModal1" ).submit(function( event ) {
        
        event.preventDefault();

        if(posOferta==null){
            
            var fila = [];
            fila[0]  = 0;
            fila[1]  = $('#sel1').val();
            fila[2]  = $('#sel2').val();
            fila[3]  = $('#sel3').val();
            fila[4]  = $('#sel4').val();
            fila[5]  = $('#sel5').val();

            numOfertas = rutina.length;
            rutina[numOfertas]=fila;
            refrescarRutinas();
          
            $("#sel1").select2().val("").trigger("change");
            $("#sel2").select2().val("").trigger("change");
            $("#sel3").select2().val("").trigger("change");
            $("#sel4").select2().val("").trigger("change");
            
            $('#sel5').val("");
            
            $('.Modal1').modal('toggle'); 
            $('.modal-backdrop').remove();
            
            toastr.success("Successful save.");
        
        }else{
            var fila = rutina[posOferta];
            fila[1]  = $('#sel1').val();
            fila[2]  = $('#sel2').val();
            fila[3]  = $('#sel3').val();
            fila[4]  = $('#sel4').val();
            fila[5]  = $('#sel5').val();

            rutina[posOferta]=fila;
            refrescarRutinas();
           
            
            $("#sel1").select2().val("").trigger("change");
            $("#sel2").select2().val("").trigger("change");
            $("#sel3").select2().val("").trigger("change");
            $("#sel4").select2().val("").trigger("change");
        
        
            $('#sel5').val("");
            
            $('.Modal1').modal('toggle'); 
            $('.modal-backdrop').remove();
            
            posOferta = null;
            
            $('.Modal1').modal('toggle'); 
            $('.modal-backdrop').remove();
            
            toastr.success("Successful save.");
            
        }
    });
    
    function refrescarRutinas(){
        $('#listaRutinas').html("");
        for(var i = 0; i<rutina.length; i++){
            
            var day = i+1;
            $('#listaRutinas').append('<li class="list-group-item lista" style="padding: 5px;">Day #'+day+' <span class="acciones"><i class="fa fa-pencil accionEditarRut ml-3" style="font-size: 12px;margin:2px;cursor:pointer; color: #495057" data-posicion="'+i+'" data-posicion="'+i+'"></i><i class="fa fa-trash accionEliminarRut" style="font-size: 12px;margin:2px;cursor:pointer; color: #FF4141" data-id="'+rutina[i][0]+'" data-posicion="'+i+'"></i></span></li>');
        }
    }
    
    $(document).on('click', '.accionEditarRut', function() {
        posOferta = $(this).attr('data-posicion');
        
        datos = rutina[posOferta];
        
        $("#sel1").select2().val(datos[1]).trigger("change");
        $("#sel2").select2().val(datos[2]).trigger("change");
        $("#sel3").select2().val(datos[3]).trigger("change");
        $("#sel4").select2().val(datos[4]).trigger("change");
        
        $('#sel5').val(datos[5]);
        $('.Modal1').modal(); 
        
    });
    
    $(document).on('click', '.accionEliminarRut', function() {
        if($(this).attr('data-id')==0){
            posOferta = $(this).attr('data-posicion');
            rutina.splice(posOferta,1);
            refrescarRutinas();
            posOferta  = null;
            
            toastr.success("successfully removed.");
        }else{
            posOferta = $(this).attr('data-posicion');
            rutina.splice(posOferta,1);
            $.ajax({
                url: '<?= base_url('admin/diets/eliminarPlanReceta') ?>/'+$(this).attr('data-id'),
                type: 'POST',
                success: function (data) {
                    posOferta  = null;
                    refrescarRutinas();
                    
                    toastr.success("successfully removed.");
                },
                contentType: false,
                cache: false,
                processData: false
            });
        }
            
        
    });
    
    
    $( "#sel1" ).change(function() {
        buscarNutricion($( "#sel1" ).val());
    });
    $( "#sel2" ).change(function() {
        buscarNutricion($( "#sel2" ).val());
    });
    
    $( "#sel3" ).change(function() {
        buscarNutricion($( "#sel3" ).val());
    });
    
    $( "#sel4" ).change(function() {
        buscarNutricion($( "#sel4" ).val());
    });
    
    
    
    function buscarNutricion(idr){
        var formData = new FormData();
        formData.append('idr',idr);
        $.ajax({
            url: '<?= base_url('admin/nuticion') ?>',
            type: 'POST',
            data: formData,
            success: function (data) {
              var response = JSON.parse(data);
              if(response.code==200){
                  $("#recetas").removeClass("col-12");
                  $('#recetas').addClass('col-8');
                  
                  $('#nutricion').css('display','block');
                  
                  var opciones = "";
                  for(var i = 0; i<response.data.length;i++){
                        opciones = opciones+'<li>'+response.data[i].descripcion+'</li>';
                  }
                  
                  $('#listan').html(opciones);
                  
              }
            },
            contentType: false,
            cache: false,
            processData: false
        });
    }
    
    
    function ocultarnutricion(){
        $("#recetas").removeClass("col-8");
        $('#recetas').addClass('col-12');
        $('#nutricion').css('display','none');
    }
    
    
    
    var compras = [];
    var posCompra = null;
    var numCompra = 0;
    <?php 
    $imm = "";
    if(isset($compra->data)){
        foreach($compra->data as $key){
     ?>
        var fila = [];
        fila[0]  = '<?=$key->lista_compras_id ?>';
        fila[1]  = '<?=$key->descripcion ?>';

        numCompra = compras.length;
        compras[numCompra]=fila;
     <?php       
        }
    }
    ?>
    
    $( "#formModal2" ).submit(function( event ) {
        
        event.preventDefault();

        if(posCompra==null){
            
            var fila = [];
            fila[0]  = 0;
            fila[1]  = $('#descom').val();
            numCompra = compras.length;
            compras[numCompra]=fila;
            refrescarCompras();
          
            $("#descom").val("");
            
            $('.Modal2').modal('toggle'); 
            $('.modal-backdrop').remove();
            
            toastr.success("Successful save.");
        
        }else{
            var fila = compras[posCompra];
            fila[1]  = $('#descom').val();

            compras[posCompra]=fila;
            refrescarCompras();
           
            $("#descom").val("");
            
            $('.Modal2').modal('toggle'); 
            $('.modal-backdrop').remove();
            
            toastr.success("Successful save.");
            
            posCompra = null;
            
        }
    });
    
    refrescarCompras();
    function refrescarCompras(){
        $('#listaCompras').html("");
        for(var i = 0; i<compras.length; i++){
            var day = i+1;
            $('#listaCompras').append('<li class="list-group-item lista" style="padding: 5px;"><span class="acciones">'+compras[i][1]+'<i class="fa fa-pencil accionEditarCom ml-3" style="font-size: 12px;margin:2px;cursor:pointer; color: #495057" data-posicion="'+i+'" data-posicion="'+i+'"></i><i class="fa fa-trash accionEliminarCom" style="font-size: 12px;margin:2px;cursor:pointer; color: #FF4141" data-id="'+compras[i][0]+'" data-posicion="'+i+'"></i></span></li>');
        }
    }
    
    $(document).on('click', '.accionEditarCom', function() {
        posCompra = $(this).attr('data-posicion');
        
        datos = compras[posCompra];
        
        $("#descom").val(datos[1]);
        
        $('.Modal2').modal(); 
        
    });
    
    $(document).on('click', '.accionEliminarCom', function() {
        
        if($(this).attr('data-id')==0){
            posCompra = $(this).attr('data-posicion');
            compras.splice(posCompra,1);
            refrescarCompras();
            posCompra  = null;
            
            toastr.success("successfully removed.");
        }else{
            posCompra = $(this).attr('data-posicion');
            compras.splice(posCompra,1);
            $.ajax({
                url: '<?= base_url('admin/diets/eliminarCompra') ?>/'+$(this).attr('data-id'),
                type: 'POST',
                success: function (data) {
                    posCompra  = null;
                    refrescarCompras();
                    toastr.success("successfully removed.");
                },
                contentType: false,
                cache: false,
                processData: false
            });
        }
        
        
    });
</script>

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
    formData.append('rutina',JSON.stringify(rutina));
    formData.append('compra',JSON.stringify(compras));
    
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
    var formData = new FormData($('#formImg')[0]);
    formData.append('creado_id','0');
    formData.append('tabla','plan');
    formData.append('registro_id',idd);
    formData.append('ruta','uploads/plan');
    formData.append('formato','img');
    formData.append('categoria','catalogo');
    formData.append('actualizar','no');

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

<script type="text/javascript" src="<?=base_url('assets/libs/imageUploader/image-uploader.js')?>"></script>

<script type="text/javascript">
    
    <?php 
    $imm = "";
    if(isset($clienteImg->data)){
        foreach($clienteImg->data as $key){
            $ruta = base_url($key->ruta);
            $imm=$imm."{id: $key->contenido_id, src: '$ruta'},";
        }
    }
    ?>
    
    let preloaded = [<?=$imm;?>];
    
    $('.input-images').imageUploader({
        preloaded: preloaded,
        maxSize: undefined,
        maxFiles: undefined,
    });
    
    function eliminarImagen(id){
        
        var formData = new FormData();
        formData.append('idFile',id);

        $.ajax({
            url: '<?= base_url('admin/deletefile') ?>',
            type: 'POST',
            success: function (data) {
           
            },
            data: formData,
            contentType: false,
            cache: false,
            processData: false
        });
    }
    
    
    $("#tip").val("<?=$tip?>");
    
    
</script>

<script src="<?= base_url('assets/libs/select2/dist/js/select2.min.js') ?>"></script>
<script>
    $(".select2").select2();
</script>

