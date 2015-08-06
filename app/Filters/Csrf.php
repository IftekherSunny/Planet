<?php

namespace App\Filters;

use Request;
use Sun\Routing\Filter;
use Sun\Security\TokenMismatchException;
use Sun\Contracts\Security\Csrf as CsrfToken;

class Csrf extends Filter
{
    protected $token;

    public function __construct(CsrfToken $token)
    {
        $this->token = $token;
    }
    /**
     * To handle request
     */
    public function handle()
    {
        if(! $this->token->check(Request::input('token'))) {
            throw new TokenMismatchException('csrf token mismatch.');
        }
    }
}