<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Umatone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="<?=base_url('assets/libs/bootstrap/dist/css/bootstrap.min.css');?>"></script>




    <script src="<?=base_url('assets/jquery.min.js');?>"></script>
    <script src="<?=base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js');?>"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style type="text/css">
		.card{
      	  height: 370px;
      	  margin-top: auto;
      	  margin-bottom: auto;
          width: 370px;
          background: rgba(255, 215, 108, 0.05);
          border: 3px solid #FFD76C;
          box-sizing: border-box;
          border-radius: 6px;
    	}
        .container{
      		height: 100vh;
      		align-content: center;
    	}
    	input:focus{
    		outline: 0 0 0 0  !important;
    		box-shadow: 0 0 0 0 !important;
    	}
    	.login_btn{
      		color: #406683;
      		background-color: #FFD76C;
      		width: 100%;
    	}
    	.login_btn:hover{
    		color: #406683;
    		background-color: #FF6A62;
    	}
    </style>
</head>


<body>

	<div class="container d-flex justify-content-center h-100vh">
		<div class="card">
			<div class="card-body">
                <div class="mt-3 mb-3" style="text-align:center">
                  <h3>New password</h3>
                </div>
				<form method="post" id="formLogin" >

					<div>
                        <label>New password</label>
						<input type="password" id="cla" name="cla" class="form-control" placeholder="******" required>
					</div>
					<div>
                        <label>Repeat password</label>
						<input type="password" id="cla2" name="cla2" class="form-control" placeholder="******" required>
					</div>

					<div >
						<input type="submit" value="Continue" class="btn login_btn mt-4">
					</div>

				</form>
			</div>
		</div>
	</div>

</body>


<link href="<?= base_url('assets/libs/toastr/build/toastr.min.css') ?>" rel="stylesheet">
<script src="<?= base_url('assets/libs/toastr/build/toastr.min.js') ?>"></script>


<script type="text/javascript">
	$( "#formLogin" ).submit(function( event ) {
        
	    event.preventDefault();
	    
	    if($('#cla').val()==$('#cla2').val()){
	        var formData = new FormData($('#formLogin')[0]);
    	    $.ajax({
    	        url: '<?= $urlForm; ?>',
    	        type: 'POST',
    	        success: function (data) {
    	            if(data==400){
    	                toastr.warning('the password could not be changed');
    	            }
    	            if(data==200){
    	                toastr.success('la contraseña se ha cambiado correctamente, inicie sesion con sus datos');
    	                setTimeout("window.location.href = '<?= $urlHome; ?>'", 5000);
    	            }
    	        },
    	        data: formData,
    	        cache: false,
    	        contentType: false,
    	        processData: false
    	    });
	    }else{
	        toastr.warning('Passwords do not match');
	    }
		
	});
	
</script>

</html>
