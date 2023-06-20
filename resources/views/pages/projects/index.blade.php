@extends('layouts.app')
@section('title')
Portfolio Leonardo Rinaldi | Progetti 
@endsection
@section('content')
<div class="container">
    <div class="row">
        @forelse ($projects as $project)
        <div class="card col-4 text-center p-5">
            <a href="#" class="text-decoration-none text-dark">
                <h3>{{$project['name']}}
                </h3>
                <img src="{{$project['image']}}" style="width: 100%" alt="">
                <h6><i>{{$project['short_description']}}</i>
                </h6>
            </a>
        </div>
        @empty
            <h3>non sono presenti progetti...mi dispiace</h3>
        @endforelse
    </div>
</div>
@endsection