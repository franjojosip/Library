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
                    <span style="font-size:large">{{ __('Genres') }}</span>
                    <a class="btn btn-small btn-primary" style="float:right;" href="{{ url('/genres/add') }}">{{ __('Add') }}</a>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align:center">Genre</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($genres as $genre)
                        <tr>
                            <td style="text-align:center">{{$genre->name}}</td>
                            <td style="text-align:center">
                                @if(auth()->user()->role->name == 'Administrator')
                                <a class="btn btn-small btn-info" href="{{ url('genres/update/' . $genre->id) }}">Edit</a>
                                <form method="POST" action="/genres/remove/{{$genre->id}}" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <input type="submit" class="btn btn-small btn-danger" value="{{ __('Delete') }}" onClick="return confirm('Delete a genre?')">
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td style="text-align:center"><b>No Genres</b></td>
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