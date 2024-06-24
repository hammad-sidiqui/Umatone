<?php namespace App\Controllers;

use App\Libraries\OAuth;
use App\ThirdParty\OAuth2\src\OAuth2\Request;
use CodeIgniter\API\ResponseTrait;



class RestValidacion extends BaseController
{
    
    protected $ci_oauth;
    protected $oauth_request;
    protected $oauth_respond;
    
    use ResponseTrait;
    
    public function __construct()
    {
        $this->ci_oauth = new OAuth();
        $this->oauth_request = new Request();
    }
    
	public function login()
	{
	    $this->oauth_respond =  $this->ci_oauth->server->handleTokenRequest(
	        $this->oauth_request->createFromGlobals()
	    );
	    
	    $code =  $this->oauth_respond->getStatusCode();
	    $body =  $this->oauth_respond->getResponseBody();
	    
	    return $this->genericResponse($code,$body);
        exit();
	}
	
	public function refresh_token()
	{
	     $this->ci_oauth = new OAuth\refresh_token();
	     
	    $this->oauth_respond =  $this->ci_oauth->server->handleTokenRequest(
	        $this->oauth_request->createFromGlobals()
	    );
	    
	    $code =  $this->oauth_respond->getStatusCode();
	    $body =  $this->oauth_respond->getResponseBody();
	    
	     return $this->genericResponse($code,$body);
        exit();
	}
	
	protected function genericResponse($code,$body)
	{
	   if($code==200){
	       return $this->respond([
	           'code' => $code,
	           'data' => json_decode($body),
	           'authorized' => $code
	       ]);
	       exit();
	   }else{
	       return $this->respond([
	           'code' => 400,
	           'data' => json_decode($body),
	           'authorized' => 400
	       ]);
	       exit();
	       /*
	       return $this->fail(json_encode($body));
	       */
	   }
	}

	//--------------------------------------------------------------------

}
