@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ url('/books/create') }}">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Add book') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ __('Book name') }}</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="Name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Book Description') }}</label>
                            <textarea type="text" class="form-control {{ $errors->has('description') ? 'has-error' : '' }}" name="description" placeholder="Book description">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Cover image url') }}</label>
                            <input type="text" name="image_url" class="form-control {{ $errors->has('image_url') ? 'has-error' : '' }}" placeholder="ex. https://xxxx.ex/3.png" value="{{ old('image_url') }}">
                            @if ($errors->has('image_url'))
                            <span class="text-danger">{{ $errors->first('image_url') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Publish Year') }}</label>
                            <input type="date" class="form-control {{ $errors->has('published_at') ? 'has-error' : '' }}" name="published_at" value="{{ old('published_at') }}" max="{{ now()->toDateString('Y-m-d') }}"></input>
                            @if ($errors->has('published_at'))
                            <span class="text-danger">{{ $errors->first('published_at') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Total copies') }}</label>
                            <input type="number" class="form-control {{ $errors->has('total_copies') ? 'has-error' : '' }}" name="total_copies" placeholder="ex. 4" value="{{ old('total_copies') }}"></input>
                            @if ($errors->has('total_copies'))
                            <span class="text-danger">{{ $errors->first('total_copies') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Author') }}</label>
                            <select name="author_id" class="form-control" style="width:250px" required>
                                @foreach ($authors as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Genre') }}</label>
                            <select name="genre_id" class="form-control" style="width:250px" required>
                                @foreach ($genres as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Publisher') }}</label>
                            <select name="publisher_id" class="form-control" style="width:250px" required>
                                @foreach ($publishers as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/books') }}" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">{{ __('Back') }}</a>

                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection