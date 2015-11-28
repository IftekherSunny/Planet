<?php

namespace App\Filters;

use Sun\Security\TokenMismatchException;
use Sun\Contracts\Security\Csrf as CsrfToken;

class Csrf
{
    /**
     * @var \Sun\Contracts\Security\Csrf
     */
    protected $token;

    /**
     * To create filter
     *
     * @param CsrfToken $token
     */
    public function __construct(CsrfToken $token)
    {
        $this->token = $token;
    }

    /**
     * To handle request
     */
    public function handle()
    {
        if(!$this->token->check()) {
            throw new TokenMismatchException('csrf token mismatch.');
        }

        return request();
    }
}