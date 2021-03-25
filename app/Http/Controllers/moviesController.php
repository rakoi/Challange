<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class moviesController extends Controller
{
    //
    public function isWatchable($lenght_of_flight, $movieduaration)
    {
        $sum_of_movies_length = 0;

        if ($movieduaration[0]->name == $movieduaration[1]->name) {
            return false;
        } else {
            foreach ($movieduaration as $movie_length) {
                $sum_of_movies_length = +$movie_length->duration;
            }

            if ($sum_of_movies_length <= $lenght_of_flight) {
                return true;
            } else {
                return false;
            }
        }
    }
}
