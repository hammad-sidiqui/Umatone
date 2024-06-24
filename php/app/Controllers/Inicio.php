<?php 

namespace App\Controllers;

use PHPMailer\PHPMailer\PHPMailer;


class Inicio extends BaseController
{


   public function __construct()
   {
      
       date_default_timezone_set('Europe/Bucharest');
        $this->forma1 = date('Y-m-d H:i');
        $this->forma2 = date("Y-m-d");
        $this->forma3 = date("Y");
    }


	public function index2($function = "")
	{
	    if($function == ""){
	        $datos['activo']="0";

	        $datos['menu']=lang('idioma.txtMenuAdmin');
	        $datos['titulo']=lang('idioma.txtMisLibros');

            $datos['contenido']=view('inicio/inicio');
    	    //vistas
    		return view('inicio/body',$datos);
	    }
	}
	
	
	public function index($function = "")
	{
	    if($function == ""){
	        $datos['activo']="0";

	        $datos['menu']=lang('idioma.txtMenuAdmin');
	        $datos['titulo']=lang('idioma.txtMisLibros');

            $datos['contenido']=view('inicio/inicio2');
    	    //vistas
    		return view('inicio/body',$datos);
	    }
	}
	
	
	

	public function email($function = "")
	{
	    if(isset($_POST['ema'])){
	        
	        $encrypt = \Config\Services::encrypter();
            
            $plan = "Normal";
   
            if($_POST['o11']=="I'm lactose intolerant"){
                $plan = "Dairy free";
            }
            if($_POST['o11']=="I don't eat gluten"){
                $plan = "Gluten free";
            }
            if($_POST['o11']=="I'm vegetarian"){
                $plan = "Vegetarian";
            }
            if($_POST['o11']=="I'm vegan"){
                $plan = "Vegan";
            }
            if($_POST['o11']=="I'm vegan"){
                $plan = "Vegan";
            }
            if(!isset($_POST['check1'])){
                $_POST['check1'] = 0;
            }
            if(!isset($_POST['check2'])){
                $_POST['check2'] = 0;
            }
            
            $consulta2 = [
                'tabla' => 'plan',
                'funcion' => 'findAll',
                'select' => null,
                'datos' => null,
                'condicion' => "categoria like '%$plan%' limit 1 ",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta2 = $this->Consultar($consulta2);
            
            
            $consulta = [
                'tabla' => 'quiz',
                'funcion' => 'insert',
                'select' => null,
                'datos' => [
                            'cliente'            => $_POST['ema'],
                            'check_perder_peso'  => $_POST['pes'],
                            'genero'             => $_POST['gen'],
                            'check_peso_deseado' => $_POST['check_per'],
                            'peso_deseado'       => $_POST['pes1'],
                            'check_medidas'      => $_POST['check_per1'],
                            'edad'               => $_POST['eda'],
                            'altura'             => $_POST['alt'],
                            'anchura'            => $_POST['anc'],
                            'peso'               => $_POST['pess'],
                            'tipo_cuerpo'        => $_POST['o5'],
                            'rutina'             => $_POST['o6'],
                            'habito'             => implode(', ',$_POST['o7']),
                            'ejercicio'          => $_POST['o8'],
                            'energia'            => $_POST['o9'],
                            'horas_de_sueño'     => $_POST['o10'],
                            'restriccion_alergia'=> $_POST['o11'],
                            'verduras'           => implode(', ',$_POST['o12']),
                            'carnes'             => implode(', ',$_POST['o13']),
                            'resultado'          => "",
                            'check1'             => $_POST['check1'],
                            'check2'             => $_POST['check2'],
                            'plan_recomendado'   => $_POST['idp'],
                            'fec_creacion'       => $this->forma1,
                        ],
                'condicion' => null,
                'pagina' => null,
                'limite' => null,
            ];
            $consulta = $this->Consultar($consulta);
            
            
            $idq = $consulta['data'];
	        
            
    
            $datos['dato1'] = $_POST['pes'];
            $datos['dato2'] = $_POST['gen'];
            $datos['dato3'] = $_POST['check_per'];
            $datos['dato4'] = $_POST['pes1'];
            $datos['dato5'] = $_POST['check_per1'];
            $datos['dato6'] = $_POST['eda'];
            $datos['dato7'] = $_POST['alt'];
            $datos['dato8'] = $_POST['anc'];
            $datos['dato9'] = $_POST['pess'];
            $datos['dato10'] = $_POST['o5'];
            $datos['dato11'] = $_POST['o6'];
            $datos['dato12'] = implode(', ',$_POST['o7']);
            $datos['dato13'] = $_POST['o8'];
            $datos['dato14'] = $_POST['o9'];
            $datos['dato15'] = $_POST['o10'];
            $datos['dato16'] = $_POST['o11'];
            $datos['dato17'] = implode(', ',$_POST['o12']);
            $datos['dato18'] = implode(', ',$_POST['o13']);
            $datos['dato19'] = $consulta2['data'][0]['nombre'];
            
            $consulta = [
                'tabla' => 'pagos',
                'funcion' => 'findAll',
                'select' => null,
                'datos' => null,
                'condicion' => "pago_id=1",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta = $this->Consultar($consulta);
            $key = $consulta['data'][0]['clave_prueba_2'];
            if($consulta['data'][0]['modo']==1){
                $key = $consulta['data'][0]['clave_real_2'];
            }
            
            
            
            $datos['dato20'] = "https://umatone.com/?page_id=564&idp=".$idq."&key=".$key."#plan_compra";
            
            
            $email = \Config\Services::email();
            $email->setFrom('info@umatone.com',"Umatone");
            $email->setTo($_POST['ema']);
            $email->setSubject('Umatone');
            
            $message  = view('email/plantilla1',$datos);
            
            $email->setMessage($message);
            $email->setMailType('html');
    
            if($email->send()) {
               
            }
            
            echo $datos['dato20'];
            
	    }else{
	        echo 0;
	    }


	}
	
	
	
	
	public function selecccionarPlan(){
	    return view('stripe/seleccionarPlan');
	}
	
	
	
	public function email22($function = "")
	{
	    
	    header('Access-Control-Allow-Origin: *');
        
        require_once('stripe-php/init.php');
       
	    $stripe = new \Stripe\StripeClient(
          'sk_test_51KddTdHyG1CcKkb3iKryFOBvLP2ydreANLUq2vZUsfoKB8uFl1SVCt7kaMvqdJ52kPzp0gJWLbZGISV636AwOgvH00GSnZ8ASk'
        );
        
        $stripe->customers->all(['limit' => 3]);
 
        
        echo "<pre>";
        print_r($stripe);
        echo "</pre>";
	}



    public function plan($function = "")
	{
	    
	    $encrypt = \Config\Services::encrypter();
	    
	    if(isset($_GET['quiz'])){
	        $quiz = base64_decode(urldecode($_GET['quiz']));
	        
	        
            $consulta = [
                'tabla' => 'quiz',
                'tabla_id' => 'quiz_id',
                'funcion' => 'find',
                'datos' => null,
                'condicion' => "quiz_id = '$quiz'",
            ];
            $consulta = $this->query($consulta);
            
            if($consulta->code==200){
                $ema = $consulta->data[0]->cliente;
                
                $consulta2 = [
                    'tabla' => 'clientes',
                    'tabla_id' => 'cliente_id',
                    'funcion' => 'find',
                    'datos' => null,
                    'condicion' => "correo like '$ema'",
                ];
                $consulta2 = $this->query($consulta2);
             
                if($consulta2->code==200){
                    $this->session->set('logUmatone',$consulta2);
                }
            }
	    }
	    
	    if($this->session->get('logUmatone')==null){
            header("Location: ".base_url('login/customer'));
		    exit();
        }else{
           
            if($consulta->code==200){
                
                $ress = $consulta->data[0]->restriccion_alergia;
                
                 $plan = "Normal";
   
                if($ress=="I'm lactose intolerant"){
                    $plan = "Dairy free";
                }
                if($ress=="I don't eat gluten"){
                    $plan = "Gluten free";
                }
                if($ress=="I'm vegetarian"){
                    $plan = "Vegetarian";
                }
                if($ress=="I'm vegan"){
                    $plan = "Vegan";
                }
            }
            
	        $consulta = [
                'tabla' => 'plan',
                'tabla_id' => 'plan_id',
                'funcion' => 'findAll',
                'datos' => null,
                'condicion' => "categoria like '%$plan%' order by plan_id desc limit 1",
            ];
            $consulta = $this->query($consulta);
            
            $ppp="";
            
            if($consulta->code==400){
                $consulta = [
                    'tabla' => 'plan',
                    'tabla_id' => 'plan_id',
                    'funcion' => 'findAll',
                    'datos' => null,
                    'condicion' => null,
                ];
                $consulta = $this->query($consulta);
            }
            
            if($consulta->code==200){
                $datos['plan']=$consulta->data;
                
                $img = base_url('assets/img/UmatoneTarget.png');
                foreach($consulta->data as $key){
                    
                    $idr = $key->plan_id;
                    $consultaImg = [
                        'tabla' => 'contenido',
                        'tabla_id' => 'contenido_id',
                        'funcion' => 'findAll',
                        'datos' => null,
                        'condicion' => "tabla like 'plan' and registro_id='$idr' limit 1",
                    ];
                    $consultaImg = $this->query($consultaImg);
                    
                    if($consultaImg->code!=400){
                        $img = base_url($consultaImg->data[0]->ruta);
                    }
                    
                    $ppp .= '<div class="col-md-4 mt-2">
                                <div class="card" style="min-height: 330px;">
                        			<div class="card-body">
                                        <div class="mt-3 mb-3" style="text-align:center">
                                          <h3>'.$key->nombre.'</h3>
                                          <img src="'.$img.'" style="width: 60%;">
                                        </div>
                        				<form method="post" action="'.base_url('home/buyplans').'">
                        					<div style="margin: 4px;text-align: center;">
                        					    <input type="text" name="idp" hidden value="'.$key->plan_id.'" />
                                                <label>'.$key->descripcion.'</label>
                        					</div>
                        					<div>
                        						<input type="submit" value="Choose" class="btn login_btn">
                        					</div>
                        
                        				</form>
                        			</div>
                		        </div>
                          </div>';
                }
            }
            
            $datos['titulo']    = "My meal plans";
            
            $datos['plan']=$ppp;
	        
	        $datos['activo']="0";

	        $datos['menu']=lang('idioma.txtMenuAdmin');
	        $datos['titulo']="Your suggested plan is:";

            $datos['contenido']=view('inicio/plan',$datos);
    	    //vistas
    		return view('inicio/body',$datos);
	    }
	}
	
	
	
	public function selectPlan($function = "")
	{
	    $plan = "Normal";
             
        //$_POST['plan'] = "I'm lactose intolerant";
        $ress = $_POST['plan'];

        if($ress=="I'm lactose intolerant"){
            $plan = "Dairy free";
        }
        if($ress=="I don't eat gluten"){
            $plan = "Gluten free";
        }
        if($ress=="I'm vegetarian"){
            $plan = "Vegetarian";
        }
        if($ress=="I'm vegan"){
            $plan = "Vegan";
        }
        
        
        $consulta = [
            'tabla' => 'plan',
            'funcion' => 'findAll',
            'select' => null,
            'datos' => null,
            'condicion' => "categoria like '%$plan%' limit 1 ",
            'pagina' => null,
            'limite' => null,
        ];
        $consulta = $this->Consultar($consulta);
        
            
            $ppp="";
            
            if($consulta['code']==200){
                
                $img = base_url('assets/img/UmatoneTarget.png');
                foreach($consulta['data'] as $key){
                    
                    $idr = $key['plan_id'];
                    $consultaImg = [
                        'tabla' => 'contenido',
                        'funcion' => 'findAll',
                        'select' => null,
                        'datos' => null,
                        'condicion' => "tabla like 'plan' and registro_id='$idr' limit 1 ",
                        'pagina' => null,
                        'limite' => null,
                    ];
                    $consultaImg = $this->Consultar($consultaImg);
                    
                    if($consultaImg['code']==200){
                        $img = base_url($consultaImg['data'][0]['ruta']);
                    }
                    
                    $ppp .= '<div class="col-md-10" style="margin:auto">
                                <div class="card">
                        			<div class="card-body">
                                        <div class="mt-3 mb-3" style="text-align:center">
                                          <h3>'.$key['nombre'].'</h3>
                                          <img src="'.$img.'" style="width: 60%;">
                                        </div>
                    					<div style="margin: 4px;text-align: center;">
                    					    <input type="text" id="iddp" name="idp" hidden value="'.$key['plan_id'].'" />
                                            <label>'.$key['descripcion'].'</label>
                    					</div>
                    
                        			</div>
                		        </div>
                          </div>';
                }
            }
            
            $plan=$ppp;
	     
    	    //vistas
    		echo $plan;
	}
	
	public function buyplan($function = "")
	{

	    if($function == ""){
    		return view('inicio/buyplan2');
	    }
	    
	}
	
	
	public function buyplans($function = "")
	{
        header("Location: https://umatone.com/?page_id=564&idp=".$_POST['idp']);
		exit();
	}
	
	public function payment()
    {
       header('Access-Control-Allow-Origin: *');
        
       require_once('stripe-php/init.php');
       
       $consulta = [
            'tabla' => 'pagos',
            'funcion' => 'findAll',
            'select' => null,
            'datos' => null,
            'condicion' => "pago_id=1",
            'pagina' => null,
            'limite' => null,
        ];
        $consulta = $this->Consultar($consulta);
        $key = $consulta['data'][0]['clave_prueba_1'];
        if($consulta['data'][0]['modo']==1){
            $key = $consulta['data'][0]['clave_real_1'];
        }
            
     
       //$stripeSecret = 'sk_test_51JmLyNB02dNGS7M53t1X9Ni7Nb0NroYzbikxqUn9aBOPcDNOvXPnP00EgUHuHRIeHnikPZiIxMp0nREyVRMsI7AA00Io1T7pmD';
       $stripeSecret = $key;
 
       \Stripe\Stripe::setApiKey($stripeSecret);
      
        $stripe = \Stripe\Charge::create ([
                "amount" => $this->request->getVar('amount'),
                "currency" => "usd",
                "source" => $this->request->getVar('tokenId'),
                "description" => "Test payment from umatone.com."
        ]);
             
       // after successfull payment, you can store payment related information into your database
        $estado = $stripe->status;
        $ref = $stripe->id;
        $data = array('success' => $estado, 'data'=> $stripe);
        
        //$usuario = $this->session->get('logUmatone'); 
        //$idc= $usuario->data[0]->cliente_id;
        
        $pago = $this->request->getVar('amount');
        $fin =  date("Y-m-d H:i",strtotime($this->forma1."+ 7 days"));
        if($pago == 2856){ $fin =  date("Y-m-d H:i",strtotime($this->forma1."+ 30 days")); }
        if($pago == 4284){ $fin =  date("Y-m-d H:i",strtotime($this->forma1."+ 90 days")); }
        
        $idq = $this->request->getVar('productoId');
        $consulta = [
            'tabla' => 'quiz',
            'funcion' => 'findAll',
            'select' => null,
            'datos' => null,
            'condicion' => "quiz_id=$idq",
            'pagina' => null,
            'limite' => null,
        ];
        $consulta = $this->Consultar($consulta);
        
        if($consulta['code']==200){
            $consulta2 = [
                'tabla' => 'cliente_plan',
                'funcion' => 'insert',
                'select' => null,
                'datos' => [
                            'referencia_pago'   => $ref,
                            'cliente_id'        => $consulta['data'][0]['cliente'],
                            'plan_id'           => $consulta['data'][0]['plan_recomendado'],
                            'costo'             => $this->request->getVar('amount'),
                            'promocion'         => 0,
                            'estado'            => $estado,
                            'fec_inicio'        => $this->forma1,
                            'fec_fin'           => $fin,
                            'fec_creacion'      => $this->forma1,
                            'fec_modifcacion'   => $this->forma1,
                        ],
                'condicion' => null,
                'pagina' => null,
                'limite' => null,
            ];
            $consulta2 = $this->Consultar($consulta2);
            
            
            $idp = $consulta['data'][0]['plan_recomendado'];
            $consulta3 = [
                'tabla' => 'plan',
                'funcion' => 'find',
                'select' => null,
                'datos' => null,
                'condicion' => "plan_id=$idp",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta3 = $this->Consultar($consulta3);
            
            $email = \Config\Services::email();
            $email->setFrom('info@umatone.com',"Umatone");
            $email->setTo($consulta['data'][0]['cliente']);
            $email->setSubject('Umatone');
    
            $datos['dato16'] = $consulta3['data'][0]['nombre'];
            $datos['dato17'] = $pago;
            $datos['dato18'] = $fin;
            $datos['dato19'] = $estado;
            $datos['dato20'] = "https://umatone.com/user/login/customer?idp=".$idq;
            
            $message  = view('email/plantilla3',$datos);
            
            $email->setMessage($message);
            $email->setMailType('html');
            
            if($email->send()) {
                
            } 
        }
        
 
        echo json_encode($data);
    }
    
    
    
    
    public function index22($function = "")
	{
	    $consulta = [
            'tabla' => 'pagos',
            'funcion' => 'findAll',
            'select' => null,
            'datos' => null,
            'condicion' => "pago_id=1",
            'pagina' => null,
            'limite' => null,
        ];
        $consulta = $this->Consultar($consulta);
        $datos['key'] = $consulta['data'][0]['clave_prueba_1'];
        $datos['keyp'] = $consulta['data'][0]['clave_prueba_2'];
        if($consulta['data'][0]['modo']==1){
            $datos['key'] = $consulta['data'][0]['clave_real_1'];
            $datos['keyp'] = $consulta['data'][0]['clave_real_2'];
        }
        
	        $datos['plan'] = $_POST['check_plan'];
	        $datos['emaQuiz'] = $this->session->get('emaQuiz');
    		return view('stripe/form',$datos);
	}
	
	
    public function edin($function = "")
	{
	    
	    header('Access-Control-Allow-Origin: *');
        
        require 'vendor/autoload.php';
         \Stripe\Stripe::setApiKey('sk_test_51KddTdHyG1CcKkb3iKryFOBvLP2ydreANLUq2vZUsfoKB8uFl1SVCt7kaMvqdJ52kPzp0gJWLbZGISV636AwOgvH00GSnZ8ASk');
         
	    date_default_timezone_set('America/Bogota');    
        $DateAndTime = date('m-d-Y h:i:s a', time()); 
	    $arrayd=array();
	    
	    $arrayd[0]=$_REQUEST;
	    $arrayd[1]=$DateAndTime;
	    
	    //print_r($arrayd);
	    $checkout_session_id = $arrayd[0]['session_id'];
	    
	    $checkout_session = \Stripe\Checkout\Session::retrieve($checkout_session_id);
	    
	    print_r($checkout_session->subscription);
	    print_r($checkout_session->customer_email);
	    print_r("<pre>");
	    print_r($checkout_session);
	    
	    $session_json = json_encode($checkout_session, JSON_PRETTY_PRINT);
	    
	    
	    //print_r($session_json);
	    
	    //$bytes = file_put_contents("uploads/edin.json",  json_encode($arrayd)); 
	}
	
	public function eee($function = "")
	{
	     header('Access-Control-Allow-Origin: *');
        
        require 'vendor/autoload.php';
        
         \Stripe\Stripe::setApiKey('sk_test_51KddTdHyG1CcKkb3iKryFOBvLP2ydreANLUq2vZUsfoKB8uFl1SVCt7kaMvqdJ52kPzp0gJWLbZGISV636AwOgvH00GSnZ8ASk');
         
        $checkout_session = \Stripe\Subscription::retrieve('sub_1LKsBfHyG1CcKkb3cG6ftuY4');

        print_r($checkout_session->status);
        print_r("<pre>");
	    print_r($checkout_session);
        
	    
	}
	
	
	public function edinerro($function = "")
	{
	    $bytes = file_put_contents("uploads/edinerror.json",  json_encode($_REQUEST)); 
	}
	
	
	
	
	
	public function email2($function = "")
	{
	    if(isset($_POST['ema'])){
	        
	        
	        
	        $encrypt = \Config\Services::encrypter();
            
            $plan = "Normal";
   
            if($_POST['o11']=="I'm lactose intolerant"){
                $plan = "Dairy free";
            }
            if($_POST['o11']=="I don't eat gluten"){
                $plan = "Gluten free";
            }
            if($_POST['o11']=="I'm vegetarian"){
                $plan = "Vegetarian";
            }
            if($_POST['o11']=="I'm vegan"){
                $plan = "Vegan";
            }
            if($_POST['o11']=="I'm vegan"){
                $plan = "Vegan";
            }
            if(!isset($_POST['check1'])){
                $_POST['check1'] = 0;
            }
            if(!isset($_POST['check2'])){
                $_POST['check2'] = 0;
            }
            
            $consulta2 = [
                'tabla' => 'plan',
                'funcion' => 'findAll',
                'select' => null,
                'datos' => null,
                'condicion' => "categoria like '%$plan%' limit 1 ",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta2 = $this->Consultar($consulta2);
            
            
            $consulta = [
                'tabla' => 'quiz',
                'funcion' => 'insert',
                'select' => null,
                'datos' => [
                            'cliente'            => $_POST['ema'],
                            'check_perder_peso'  => $_POST['pes'],
                            'genero'             => $_POST['gen'],
                            'check_peso_deseado' => $_POST['check_per'],
                            'peso_deseado'       => $_POST['pes1'],
                            'check_medidas'      => $_POST['check_per1'],
                            'edad'               => $_POST['eda'],
                            'altura'             => $_POST['alt'],
                            'anchura'            => $_POST['anc'],
                            'peso'               => $_POST['pess'],
                            'tipo_cuerpo'        => $_POST['o5'],
                            'rutina'             => $_POST['o6'],
                            'habito'             => implode(', ',$_POST['o7']),
                            'ejercicio'          => $_POST['o8'],
                            'energia'            => $_POST['o9'],
                            'horas_de_sueño'     => $_POST['o10'],
                            'restriccion_alergia'=> $_POST['o11'],
                            'verduras'           => implode(', ',$_POST['o12']),
                            'carnes'             => implode(', ',$_POST['o13']),
                            'resultado'          => "",
                            'check1'             => $_POST['check1'],
                            'check2'             => $_POST['check2'],
                            'plan_recomendado'   => $_POST['idp'],
                            'fec_creacion'       => $this->forma1,
                        ],
                'condicion' => null,
                'pagina' => null,
                'limite' => null,
            ];
            $consulta = $this->Consultar($consulta);
            
            
            $idq = $consulta['data'];
	        
            $_POST['idq']=$idq;
            $this->session->set('emaQuiz',$_POST);
            
            
            $datos['dato1'] = $_POST['pes'];
            $datos['dato2'] = $_POST['gen'];
            $datos['dato3'] = $_POST['check_per'];
            $datos['dato4'] = $_POST['pes1'];
            $datos['dato5'] = $_POST['check_per1'];
            $datos['dato6'] = $_POST['eda'];
            $datos['dato7'] = $_POST['alt'];
            $datos['dato8'] = $_POST['anc'];
            $datos['dato9'] = $_POST['pess'];
            $datos['dato10'] = $_POST['o5'];
            $datos['dato11'] = $_POST['o6'];
            $datos['dato12'] = implode(', ',$_POST['o7']);
            $datos['dato13'] = $_POST['o8'];
            $datos['dato14'] = $_POST['o9'];
            $datos['dato15'] = $_POST['o10'];
            $datos['dato16'] = $_POST['o11'];
            $datos['dato17'] = implode(', ',$_POST['o12']);
            $datos['dato18'] = implode(', ',$_POST['o13']);
            $datos['dato19'] = $consulta2['data'][0]['nombre'];
            
            $consulta = [
                'tabla' => 'pagos',
                'funcion' => 'findAll',
                'select' => null,
                'datos' => null,
                'condicion' => "pago_id=1",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta = $this->Consultar($consulta);
            $key = $consulta['data'][0]['clave_prueba_2'];
            if($consulta['data'][0]['modo']==1){
                $key = $consulta['data'][0]['clave_real_2'];
            }
            
            
            
            $datos['dato20'] = "https://umatone.com/?page_id=805&idp=".$idq."&key=".$key."&ema=".$_POST['ema']."#plan_compra";
            
            
            $email = \Config\Services::email();
            $email->setFrom('info@umatone.com',"Umatone");
            $email->setTo($_POST['ema']);
            $email->setSubject('Umatone');
            
            $message  = view('email/plantilla1',$datos);
            
            $email->setMessage($message);
            $email->setMailType('html');
    
            if($email->send()) {
               
            }
            
            echo $datos['dato20'];
            
	    }else{
	        echo 0;
	    }


	}
	
    
    
    public function payment2()
    {
       header('Access-Control-Allow-Origin: *');
        
        require 'vendor/autoload.php';
        
        $consulta = [
            'tabla' => 'pagos',
            'funcion' => 'findAll',
            'select' => null,
            'datos' => null,
            'condicion' => "pago_id=1",
            'pagina' => null,
            'limite' => null,
        ];
        $consulta = $this->Consultar($consulta);
        $key = $consulta['data'][0]['clave_prueba_1'];
        if($consulta['data'][0]['modo']==1){
            $key = $consulta['data'][0]['clave_real_1'];
        }
        
        
        \Stripe\Stripe::setApiKey($key);
         
	    $arrayd[0]=$_REQUEST;
	    
	    //print_r($arrayd);
	    $checkout_session_id = $arrayd[0]['session_id'];
	    
	    $checkout_session = \Stripe\Checkout\Session::retrieve($checkout_session_id);
	    
	    /*
	    print_r($checkout_session->subscription);
	    print_r($checkout_session->customer_email);
	    print_r("<pre>");
	    print_r($checkout_session);
	    
	    $session_json = json_encode($checkout_session, JSON_PRETTY_PRINT);
	    */
	    if($checkout_session->status=="complete"){
	        
	        $sesionQuiz = $this->session->get('emaQuiz');
	        
	        $pago = $checkout_session->amount_total;
            $fin =  date("Y-m-d H:i",strtotime($this->forma1."+ 7 days"));
            $dias = 7;
            if($pago == 2856){ $fin =  date("Y-m-d H:i",strtotime($this->forma1."+ 30 days")); $dias = 30; }
            if($pago == 4284){ $fin =  date("Y-m-d H:i",strtotime($this->forma1."+ 90 days")); $dias = 90; }
	        
	        
            $consulta2 = [
                'tabla' => 'cliente_plan',
                'funcion' => 'insert',
                'select' => null,
                'datos' => [
                            'referencia_pago'   => $checkout_session->subscription,
                            'cliente_id'        => $checkout_session->customer_email,
                            'plan_id'           => $sesionQuiz['idp'],
                            'costo'             => $checkout_session->amount_total,
                            'dias'              => $dias,
                            'promocion'         => 0,
                            'estado'            => $checkout_session->status,
                            'fec_inicio'        => $this->forma1,
                            'fec_fin'           => $fin,
                            'fec_creacion'      => $this->forma1,
                            'fec_modifcacion'   => $this->forma1,
                        ],
                'condicion' => null,
                'pagina' => null,
                'limite' => null,
            ];
            $consulta2 = $this->Consultar($consulta2);
            
            
            $idp = $sesionQuiz['idp'];
            $consulta3 = [
                'tabla' => 'plan',
                'funcion' => 'find',
                'select' => null,
                'datos' => null,
                'condicion' => "plan_id=$idp",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta3 = $this->Consultar($consulta3);
            
           
        
            
            $email = \Config\Services::email();
            $email->setFrom('info@umatone.com',"Umatone");
            $email->setTo($sesionQuiz['ema']);
            $email->setSubject('Umatone');
    
            $datos['dato16'] = $consulta3['data'][0]['nombre'];
            $datos['dato17'] = $pago;
            $datos['dato18'] = $fin;
            $datos['dato19'] = $checkout_session->status;
            $datos['dato20'] = "https://umatone.com/user/login/customer?idp=".$sesionQuiz['idq'];
            
            $message  = view('email/plantilla3',$datos);
            
            $email->setMessage($message);
            $email->setMailType('html');
            
            if($email->send()) {
                
            } 
        
            
	    }
	    
       
        header("Location: ".base_url('login/customer'));   
 
        //echo json_encode($checkout_session->status);
    }
    
    
   
   

	//--------------------------------------------------------------------

}
