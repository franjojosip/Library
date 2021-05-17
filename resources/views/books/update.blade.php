@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{ url('/books/edit', array($book->id)) }}">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Edit Book') }}</h4>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label>{{ __('Book name') }}</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" placeholder="Name" value="<?php echo $book->name; ?>">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Book Description') }}</label>
                            <textarea type="text" class="form-control {{ $errors->has('description') ? 'has-error' : '' }}" name="description" placeholder="Book description"><?php echo $book->description; ?></textarea>
                            @if ($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Cover image url') }}</label>
                            <input type="text" name="image_url" class="form-control {{ $errors->has('image_url') ? 'has-error' : '' }}" placeholder="ex. https://xxxx.ex/3.png" value="<?php echo $book->image_url; ?>">
                            @if ($errors->has('image_url'))
                            <span class="text-danger">{{ $errors->first('image_url') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Published at') }}</label>
                            <input type="date" class="form-control {{ $errors->has('published_at') ? 'has-error' : '' }}" name="published_at" value="<?php echo $book->published_at->format('Y-m-d'); ?>"></input>
                            @if ($errors->has('published_at'))
                            <span class="text-danger">{{ $errors->first('published_at') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Total copies') }}</label>
                            <input type="number" class="form-control {{ $errors->has('total_copies') ? 'has-error' : '' }}" name="total_copies" placeholder="ex. 4" value="<?php echo $book->total_copies; ?>"></input>
                            @if ($errors->has('total_copies'))
                            <span class="text-danger">{{ $errors->first('total_copies') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('Author') }}</label>
                            <select name="author_id" class="form-control" style="width:250px" required>
                                @foreach ($authors as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $selected_author ? 'selected' : '' }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Genre') }}</label>
                            <select name="genre_id" class="form-control" style="width:250px" required>
                                @foreach ($genres as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $selected_genre ? 'selected' : '' }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Publisher') }}</label>
                            <select name="publisher_id" class="form-control" style="width:250px" required>
                                @foreach ($publishers as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $selected_publisher ? 'selected' : '' }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/books') }}" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">{{ __('Back') }}</a>
                        <input type="submit" class="btn btn-success" value="{{ __('Submit') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection