@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Message Box') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('message') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="login_name" class="col-md-3 col-form-label text-md-right">{{ __('Subject') }}</label>

                            <div class="col-md-8">
                                <input id="subject" type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ old('subject') }}" required autofocus>

                                @if ($errors->has('subject'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="login_name" class="col-md-3 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-8">
                            	<textarea class="col-md-12" name="message" rows="8"></textarea>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
