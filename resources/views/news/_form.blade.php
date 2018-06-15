@if( $new->exists )
    <form action="{{ route('news_update_path', ['new' => $new->idNew]) }}" method="POST" enctype="multipart/form-data">
    {{ method_field('PUT') }}
@else
    <form action="{{ route('news_store_path') }}" method="POST" enctype="multipart/form-data">
@endif

    {{ csrf_field() }}

    <!-- Title Field -->
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" name="title" class="form-control" value="{{ $new->title or old('title') }}"/>
    </div>

    <!-- Description Input -->
    <div class="form-group">
        <label for="text">Texto:</label>
        <textarea rows="5" name="text" class="form-control"/>{{ $new->text or old('text') }}</textarea>
    </div>

    <!-- Url Field -->
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" name="image" class="form-control" value="{{ $new->image or old('image') }}"/>
    </div>

    <div class="form-group">
        <button type="submit" class='btn btn-primary'>Save New</button>
    </div>
</form>
