@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ url('/authors/create') }}">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Add author') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group ">
                                <label>{{ __('Author full name') }}</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/authors') }}" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">{{ __('Back') }}</a>

                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection