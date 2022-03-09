<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;


class CatalogController extends Controller{   
	
	public function getIndex(){
		$movies = Movie::all();
		return view('catalog.index', ['movies' => $movies]);
	}
	
	public function getShow($idPelicula){
		$movie = Movie::findOrFail($idPelicula); /*Buscar pelicula y lanzar una excepcion */
		return view('catalog.show', ['movie' => $movie]);
    }

    public function getCreate(){
        return view('catalog.create');
    }
	
    public function getEdit($id){
		$movie = Movie::findOrFail($id);
        return view('catalog.edit', ['movie' => $movie]);

    }

	public function postCreate(Request $request){
		$movie = new Movie;

		$movie->title = $request->title;
		$movie->year = $request->year;
		$movie->director = $request->director;
		$movie->poster = $request->poster;
		$movie->synopsis = $request->synopsis;
		$movie->save();
		return redirect('catalog');

	}

	public function putEdit(Request $request, $id){
		
		$movie = new Movie;
		$movie = Movie::findOrFail($id);
		$movie->title = $request->title;
		$movie->year = $request->year;
		$movie->director = $request->director;
		$movie->poster = $request->poster;
		$movie->synopsis = $request->synopsis;
		$movie->save();
		return redirect('catalog/show/'.$id);
	}
}