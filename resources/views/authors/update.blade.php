@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{ url('/authors/edit', array($author->id)) }}">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Edit Author') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ __('Author name') }}</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" value="<?php echo $author->name; ?>">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/authors') }}" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">{{ __('Back') }}</a>
                        <input type="submit" class="btn btn-success" value="{{ __('Submit') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection