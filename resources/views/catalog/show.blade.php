@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            <img src="{{$movie->poster}}" class="img-fluid"/>
        </div>
        <div class="col-sm-8">
            <h2>{{$movie->title}}</h2>
            <p class="fs-5 m-0">Año: {{$movie->year}}</p>
            <p class="fs-5">Director: {{$movie->director}}</p>
            <p><strong>Resumen:</strong> {{$movie->synopsis}}</p>
            <p><strong>Estado:</strong> 
                {{$movie->synopsis ? 'Película disponible' : 'Película alquilada'}}
            </p>

            <button type="button" class="btn btn-danger">Devolver película</button>
            <button type="button" class="btn btn-warning" >
                <a href="{{ url('/catalog/edit/' . $movie->id ) }}" class="btn-send-id">
                <i class="bi bi-pencil-fill"></i>
                Editar película</button>
        </div>
    </div>

@stop
