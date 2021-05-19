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
                    <div class="card-header" style="padding:0px">
                        <h1 id="title">{{ __('form.profile_title') }}</h1>
                    </div>
                    <div class="modal-body">
                        <h5 class="modal-text"><b>{{ __('form.profile_username') }}:</b> {{auth()->user()->name}}</h5>
                        <h5 class="modal-text"><b>{{ __('form.profile_email') }}:</b> {{auth()->user()->email}}</h5>
                        <h5 class="modal-text">{{ __('form.profile_message') }} {{auth()->user()->book_limit}} {{ __('form.profile_book') }}.</h5>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <span style="font-size:large"><b>{{ __('form.profile_borrowed') }}</b></span>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align:center">{{ __('form.book_name') }}</th>
                                <th style="text-align:center">{{ __('form.book_publish') }}</th>
                                <th style="text-align:center">{{ __('form.book_author') }}</th>
                                <th style="text-align:center">{{ __('form.book_genre') }}</th>
                                <th style="text-align:center">{{ __('form.book_publisher') }}</th>
                                <th style="text-align:center">{{ __('form.action') }}</th>
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
                                    <a class="btn btn-small btn-success" href="{{ url('profile/return/' . $book->id) }}">{{ __('form.profile_return_book') }}</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td style="text-align:center"><b>{{ __('form.books_empty') }}</th></b></td>
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