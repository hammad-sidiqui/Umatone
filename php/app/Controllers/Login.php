<?php namespace App\Controllers;

use App\Libraries\OAuth;
use App\ThirdParty\OAuth2\src\OAuth2\Request;
use CodeIgniter\API\ResponseTrait;



class Login extends BaseController
{

    protected $ci_oauth;
    protected $oauth_request;
    protected $oauth_respond;

    use ResponseTrait;

    public function __construct()
    {
        //$this->ci_oauth = new OAuth();
        //$this->oauth_request = new Request();
        date_default_timezone_set('Europe/Bucharest');
        $this->forma1 = date('Y-m-d H:i');
        $this->forma2 = date("Y-m-d");
        $this->forma3 = date("Y");
        
    }
    


	public function admin()
	{
	   header('Access-Control-Allow-Origin: *');
	   
	   $encrypt = \Config\Services::encrypter();
	   
	   $datos['ema'] = "";
	   $datos['cla'] = "";
	   

	   if(isset($_POST['ema'],$_POST['pas'])){
	       
	        $datos['ema'] = $_POST['ema'];
	        $datos['cla'] = $_POST['pas'];
	        
	        $code = 400;
	        $usu = $_POST['ema'];
            
            $consulta = [
                'tabla' => 'usuarios',
                'funcion' => 'findAll',
                'select' => "",
                'datos' => null,
                'condicion' => "(correo like '$usu' or usuario like '$usu')",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta = $this->Consultar($consulta);
            
            
            if ($consulta['code']==200) {
                $cla = $encrypt->decrypt(base64_decode($consulta['data'][0]['clave']));
                
                if($cla==$_POST['pas']){
                    $consulta['data'][0]['perfil'] = "admin";
                    
                    $iddu = $consulta['data'][0]['usuario_id'];
                    
                    $dataForm = [
                        'tabla' => 'contenido',
                        'funcion' => 'findAll',
                        'select' =>  "",
                        'datos' => null,
                        'condicion' => "registro_id = $iddu and tabla like 'usuarios'",
                        'pagina' => null,
                        'limite' => null,
                    ];
                    $dataForm = $this->Consultar($dataForm);
                    
                    if($dataForm['code']==200){
                        $consulta['data'][0]['imagen'] = base_url($dataForm['data'][0]['ruta']);
                    }else{
                        $consulta['data'][0]['imagen'] = base_url('assets/style/img/avatars/avatar-4.jpg');
                    }

                    $this->session->set('logUmatone',$consulta);
                    $code = 200;
                }
            }
            echo $code;
            
            exit();

	    }else{
	        $datos['activo'] = 0;
	        $datos['urlHome'] = base_url('admin/customers');
	        $datos['urlForm'] = base_url('login/admin');
            return view('login/login',$datos);
        }
	}
	
	public function customer()
	{
	   header('Access-Control-Allow-Origin: *');
	    
	   $encrypt = \Config\Services::encrypter();
	   
	   $datos['ema'] = "";
	   $datos['cla'] = "";

	   if(isset($_POST['ema'],$_POST['pas'])){
	        $datos['ema'] = $_POST['ema'];
	        $datos['cla'] = $_POST['pas'];
	   
	   
	        $code = 400;
	        $usu = $_POST['ema'];
           
            $consulta = [
                'tabla' => 'clientes',
                'funcion' => 'findAll',
                'select' => null,
                'datos' => null,
                'condicion' => "(correo like '$usu' or usuario like '$usu')",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta = $this->Consultar($consulta);
            
            
            if ($consulta['code']==200) {
                $cla = $encrypt->decrypt(base64_decode($consulta['data'][0]['clave']));
                if($cla==$_POST['pas']){
                    $this->session->set('logUmatone',$consulta);
                    $code = 200;
                }
            }
            echo $code;
            
            exit();

	    }else{
	        
	        if(isset($_GET['idp'])){
	            $idq = $_GET['idp'];
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
	            
	            $usu = $consulta['data'][0]['cliente'];
	            $consulta = [
                    'tabla' => 'clientes',
                    'funcion' => 'findAll',
                    'select' => null,
                    'datos' => null,
                    'condicion' => "(correo like '$usu' or usuario like '$usu')",
                    'pagina' => null,
                    'limite' => null,
                ];
                $consulta = $this->Consultar($consulta);
                
                if($consulta['code']==400){
                    header("Location: /user/login/registration?idp=".$idq);
	               die();
                }
                if($consulta['code']==200){
                    $datos['ema']=$consulta['data'][0]['correo'];
                }
                
	        }
	        $datos['activo'] = 1;
	        $datos['urlHome'] = base_url('customer');
	        $datos['urlForm'] = base_url('login/customer');
            return view('login/login',$datos);
        }
	}
	
	
	public function registration()
	{
	   $encrypt = \Config\Services::encrypter();

	   if(isset($_POST['ema'],$_POST['pas'])){
	        
	        $code = 400;
	        $ema = $_POST['ema'];
	        $usu = $_POST['usu'];
            $datos = [
                'tabla'     => 'clientes',
                'tabla_id'  => 'cliente_id',
                'funcion'   => 'find',
                'datos'     => '',
                'condicion' => "(correo like '$ema' or usuario like '$usu')",
            ];
            $consulta = $this->query($datos);
            
            
            
           
            if($code == 400){
                
                $datos = [
                    'tabla'     => 'clientes',
                    'tabla_id'  => 'cliente_id',
                    'funcion'   => 'insert',
                    'datos'     => [
                            'correo'  => $_POST['ema'],
                            'usuario' => $_POST['usu'],
                            'clave'   =>  base64_encode($encrypt->encrypt($_POST['pas'])),
                            'fec_creacion'      => $this->forma1,
                            'fec_modificacion'  => $this->forma1,
                        ],
                    'condicion' => "",
                ];
                $consulta = $this->query($datos);
                
                $code = 200;
            }else{
                if ($consulta->code==200) {
                    $code = 200;
                    if($consulta->data[0]->correo==$_POST['ema']){
                        $code = 1;
                    }
                    if($consulta->data[0]->usuario==$_POST['usu']){
                        $code = 2;
                    }
                }
            }
            echo $code;
            
            exit();

	    }else{
	        
	        $encrypt = \Config\Services::encrypter();
	        
	        
	        $datos['email']="";
	        
	        $datos['url1']= base_url('home/plan');
	        
	        if(isset($_GET['idp'])){
	            $idq = $_GET['idp'];
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
                    $datos['ema']=$consulta['data'][0]['cliente'];
                }
                
	        }
	        
            return view('login/registro',$datos);
        }
	}
	public function password_find2()
	{
	    
	    $usu = "dyamdev@gmail.com";
	        
	        $consulta = [
                'tabla' => 'clientes',
                'funcion' => 'find',
                'select' => null,
                'datos' => null,
                'condicion' => "(correo like '$usu' or usuario like '$usu')",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta = $this->Consultar($consulta);
            
            if ($consulta['code']==200) {
                
                $email = \Config\Services::email();
                $email->setFrom('info@umatone.com',"Umatone");
                $email->setTo($usu);
                $email->setSubject('Umatone');
                
                $idc = urlencode(base64_encode($consulta['data'][0]['cliente_id']));
        
                $datos['contenido'] = "Change Password";
                $datos['url'] = base_url('login/change_password/'.$idc);
                
                $message  = view('email/plantilla2',$datos);
                
                $email->setMessage($message);
                $email->setMailType('html');
        
                if($email->send()) {
                    
                } 
            }
            echo $consulta['code'];
            
            exit();
	}
	
	public function password_find()
	{
	   header('Access-Control-Allow-Origin: *');
	    
	   $encrypt = \Config\Services::encrypter();

	   if(isset($_POST['ema'])){
	        
	        
	        $usu = $_POST['ema'];
	        
	        $consulta = [
                'tabla' => 'clientes',
                'funcion' => 'find',
                'select' => null,
                'datos' => null,
                'condicion' => "(correo like '$usu' or usuario like '$usu')",
                'pagina' => null,
                'limite' => null,
            ];
            $consulta = $this->Consultar($consulta);
            
            if ($consulta['code']==200) {
                
                $email = \Config\Services::email();
                $email->setFrom('info@umatone.com',"Umatone");
                $email->setTo($_POST['ema']);
                $email->setSubject('Umatone');
                
                $idc = urlencode(base64_encode($consulta['data'][0]['cliente_id']));
        
                $datos['contenido'] = "Change Password";
                $datos['url'] = base_url('login/change_password/'.$idc);
                
                $message  = view('email/plantilla2',$datos);
                
                $email->setMessage($message);
                $email->setMailType('html');
        
                if($email->send()) {
                    
                } 
            }
            echo $consulta['code'];
            
            exit();

	    }else{
	        $datos['urlHome'] = base_url('customer');
	        $datos['urlForm'] = base_url('login/password_find');
            return view('login/email',$datos);
        }
	}
	
	public function change_password($clave="")
	{
	   header('Access-Control-Allow-Origin: *');
	    
	   $encrypt = \Config\Services::encrypter();

	    $idc = base64_decode(urldecode($clave));
        
        $datos['urlHome'] = base_url('customer');
        $datos['urlForm'] = base_url('login/password_validate/'.$idc);
        return view('login/clave',$datos);
    }
	
	public function password_validate($idc=0)
	{
	   header('Access-Control-Allow-Origin: *');
	    
	   $encrypt = \Config\Services::encrypter();

	    if($idc!=0){
	        
	       
            $datos = [
                'tabla'     => 'clientes',
                'tabla_id'  => 'cliente_id',
                'funcion'   => 'find',
                'datos'     => '',
                'condicion' => "(cliente_id=$idc)",
            ];
            $consulta = $this->query($datos);
            
            
            if ($consulta->code==200) {
                $datos = [
                    'tabla' => 'clientes',
                    'tabla_id' => 'cliente_id',
                    'funcion' => 'update',
                    'datos' => [
                                'clave' => base64_encode($encrypt->encrypt($_POST['cla'])),
                            ],
                    'condicion' => "cliente_id = $idc",
                ];
                $consulta = $this->query($datos);
            }
            echo $consulta->code;
            exit();

	    }else{
	        
	        echo 400;
        }
	}

	public function salir()
    {
        $this->session = session();
	    $this->session->destroy();
	    header("Location: /user/login/admin");
	    die();
    }
    
    public function goout()
    {
        $this->session = session();
	    $this->session->destroy();
	    header("Location: https://umatone.com");
	    die();
    }



}
