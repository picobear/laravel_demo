@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Message List') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('message') }}">
                        @csrf

                        

                        @foreach ($lists as $list)
                            <div class="form-group row">
                                <label for="login_name" class="col-md-3 col-form-label">{{ __($list->subject) }}</label>

                                <div class="col-md-8 col-form-label">
                                    {{ __($list->message) }}
                                </div>
                            </div>
                        @endforeach

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
