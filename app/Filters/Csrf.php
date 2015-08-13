<?php

namespace App\Filters;

use Sun\Routing\Filter;
use Sun\Contracts\Http\Request;
use Sun\Security\TokenMismatchException;
use Sun\Contracts\Security\Csrf as CsrfToken;

class Csrf extends Filter
{
    /**
     * @var \Sun\Contracts\Security\Csrf
     */
    protected $token;

    /**
     * @var \Sun\Contracts\Http\Request
     */
    protected $request;

    /**
     * To create filter
     *
     * @param CsrfToken $token
     * @param Request   $request
     */
    public function __construct(CsrfToken $token, Request $request)
    {
        $this->token = $token;
        $this->request = $request;
    }

    /**
     * To handle request
     */
    public function handle()
    {
        if(! $this->token->check($this->request->input('token'))) {
            throw new TokenMismatchException('csrf token mismatch.');
        }
    }
}