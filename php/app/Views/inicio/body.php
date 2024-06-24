<?php $this->session = \Config\Services::session();  ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="/style/img/icons/icon-48x48.png" />
    <link href="https://pictogrammers.github.io/@mdi/font/5.4.55/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css">
	<title>Umatone</title>

	<link href="<?=base_url('assets/style/css/app2.css')?>" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="<?=base_url('assets/style/js/app.js')?>"></script>
    <script src="<?=base_url('assets/jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js');?>"></script>



</head>

<body style="background: #ffffff;">
    <nav class="navbar navbar-expand navbar-light navbar-bg" style="min-height: 100px;padding-left: 100px;padding-right: 100px;">
        <div class="row" style="width: 100%;">
            <div class="col-12 col-md-6 text-center text-md-left" >
                <a  href="https://umatone.com">
                  <img style="height: 25px;width: 136px;" src="https://umatone.com/user/assets/img/UmantoneHorizontal.png" >
                </a>
            </div>
            <div class="col-12 col-md-6 mt-2 m-md-0">
				<div class="text-center text-md-right">
					<a style="position: initial;border: 3px solid #FFD76C;box-sizing: border-box;border-radius: 100px;padding: 5px;width: 150px;display: inline-block;text-align: center;" href="<?= base_url('login/goout');?>">Go out</a>
				</div>
			</div>
        </div>
				
			</nav>
	<div class="row" id="contenido" style="margin:0px">
		<?= $contenido ?>
    </nav>
</body>




<div class="modal fade"  id="modalcarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog"  role="document" style="padding-top:20px;margin-top:10%">
       <div class="box__input modal-content" style="background:#ffffff;padding:10px;">
            <div class="text-center" id="campo" style="width: 100%; min-height: 300px; background:#ffffff;" >

                <img src="<?= base_url('assets/img/cloud_load.gif') ?>" style="width:80%">
                <br>
                <label for="file" class="text-muted"><span id="porcentagecarga" class="box__dragndrop"></span></label>
                <br>
            </div>
        </div>
    </div>
</div>






