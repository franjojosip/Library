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
    <div class="col-md-10" style="margin-left:10px;display: flex; justify-content: flex-end">
        @auth
        @if(auth()->user()->role->name == 'Administrator')
        <a class="btn btn-small btn-primary btn-add" style="margin-bottom: 10px;" href="{{ url('/publishers/add') }}">{{ __('form.publisher_add_new') }}</a>
        @endif
        @endauth
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="padding:0px">
                    <h4 id="title">{{ __('form.publisher_title') }}</h4>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align:center">{{ __('form.publisher_name') }}</th>
                            @auth
                            @if(auth()->user()->role->name == 'Administrator')
                            <th style="text-align:center">{{ __('form.action') }}</th>
                            @endif
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($publishers as $publisher)
                        <tr>
                            <td style="text-align:center">{{$publisher->name}}</td>
                            @auth
                            @if(auth()->user()->role->name == 'Administrator')
                            <td style="text-align:center">
                                <a class="btn btn-small btn-info" href="{{ url('publishers/update/' . $publisher->id) }}">{{ __('form.edit') }}</a>
                                <form method="POST" action="/publishers/remove/{{$publisher->id}}" style="display: inline-block">
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
                            <td style="text-align:center"><b>{{ __('form.publisher_empty') }}</b></td>
                            <td style="text-align:center"></td>
                            <td style="text-align:center"></td>
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