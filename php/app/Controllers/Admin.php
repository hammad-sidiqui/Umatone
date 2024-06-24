<?php namespace App\Controllers;

use CodeIgniter\Controllers;
use CodeIgniter\Libraries;


require_once('vendor/autoload.php');

use \PhpOffice\PhpSpreadsheet\IOFactory;
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\Style\Alignment;
use \PhpOffice\PhpSpreadsheet\Style\Fill;




class Admin extends BaseController
{


    public function __construct()
    {
        $this->session = session();
        
        
        if($this->session->get('logUmatone')==null){
                header("Location: ".base_url('login/admin'));
		        exit();
        }else{
            $datos = $this->session->get('logUmatone');
            if(!isset($datos['data'][0]['perfil'])){
                header("Location: ".base_url('login/admin'));
		        exit();
            }
        }
    

        date_default_timezone_set('Europe/Bucharest');
        $this->forma1 = date('Y-m-d H:i');
        $this->forma2 = date("Y-m-d");
        $this->forma3 = date("Y");
        
    }

    public function listarTablas($mas="")
    {

    	$indexp=1;
    	$buscar="";
    	$totalRegistros=0;
    	$porPagina= 12;

        if (isset($_POST["pag"])) {
            $indexp=$_POST["pag"];
        }
        if (isset($_POST["pal"])) {
            $buscar=$_POST["pal"];
        }
    	  if (isset($_POST["numero"])) {
            $porPagina=$_POST["numero"];
        }

    	 $validarBotones=array('vacio','vacio','vacio','vacio','vacio','vacio');

    	 $iniciar = ($indexp - 1) * $porPagina;

    	 //$_POST["tipo_tabla"]="usuarios";
    	 
    	 
    	 if ($_POST["tipo_tabla"]=="inicio") {
             
                $filtro = "";
                if($buscar!=""){
                     $filtro = "where (nombre like '%$buscar%' or correo like '%$buscar%')  ";
                }
                 
                $filtro.= "order by nombre asc";

                $botones2[0][0]['vacio']['icon']="fa fa-pencil accionEditar";
                $botones2[0][0]['vacio']['color']="#495057";

                $botones2[0][1]['vacio']['icon']="fa fa-trash accionEliminar";
                $botones2[0][1]['vacio']['color']="#FF4141";

                $botones2[0][0]['data']=array("cliente_id","nombre","apellido");

                $campos= array("usuario","nombre","apellido","correo","telefono","estado");

                $datos = [
                    'tabla'  => 'clientes',
                    'buscar' => $filtro,
                    'pagina' => $iniciar,
                    'limite' => $porPagina,
                    'select' => '',
                ];
                $consulta = $this->table($datos);

                $totalRegistros=$consulta->data->total;

                $atributos['tabla'] = 'usuarios';

                $atributos['style']="-1/padding-top:8px;padding-bottom:8px;max-width:250px;white-space:nowrap;overflow:hidden;text-overflow: ellipsis";

                $paginas =ceil($totalRegistros / $porPagina);

                $datosr=$this->paginacion($consulta->data->consulta,$campos,$botones2,$validarBotones,$paginas,$indexp,$atributos);

         }


         if ($_POST["tipo_tabla"]=="usuarios") {
             
                $filtro = "";
                if($buscar!=""){
                     $filtro = "where (nombre like '%$buscar%' or correo like '%$buscar%')  ";
                }
                 
                $filtro.= "order by nombre asc";
                
             
                $botones2[0][0]['vacio']['icon']="fa fa-pencil accionEditar";
                $botones2[0][0]['vacio']['color']="#495057";

                $botones2[0][1]['vacio']['icon']="fa fa-trash accionEliminar";
                $botones2[0][1]['vacio']['color']="#FF4141";

                $botones2[0][0]['data']=array("usuario_id","nombre","apellido");

                $campos= array("usuario","nombre","apellido","correo","telefono","estado");

                $datos = [
                    'tabla'  => 'usuarios',
                    'buscar' => $filtro,
                    'pagina' => $iniciar,
                    'limite' => $porPagina,
                    'select' => '',
                ];
                $consulta = $this->table($datos);

                $totalRegistros=$consulta->data->total;

                $atributos['tabla'] = 'usuarios';

                $atributos['style']="-1/padding-top:8px;padding-bottom:8px;max-width:250px;white-space:nowrap;overflow:hidden;text-overflow: ellipsis";

                $paginas =ceil($totalRegistros / $porPagina);

                $datosr=$this->paginacion($consulta->data->consulta,$campos,$botones2,$validarBotones,$paginas,$indexp,$atributos);

         }

         if ($_POST["tipo_tabla"]=="clientes") {
             
                $filtro = "";
                if($buscar!=""){
                     $filtro = "where (nombre like '%$buscar%' or correo like '%$buscar%')  ";
                }
                 
                $filtro.= "order by nombre asc";

                $botones2[0][0]['vacio']['icon']="fa fa-pencil accionEditar";
                $botones2[0][0]['vacio']['color']="#495057";

                $botones2[0][1]['vacio']['icon']="fa fa-trash accionEliminar";
                $botones2[0][1]['vacio']['color']="#FF4141";

                $botones2[0][0]['data']=array("cliente_id","nombre","apellido");

                $campos= array("usuario","nombre","apellido","correo","telefono","estado");

                $datos = [
                    'tabla'  => 'clientes',
                    'buscar' => $filtro,
                    'pagina' => $iniciar,
                    'limite' => $porPagina,
                    'select' => '',
                ];
                $consulta = $this->table($datos);

                $totalRegistros=$consulta->data->total;

                $atributos['tabla'] = 'usuarios';

                $atributos['style']="-1/padding-top:8px;padding-bottom:8px;max-width:250px;white-space:nowrap;overflow:hidden;text-overflow: ellipsis";

                $paginas =ceil($totalRegistros / $porPagina);

                $datosr=$this->paginacion($consulta->data->consulta,$campos,$botones2,$validarBotones,$paginas,$indexp,$atributos);

         }
         
         if ($_POST["tipo_tabla"]=="plan") {
             
                $filtro = "";
                if($buscar!=""){
                     $filtro = "where nombre like '%$buscar%'";
                }
                 
                $filtro.= "order by nombre asc";

                $botones2[0][0]['vacio']['icon']="fa fa-pencil accionEditar";
                $botones2[0][0]['vacio']['color']="#495057";

                $botones2[0][1]['vacio']['icon']="fa fa-trash accionEliminar";
                $botones2[0][1]['vacio']['color']="#FF4141";

                $botones2[0][0]['data']=array("plan_id","nombre","descripcion");

                $campos= array("nombre","valor","estado");

                $datos = [
                    'tabla'  => 'plan',
                    'buscar' => $filtro,
                    'pagina' => $iniciar,
                    'limite' => $porPagina,
                    'select' => '',
                ];
                $consulta = $this->table($datos);

                $totalRegistros=$consulta->data->total;

                $atributos['tabla'] = 'usuarios';

                $atributos['style']="-1/padding-top:8px;padding-bottom:8px;max-width:250px;white-space:nowrap;overflow:hidden;text-overflow: ellipsis";

                $paginas =ceil($totalRegistros / $porPagina);

                $datosr=$this->paginacion($consulta->data->consulta,$campos,$botones2,$validarBotones,$paginas,$indexp,$atributos);

         }
         
         if ($_POST["tipo_tabla"]=="recetas") {
             
                $filtro = "";
                if($buscar!=""){
                     $filtro = "where nombre like '%$buscar%'";
                }
                 
                $filtro.= "order by nombre asc";
             
                
                $botones2[0][0]['vacio']['icon']="fa fa-pencil accionEditar";
                $botones2[0][0]['vacio']['color']="#495057";

                $botones2[0][1]['vacio']['icon']="fa fa-trash accionEliminar";
                $botones2[0][1]['vacio']['color']="#FF4141";

                $botones2[0][0]['data']=array("receta_id","nombre","descripcion");

                $campos= array("nombre","categoria","tipo_comida","estado");

                $datos = [
                    'tabla'  => 'recetas',
                    'buscar' => $filtro,
                    'pagina' => $iniciar,
                    'limite' => $porPagina,
                    'select' => '',
                ];
                $consulta = $this->table($datos);

                $totalRegistros=$consulta->data->total;

                $atributos['tabla'] = 'usuarios';

                $atributos['style']="-1/padding-top:8px;padding-bottom:8px;max-width:250px;white-space:nowrap;overflow:hidden;text-overflow: ellipsis";

                $paginas =ceil($totalRegistros / $porPagina);

                $datosr=$this->paginacion($consulta->data->consulta,$campos,$botones2,$validarBotones,$paginas,$indexp,$atributos);

         }
         
         if ($_POST["tipo_tabla"]=="ventas") {
                
                $botones2[0][0]['vacio']['icon']="fa fa-eye accionEditar";
                $botones2[0][0]['vacio']['color']="#495057";

                $botones2[0][1]['vacio']['icon']="fa fa-trash accionEliminar  d-none";
                $botones2[0][1]['vacio']['color']="#FF4141";

                $botones2[0][0]['data']=array("quiz_id","cliente_id","cliente_id");

                $campos= array("referencia_pago","cliente_id","plan","cost","estado","fec_inicio","fec_fin");

                $datos = [
                    'tabla'  => 'cliente_plan',
                    'buscar' => $buscar,
                    'pagina' => $iniciar,
                    'limite' => $porPagina,
                    'select' => ',(costo/100) as cost,(select correo from clientes where cliente_id=dd.cliente_id limit 1) as ema,(select nombre from plan where plan_id=dd.plan_id limit 1) as plan',
                ];
                $consulta = $this->table($datos);

                $totalRegistros=$consulta->data->total;

                $atributos['tabla'] = 'usuarios';

                $atributos['style']="-1/padding-top:8px;padding-bottom:8px;max-width:250px;white-space:nowrap;overflow:hidden;text-overflow: ellipsis";

                $paginas =ceil($totalRegistros / $porPagina);

                $datosr=$this->paginacion($consulta->data->consulta,$campos,$botones2,$validarBotones,$paginas,$indexp,$atributos);

         }
         
         echo json_encode($datosr);

    }

	public function index($function = "")
	{

	    if($function == ""){
	        $datos['activo']   ="0";

	        $datos['menu']      =lang('idioma.txtMenuAdmin');
	        $datos['titulo']    ="Dashboard";


            $datos['urlCrear']  = base_url('admin/events/form');
            $datos['urlEditar'] =base_url('admin/events/form');
            $datos['urlEliminar']=base_url('admin/events/eliminar');
            
            
            
            $consulta = [
                    'tabla' => 'clientes',
                    'funcion' => 'find',
                    'select' => "(select count(cliente_id) from clientes where estado like 'enabled' limit 1) as cli,(select count(cliente_id) from clientes where estado like 'disabled' limit 1) as clidis,(select count(plan_id) from plan) as plan,(select count(receta_id) from recetas) as rec,(select sum(costo) from cliente_plan where fec_fin>=now() ) as gan",
                    'datos' => null,
                    'condicion' => "1 limit 1",
                    'pagina' => null,
                    'limite' => null,
                ];
            $datos['contador']  = $this->Consultar($consulta);
            
            
            $datos['paginacion']=base_url("admin/listarTablas");
            $datos['tipoTabla']="inicio";

            $datos['tituloTabla']=lang('idioma.txtTablaUsuarios');
          

            $datos['contenido'] = view('admin/inicio',$datos);
            $datos['contenido'].=view('admin/tabla',$datos);
            
            
    	    //vistas
    		return view('admin/body',$datos);
	    }
	}

    public function profile($function = "",$idd=0)
    {
        
        $usuario = $this->session->get('logUmatone');
        $idd = $usuario['data'][0]['usuario_id'];
        
        $datos['activo']= "0";
        $datos['menu']  = lang('idioma.txtMenuAdmin');
        
        $datos['urlCancelar']  = base_url('admin/users');
        $datos['urlForm']  = base_url('admin/profile/form/'.$idd);

        if($function == "form"){
            $encrypt = \Config\Services::encrypter();

            if (isset($_POST['nom'],$_POST['ape'])) {

                    $datos = [
                        'tabla' => 'usuarios',
                        'tabla_id' => 'usuario_id',
                        'funcion' => 'update',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'apellido'          => $_POST['ape'],
                                    'correo'            => $_POST['ema'],
                                    'telefono'          => $_POST['tel'],
                                    'usuario'           => $_POST['usu'],
                                    'clave'             => base64_encode($encrypt->encrypt($_POST['cla'])),
                                    'estado'            => $_POST['est'],
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => "usuario_id = $idd",
                    ];
                    $consulta = $this->query($datos);
                    
                    $this->session->set('notificacion','<script>toastr.success("Great, the profile was updated.");</script>');
                    
                    echo $idd;
                    exit();

            }else{

                $consulta = [
                    'tabla' => 'usuarios',
                    'tabla_id' => 'usuarios_id',
                    'funcion' => 'find',
                    'datos' => null,
                    'condicion' => "usuario_id = $idd",
                ];
                $datos['cliente'] = $this->query($consulta);
                
                $dataForm = [
                    'tabla' => 'contenido',
                    'tabla_id' => 'contenido_id',
                    'funcion' => 'find',
                    'datos' => null,
                    'condicion' => "registro_id = $idd and tabla like 'usuarios'",
                ];
                $datos['clienteImg'] = $this->query($dataForm);

                $datos['titulo']    = 'Profile';


                $datos['contenido']=view('admin/form/usuario',$datos);

                //vistas
                return view('admin/body',$datos);
            }

        }

    }

    public function customers($function = "",$idd=0)
    {

        $datos['activo']    = "1";
        $datos['menu']      = lang('idioma.txtMenuAdmin');

        $datos['urlCrear']     = base_url('admin/customers/form');
        $datos['urlEditar']    = base_url('admin/customers/form');
        $datos['urlEliminar']  = base_url('admin/customers/eliminar');
        $datos['urlCancelar']  = base_url('admin/customers');
        $datos['urlForm']      = base_url('admin/customers/form/'.$idd);

        if($function == ""){

            $datos['titulo']    = 'Customers';

            $datos['paginacion']=base_url("admin/listarTablas");
            $datos['tipoTabla']="clientes";

            $datos['tituloTabla']=lang('idioma.txtTablaUsuarios');
            $datos['contenido']=view('admin/tabla',$datos);

            //vistas
            return view('admin/body',$datos);
        }

        if($function == "form"){
            $encrypt = \Config\Services::encrypter();

            if (isset($_POST['nom'],$_POST['ape'])) {

                if ($idd==0) {
                    $datos = [
                        'tabla' => 'clientes',
                        'tabla_id' => 'cliente_id',
                        'funcion' => 'insert',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'apellido'          => $_POST['ape'],
                                    'correo'            => $_POST['ema'],
                                    'telefono'          => $_POST['tel'],
                                    'usuario'           => $_POST['usu'],
                                    'clave'             => base64_encode($encrypt->encrypt($_POST['cla'])),
                                    'estado'            => $_POST['est'],
                                    'fec_creacion'      => $this->forma1,
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => null,
                    ];
                    $consulta = $this->query($datos);
                    
                    $this->session->set('notificacion','<script>toastr.success("Great, the Customer was created.");</script>');
                    
                    echo $consulta->data;

                }else{
                    $datos = [
                        'tabla' => 'clientes',
                        'tabla_id' => 'cliente_id',
                        'funcion' => 'update',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'apellido'          => $_POST['ape'],
                                    'correo'            => $_POST['ema'],
                                    'telefono'          => $_POST['tel'],
                                    'usuario'           => $_POST['usu'],
                                    'clave'             => base64_encode($encrypt->encrypt($_POST['cla'])),
                                    'estado'            => $_POST['est'],
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => "cliente_id = $idd",
                    ];
                    $consulta = $this->query($datos);
                    
                    $this->session->set('notificacion','<script>toastr.success("Great, the Customer was updated.");</script>');
                    
                    
                    echo $idd;
                }

                exit();
            }else{

                if ($idd!=0) {
                    $consulta = [
                        'tabla' => 'clientes',
                        'tabla_id' => 'cliente_id',
                        'funcion' => 'find',
                        'datos' => null,
                        'condicion' => "cliente_id = $idd",
                    ];
                    $datos['cliente'] = $this->query($consulta);
                    
                    $dataForm = [
                        'tabla' => 'contenido',
                        'tabla_id' => 'contenido_id',
                        'funcion' => 'find',
                        'datos' => null,
                        'condicion' => "registro_id = $idd and tabla like 'clientes'",
                    ];
                    $datos['clienteImg'] = $this->query($dataForm);
                    
                }

                $datos['titulo']    = 'User';

                $datos['contenido']=view('admin/form/cliente',$datos);

                //vistas
                return view('admin/body',$datos);
            }

        }

        if($function == "eliminar"){
            $datos = [
                'tabla' => 'clientes',
                'tabla_id' => 'cliente_id',
                'funcion' => 'delete',
                'datos' => null,
                'condicion' => "cliente_id = $idd",
                'registro_id' => $idd,
            ];
            $consulta = $this->query($datos);
            
            
        }

    }
    
    public function diets($function = "",$idd=0)
    {

        $usuario = $this->session->get('logUmatone');
        $idu = $usuario['data'][0]['usuario_id'];
        
        $datos['activo']    = "3";
        $datos['menu']      = lang('idioma.txtMenuAdmin');

        $datos['urlCrear']     = base_url('admin/diets/form');
        $datos['urlEditar']    = base_url('admin/diets/form');
        $datos['urlEliminar']  = base_url('admin/diets/eliminar');
        $datos['urlCancelar']  = base_url('admin/diets');
        $datos['urlForm']      = base_url('admin/diets/form/'.$idd);

        if($function == ""){

            $datos['titulo']    = 'Diets';

            $datos['paginacion']=base_url("admin/listarTablas");
            $datos['tipoTabla']="plan";

            $datos['tituloTabla']=lang('idioma.txtTablaPlan');
            $datos['contenido']=view('admin/tabla',$datos);

            //vistas
            return view('admin/body',$datos);
        }

        if($function == "form"){
            $encrypt = \Config\Services::encrypter();

            if (isset($_POST['nom'],$_POST['des'])) {

                if ($idd==0) {
                    $datos = [
                        'tabla' => 'plan',
                        'tabla_id' => 'plan_id',
                        'funcion' => 'insert',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'categoria'         => $_POST['tip'],
                                    'descripcion'       => $_POST['des'],
                                    'valor'             => $_POST['cos'],
                                    'estado'            => $_POST['est'],
                                    'creado_id'         => $idu,
                                    'fec_creacion'      => $this->forma1,
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => null,
                    ];
                    $consulta = $this->query($datos);
                    
                    if(isset($_POST['rutina'])){
                        $rutina = json_decode($_POST['rutina']);
                        for($i=0;$i<count($rutina);$i++){
                            $dia = $i+1;
                            
                            $datos = [
                                'tabla' => 'plan_receta',
                                'tabla_id' => 'plan_receta_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'plan_id'         => $consulta->data,
                                            'dia'             => $dia,
                                            'breakfast'       => $rutina[$i][1],
                                            'lunch'           => $rutina[$i][2],
                                            'snack'           => $rutina[$i][3],
                                            'dinner'          => $rutina[$i][4],
                                            'mensaje'         => $rutina[$i][5],
                                            'creado_id'       => $idu,
                                            'fec_creacion'    => $this->forma1,
                                            'fec_modificacion'=> $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($datos);
                            
                        }
                    }
                    
                    if(isset($_POST['compra'])){
                        $compra= json_decode($_POST['compra']);
                        for($i=0;$i<count($compra);$i++){
                            $datos = [
                                'tabla' => 'lista_compras',
                                'tabla_id' => 'lista_compras_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'plan_id'         => $consulta->data,
                                            'descripcion'       => $compra[$i][1],
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($datos);
                            
                        }
                    }
                    
                    $this->session->set('notificacion','<script>toastr.success("Great, the Diet was created.");</script>');
                    
                    echo $consulta->data;

                }else{
                    $datos = [
                        'tabla' => 'plan',
                        'tabla_id' => 'plan_id',
                        'funcion' => 'update',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'categoria'         => $_POST['tip'],
                                    'descripcion'       => $_POST['des'],
                                    'valor'             => $_POST['cos'],
                                    'estado'            => $_POST['est'],
                                    'creado_id'         => $idu,
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => "plan_id = $idd",
                    ];
                    $consulta = $this->query($datos);
                    
                    
                    if(isset($_POST['rutina'])){
                        $rutina = json_decode($_POST['rutina']);
                        for($i=0;$i<count($rutina);$i++){
                            $dia = $i+1;
                            if($rutina[$i][0]==0){
                                $datos = [
                                    'tabla' => 'plan_receta',
                                    'tabla_id' => 'plan_receta_id',
                                    'funcion' => 'insert',
                                    'datos' => [
                                                'plan_id'         => $idd,
                                                'dia'             => $dia,
                                                'breakfast'       => $rutina[$i][1],
                                                'lunch'           => $rutina[$i][2],
                                                'snack'           => $rutina[$i][3],
                                                'dinner'          => $rutina[$i][4],
                                                'mensaje'         => $rutina[$i][5],
                                                'creado_id'       => $idu,
                                                'fec_creacion'    => $this->forma1,
                                                'fec_modificacion'=> $this->forma1,
                                            ],
                                    'condicion' => null,
                                ];
                                $consulta2 = $this->query($datos);
                            }else{
                                $idr = $rutina[$i][0];
                                $datos = [
                                    'tabla' => 'plan_receta',
                                    'tabla_id' => 'plan_receta_id',
                                    'funcion' => 'update',
                                    'datos' => [
                                                'dia'             => $dia,
                                                'breakfast'       => $rutina[$i][1],
                                                'lunch'           => $rutina[$i][2],
                                                'snack'           => $rutina[$i][3],
                                                'dinner'          => $rutina[$i][4],
                                                'mensaje'         => $rutina[$i][5],
                                                'creado_id'       => $idu,
                                                'fec_modificacion'=> $this->forma1,
                                            ],
                                    'condicion' => "plan_receta_id=$idr",
                                ];
                                $consulta2 = $this->query($datos);
                            }
                                
                            
                        }
                    }
                    
                    
                    if(isset($_POST['compra'])){
                        $compra = json_decode($_POST['compra']);
                        for($i=0;$i<count($compra);$i++){
                            $dia = $i+1;
                            if($compra[$i][0]==0){
                                $datos = [
                                    'tabla' => 'lista_compras',
                                    'tabla_id' => 'lista_compras_id',
                                    'funcion' => 'insert',
                                    'datos' => [
                                                'plan_id'         => $idd,
                                                'descripcion'     => $compra[$i][1],
                                            ],
                                    'condicion' => null,
                                ];
                                $consulta2 = $this->query($datos);
                            }else{
                                $idr = $compra[$i][0];
                                $datos = [
                                    'tabla' => 'lista_compras',
                                    'tabla_id' => 'lista_compras_id',
                                    'funcion' => 'update',
                                    'datos' => [
                                                'descripcion'       => $compra[$i][1],
                                            ],
                                    'condicion' => "lista_compras_id=$idr",
                                ];
                                $consulta2 = $this->query($datos);
                            }
                                
                            
                        }
                    }
                    
                    $this->session->set('notificacion','<script>toastr.success("Great, the Diet was updated.");</script>');
                    
                    echo $idd;
                }

                exit();
            }else{

                if ($idd!=0) {
                    $consulta = [
                        'tabla' => 'plan',
                        'tabla_id' => 'plan_id',
                        'funcion' => 'find',
                        'datos' => null,
                        'condicion' => "plan_id = $idd",
                    ];
                    $datos['cliente'] = $this->query($consulta);
                    
                    $dataForm = [
                        'tabla' => 'contenido',
                        'tabla_id' => 'contenido_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "registro_id = $idd and tabla like 'plan'",
                    ];
                    $datos['clienteImg'] = $this->query($dataForm);
                    
                    $dataForm = [
                        'tabla' => 'plan_receta',
                        'tabla_id' => 'plan_receta_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "plan_id = $idd order by dia asc",
                    ];
                    $datos['rutina'] = $this->query($dataForm);
                    
                    
                    $dataForm = [
                        'tabla' => 'lista_compras',
                        'tabla_id' => 'lista_compras_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "plan_id = $idd",
                    ];
                    $datos['compra'] = $this->query($dataForm);
                    
                }
                
                $consulta = [
                    'tabla' => 'recetas',
                    'tabla_id' => 'receta_id',
                    'funcion' => 'findAll',
                    'datos' => null,
                    'condicion' => "categoria = 'Breakfast' ",
                ];
                $datos['breakfast'] = $this->query($consulta);
                
                $consulta = [
                    'tabla' => 'recetas',
                    'tabla_id' => 'receta_id',
                    'funcion' => 'findAll',
                    'datos' => null,
                    'condicion' => "categoria = 'Lunch' ",
                ];
                $datos['lunch'] = $this->query($consulta);
                
                $consulta = [
                    'tabla' => 'recetas',
                    'tabla_id' => 'receta_id',
                    'funcion' => 'findAll',
                    'datos' => null,
                    'condicion' => "categoria = 'Snack' ",
                ];
                $datos['snack'] = $this->query($consulta);
                
                $consulta = [
                    'tabla' => 'recetas',
                    'tabla_id' => 'receta_id',
                    'funcion' => 'findAll',
                    'datos' => null,
                    'condicion' => "categoria = 'Dinner' ",
                ];
                $datos['dinner'] = $this->query($consulta);
                
                
                

                $datos['titulo']    = 'Diet';

                $datos['contenido']=view('admin/form/plan',$datos);

                //vistas
                return view('admin/body',$datos);
            }

        }

        if($function == "eliminar"){
            $datos = [
                'tabla' => 'plan',
                'tabla_id' => 'plan_id',
                'funcion' => 'delete',
                'datos' => null,
                'condicion' => "plan_id = $idd",
                'registro_id' => $idd,
            ];
            $consulta = $this->query($datos);
        }
        
        if($function == "eliminarPlanReceta"){
            $datos = [
                'tabla' => 'plan_receta',
                'tabla_id' => 'plan_receta_id',
                'funcion' => 'delete',
                'datos' => null,
                'condicion' => "plan_receta_id = $idd",
            ];
            $consulta = $this->query($datos);
        }
        
        if($function == "eliminarCompra"){
            
            $datos = [
                'tabla' => 'lista_compras',
                'tabla_id' => 'lista_compras_id',
                'funcion' => 'delete',
                'datos' => null,
                'condicion' => "lista_compras_id = $idd",
            ];
            $consulta = $this->query($datos);
            
        }
        
        

    }
    
    public function recipes($function = "",$idd=0)
    {

        $usuario = $this->session->get('logUmatone');
        $idu = $usuario['data'][0]['usuario_id'];
        
        $datos['activo']    = "3";
        $datos['menu']      = lang('idioma.txtMenuAdmin');

        $datos['urlCrear']     = base_url('admin/recipes/form');
        $datos['urlEditar']    = base_url('admin/recipes/form');
        $datos['urlEliminar']  = base_url('admin/recipes/eliminar');
        $datos['urlCancelar']  = base_url('admin/recipes');
        $datos['urlForm']      = base_url('admin/recipes/form/'.$idd);

        if($function == ""){
            
            
            $datos['importar']    = true;
            
            $datos['titulo']    = 'Recipes';

            $datos['paginacion']=base_url("admin/listarTablas");
            $datos['tipoTabla']="recetas";

            $datos['tituloTabla']=lang('idioma.txtTablaRecipes');
            $datos['contenido']=view('admin/tabla',$datos);

            //vistas
            return view('admin/body',$datos);
        }

        if($function == "form"){
            $encrypt = \Config\Services::encrypter();

            if (isset($_POST['nom'],$_POST['des'])) {

                if ($idd==0) {
                    
                    $datos = [
                        'tabla' => 'recetas',
                        'tabla_id' => 'receta_id',
                        'funcion' => 'insert',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'descripcion'       => $_POST['des'],
                                    'tiempo_preparacion'=> $_POST['pre1'].":".$_POST['pre2'],
                                    'tiempo_coccion'    => $_POST['coo1'].":".$_POST['coo2'],
                                    'porciones'         => $_POST['por'],
                                    'categoria'         => $_POST['cat'],
                                    'tipo_comida'       => $_POST['tip'],
                                    'estado'            => $_POST['est'],
                                    'creado_id'         => $idu,
                                    'fec_creacion'      => $this->forma1,
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => null,
                    ];
                    $consulta = $this->query($datos);
                    if(isset($_POST['ingredientes'])){
                        $ingredientes = json_decode($_POST['ingredientes']);
                        for($i=0;$i<count($ingredientes);$i++){
                            $datos = [
                                'tabla' => 'ingredientes',
                                'tabla_id' => 'ingrediente_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'         => $consulta->data,
                                            'nombre'            => $ingredientes[$i][1],
                                            'medida'            => $ingredientes[$i][2],
                                            'cantidad'          => $ingredientes[$i][3],
                                            'creado_id'         => $idu,
                                            'fec_creacion'      => $this->forma1,
                                            'fec_modificacion'  => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($datos);
                        }
                    }
                    
                    if(isset($_POST['instrucciones'])){
                        $instrucciones = json_decode($_POST['instrucciones']);
                        for($i=0;$i<count($instrucciones);$i++){
                            $datos = [
                                'tabla' => 'instrucciones',
                                'tabla_id' => 'instruccion_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'         => $consulta->data,
                                            'descripcion'       => $instrucciones[$i][1],
                                            'creado_id'         => $idu,
                                            'fec_creacion'      => $this->forma1,
                                            'fec_modificacion'  => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($datos);
                        }
                    }
                    
                    if(isset($_POST['nutricion'])){
                        $nutricion = json_decode($_POST['nutricion']);
                        for($i=0;$i<count($nutricion);$i++){
                            $datos = [
                                'tabla' => 'nutricion',
                                'tabla_id' => 'nutricion_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'         => $consulta->data,
                                            'descripcion'       => $nutricion[$i][1],
                                            'creado_id'         => $idu,
                                            'fec_creacion'      => $this->forma1,
                                            'fec_modificacion'  => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($datos);
                        }
                    }
                    
                    $this->session->set('notificacion','<script>toastr.success("Great, the Recipe was created.");</script>');
                    
                    echo $consulta->data;

                }else{
                    $datos = [
                        'tabla' => 'recetas',
                        'tabla_id' => 'receta_id',
                        'funcion' => 'update',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'descripcion'       => $_POST['des'],
                                    'tiempo_preparacion'=> $_POST['pre1'].":".$_POST['pre2'],
                                    'tiempo_coccion'    => $_POST['coo1'].":".$_POST['coo2'],
                                    'porciones'         => $_POST['por'],
                                    'categoria'         => $_POST['cat'],
                                    'tipo_comida'       => $_POST['tip'],
                                    'estado'            => $_POST['est'],
                                    'creado_id'         => $idu,
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => "receta_id = $idd",
                    ];
                    $consulta = $this->query($datos);
                    
                    if(isset($_POST['ingredientes'])){
                        $ingredientes = json_decode($_POST['ingredientes']);
                        for($i=0;$i<count($ingredientes);$i++){
                            
                            if($ingredientes[$i][0]==0){
                                $datos = [
                                    'tabla' => 'ingredientes',
                                    'tabla_id' => 'ingrediente_id',
                                    'funcion' => 'insert',
                                    'datos' => [
                                                'receta_id'         => $idd,
                                                'nombre'            => $ingredientes[$i][1],
                                                'medida'            => $ingredientes[$i][2],
                                                'cantidad'          => $ingredientes[$i][3],
                                                'creado_id'         => $idu,
                                                'fec_creacion'      => $this->forma1,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => null,
                                ];
                                $consulta2 = $this->query($datos);
                            }else{
                                $iddin=$ingredientes[$i][0];
                                $datos = [
                                    'tabla' => 'ingredientes',
                                    'tabla_id' => 'ingrediente_id',
                                    'funcion' => 'update',
                                    'datos' => [
                                                'nombre'            => $ingredientes[$i][1],
                                                'medida'            => $ingredientes[$i][2],
                                                'cantidad'          => $ingredientes[$i][3],
                                                'creado_id'         => $idu,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => "ingrediente_id=$iddin",
                                ];
                                $consulta2 = $this->query($datos);
                            }
                                
                        }
                    }
                    
                    if(isset($_POST['instrucciones'])){
                        $instrucciones = json_decode($_POST['instrucciones']);
                        for($i=0;$i<count($instrucciones);$i++){
                            
                            if($instrucciones[$i][0]==0){
                                $datos = [
                                    'tabla' => 'instrucciones',
                                    'tabla_id' => 'instruccion_id',
                                    'funcion' => 'insert',
                                    'datos' => [
                                                'receta_id'         => $idd,
                                                'descripcion'       => $instrucciones[$i][1],
                                                'creado_id'         => $idu,
                                                'fec_creacion'      => $this->forma1,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => null,
                                ];
                                $consulta2 = $this->query($datos);
                            }else{
                                $iddis=$instrucciones[$i][0];
                                $datos = [
                                    'tabla' => 'instrucciones',
                                    'tabla_id' => 'instruccion_id',
                                    'funcion' => 'update',
                                    'datos' => [
                                                'descripcion'       => $instrucciones[$i][1],
                                                'creado_id'         => $idu,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => "instruccion_id=$iddis",
                                ];
                                $consulta2 = $this->query($datos);
                            }
                        }
                    }
                    
                    if(isset($_POST['nutricion'])){
                        $nutricion = json_decode($_POST['nutricion']);
                        for($i=0;$i<count($nutricion);$i++){
                            
                            if($nutricion[$i][0]==0){
                                $datos = [
                                    'tabla' => 'nutricion',
                                    'tabla_id' => 'nutricion_id',
                                    'funcion' => 'insert',
                                    'datos' => [
                                                'receta_id'         => $idd,
                                                'descripcion'       => $nutricion[$i][1],
                                                'creado_id'         => $idu,
                                                'fec_creacion'      => $this->forma1,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => null,
                                ];
                                $consulta2 = $this->query($datos);
                            }else{
                                $iddis=$nutricion[$i][0];
                                $datos = [
                                    'tabla' => 'nutricion',
                                    'tabla_id' => 'nutricion_id',
                                    'funcion' => 'update',
                                    'datos' => [
                                                'descripcion'       => $nutricion[$i][1],
                                                'creado_id'         => $idu,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => "nutricion_id=$iddis",
                                ];
                                $consulta2 = $this->query($datos);
                            }
                        }
                    }
                    
                    $this->session->set('notificacion','<script>toastr.success("Great, the Recipe was updated.");</script>');
                    
                    echo $idd;
                }

                exit();
            }else{

                if ($idd!=0) {
                    $consulta = [
                        'tabla' => 'recetas',
                        'tabla_id' => 'receta_id',
                        'funcion' => 'find',
                        'datos' => null,
                        'condicion' => "receta_id = $idd",
                    ];
                    $datos['cliente'] = $this->query($consulta);
                    
                    $dataForm = [
                        'tabla' => 'contenido',
                        'tabla_id' => 'contenido_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "registro_id = $idd and tabla like 'recetas'",
                    ];
                    $datos['imagenes'] = $this->query($dataForm);
                    
                    $dataForm = [
                        'tabla' => 'ingredientes',
                        'tabla_id' => 'ingrediente_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "receta_id = $idd",
                    ];
                    $datos['ingredientes'] = $this->query($dataForm);
                    
                    
                    $dataForm = [
                        'tabla' => 'instrucciones',
                        'tabla_id' => 'instruccion_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "receta_id = $idd",
                    ];
                    $datos['instrucciones'] = $this->query($dataForm);
                    
                    
                    $dataForm = [
                        'tabla' => 'nutricion',
                        'tabla_id' => 'nutricion_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "receta_id = $idd",
                    ];
                    $datos['nutricion'] = $this->query($dataForm);
                    
                }

                $datos['titulo']    = 'Recipe';

                $datos['contenido']=view('admin/form/receta',$datos);

                //vistas
                return view('admin/body',$datos);
            }

        }

        if($function == "eliminar"){
            $datos = [
                'tabla' => 'recetas',
                'tabla_id' => 'receta_id',
                'funcion' => 'delete',
                'datos' => null,
                'condicion' => "receta_id = $idd",
                'registro_id' => $idd,
            ];
            $consulta = $this->query($datos);
        }
        
        if($function == "import"){
            $excel = json_decode(json_decode($_POST['excel']));
            
            $usuario = $this->session->get('logUmatone');
            $idu = $usuario['data'][0]['usuario_id'];
        
            foreach($excel as $key){
                
                if(!isset($key->name)){$key->name = "not title";}
                if(!isset($key->description)){$key->description = "";}
                if(!isset($key->pre_time)){$key->pre_time = 0;}
                if(!isset($key->Cooking_time)){$key->Cooking_time = 0;}
                if(!isset($key->server)){$key->name = 1;}
                if(!isset($key->category)){$key->category = "Snack";}
                if(!isset($key->food_type)){$key->food_type = "Normal";}
                if(!isset($key->Ingredients)){$key->Ingredients = "";}
                if(!isset($key->Instructions)){$key->Instructions = "";}
                if(!isset($key->Nutritional)){$key->Nutritional = "";}
                
                $datos = [
                    'tabla' => 'recetas',
                    'tabla_id' => 'receta_id',
                    'funcion' => 'insert',
                    'datos' => [
                                'nombre'                => $key->name,
                                'descripcion'           => $key->description,
                                'tiempo_preparacion'    => $key->pre_time,
                                'tiempo_coccion'        => $key->Cooking_time,
                                'porciones'             => $key->server,
                                'categoria'             => $key->category,
                                'tipo_comida'           => $key->food_type,
                                'estado'                => 'enabled',
                                'creado_id'             => $idu,
                                'fec_creacion'          => $this->forma1,
                                'fec_modificacion'      => $this->forma1,
                            ],
                    'condicion' => null,
                ];
                $consulta = $this->query($datos);
                
                if($consulta->code==200){
                    
                    if($key->Ingredients!=""){
                        $ingredientes = explode('&&',$key->Ingredients);
                        for($i=0;$i<count($ingredientes);$i++){
                            $consulta2 = [
                                'tabla' => 'ingredientes',
                                'tabla_id' => 'ingrediente_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'             => $consulta->data,
                                            'nombre'                => $ingredientes[$i],
                                            'medida'                => '',
                                            'cantidad'              => '',
                                            'creado_id'             => $idu,
                                            'fec_creacion'          => $this->forma1,
                                            'fec_modificacion'      => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($consulta2);
                        }
                    }
                        
                    if($key->Instructions!=""){
                        $instrucciones = explode('&&',$key->Instructions);
                        for($i=0;$i<count($instrucciones);$i++){
                            $consulta2 = [
                                'tabla' => 'instrucciones',
                                'tabla_id' => 'instruccion_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'             => $consulta->data,
                                            'descripcion'           => $instrucciones[$i],
                                            'creado_id'             => $idu,
                                            'fec_creacion'          => $this->forma1,
                                            'fec_modificacion'      => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($consulta2);
                        }
                    }
                        
                    if($key->Nutritional!=""){
                        $nutricion = explode('&&',$key->Nutritional);
                        for($i=0;$i<count($nutricion);$i++){
                            $consulta2 = [
                                'tabla' => 'nutricion',
                                'tabla_id' => 'nutricion_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'             => $consulta->data,
                                            'descripcion'           => $nutricion[$i],
                                            'creado_id'             => $idu,
                                            'fec_creacion'          => $this->forma1,
                                            'fec_modificacion'      => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($consulta2);
                        }
                    } 
                }
                print_r($consulta);
            }
            
        }

    }
    
    public function sales($function = "",$idd=0)
    {

        $usuario = $this->session->get('logUmatone');
        $idu = $usuario['data'][0]['usuario_id'];
        
        $datos['activo']    = "4";
        $datos['menu']      = lang('idioma.txtMenuAdmin');

        $datos['urlCrear']     = base_url('admin/sales/form');
        $datos['urlEditar']    = base_url('admin/sales/form2');
        $datos['urlEliminar']  = base_url('admin/sales/eliminar');
        $datos['urlCancelar']  = base_url('admin/sales');
        $datos['urlForm']      = base_url('admin/sales/form/'.$idd);

        if($function == ""){
            
            
            $datos['titulo']    = 'Sales';

            $datos['paginacion']=base_url("admin/listarTablas");
            $datos['tipoTabla']="ventas";

            $datos['tituloTabla']=lang('idioma.txtTablaSales');
            $datos['contenido']=view('admin/tabla',$datos);

            //vistas
            return view('admin/body',$datos);
        }
        
        
        
        if($function == "form2"){
            
            
            $consulta = [
                    'tabla' => 'quiz',
                    'funcion' => 'find',
                    'select' => "",
                    'datos' => null,
                    'condicion' => "quiz_id=$idd",
                    'pagina' => null,
                    'limite' => null,
                ];
            $consulta  = $this->Consultar($consulta);
    
    
            $plan=$consulta['data'][0]['plan_recomendado'];
            
            $consulta2 = [
                'tabla' => 'plan',
                'funcion' => 'findAll',
                'select' => null,
                'datos' => null,
                'condicion' => "plan_id='$plan' ",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta2 = $this->Consultar($consulta2);
            
            
            
            $datos['dato1'] = $consulta['data'][0]['peso'];
            $datos['dato2'] = $consulta['data'][0]['genero'];
            $datos['dato3'] = $consulta['data'][0]['check_peso_deseado'];
            $datos['dato4'] = $consulta['data'][0]['peso_deseado'];
            $datos['dato5'] = $consulta['data'][0]['check_medidas'];
            $datos['dato6'] = $consulta['data'][0]['edad'];
            $datos['dato7'] = $consulta['data'][0]['altura'];
            $datos['dato8'] = $consulta['data'][0]['anchura'];
            $datos['dato9'] = $consulta['data'][0]['peso'];
            $datos['dato10'] = $consulta['data'][0]['tipo_cuerpo'];
            $datos['dato11'] = $consulta['data'][0]['rutina'];
            $datos['dato12'] =$consulta['data'][0]['habito'];
            $datos['dato13'] = $consulta['data'][0]['ejercicio'];
            $datos['dato14'] = $consulta['data'][0]['energia'];
            $datos['dato15'] = $consulta['data'][0]['horas_de_sueño'];
            $datos['dato16'] = $consulta['data'][0]['restriccion_alergia'];
            $datos['dato17'] = $consulta['data'][0]['verduras'];
            $datos['dato18'] =  $consulta['data'][0]['carnes'];
            $datos['dato19'] = $consulta2['data'][0]['nombre'];
            
          
       
            $datos['tituloTabla']=lang('idioma.txtTablaSales');
            $datos['contenido']=view('admin/form/quiz',$datos);

            //vistas
            return view('admin/body',$datos);
            
        }

        if($function == "form"){
            $encrypt = \Config\Services::encrypter();

            if (isset($_POST['nom'],$_POST['des'])) {

                if ($idd==0) {
                    
                    $datos = [
                        'tabla' => 'recetas',
                        'tabla_id' => 'receta_id',
                        'funcion' => 'insert',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'descripcion'       => $_POST['des'],
                                    'tiempo_preparacion'=> $_POST['pre'],
                                    'tiempo_coccion'    => $_POST['coc'],
                                    'porciones'         => $_POST['por'],
                                    'categoria'         => $_POST['cat'],
                                    'tipo_comida'       => $_POST['tip'],
                                    'estado'            => $_POST['est'],
                                    'creado_id'         => $idu,
                                    'fec_creacion'      => $this->forma1,
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => null,
                    ];
                    $consulta = $this->query($datos);
                    if(isset($_POST['ingredientes'])){
                        $ingredientes = json_decode($_POST['ingredientes']);
                        for($i=0;$i<count($ingredientes);$i++){
                            $datos = [
                                'tabla' => 'ingredientes',
                                'tabla_id' => 'ingrediente_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'         => $consulta->data,
                                            'nombre'            => $ingredientes[$i][1],
                                            'medida'            => $ingredientes[$i][2],
                                            'cantidad'          => $ingredientes[$i][3],
                                            'creado_id'         => $idu,
                                            'fec_creacion'      => $this->forma1,
                                            'fec_modificacion'  => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($datos);
                        }
                    }
                    
                    if(isset($_POST['instrucciones'])){
                        $instrucciones = json_decode($_POST['instrucciones']);
                        for($i=0;$i<count($instrucciones);$i++){
                            $datos = [
                                'tabla' => 'instrucciones',
                                'tabla_id' => 'instruccion_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'         => $consulta->data,
                                            'descripcion'       => $instrucciones[$i][1],
                                            'creado_id'         => $idu,
                                            'fec_creacion'      => $this->forma1,
                                            'fec_modificacion'  => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($datos);
                        }
                    }
                    
                    if(isset($_POST['nutricion'])){
                        $nutricion = json_decode($_POST['nutricion']);
                        for($i=0;$i<count($nutricion);$i++){
                            $datos = [
                                'tabla' => 'nutricion',
                                'tabla_id' => 'nutricion_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'         => $consulta->data,
                                            'descripcion'       => $nutricion[$i][1],
                                            'creado_id'         => $idu,
                                            'fec_creacion'      => $this->forma1,
                                            'fec_modificacion'  => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($datos);
                        }
                    }
                    
                    echo $consulta->data;

                }else{
                    $datos = [
                        'tabla' => 'recetas',
                        'tabla_id' => 'receta_id',
                        'funcion' => 'update',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'descripcion'       => $_POST['des'],
                                    'tiempo_preparacion'=> $_POST['pre'],
                                    'tiempo_coccion'    => $_POST['coc'],
                                    'porciones'         => $_POST['por'],
                                    'categoria'         => $_POST['cat'],
                                    'tipo_comida'       => $_POST['tip'],
                                    'estado'            => $_POST['est'],
                                    'creado_id'         => $idu,
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => "receta_id = $idd",
                    ];
                    $consulta = $this->query($datos);
                    
                    if(isset($_POST['ingredientes'])){
                        $ingredientes = json_decode($_POST['ingredientes']);
                        for($i=0;$i<count($ingredientes);$i++){
                            
                            if($ingredientes[$i][0]==0){
                                $datos = [
                                    'tabla' => 'ingredientes',
                                    'tabla_id' => 'ingrediente_id',
                                    'funcion' => 'insert',
                                    'datos' => [
                                                'receta_id'         => $idd,
                                                'nombre'            => $ingredientes[$i][1],
                                                'medida'            => $ingredientes[$i][2],
                                                'cantidad'          => $ingredientes[$i][3],
                                                'creado_id'         => $idu,
                                                'fec_creacion'      => $this->forma1,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => null,
                                ];
                                $consulta2 = $this->query($datos);
                            }else{
                                $iddin=$ingredientes[$i][0];
                                $datos = [
                                    'tabla' => 'ingredientes',
                                    'tabla_id' => 'ingrediente_id',
                                    'funcion' => 'update',
                                    'datos' => [
                                                'nombre'            => $ingredientes[$i][1],
                                                'medida'            => $ingredientes[$i][2],
                                                'cantidad'          => $ingredientes[$i][3],
                                                'creado_id'         => $idu,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => "ingrediente_id=$iddin",
                                ];
                                $consulta2 = $this->query($datos);
                            }
                                
                        }
                    }
                    
                    if(isset($_POST['instrucciones'])){
                        $instrucciones = json_decode($_POST['instrucciones']);
                        for($i=0;$i<count($instrucciones);$i++){
                            
                            if($instrucciones[$i][0]==0){
                                $datos = [
                                    'tabla' => 'instrucciones',
                                    'tabla_id' => 'instruccion_id',
                                    'funcion' => 'insert',
                                    'datos' => [
                                                'receta_id'         => $idd,
                                                'descripcion'       => $instrucciones[$i][1],
                                                'creado_id'         => $idu,
                                                'fec_creacion'      => $this->forma1,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => null,
                                ];
                                $consulta2 = $this->query($datos);
                            }else{
                                $iddis=$instrucciones[$i][0];
                                $datos = [
                                    'tabla' => 'instrucciones',
                                    'tabla_id' => 'instruccion_id',
                                    'funcion' => 'update',
                                    'datos' => [
                                                'descripcion'       => $instrucciones[$i][1],
                                                'creado_id'         => $idu,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => "instruccion_id=$iddis",
                                ];
                                $consulta2 = $this->query($datos);
                            }
                        }
                    }
                    
                    if(isset($_POST['nutricion'])){
                        $nutricion = json_decode($_POST['nutricion']);
                        for($i=0;$i<count($nutricion);$i++){
                            
                            if($nutricion[$i][0]==0){
                                $datos = [
                                    'tabla' => 'nutricion',
                                    'tabla_id' => 'nutricion_id',
                                    'funcion' => 'insert',
                                    'datos' => [
                                                'receta_id'         => $idd,
                                                'descripcion'       => $nutricion[$i][1],
                                                'creado_id'         => $idu,
                                                'fec_creacion'      => $this->forma1,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => null,
                                ];
                                $consulta2 = $this->query($datos);
                            }else{
                                $iddis=$nutricion[$i][0];
                                $datos = [
                                    'tabla' => 'nutricion',
                                    'tabla_id' => 'nutricion_id',
                                    'funcion' => 'update',
                                    'datos' => [
                                                'descripcion'       => $nutricion[$i][1],
                                                'creado_id'         => $idu,
                                                'fec_modificacion'  => $this->forma1,
                                            ],
                                    'condicion' => "nutricion_id=$iddis",
                                ];
                                $consulta2 = $this->query($datos);
                            }
                        }
                    }
                    echo $idd;
                }

                exit();
            }else{

                if ($idd!=0) {
                    $consulta = [
                        'tabla' => 'recetas',
                        'tabla_id' => 'receta_id',
                        'funcion' => 'find',
                        'datos' => null,
                        'condicion' => "receta_id = $idd",
                    ];
                    $datos['cliente'] = $this->query($consulta);
                    
                    $dataForm = [
                        'tabla' => 'contenido',
                        'tabla_id' => 'contenido_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "registro_id = $idd and tabla like 'recetas'",
                    ];
                    $datos['imagenes'] = $this->query($dataForm);
                    
                    $dataForm = [
                        'tabla' => 'ingredientes',
                        'tabla_id' => 'ingrediente_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "receta_id = $idd",
                    ];
                    $datos['ingredientes'] = $this->query($dataForm);
                    
                    
                    $dataForm = [
                        'tabla' => 'instrucciones',
                        'tabla_id' => 'instruccion_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "receta_id = $idd",
                    ];
                    $datos['instrucciones'] = $this->query($dataForm);
                    
                    
                    $dataForm = [
                        'tabla' => 'nutricion',
                        'tabla_id' => 'nutricion_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "receta_id = $idd",
                    ];
                    $datos['nutricion'] = $this->query($dataForm);
                    
                }

                $datos['titulo']    = 'Recipe';

                $datos['contenido']=view('admin/form/receta',$datos);

                //vistas
                return view('admin/body',$datos);
            }

        }

        if($function == "eliminar"){
            $datos = [
                'tabla' => 'recetas',
                'tabla_id' => 'receta_id',
                'funcion' => 'delete',
                'datos' => null,
                'condicion' => "receta_id = $idd",
                'registro_id' => $idd,
            ];
            $consulta = $this->query($datos);
        }
        
        if($function == "import"){
            $excel = json_decode(json_decode($_POST['excel']));
            
            $usuario = $this->session->get('logUmatone');
            $idu = $usuario['data'][0]['usuario_id'];
        
            foreach($excel as $key){
                
                if(!isset($key->name)){$key->name = "not title";}
                if(!isset($key->description)){$key->description = "";}
                if(!isset($key->pre_time)){$key->pre_time = 0;}
                if(!isset($key->Cooking_time)){$key->Cooking_time = 0;}
                if(!isset($key->server)){$key->name = 1;}
                if(!isset($key->category)){$key->category = "Snack";}
                if(!isset($key->food_type)){$key->food_type = "Normal";}
                if(!isset($key->Ingredients)){$key->Ingredients = "";}
                if(!isset($key->Instructions)){$key->Instructions = "";}
                if(!isset($key->Nutritional)){$key->Nutritional = "";}
                
                $datos = [
                    'tabla' => 'recetas',
                    'tabla_id' => 'receta_id',
                    'funcion' => 'insert',
                    'datos' => [
                                'nombre'                => $key->name,
                                'descripcion'           => $key->description,
                                'tiempo_preparacion'    => $key->pre_time,
                                'tiempo_coccion'        => $key->Cooking_time,
                                'porciones'             => $key->server,
                                'categoria'             => $key->category,
                                'tipo_comida'           => $key->food_type,
                                'estado'                => 'enabled',
                                'creado_id'             => $idu,
                                'fec_creacion'          => $this->forma1,
                                'fec_modificacion'      => $this->forma1,
                            ],
                    'condicion' => null,
                ];
                $consulta = $this->query($datos);
                
                if($consulta->code==200){
                    
                    if($key->Ingredients!=""){
                        $ingredientes = explode('&&',$key->Ingredients);
                        for($i=0;$i<count($ingredientes);$i++){
                            $consulta2 = [
                                'tabla' => 'ingredientes',
                                'tabla_id' => 'ingrediente_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'             => $consulta->data,
                                            'nombre'                => $ingredientes[$i],
                                            'medida'                => '',
                                            'cantidad'              => '',
                                            'creado_id'             => $idu,
                                            'fec_creacion'          => $this->forma1,
                                            'fec_modificacion'      => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($consulta2);
                        }
                    }
                        
                    if($key->Instructions!=""){
                        $instrucciones = explode('&&',$key->Instructions);
                        for($i=0;$i<count($instrucciones);$i++){
                            $consulta2 = [
                                'tabla' => 'instrucciones',
                                'tabla_id' => 'instruccion_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'             => $consulta->data,
                                            'descripcion'           => $instrucciones[$i],
                                            'creado_id'             => $idu,
                                            'fec_creacion'          => $this->forma1,
                                            'fec_modificacion'      => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($consulta2);
                        }
                    }
                        
                    if($key->Nutritional!=""){
                        $nutricion = explode('&&',$key->Nutritional);
                        for($i=0;$i<count($nutricion);$i++){
                            $consulta2 = [
                                'tabla' => 'nutricion',
                                'tabla_id' => 'nutricion_id',
                                'funcion' => 'insert',
                                'datos' => [
                                            'receta_id'             => $consulta->data,
                                            'descripcion'           => $nutricion[$i],
                                            'creado_id'             => $idu,
                                            'fec_creacion'          => $this->forma1,
                                            'fec_modificacion'      => $this->forma1,
                                        ],
                                'condicion' => null,
                            ];
                            $consulta2 = $this->query($consulta2);
                        }
                    } 
                }
                print_r($consulta);
            }
            
        }

    }

    public function users($function = "",$idd=0)
    {

        $datos['activo']    = "5";
        $datos['menu']      = lang('idioma.txtMenuAdmin');

        $datos['urlCrear']     = base_url('admin/users/form');
        $datos['urlEditar']    = base_url('admin/users/form');
        $datos['urlEliminar']  = base_url('admin/users/eliminar');
        $datos['urlCancelar']  = base_url('admin/users');
        $datos['urlForm']      = base_url('admin/users/form/'.$idd);

        if($function == ""){

            $datos['titulo']    = 'Users';

            $datos['paginacion']=base_url("admin/listarTablas");
            $datos['tipoTabla']="usuarios";

            $datos['tituloTabla']=lang('idioma.txtTablaUsuarios');
            $datos['contenido']=view('admin/tabla',$datos);

            //vistas
            return view('admin/body',$datos);
        }

        if($function == "form"){
            $encrypt = \Config\Services::encrypter();

            if (isset($_POST['nom'],$_POST['ape'])) {

                if ($idd==0) {
                    $datos = [
                        'tabla' => 'usuarios',
                        'tabla_id' => 'usuario_id',
                        'funcion' => 'insert',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'apellido'          => $_POST['ape'],
                                    'correo'            => $_POST['ema'],
                                    'telefono'          => $_POST['tel'],
                                    'usuario'           => $_POST['usu'],
                                    'clave'             => base64_encode($encrypt->encrypt($_POST['cla'])),
                                    'estado'            => $_POST['est'],
                                    'fec_creacion'      => $this->forma1,
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => null,
                    ];
                    $consulta = $this->query($datos);
                    
                    $this->session->set('notificacion','<script>toastr.success("Great, the User was created.");</script>');
                    
                    echo $consulta->data;

                }else{
                    $datos = [
                        'tabla' => 'usuarios',
                        'tabla_id' => 'usuario_id',
                        'funcion' => 'update',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'apellido'          => $_POST['ape'],
                                    'correo'            => $_POST['ema'],
                                    'telefono'          => $_POST['tel'],
                                    'usuario'           => $_POST['usu'],
                                    'clave'             => base64_encode($encrypt->encrypt($_POST['cla'])),
                                    'estado'            => $_POST['est'],
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => "usuario_id = $idd",
                    ];
                    $consulta = $this->query($datos);
                    
                    $this->session->set('notificacion','<script>toastr.success("Great, the User was updated.");</script>');
                    
                    echo $idd;
                }

                exit();
            }else{

                if ($idd!=0) {
                    $consulta = [
                        'tabla' => 'usuarios',
                        'tabla_id' => 'usuarios_id',
                        'funcion' => 'find',
                        'datos' => null,
                        'condicion' => "usuario_id = $idd",
                    ];
                    $datos['cliente'] = $this->query($consulta);
                    
                    $dataForm = [
                        'tabla' => 'contenido',
                        'tabla_id' => 'contenido_id',
                        'funcion' => 'find',
                        'datos' => null,
                        'condicion' => "registro_id = $idd and tabla like 'usuarios'",
                    ];
                    $datos['clienteImg'] = $this->query($dataForm);
                    
                }

                $datos['titulo']    = 'User';

                $datos['contenido']=view('admin/form/usuario',$datos);

                //vistas
                return view('admin/body',$datos);
            }

        }

        if($function == "eliminar"){
            $datos = [
                'tabla' => 'usuarios',
                'tabla_id' => 'usuario_id',
                'funcion' => 'delete',
                'datos' => null,
                'condicion' => "usuario_id = $idd",
                'registro_id' => $idd,
            ];
            $consulta = $this->query($datos);
        }

    }

    public function config($function = "",$idd=0)
    {

        if($function == ""){
            $datos['activo']="5";

            $datos['menu']      =lang('idioma.txtMenuAdmin');

            $datos['titulo']    = 'Config';

            $datos['tituloTabla']=lang('idioma.txtTablaUsuarios');
            $datos['contenido']=view('admin/configuracion',$datos);

            //vistas
            return view('admin/body',$datos);
        }


        if($function == "category"){
            $datos['activo']="5";

            $datos['menu']      =lang('idioma.txtMenuAdmin');

            $datos['titulo']    =lang('idioma.txtUsuarios');

            $datos['urlCrear']  = base_url('admin/config/categoryform');
            $datos['urlEditar'] =base_url('admin/config/categoryform');
            $datos['urlEliminar']=base_url('admin/config/categoryeliminar');

            $datos['paginacion']=base_url("admin/listarTablas");
            $datos['tipoTabla']="pcategoria";

            $datos['tituloTabla']=lang('idioma.txtTablaCategorias');
            $datos['contenido']=view('admin/tabla',$datos);

            //vistas
            return view('admin/body',$datos);
        }

        if($function == "categoryform"){
            $encrypt = \Config\Services::encrypter();

            if (isset($_POST['nom'],$_POST['pad'],$_POST['est'])) {

                if ($idd==0) {
                    $datos = [
                        'tabla' => 'pcategoria',
                        'tabla_id' => 'pcategoria_id',
                        'funcion' => 'insert',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'padre_id'          => $_POST['pad'],
                                    'estado'            => $_POST['est'],
                                    'fec_creacion'      => $this->forma1,
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => null,
                    ];
                    $consulta = $this->query($datos,'POST');

                    echo 0;
                }else{
                    $datos = [
                        'tabla' => 'pcategoria',
                        'tabla_id' => 'pcategoria_id',
                        'funcion' => 'update',
                        'datos' => [
                                    'nombre'            => $_POST['nom'],
                                    'padre_id'          => $_POST['pad'],
                                    'estado'            => $_POST['est'],
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => "pcategoria_id = $idd",
                    ];
                    $consulta = $this->query($datos,'POST');
                    echo 0;
                }

            }else{

                if ($idd!=0) {
                    $datos = [
                        'tabla' => 'pcategoria',
                        'tabla_id' => 'pcategoria_id',
                        'funcion' => 'find',
                        'datos' => null,
                        'condicion' => "pcategoria_id = $idd",
                    ];
                    $datos['cliente'] = $this->query($datos,'POST');

                    $datos['urlForm']  = base_url('admin/config/categoryform/'.$idd);
                }else{
                    $datos['urlForm']  = base_url('admin/config/categoryform');
                }
                $datos['activo']="4";

                $datos['menu']      =lang('idioma.txtMenuAdmin');

                $datos['titulo']    =lang('idioma.txtUsuarios');

                $consulta = [
                    'tabla' => 'pcategoria',
                    'tabla_id' => 'pcategoria_id',
                    'funcion' => 'findAll',
                    'datos' => null,
                    'condicion' => null,
                ];
                $consulta = $this->query($consulta,'POST');
                $consulta = $consulta->data;

                for ($i=0; $i <count($consulta) ; $i++) {
                    $padre = $consulta[$i]->padre_id;

                    $nom = "";
                    $num = 0;
                    while ($padre!=0) {
                          $consulta2 = [
                              'tabla' => 'pcategoria',
                              'tabla_id' => 'pcategoria_id',
                              'funcion' => 'find',
                              'datos' => null,
                              'condicion' => "pcategoria_id=$padre order by pcategoria_id",
                          ];
                          $consulta2 = $this->query($consulta2,'POST');
                          $consulta2 = $consulta2->data;

                          $padre = $consulta2[0]->padre_id;

                          if ($nom=="") {
                            $nom = $consulta2[0]->nombre;
                          }else{
                            $nom = $nom.">".$consulta2[0]->nombre;
                          }

                          $num++;

                          if($num==4){
                              unset($consulta[$i]);
                              $padre=0;
                          }
                    }
                    if ($nom=="") {
                      $consulta[$i]->nombre = $consulta[$i]->nombre;
                    }else{
                      $consulta[$i]->nombre = $nom.">".$consulta[$i]->nombre;
                    }

                }

                $datos['categorias'] = $consulta;

                $datos['urlCancelar']  = base_url('admin/config/category');

                $datos['contenido']=view('admin/form/pcategoria',$datos);

                //vistas
                return view('admin/body',$datos);
            }

        }

        if($function == "categoryeliminar"){
            $datos = [
                'tabla' => 'pcategoria',
                'tabla_id' => 'pcategoria_id',
                'funcion' => 'delete',
                'datos' => null,
                'condicion' => "pcategoria_id = $idd",
            ];
            $consulta = $this->query($datos,'POST');
        }
    }


    public function deleteFile()
    {
        $idd = $_POST['idFile'];
        $datos = [
            'tabla' => 'contenido',
            'tabla_id' => 'contenido_id',
            'funcion' => 'delete',
            'datos' => null,
            'condicion' => "contenido_id = $idd",
            'registro_id'=>$idd,
        ];
        $consulta = $this->query($datos);
        print_r($consulta);
        exit();
    }




    public function nuticion()
    {
        $idd = $_POST['idr'];
        $datos = [
            'tabla' => 'nutricion',
            'tabla_id' => 'nutricion_id',
            'funcion' => 'find',
            'datos' => null,
            'condicion' => "receta_id = $idd",
        ];
        $consulta = $this->query($datos);
        echo json_encode($consulta);
    }
    
    
    public function stripe($function = "",$idd=0)
    {
        
        $usuario = $this->session->get('logUmatone');
        $idd = $usuario['data'][0]['usuario_id'];
        
        $datos['activo']= "0";
        $datos['menu']  = lang('idioma.txtMenuAdmin');
        
        $datos['urlCancelar']  = base_url('admin/config');
        $datos['urlForm']  = base_url('admin/stripe/form/'.$idd);

        if($function == "form"){
            $encrypt = \Config\Services::encrypter();

            if (isset($_POST['key1'],$_POST['key2'])) {


                    $consulta = [
                        'tabla' => 'pagos',
                        'funcion' => 'update',
                        'select' => null,
                        'datos' => [
                                    'modo'              => $_POST['mod'],
                                    'clave_prueba_1'    => $_POST['key1'],
                                    'clave_prueba_2'    => $_POST['key2'],
                                    'clave_real_1'      => $_POST['key3'],
                                    'clave_real_2'      => $_POST['key4'],
                                    'estado'            => $_POST['est'],
                                    'fec_modificacion'  => $this->forma1,
                                ],
                        'condicion' => "pago_id=1",
                        'pagina' => null,
                        'limite' => null,
                    ];
                    $datos['cliente']  = $this->Consultar($consulta);
                    
                    
                    $this->session->set('notificacion','<script>toastr.success("Great, the Payment was updated.");</script>');
                    
                    echo $idd;
                    exit();

            }else{

                $consulta = [
                    'tabla' => 'pagos',
                    'funcion' => 'findAll',
                    'select' => null,
                    'datos' => null,
                    'condicion' => "pago_id=1",
                    'pagina' => null,
                    'limite' => null,
                ];
                $datos['cliente']  = $this->Consultar($consulta);

                $datos['titulo']    = 'Stripe payment';


                $datos['contenido']=view('admin/form/stripe',$datos);

                //vistas
                return view('admin/body',$datos);
            }

        }

    }


	//--------------------------------------------------------------------

}
