@extends('master')
@section('content')

<div class="row">
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

    <div class="col-md-12">
    <form method="post" action="{{route('note.store')}}">
        @csrf

          <div class="mb-3 row">
            <label for="title" class="col-sm-1 col-form-label">Title</label>
            <div class="col-sm-5">
              <input type="text" name="title" class="form-control">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="content" class="col-sm-1 col-form-label">Content</label>
            <div class="col-sm-5">
              <input type="text" name="content" class="form-control">
            </div>
        </div>

        <div class="mb-3 row">
            <label class="col-sm-1 col-form-label"></label>
            <div class="col-sm-4">
              <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </div>

        
      </form>
    </div>
</div>
@endsection