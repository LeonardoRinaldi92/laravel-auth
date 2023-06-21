@extends('layouts.app')
@section('title')
Portfolio Leonardo Rinaldi | Progetti 
@endsection
@section('content')
@if (Session::has('success'))
<div class="container">
    <div class="alert alert-success text-center">
        {{Session::get('success')}}
    </div>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-8 text-center p-5">
            <h3>{{$project['name']}}, <i>{{$project['relase_date']}}</i>
            </h3>
                <img src="{{asset('storage/'. $project->image)}}" alt="">
            <h5>{{$project['type']}}</h5>
            <h6><i>{{$project['description']}}</i>
            </h6>
        </div>
    </div>
</div>
@endsection