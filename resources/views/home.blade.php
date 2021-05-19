@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="modal-header" style="padding:5px">
                    <h4 id="dashboard">{{ __('form.dashboard') }}</h4>
                </div>

                <div class="modal-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('form.logged_in') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection