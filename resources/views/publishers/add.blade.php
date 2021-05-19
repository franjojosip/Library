@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="POST" action="{{ url('/publishers/create') }}">
                    {{csrf_field()}}
                    <div class="card-header" style="padding:0px">
                        <h4 id="title">{{ __('form.publisher_add') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group ">
                                <label>{{ __('form.publisher_name') }}</label>
                                <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/publishers') }}" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">{{ __('form.back') }}</a>

                        <input type="submit" class="btn btn-success" value="{{ __('form.submit') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection