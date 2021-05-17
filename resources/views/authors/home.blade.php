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
                    <span style="font-size:large">{{ __('Authors') }}</span>
                    <a class="btn btn-small btn-primary" style="float:right;" href="{{ url('/authors/add') }}">{{ __('Add') }}</a>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="text-align:center">Author Name</th>
                            <th style="text-align:center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($authors as $author)
                        <tr>
                            <td style="text-align:center">{{$author->name}}</td>
                            <td style="text-align:center">
                                @if(auth()->user()->role->name == 'Administrator')
                                <a class="btn btn-small btn-info" href="{{ url('authors/update/' . $author->id) }}">Edit</a>
                                <form method="POST" action="/authors/remove/{{$author->id}}" style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <input type="submit" class="btn btn-small btn-danger" value="{{ __('Delete') }}" onClick="return confirm('Delete an author?')">
                                </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td style="text-align:center"><b>No Authors</b></td>
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