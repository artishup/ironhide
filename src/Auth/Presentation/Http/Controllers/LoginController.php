<?php

declare(strict_types=1);

namespace ArtishUp\Auth\Presentation\Http\Controllers;

use Illuminate\Http\Request;
use ArtishUp\Auth\Application\Login\LoginQuery;
use ArtishUp\Auth\Application\Login\LoginQueryHandler;
use ArtishUp\Shared\Presentation\Http\Controllers\Controller;

class LoginController extends Controller
{

    private LoginQueryHandler $handler;

    public function __construct(LoginQueryHandler $loginQueryHandler)
    {
        $this->handler = $loginQueryHandler;
    }

    public function __invoke(Request $request)
    {
        $query = LoginQuery::create(
            $request->get('email'),
            $request->get('password')
        );

        //TODO: implements command bus
        $response = $this->handler->handle($query);

        if ($response) {
            return response()->json($response, 200);
        }

        return response('deu ruim', 400);
    }
}
