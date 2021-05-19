@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="post" action="{{ url('/books/edit', array($book->id)) }}">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="card-header" style="padding:0px">
                        <h4 id="title">{{$book->name}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <img src="{{$book->image_url}}" class="d-block" style="width:400px;height:600px;margin:0 auto;" alt="...">
                        </div>
                        <div class="form-group">
                            <label>{{ __('form.book_desc') }}</label>
                            <textarea disabled type="text" class="form-control" name="description" style="height:150px"><?php echo $book->description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>{{ __('form.book_publish') }}</label>
                            <input disabled type="text" class="form-control" name="published_at" value="<?php echo $book->published_at->format('Y'); ?>">
                        </div>
                        <div class="form-group">
                            <label>{{ __('form.book_total') }}</label>
                            <input disabled type="number" name="name" class="form-control" value="<?php echo $book->total_copies; ?>">
                        </div>
                        <div class="form-group">
                            <label>{{ __('form.author_name') }}</label>
                            <input disabled type="text" name="name" class="form-control" value="<?php echo $book->author->name; ?>">
                        </div>
                        <div class="form-group">
                            <label>{{ __('form.genre_name') }}</label>
                            <input disabled type="text" name="name" class="form-control" value="<?php echo $book->genre->name; ?>">
                        </div>
                        <div class="form-group">
                            <label>{{ __('form.publisher_name') }}</label>
                            <input disabled type="text" name="name" class="form-control" value="<?php echo $book->publisher->name; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/books') }}" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">{{ __('Back') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection