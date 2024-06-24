<div class="col-12 col-md-4">
    <div class="input-group input-group-navbar" style="border-bottom: 1px solid #dee2e6;">
    	<input type="text" class="form-control" id="buscar" placeholder="Search…" aria-label="Buscar">
    	<button class="btn" type="button">
          <i class="align-middle" data-feather="search"></i>
        </button>
    </div>
</div>
<?php 
    if(isset($importar)){
?>
<div class="col-12 col-md-4">
    <div ><a class="btn btn-primary" data-toggle="modal" data-target=".modalImportar">Import Excel File</a></div>
</div>
<?php        
    }
?>



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

<div class="modal modalImportar" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document" style="padding-top:20px;margin-top:10%">

        <div class="modal-content" style="background:#E9E9E9">
           
            <div style="text-align: center;margin-top:20px;margin-bottom:20px">
               <h5 style="margin-top:5px;color: #003169;font-weight: bold;">Import Excel File</h5>
            </div>
            <form method="post"  autocomplete="off" enctype="multipart/form-data">
                <div class="modal-body" style="padding-top:0px;color: #003169;">
                    
                    <div class="row">
                        <input id="excel" type="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                    </div>
                    
                </div>
                <div class="modal-footer" style="border-top:0">
                <button type="submit" class="btn" style="background:#003169;color:white;font-weight: bold;">Import</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/jszip.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.8.0/xlsx.js"></script>

<script>

var excel = [];
var excelEnviar = [];

var ExcelToJSON = function() {
    this.parseExcel = function(file) {
        var reader = new FileReader();
        reader.onload = function(e) {
          var data = e.target.result;
          var workbook = XLSX.read(data, {
            type: 'binary'
          });
          workbook.SheetNames.forEach(function(sheetName) {
            // Here is your object
            var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
            var json_object = JSON.stringify(XL_row_object);
            excel = JSON.parse(json_object);
            
            var formData = new FormData();
	        formData.append('excel',JSON.stringify(json_object));
            $.ajax({
                url:   '<?= base_url('admin/recipes/import')?>',
                type:  'post',
                encoding:"UTF-8",
                data: formData,
                processData: false,
                contentType: false,
                success:  function (response) { 
                   console.log(response);
                }
            });
          })
        };
        reader.onerror = function(ex) {
          console.log(ex);
        };
        reader.readAsBinaryString(file);
    };
};


$( ".modalImportar" ).submit(function( event ) {
    event.preventDefault();
    var files = $('#excel')[0].files; //evt.target.files;  // FileList object
    var xl2json = new ExcelToJSON();
    xl2json.parseExcel(files[0]);
    $('.modalImportar').modal('toggle'); 
    $('.modal-backdrop').remove();
});
</script>
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
    $.ajax({
        url:   '<?= $urlEliminar ?>/'+ACCION_ID,
        type:  'post',
        encoding:"UTF-8",
        success:  function (response) { 
           toastr.success("Great, the <?=$titulo;?> was deleted.");
        }
    });
}  
function cerrarModalEliminar(){
    $("body").attr("class", "");
    $("#main-wrapper").attr("style", ""); 
    $("#modalEliminar").modal('hide');
}
function cerrarModalCarga(){
    $("body").attr("class", "");
    $("#main-wrapper").attr("style", ""); 
    $("#modalCarga").modal('hide');
}
</script>


