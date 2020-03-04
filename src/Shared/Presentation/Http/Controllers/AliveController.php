<?php

namespace ArtishUp\Shared\Presentation\Http\Controllers;

class AliveController extends Controller
{

    public function alive()
    {
        return response('Why are we fighting to save the humans? They\'re a primitive and violent race.', 200);
    }
}
