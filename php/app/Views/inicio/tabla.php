<div class="col-12 col-md-4">
    <div class="input-group input-group-navbar" style="border-bottom: 1px solid #dee2e6;">
    	<input type="text" class="form-control" id="buscar" placeholder="Buscar…" aria-label="Buscar">
    	<button class="btn" type="button">
          <i class="align-middle" data-feather="search"></i>
        </button>
    </div>
</div>


<div class="col-12 mt-3">
	<div class="card">
		<div class="table-responsive">
		    
			<table class="table mb-0">
				<thead>
					<tr>
				   	 <?php 
				   	    if(isset($tituloTabla)){
				   	        for($i=0;$i<count($tituloTabla);$i++){
        				   	  echo '<th scope="col">'.$tituloTabla[$i].'</th>';
				   	        }
				   	    }
				   	?>
					</tr>
				</thead>
				<tbody id="tbody">
					
				</tbody>
			</table>
			
		</div>
		
	</div>
</div>

<div class="col-md-12">
    <nav aria-label="..." >
        <select id="session_max_rows" class="form-control form-control-sm"  style="float:right;margin-right:0;width:92px;height:35px">
            <option value="12" selected="selected">12 / page</option>       
            <option value="25">25</option>
            <option value="100">50</option>
            <option value="250">100</option>
        </select>
        <ul id="pagination" class="pagination" style="float:right;margin-right:14px;">
        
        </ul>
    </nav>
</div>

<script>


$(document).on('click', '.accionCrear', function() {
    window.location.href = "<?= $urlCrear ?>";
});
$(document).on('click', '.accionEditar', function() {
    var idd =$(this).attr('data').split('&');
    ACCION_ID=idd[0];
    window.location.href = "<?= $urlEditar ?>/"+ACCION_ID;
});

var ACCION_ID = 0;
$(document).on('click', '.accionEliminar', function() { 
    var idd =$(this).attr('data').split('&');
    ACCION_ID=idd[0];
    modalEliminar();
});


 function modalEliminar(){
    $("#main-wrapper").attr("style", "filter: blur(4px);"); 
    $('#modalEliminar').modal({backdrop: 'static', keyboard: false});
}
function confirmarEliminar(){
    alert();
    $.ajax({
        url:   '<?= $urlEliminar ?>/'+ACCION_ID,
        type:  'post',
        encoding:"UTF-8",
        success:  function (response) { 
           
        }
    });
}  
function cerrarModalEliminar(){
    $("body").attr("class", "");
    $("#main-wrapper").attr("style", ""); 
    $("#modalEliminar").modal('hide');
}

</script>


