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

		notify()->success('Pelicula agregada!');
		//connectify('Agregada', 'Connection Found', 'Pelicula ha sido agregada');
		return redirect('catalog');

	}

	public function putEdit(Request $request, $id){
		
		// $movie = new Movie;
		$movie = Movie::findOrFail($id);
		$movie->title = $request->title;
		$movie->year = $request->year;
		$movie->director = $request->director;
		$movie->poster = $request->poster;
		$movie->synopsis = $request->synopsis;
		$movie->save();
		return redirect('catalog/show/'.$id);
	}


	public function putRent(Request $request, $id){

		/*Estas lineas están siendo editadas*/
		$movie = Movie::findOrFail($id);

		if(!$movie->rented){
			$movie->rented = true;
			$movie->save();
			notify()->success('Pelicula Alquilada');
			return redirect('catalog/show/'.$id);
		}
		else{
			notify()->success('Pelicula no disponible');
			return redirect('catalog/show/'.$id);
		}
		
	}

	public function putReturn(Request $request, $id){
		$movie = Movie::findOrFail($id);

		if($movie->rented){
			$movie->rented = false;
			$movie->save();
			notify()->success('Pelicula Devuelta');
			return redirect('catalog/show/'.$id);
		}
		else{
			notify()->success('Pelicula disponible');
			return redirect('catalog/show/'.$id);
		}
	}

	public function deleteMovie(Request $request, $id){
		$movie = Movie::findOrFail($id);

		if($movie->id){
			
			$movie->delete();
			notify()->success('Pelicula eliminada');
			return redirect('catalog');
		}
	}
}