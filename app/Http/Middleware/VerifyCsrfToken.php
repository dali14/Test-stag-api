<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://localhost:8000/api/login',
        'http://localhost:8000/api/register',
        'http://localhost:8000/api/question/*',
        'http://localhost:8000/api/question',
        'http://localhost:8000/api/stag',
        'http://localhost:8000/api/reponce',
        'http://localhost:8000/api/updateuser/*',
        'http://localhost:8000/api/examen',
        'http://localhost:8000/api/updatequestion/*'
        

    ];
}
