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
<div class="container authors">
    <div class="col-md-10" style="margin-left:10px;display: flex; justify-content: flex-end">
        @auth
        @if(auth()->user()->role->name == 'Administrator')
        <a class="btn btn-small btn-primary btn-add" style="margin-bottom: 10px;" href="{{ url('/authors/add') }}">{{ __('form.author_add_new') }}</a>
        @endif
        @endauth
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="padding:0px">
                    <h4 id="title">{{ __('form.author_title') }}</h4>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align:center">{{ __('form.author_name') }}</th>
                            @auth
                            @if(auth()->user()->role->name == 'Administrator')
                            <th style="text-align:center">{{ __('form.action') }}</th>
                            @endif
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($authors as $author)
                        <tr>
                            <td style="text-align:center">{{$author->name}}</td>
                            @auth
                            @if(auth()->user()->role->name == 'Administrator')
                            <td style="text-align:center;">
                                <a class="btn btn-small btn-info" href="{{ url('authors/update/' . $author->id) }}">{{ __('form.edit') }}</a>
                                <form method="POST" action="/authors/remove/{{$author->id}}" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <input type="submit" class="btn btn-small btn-danger" value="{{ __('form.delete') }}" onClick="return confirm('{{$question_delete}}')">
                                </form>
                            </td>
                            @endif
                            @endauth
                        </tr>
                        @empty
                        <tr>
                            <td style="text-align:center"><b>{{ __('form.author_empty') }}</b></td>
                            @auth
                            @if(auth()->user()->role->name == 'Administrator')
                            <td style="text-align:center"></td>
                            @endif
                            @endauth
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection