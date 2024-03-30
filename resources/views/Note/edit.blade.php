@extends('master')
@section('content')

@if ($errors->any())
        <div class="alert alert-danger">
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger">
            <div>
                <p>{{ Session::get('error') }}</p>
            </div>
        </div>
    @endif

      <form method="post" action="{{route('note.update', $notes->id)}}">
        @method('PUT')
        @csrf

          <div class="mb-3 row">
            <label for="title" class="col-sm-1 col-form-label">Title</label>
            <div class="col-sm-6">
              <input type="text" name="title" class="form-control" value="{{$notes->title}}">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="content" class="col-sm-1 col-form-label">Content</label>
            <div class="col-sm-6">
              <input type="text" name="content" class="form-control" value="{{$notes->content}}">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-1 col-form-label"></label>
            <div class="col-sm-6">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

        
      </form>

@endsection