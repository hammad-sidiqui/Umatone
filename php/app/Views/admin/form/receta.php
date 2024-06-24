<?php

$encrypt = \Config\Services::encrypter();

$nom=$des=$pre=$coo=$por=$cat=$tip = "";
$est= "enabled";
$img = base_url("assets/style/img/avatars/1.jpg");

if(isset($cliente) && $cliente!=array()){

        $nom = $cliente->data[0]->nombre;
        $des = $cliente->data[0]->descripcion;
        $pre = $cliente->data[0]->tiempo_preparacion;
        $pre = explode(":",$pre);
        $pre1 = $pre[0];
        $pre2 = $pre[1];
        
        $coo = $cliente->data[0]->tiempo_coccion;
        $coo = explode(":",$coo);
        $coo1 = $coo[0];
        $coo2 = $coo[1];
        
        $por = $cliente->data[0]->porciones;
        $cat = $cliente->data[0]->categoria;
        $tip = $cliente->data[0]->tipo_comida;
        $est = $cliente->data[0]->estado;

}

?>
<style>
    .lista > .acciones{
        display:none;
    }
    .lista:hover > .acciones{
        display:initial;
    }
</style>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link type="text/css" rel="stylesheet" href="<?=base_url('assets/libs/imageUploader/image-uploader.css')?>">


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
        								<div class=" col-md-12">
        									<label class="form-label" for="inputFirstName">Name</label>
        									<input type="text" class="form-control" name="nom" value="<?=$nom?>" required>
        								</div>
        								<div class=" col-md-12">
        									<label class="form-label" for="inputLastName">Description</label>
        									<textarea type="text" class="form-control" name="des" value="" required><?=$des?></textarea>
        								</div>
        								<div class=" col-md-4">
        									<label class="form-label" for="inputFirstName">Prep time</label>
        									<div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text" style="height: 100%;">
                                                  <i class="fa fa-clock"></i>
                                                </div>
                                              </div>
                                              <input type="number" class="form-control" name="pre1" placeholder="Hour" min="0" max="24" value="<?=$pre1?>">
                                              <input type="number" class="form-control" name="pre2" placeholder="Min" min="0" max=59 value="<?=$pre2?>">
                                            </div>
        								</div>
                                        <div class=" col-md-4">
        									<label class="form-label" for="inputFirstName">Cooking time</label>
        									<div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                <div class="input-group-text" style="height: 100%;">
                                                  <i class="fa fa-clock"></i>
                                                </div>
                                              </div>
                                              <input type="number" class="form-control" name="coo1" placeholder="Hour" min="0" max="24" value="<?=$coo1?>">
                                              <input type="number" class="form-control" name="coo2" placeholder="Min" min="0" max=59 value="<?=$coo2?>">
                                            </div>
        								</div>
        								<div class=" col-md-4">
        									<label class="form-label" for="inputFirstName">Portions</label>
        									<input type="text" class="form-control" name="por" value="<?=$por?>" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" maxlength="15" required>
        								</div>
                                        <div class=" col-md-6">
        									<label class="form-label" for="inputLastName">Kind of food</label>
        									<select class="form-control" id="cat" name="cat">
        									    <option value="">Choose</option>
        									    <option value="Breakfast">Breakfast</option>
        									    <option value="Lunch">Lunch</option>
        									    <option value="Snack">Snack</option>
        									    <option value="Dinner">Dinner</option>
        									</select>
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

                                        <div class="mb-3 col-md-6">
        									<label class="form-label" for="inputLastName">Status</label>
        									<select class="form-control"  id="est"  name="est" required>
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
							    <h3 id="titulo"><strong>Ingredients</strong><span> <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".Modal1">Add</button></span> </h3>
							    
							    <ul class="list-group list-group-flush" id="listaIngredientes">
                                </ul>
							</div>
							<div class="col-md-6">
							    <h3 id="titulo"><strong>Instructions</strong><span> <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".Modal2">Add</button></span> </h3>
							    <ul class="list-group list-group-flush" id="listaInstrucciones">
                                </ul>
							    
							</div>
							<div class="col-md-6 mt-3">
							    <h3 id="titulo"><strong>Nutritional information </strong><span> <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".Modal3">Add</button></span> </h3>
							    <ul class="list-group list-group-flush" id="listaNutricion">
                                </ul>
							    
							</div>
						</div>
					</div>
				</div>
                
                
			</div>
		</div>
	</div>
</div>




<div class="modal Modal1"   tabindex="-1" role="dialog" >
    <div class="modal-dialog"  role="document" style="padding-top:20px;margin-top:10%">

        <div class="modal-content" style="background:#E9E9E9">
           
            <div style="text-align: center;margin-top:20px;margin-bottom:20px">
               <h5 style="margin-top:5px;color: #003169;font-weight: bold;">Ingredient</h5>
            </div>
            <form id="formModal1" method="post" autocomplete="off" >
                <div class="modal-body" style="padding-top:0px;color: #003169;">
                    
                    <div class="row">
                        <div class=" col-md-12" >
							<label class="form-label" for="inputFirstName">Name</label>
							<input type="text" id="M1Nom" class="form-control" value="<?=$nom?>" required>
						</div>
                        <div class="col-md-3" hidden>
                            <label class="form-label" for="inputFirstName">Measure</label>
                            <select id="M1Cat" class="form-control" required>
                                <option value="to taste">to taste</option>
                                <option value="Unit">Unit</option>
                                <option value="ml">ml</option>
                                <option value="g">g</option>
                            </select>
                        </div>
                        <div class="col-md-3 M1Num" hidden>
                            <label class="form-label" for="inputFirstName">Amount</label>
                            <input type="text" id="M1Num" class="form-control" >
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


<div class="modal Modal2"   tabindex="-1" role="dialog" >
    <div class="modal-dialog"  role="document" style="padding-top:20px;margin-top:10%">

        <div class="modal-content" style="background:#E9E9E9">
           
            <div style="text-align: center;margin-top:20px;margin-bottom:20px">
               <h5 style="margin-top:5px;color: #003169;font-weight: bold;">Instruction</h5>
            </div>
            <form id="formModal2" method="post" autocomplete="off" >
                <div class="modal-body" style="padding-top:0px;color: #003169;">
                    
                    <div class="row">
                        <div class=" col-md-12">
							<label class="form-label" for="inputFirstName">Description</label>
							<textarea type="text" class="form-control" id="M2Nom" required></textarea>
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



<div class="modal Modal3"   tabindex="-1" role="dialog" >
    <div class="modal-dialog"  role="document" style="padding-top:20px;margin-top:10%">

        <div class="modal-content" style="background:#E9E9E9">
           
            <div style="text-align: center;margin-top:20px;margin-bottom:20px">
               <h5 style="margin-top:5px;color: #003169;font-weight: bold;">Nutritional information</h5>
            </div>
            <form id="formModal3" method="post" autocomplete="off" >
                <div class="modal-body" style="padding-top:0px;color: #003169;">
                    
                    <div class="row">
                        <div class=" col-md-12">
							<label class="form-label" for="inputFirstName">Description</label>
							<input type="text" list="list1" class="form-control" id="M3Nom" required> 
							<datalist id="list1">
                              <option value="Calories">
                              <option value="Carbs">
                              <option value="Fat">
                              <option value="Protein">
                              <option value="Sodium">
                              <option value="Cholesterol">
                            </datalist>
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

    var ingredientes = [];
    var instrucciones = [];
    var nutricion = [];
    var posOferta = null;
    var numOfertas = 0;
    
    <?php 
    $imm = "";
    if(isset($ingredientes->data)){
        foreach($ingredientes->data as $key){
     ?>
        var fila = [];
        fila[0]  = '<?=$key->ingrediente_id ?>';
        fila[1]  = '<?=$key->nombre ?>';
        fila[2]  = '<?=$key->medida ?>';
        fila[3]  = '<?=$key->cantidad ?>';

        numOfertas = ingredientes.length;
        ingredientes[numOfertas]=fila;
        
     <?php       
        }
    }
    ?>
    
    
    console.log(ingredientes);
    
    <?php 
    $imm = "";
    if(isset($instrucciones->data)){
        foreach($instrucciones->data as $key){
     ?>
        var fila = [];
        fila[0]  = '<?=$key->instruccion_id ?>';
        fila[1]  = '<?=$key->descripcion ?>';

        numOfertas = instrucciones.length;
        instrucciones[numOfertas]=fila;
     <?php       
        }
    }
    ?>
    
    
    <?php 
    $imm = "";
    if(isset($nutricion->data)){
        foreach($nutricion->data as $key){
     ?>
        var fila = [];
        fila[0]  = '<?=$key->nutricion_id ?>';
        fila[1]  = '<?=$key->descripcion ?>';

        numOfertas = nutricion.length;
        nutricion[numOfertas]=fila;
     <?php       
        }
    }
    ?>


    refrescarIngredientes();
    refrescarInstrucciones();
    refrescarNutricion();
    
    
    $( "#formModal1" ).submit(function( event ) {
        
        event.preventDefault();

        if(posOferta==null){
            
            var fila = [];
            fila[0]  = 0;
            fila[1]  = $('#M1Nom').val();
            fila[2]  = $('#M1Cat').val();
            fila[3]  = $('#M1Num').val();

            numOfertas = ingredientes.length;
            ingredientes[numOfertas]=fila;
            refrescarIngredientes();
          
            $('#M1Nom').val("");
            $('#M1Cat').val("to taste");
            $('#M1Num').val("");
            
            toastr.success("Successful save.");
        
        }else{
            var fila = ingredientes[posOferta];
            fila[1]  = $('#M1Nom').val();
            fila[2]  = $('#M1Cat').val();
            fila[3]  = $('#M1Num').val();

            ingredientes[posOferta]=fila;
            refrescarIngredientes();
           
            $('#M1Nom').val("");
            $('#M1Cat').val("to taste");
            $('#M1Num').val("");
            
            $('.Modal1').modal('toggle'); 
            $('.modal-backdrop').remove();
            
            posOferta = null;
            
            toastr.success("Successful save.");
            
            
        }
    });
    
    function refrescarIngredientes(){
        $('#listaIngredientes').html("");
        for(var i = 0; i<ingredientes.length; i++){
            $('#listaIngredientes').append('<li class="list-group-item lista" style="padding: 5px;">'+ingredientes[i][1]+' '+ ingredientes[i][3] +'<span class="acciones"><i class="fa fa-pencil accionEditarIng ml-3" style="font-size: 12px;margin:2px;cursor:pointer; color: #495057" data-posicion="'+i+'" data-posicion="'+i+'"></i><i class="fa fa-trash accionEliminarIng" style="font-size: 12px;margin:2px;cursor:pointer; color: #FF4141" data-id="'+ingredientes[i][0]+'" data-posicion="'+i+'"></i></span></li>');
        }
    }
    
    $(document).on('click', '.accionEditarIng', function() {
        posOferta = $(this).attr('data-posicion');
        
        datos = ingredientes[posOferta];
        
        $('#M1Nom').val(datos[1]);
        $('#M1Cat').val(datos[2]);
        $('#M1Num').val(datos[3]);
        
        $('.Modal1').modal(); 
        
    });
    
    $(document).on('click', '.accionEliminarIng', function() {
        posOferta = $(this).attr('data-posicion');
        ingredientes.splice(posOferta,1);
        $("#red"+posOferta).remove();
        refrescarIngredientes();
        posOferta  = null;
        
        toastr.success("successfully removed.");
        
    });
    
    
    
    
    
    
    $( "#formModal2" ).submit(function( event ) {
        
        event.preventDefault();

        if(posOferta==null){
            
            var fila = [];
            fila[0]  = 0;
            fila[1]  = $('#M2Nom').val();

            numOfertas = instrucciones.length;
            instrucciones[numOfertas]=fila;
            refrescarInstrucciones();
          
            $('#M2Nom').val("");
            
            toastr.success("Successful save.");
        
        }else{
            var fila = instrucciones[posOferta];
            fila[1]  = $('#M2Nom').val();

            instrucciones[posOferta]=fila;
            refrescarInstrucciones();
           
            $('#M2Nom').val("");
            
            $('.Modal2').modal('toggle'); 
            $('.modal-backdrop').remove();
            
            posOferta = null;
            
            toastr.success("Successful save.");
        }
    });

    function refrescarInstrucciones(){
        
        $('#listaInstrucciones').html("");
        for(var i = 0; i<instrucciones.length; i++){
            $('#listaInstrucciones').append('<li class="list-group-item lista" style="padding: 5px;">'+instrucciones[i][1]+'<span class="acciones"><i class="fa fa-pencil accionEditarIns ml-3" style="font-size: 12px;margin:2px;cursor:pointer; color: #495057" data-posicion="'+i+'" data-posicion="'+i+'"></i><i class="fa fa-trash accionEliminarIns" style="font-size: 12px;margin:2px;cursor:pointer; color: #FF4141" data-id="'+instrucciones[i][0]+'" data-posicion="'+i+'"></i></span></li>');
        }
    }
    
    $(document).on('click', '.accionEditarIns', function() {
        posOferta = $(this).attr('data-posicion');
        datos = instrucciones[posOferta];
        $('#M2Nom').val(datos[1]);
        $('.Modal2').modal(); 
    });
    
    $(document).on('click', '.accionEliminarIns', function() {
        posOferta = $(this).attr('data-posicion');
        instrucciones.splice(posOferta,1);
        refrescarInstrucciones();
        posOferta  = null;
        
        toastr.success("successfully removed.");
    });
    
    
    
    
    
    $( "#formModal3" ).submit(function( event ) {
        
        event.preventDefault();

        if(posOferta==null){
            
            var fila = [];
            fila[0]  = 0;
            fila[1]  = $('#M3Nom').val();

            numOfertas = nutricion.length;
            nutricion[numOfertas]=fila;
            refrescarNutricion();
          
            $('#M3Nom').val("");
            
            toastr.success("Successful save.");
        
        }else{
            var fila = nutricion[posOferta];
            fila[1]  = $('#M3Nom').val();

            nutricion[posOferta]=fila;
            refrescarNutricion();
           
            $('#M3Nom').val("");
            
            $('.Modal3').modal('toggle'); 
            $('.modal-backdrop').remove();
            
            posOferta = null;
            
            toastr.success("Successful save.");
            
        }
    });
    
    function refrescarNutricion(){
        
        $('#listaNutricion').html("");
        for(var i = 0; i<nutricion.length; i++){
            $('#listaNutricion').append('<li class="list-group-item lista" style="padding: 5px;">'+nutricion[i][1]+'<span class="acciones"><i class="fa fa-pencil accionEditarNut ml-3" style="font-size: 12px;margin:2px;cursor:pointer; color: #495057" data-posicion="'+i+'" data-posicion="'+i+'"></i><i class="fa fa-trash accionEliminarNut" style="font-size: 12px;margin:2px;cursor:pointer; color: #FF4141" data-id="'+nutricion[i][0]+'" data-posicion="'+i+'"></i></span></li>');
        }
    }
    
    $(document).on('click', '.accionEditarNut', function() {
        posOferta = $(this).attr('data-posicion');
        datos = nutricion[posOferta];
        $('#M3Nom').val(datos[1]);
        $('.Modal3').modal(); 
    });
    
    $(document).on('click', '.accionEliminarNut', function() {
        posOferta = $(this).attr('data-posicion');
        nutricion.splice(posOferta,1);
        refrescarNutricion();
        posOferta  = null;
        
        toastr.success("successfully removed.");
    });
</script>






<script type="text/javascript" src="<?=base_url('assets/libs/imageUploader/image-uploader.js')?>"></script>
<script type="text/javascript">
    
    <?php 
    $imm = "";
    if(isset($imagenes->data)){
        foreach($imagenes->data as $key){
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
	formData.append('ingredientes',JSON.stringify(ingredientes));
	formData.append('instrucciones',JSON.stringify(instrucciones));
	formData.append('nutricion',JSON.stringify(nutricion));

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
    formData.append('tabla','recetas');
    formData.append('registro_id',idd);
    formData.append('ruta','uploads/receta');
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


<script>

ocultar();
function ocultar(){
    if($('#M1Cat').val()=='to taste'){
        $('.M1Num').attr('hidden',true);
    }else{
        $('.M1Num').attr('hidden',false);
    }
}

$( "#M1Cat" ).change(function() {
    ocultar();
});

$('#cat').val('<?=$cat?>');
$("#tip").val("<?=$tip?>");
$('#est').val('<?=$est?>');


</script>





