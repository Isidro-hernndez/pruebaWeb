@extends('layouts.app')

@section('content')
     <div class="row">
        <div class="col-md-12">
            <h2>{{ $new->title }}</h2>
            <br>
             <span class="badge badge-default">Posted {{ $new->created_at->diffForHumans() }} by <b>{{ $new->user->name }}</b></span>
            <br>
            <img width="300px" src="/storage/{{class_basename($new->image)}}" alt="">
            <br>
            <p>{{ $new->text }}</p>

        </div>
    </div>
    <hr>
@endsection
