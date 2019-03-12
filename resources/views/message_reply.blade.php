@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Message Reply') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('reply_message') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="login_name" class="col-md-3 col-form-label text-md-right">{{ __('Subject') }}</label>

                            <div class="col-md-8">
                                {{ $item[0]->subject }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="login_name" class="col-md-3 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-8">
                            	{{ $item[0]->message }}
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="reply_message" class="col-md-3 col-form-label text-md-right">{{ __('Reply Message') }}</label>

                            <div class="col-md-8">
                                <textarea class="col-md-12" name="reply_message" rows="8"></textarea>

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="{{ $item[0]->id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
