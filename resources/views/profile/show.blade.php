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
                <div class="card">
                    <div class="card-header">
                        <span style="font-size:large">{{ __('Profile') }}</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-text">Username: Admin</h5>
                        <h5 class="card-text">Email: admin@mail.com</h5>
                        <h5 class="card-text">You can only borrow 3 books.</h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <span style="font-size:large">{{ __('Borrowed books') }}</span>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align:center">Book Name</th>
                                <th style="text-align:center">Publish Year</th>
                                <th style="text-align:center">Author</th>
                                <th style="text-align:center">Genre</th>
                                <th style="text-align:center">Publisher</th>
                                <th style="text-align:center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($books as $book)
                            <tr>
                                <td style="text-align:center">{{$book->name}}</td>
                                <td style="text-align:center">{{$book->published_at->format('Y')}}</td>
                                <td style="text-align:center">{{$book->author->name}}</td>
                                <td style="text-align:center">{{$book->genre->name}}</td>
                                <td style="text-align:center">{{$book->publisher->name}}</td>
                                <td style="text-align:center">
                                    <a class="btn btn-small btn-success" href="{{ url('profile/return/' . $book->id) }}">Return book</a>
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
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection