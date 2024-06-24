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

	<div class="container">
		<div class="card " style="margin: auto;margin-top: 80px;">
			<div class="card-body">
        <div class="mt-3 mb-3" style="text-align:center">
            <?php 
            if($activo==0){
                echo '<h3>Admin</h3>';
            }else{
                echo '<h3>Your Account</h3>';
            }
            
            ?>
          
        </div>
				<form method="post" id="formLogin" >

					<div>
            <label>Email address</label>
						<input type="text" name="ema" class="form-control" placeholder="Email@gmail.com" value="<?php if(isset($ema)){ echo $ema;} ?>" required>
					</div>

					<div>
                        <label>Password</label>
						<input type="password" name="pas" class="form-control" placeholder="******" value="<?php if(isset($cla)){ echo $cla;} ?>" required>
					</div>

                    <div class="row mt-2 mb-2">
                        <div class="col">
                            <div class="input-group">
        						<input type="checkbox" name="pas" placeholder="Contraseña">
                                <label class="ml-1">Keep me logged in</label>
                			</div>
                		</div>
            			<label class="mr-2" ><a style="color:#10E28A" href="<?=base_url('login/password_find')?>">Forgot password?</a></label>
                
                    </div>
    



					<div >
						<input type="submit" value="Log in" class="btn login_btn">
					</div>
					
					

				</form>
			</div>
			
		</div>
		
		<?php 
        if($activo==1){
        ?>
        <a style="position: initial;width: 150px;display: block;text-align: center;margin: auto; margin-top: 20px;color: #212529;" href="https://umatone.com/user/login/registration">Create an Account</a>
		
		<a style="position: initial;border: 3px solid #FFD76C;box-sizing: border-box;border-radius: 100px;padding: 5px;width: 150px;display: block;text-align: center;margin: auto; margin-top: 20px;color: #212529;" href="https://umatone.com/user">Take the Quiz</a>
        <?php 
        }
        ?>
		
	</div>
	
	

</body>


<link href="<?= base_url('assets/libs/toastr/build/toastr.min.css') ?>" rel="stylesheet">
<script src="<?= base_url('assets/libs/toastr/build/toastr.min.js') ?>"></script>


<script type="text/javascript">
	$( "#formLogin" ).submit(function( event ) {
        
	    event.preventDefault();
		var formData = new FormData($('#formLogin')[0]);
	    $.ajax({
	        url: '<?= $urlForm; ?>',
	        type: 'POST',
	        success: function (data) {
	            if(data==400){
	                toastr.warning('User/Password invalid');
	            }
	            if(data==200){
	                window.location.href = "<?= $urlHome; ?>";
	            }
	        },
	        data: formData,
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	});
</script>

</html>
