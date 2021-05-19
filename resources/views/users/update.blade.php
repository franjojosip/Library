@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="post" action="{{ url('/users/edit', array($user->id)) }}">
                    {{csrf_field()}}
                    @method('PUT')
                    <div class="card-header" style="padding:0px">
                        <h4 id="title">{{ __('form.user_edit') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ __('form.user_name') }}</label>
                            <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" value="<?php echo $user->name; ?>">
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('form.user_role') }}</label>
                            <select name="role_id" class="form-control {{ $errors->has('role_id') ? 'has-error' : '' }}" style="width:250px" required>
                                @foreach ($roles as $value)
                                <option value="{{ $value->id }}" {{ $value->id == $selected_role ? 'selected' : '' }}>{{ $value->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role_id'))
                            <span class="text-danger">{{ $errors->first('role_id') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>{{ __('form.user_book_limit') }}</label>
                            <input type="text" name="book_limit" class="form-control {{ $errors->has('book_limit') ? 'has-error' : '' }}" value="<?php echo $user->book_limit; ?>">
                            @if ($errors->has('book_limit'))
                            <span class="text-danger">{{ $errors->first('book_limit') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/users') }}" type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">{{ __('form.back') }}</a>
                        <input type="submit" class="btn btn-success" value="{{ __('form.submit') }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection