@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-sm-4">
        <img src="{{$movie->poster}}" class="img-fluid" />
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

        <button type="button" class="btn btn-success">
            <a href="{{ url('/catalog/edit/' . $movie->id ) }}">
                <i class="bi bi-pencil-fill"></i>
                Editar película
        </button>

        
        <form action="{{url('/catalog/rent/' . $movie->id )}}" method="POST" style="display:inline">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success">
                
                    <i class="bi bi-pencil-fill"></i>
                    Alquilar película
                
            </button>
        </form>
                            
        
        <!-- Se comento estas lineas-->
        <form action="{{url('/catalog/return/' . $movie->id )}}" method="POST" style="display:inline">
            {{ method_field('PUT') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success">
                    <i class="bi bi-pencil-fill"></i>
                    Devolver película
            </button>
        </form>

        <form action="{{url('/catalog/delete/' . $movie->id )}}" method="POST" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-fill"></i>
                Eliminar película
            </button>
        </form>
    </div>
</div>

@stop