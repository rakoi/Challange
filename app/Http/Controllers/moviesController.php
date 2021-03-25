<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class moviesController extends Controller
{
    //
    public $movies = array(
        ['name' => 'Pulp fiction', 'length' => '180', 'id' => '1'],
        ['name' => 'Django Unchained ', 'length' => '120', 'id' => '2'],
        ['name' => 'The GodFather', 'length' => '120', 'id' => '3'],
        ['name' => 'Passion Of Christ', 'length' => '120', 'id' => '4'],
        ['name' => 'Heat', 'length' => '120', 'id' => '5'],
    );



    public function index()
    {
        $movies = $this->movies;

        return view('welcome')->with('movies', $movies);
    }

    public function getMovieLength($id)
    {
        foreach ($this->movies as $movie) {
            if ($movie['id'] == $id) {
                return $movie['length'];
            }
        }
    }
    public function submitMovies(Request $request)
    {

        $movie1 = $request->movie1;
        $movie2 = $request->movie2;
        $lenght_of_flight = $request->minutes;


        $movie_length1 = $this->getMovieLength($movie1);
        $movie_length2 = $this->getMovieLength($movie2);
        $movieduaration = array($movie_length1, $movie_length2);

        $status = $this->isWatchable($lenght_of_flight, $movieduaration);

        $response = array([
            'status' => $status
        ]);

        return $response;
    }

    public function isWatchable($lenght_of_flight, $movieduaration)
    {
        $sum_of_movies_length = 0;


        for ($i = 0; $i < count($movieduaration); $i++) {

            $sum_of_movies_length += $movieduaration[$i];
        }

        if ($sum_of_movies_length <= $lenght_of_flight) {
            return true;
        } else {
            return false;
        }
    }
}
