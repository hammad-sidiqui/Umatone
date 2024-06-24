<?php

namespace App\ThirdParty\OAuth2\src\OAuth2\TokenType;

use App\ThirdParty\OAuth2\src\OAuth2\RequestInterface;
use App\ThirdParty\OAuth2\src\OAuth2\ResponseInterface;

/**
* This is not yet supported!
*/
class Mac implements TokenTypeInterface
{
    public function getTokenType()
    {
        return 'mac';
    }

    public function getAccessTokenParameter(RequestInterface $request, ResponseInterface $response)
    {
        throw new \LogicException("Not supported");
    }
}
