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
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span style="font-size:large">{{ __('Books') }}</span>
                    <a class="btn btn-small btn-primary" style="float:right;" href="{{ url('/books/add') }}">{{ __('Add') }}</a>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align:center">Book Name</th>
                            <th style="text-align:center">Publish Year</th>
                            <th style="text-align:center">Author</th>
                            <th style="text-align:center">Genre</th>
                            <th style="text-align:center">Publisher</th>
                            <th style="text-align:center">Availability</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                        <tr>
                            <td style="text-align:center" class="table-font"><a class="name_ref" href="{{ url('books/update/' . $book->id) }}">{{$book->name}}</a></td>
                            <td style="text-align:center">{{$book->published_at->format('Y')}}</td>
                            <td style="text-align:center">{{$book->author->name}}</td>
                            <td style="text-align:center">{{$book->genre->name}}</td>
                            <td style="text-align:center">{{$book->publisher->name}}</td>
                            <td style="text-align:center">
                                @if($book->is_available)
                                JE
                                @else
                                NIJE
                                @endif
                            </td>
                            <td style="text-align:center">
                                @if(auth()->user()->role->name == 'Administrator')
                                @if($book->is_available)
                                <a class="btn btn-small btn-success" href="{{ url('books/choose/' . $book->id) }}">Pick a book</a>
                                @endif
                                <a class="btn btn-small btn-info" href="{{ url('books/update/' . $book->id) }}">Edit</a>
                                <form method="POST" action="/books/remove/{{$book->id}}" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <input type="submit" class="btn btn-small btn-danger" value="{{ __('Delete') }}" onClick="return confirm('Delete a book?')">
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td style="text-align:center"><b>No Books</b></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection