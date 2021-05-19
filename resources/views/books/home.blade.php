@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@elseif(session('warning'))
<div class="alert alert-warning">
    {{session('warning')}}
</div>
@elseif(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif
<div class="container">
    <div class="row">
        <h1 id="row-title">{{ __('form.books_title') }}</h1>
    </div>
    <form class="form-filter" method="GET" action="{{ url('/books/filter') }}">
        <div class="row" style="padding-left:5px;text-align:center">
            <select name="author_id" class="form-control filter" style="width:220px">
                @foreach ($authors as $value)
                <option value="{{ $value->id }}" {{ $value->id == $selected_author ? 'selected' : '' }}>{{ $value->name }}</option>
                @endforeach
            </select>
            <select name="genre_id" class="form-control filter" style="width:220px">
                @foreach ($genres as $value)
                <option value="{{ $value->id }}" {{ $value->id == $selected_genre ? 'selected' : '' }}>{{ $value->name }}</option>
                @endforeach
            </select>
            <select name="publisher_id" class="form-control filter" style="width:220px">
                @foreach ($publishers as $value)
                <option value="{{ $value->id }}" {{ $value->id == $selected_publisher ? 'selected' : '' }}>{{ $value->name }}</option>
                @endforeach
            </select>
            <input type="submit" value="{{ __('form.filter') }}" class="btn btn-small btn-primary filter" style="margin-bottom: 10px;">
        </div>

    </form>
    @auth
    @if(auth()->user()->role->name == 'Administrator')
    <div style="display: flex; justify-content: flex-end">
        <a class="btn btn-small btn-primary btn-add" style="margin-bottom: 10px;" href="{{ url('/books/add') }}">{{ __('form.books_add_new') }}</a>
    </div>
    @endif
    @endauth
    <div class="row">
        @forelse($books as $book)
        <div class="col-lg-4 col-md-6 col-sm-12 custom-card">
            <div class="card h-100">
                <img src="{{$book->image_url}}" class="card-img-top" style="height:400px;" alt="...">
                <div class="card-body">
                    @if($book->is_available)
                    <h5 class="card-availability" style="color:green;float:right;"><b>{{ __('form.books_available') }}</b> <i class="bi bi-check-lg"></i></h5>
                    @else
                    <h5 class="card-availability" style="color:red;float:right;"><b>{{ __('form.books_not_available') }}</b> <i class="bi bi-x-lg"></i></h5>
                    @endif
                    <h5 class="card-title">{{$book->name}}</h5>
                    <h6 class="card-title author">{{$book->author->name}}</h6>
                    <h6 class="card-text">{{ __('form.book_published') }} - {{$book->published_at->format('Y')}}</h6>
                    <h6 class="card-text">{{ __('form.book_genre') }} - {{$book->genre->name}}</h6>
                    <div class="form">
                        <a class="btn btn-small btn-dark" href="{{ url('books/show/' . $book->id) }}">{{ __('form.show') }}</a>
                        @auth
                        @if($book->is_available)
                        <a class="btn btn-small btn-success" href="{{ url('books/choose/' . $book->id) }}">{{ __('form.borrow') }}</a>
                        @endif

                        @if(auth()->user()->role->name == 'Administrator')
                        <a class="btn btn-small btn-info" href="{{ url('books/update/' . $book->id) }}">{{ __('form.edit') }}</a>
                        <form method="POST" action="/books/remove/{{$book->id}}" style="margin-top:5px;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <input type="submit" class="btn btn-small btn-danger" value="{{ __('form.delete') }}" onClick="return confirm('{{$question_delete}}')">
                        </form>
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-lg-4 col-md-6 col-sm-12 custom-card">
            <div class="card h-100">
                <img src="<?= asset('images/not_available.jpg') ?>" class="card-img-top" style="height:400px;" alt="Not available book image">
                <div class="card-body">
                    <h5 class="card-title" style="color:red;"><b>{{ __('form.books_not_available') }}</b> <i class="bi bi-x-lg"></i></h5>
                    <h5 class="card-text">{{ __('form.books_empty') }}</h5>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection