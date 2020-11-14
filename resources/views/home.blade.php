@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h6 class="font-weight-bold">Your API token:</h6>
                        @if(Session::has('raw.api.token'))
                            <div class="alert alert-success" role="alert">
                                <strong>{{ Session::get('raw.api.token') }}</strong>
                            </div>
                            <span
                                class="text-danger">Your token is only visible once! Please store it safely!</span>
                            <br>
                        @elseif(Auth::user()->api_token_preview !== null)
                            <div class="alert alert-primary" role="alert">
                                <strong>{{ Auth::user()->api_token_preview }}...</strong>
                            </div>
                        @else
                            You don't have API token yet. Please click button below to create you first one! <br>
                        @endisset

                        <a
                            id="generate-api-token-button"
                            class="btn mt-2 btn-primary"
                            href="{{ route('token-generate') }}"
                            role="button"
                        >Generate new API token</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
