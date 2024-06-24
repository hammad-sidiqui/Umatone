<?php

namespace App\Filters;

use App\Libraries\OAuth;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\ThirdParty\OAuth2\src\OAuth2\Request;

class TokenFilter implements FilterInterface
{

    /*
    public function before(RequestInterface $request, $arguments = null)
    {
        $ci_oauth = new OAuth();
        $oauth_request = Request::createFromGlobals();
        if(!$ci_oauth->server->verifyResourceRequest($oauth_request)){
            $ci_oauth->server->getResponse()->send();
            exit();
        }
    }

    public function after(RequestInterface $request,ResponseInterface $response, $arguments = null)
    {

    }
    */

}
