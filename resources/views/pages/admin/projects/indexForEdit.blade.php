@extends('layouts.app')
@section('title')
Portfolio Leonardo Rinaldi | Modifica/Elimina Progetti
@endsection
@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">DESC</th>
                    <th scope="col" class="text-center">MODIFICA</th>
                    <th scope="col" class="text-center">VISIBILITA'</th>
                    <th scope="col" class="text-center">ELIMINA</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                <tr class="">
                    <td scope="row">{{$project['id']}}</td>
                    <td><b>{{$project['name']}}</b></td>
                    <td><i>"{{$project['short_description']}}"</i></td>
                    <td class="text-center "><a href="{{route('admin.projects.edit', [$project])}}" class="text-black"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td class="text-center text"><a href="" class="text-black"><i class="fa-solid fa-eye"></i></a></td>
                    <td class="text-center text"><a href="" class="text-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
    
    </div>
</div>
@endsection