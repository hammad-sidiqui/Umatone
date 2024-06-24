
<?php
return [



    //default
    'txtEmail'    => 'Correo Electrónico',
    'txtClave'      => 'Contraseña',
    'txtClaveActual'      => 'Contraseña actual',
    'txtClaveNueva'      => 'Nueva contraseña',
    'txtClaveConfirmar'      => 'Confirmar contraseña',
    'txtOlvidoClave' => '¿Olvido su contraseña?',
    'txtRecuerdame' => 'Recuérdame',
    'txtIniciarSesion' => 'Iniciar Sesión',



    'txtNombre' => 'Nombre',
    'txtApellido' => 'Apellido',
    'txtNumDocumento' => 'Num. documento',
    'txtTipDocumento' => 'Tip. documento',
    'txtDireccion' => 'Dirección',
    'txtDepartamento' => 'Departamento',
    'txtMunicipio' => 'Municipio',
    'txtTelefono' => 'Telefono',
    'txtCargo' => 'Cargo',
    'txtEstado' => 'Estado',
    'txtCiudad' => 'Ciudad',
    'txtSubirImagen' => 'Upload Image',
    'txtRequisitosImagen' => 'For the best results, the image must be JPEG with aspect ratio 1:1 (square) or 16:9 (widescreen) and maximum weight 5 MB.',
    'txtActualizar' => 'Actualizar',
    'txtConfiguracionPerfil' => 'Confirguración de perfil',
    'txtCuenta' => 'Cuenta',
    'txtEliminarCuenta' => 'Eliminar cuenta',
    'txtEliminarCuentaMensaje' => 'Al eliminar tu cuenta, perderás total acceso a nuestra plataforma.',
    'txtInicio' => 'Inicio',
    'txtNosotros' => 'Nosotros',
    'txtServicios' => 'Servicios',
    'txtPortafolios' => 'Portafolios',
    'txtEquipo' => 'Equipo',
    'txtContacto' => 'Contactanos',
    'txtEmpleos' => 'Empleos',
    'txtEmpezar' => 'Empezar',
    'txtDescripcion' => 'Descripción',
    'txtRequisitos' => 'Requisitos',
    'txtFecInicio' => 'Fec. Inicio',
    'txtSupervisor' => 'Supervisor',
    'txtEntidad' => 'Entidad',
    'txtEvento' => 'Evento',
    'txtEventos' => 'Eventos',
    'txtUbicacion' => 'Ubicación',
    'txtFecFin' => 'Fec. Fin',
    'txtCancelar' => 'Cancelar',
    'txtGuardar' => 'Save',
    'txtVerDetalles' => 'Ver detalles',
    'txtCategorias' => 'Categorias',
    'txtEliminar' => 'Eliminar',
    'txtConfirmarEliminar' => 'Al eliminar el registro se eliminara definitivamente todo registro relacionado con el, si no esta seguro de hacerlo puede deshabilitarlo desde la opcion editar. <div class="mt-2">¿Estas seguro de eliminar el registro? </div>',
    //menu
    'txtPerfil' => 'Perfil',
    'txtSalir' => 'Cerrar sesión',
    'txtMostrarNotificaciones' => 'Mostrar más notificaciones',


    //titulos tablas
    'txtTituloLibrosTabla' => array('Fecha','titulo','descripcion','<div style="text-align:center"><a class="btn btn-primary btn-sm"  onclick="opciones('."'/home/libros/formcrear'".')">Add</a></div>'),


    'txtTituloCategoriasTabla' => array('Nombre','descripcion','<div style="text-align:center"><a class="btn btn-primary btn-sm"  onclick="opciones('."'/home/categorias/formcrear'".')">Add</a></div>'),



    //modulo usuarios
    'txtTablaUsuarios' => array('Username','Name','Lastname','Email address','Phone  Number','Status','<div style="text-align:center"><a class="btn btn-primary btn-sm accionCrear" >Add</a></div>'),
    'txtTablaPlan' => array('Name','Cost','Status','<div style="text-align:center"><a class="btn btn-primary btn-sm accionCrear" >Add</a></div>'),
    
    'txtTablaRecipes' => array('Name','Kind of food','Category','Status','<div style="text-align:center"><a class="btn btn-primary btn-sm accionCrear" >Add</a></div>'),
    
    'txtTablaSales' => array('Stripe ID','Customer','Plan','Cost','Status','Start date','Ending date','<div style="text-align:center" hidden><a class="btn btn-primary btn-sm accionCrear" >Add</a></div>'),

    //menuAdmin
    'txtMenuAdmin' => array(array('ico'=>'home','nom'=>'Dashboard','url'=>'/user/admin'),array('ico'=>'users','nom'=>'Customers','url'=>'/user/admin/customers'),array('ico'=>'box','nom'=>'Diets','url'=>'/user/admin/diets'),array('ico'=>'book','nom'=>'Recipes','url'=>'/user/admin/recipes'),array('ico'=>'box','nom'=>'Sales','url'=>'/user/admin/sales'),array('ico'=>'tool','nom'=>'Config','url'=>'/user/admin/config')),




];

?>
