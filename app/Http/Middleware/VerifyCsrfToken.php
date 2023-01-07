<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/api/students/remita/confirm',
        '/students/remita/confirm',
        '/api/test',
        '/payremi',
        '/logpay',
        '/payremi1'
    ];
}
