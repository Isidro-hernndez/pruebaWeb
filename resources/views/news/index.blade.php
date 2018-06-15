@extends('layouts.app')

@section('content')

    @foreach($news as $new)
        <div class="row">
          <div class="col-md-2">

          </div>
            <div class="col-md-6">
                <h2>
                    <a href="{{ route('new_path', ['new' => $new->idNew]) }}">{{ $new->title }}</a>
                    <br>
                    <img width="300px" src="/storage/{{class_basename($new->image)}}" alt="">
                    <br>
                    <p>{{ str_limit($new->text, 80) }}</p>
                    <br>
                     <span class="badge badge-default">Posted {{ $new->created_at->diffForHumans() }} by <b>{{ $new->user->name }}</b></span>
              </div>
              <div class="col-md-3">
                    @if($new->wasCreatedBy( Auth::user() ))
                    <small class="pull-right">
                        <a href="{{ route('news_edit_path', ['new' => $new->idNew]) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('news_delete_path', ['new' => $new->idNew]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class='btn btn-danger'>Delete</button>
                        </form>
                    </small>
                    @endif
                </h2>

            </div>
        </div>
        <hr>
    @endforeach

    {{ $news->render() }}
@endsection
