<?php

namespace App\ThirdParty\OAuth2\src\OAuth2\ClientAssertionType;

use App\ThirdParty\OAuth2\src\OAuth2\RequestInterface;
use App\ThirdParty\OAuth2\src\OAuth2\ResponseInterface;

/**
 * Interface for all OAuth2 Client Assertion Types
 */
interface ClientAssertionTypeInterface
{
    /**
     * Validate the OAuth request
     *
     * @param RequestInterface $request
     * @param ResponseInterface $response
     * @return mixed
     */
    public function validateRequest(RequestInterface $request, ResponseInterface $response);

    /**
     * Get the client id
     *
     * @return mixed
     */
    public function getClientId();
}
