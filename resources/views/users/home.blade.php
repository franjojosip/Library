@extends('layouts.app')

@section('content')
@if(session('info'))
<div class="alert alert-success">
    {{session('info')}}
</div>
@endif
@if(session('danger'))
<div class="alert alert-danger">
    {{session('danger')}}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="padding:0px">
                    <h4 id="title">{{ __('form.user_title') }}</h4>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align:center">{{ __('form.user_name') }}</th>
                            <th style="text-align:center">Email</th>
                            <th style="text-align:center">{{ __('form.user_role') }}</th>
                            <th style="text-align:center">{{ __('form.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td style="text-align:center">{{$user->name}}</td>
                            <td style="text-align:center">{{$user->email}}</td>
                            <td style="text-align:center">{{$user->role}}</td>
                            <td style="text-align:center">
                                @if($user->id != Auth::id())
                                <a class="btn btn-small btn-info" href="{{ url('users/update/' . $user->id) }}">{{ __('form.edit') }}</a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td style="text-align:center"><b>{{ __('form.user_empty') }}</b></td>
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