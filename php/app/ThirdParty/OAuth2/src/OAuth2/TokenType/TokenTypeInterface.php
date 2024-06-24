<?php

namespace App\ThirdParty\OAuth2\src\OAuth2\TokenType;

use App\ThirdParty\OAuth2\src\OAuth2\RequestInterface;
use App\ThirdParty\OAuth2\src\OAuth2\ResponseInterface;

interface TokenTypeInterface
{
    /**
     * Token type identification string
     *
     * ex: "bearer" or "mac"
     */
    public function getTokenType();

    /**
     * Retrieves the token string from the request object
     */
    public function getAccessTokenParameter(RequestInterface $request, ResponseInterface $response);
}
