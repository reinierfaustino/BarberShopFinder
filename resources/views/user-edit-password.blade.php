@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>{{ __('Edit Password') }}</h3></div>
                <div class="card-body">
                  @if (!Auth::user()->provider_id)
                  <form method="POST" action="{{ route('profile.edit.password') }}">
                      @csrf
                      <div class="form-group row">
                          <label for="oldpassword" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                          <div class="col-md-6">
                              <input id="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" name="oldpassword" autocomplete="old-password">

                              @error('oldpassword')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                          <div class="col-md-6">
                              <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                          </div>
                      </div>

                      <div class="form-group row mb-0 justify-content-center">
                          <div class="col-md-6 offset-md-2">
                              <button type="submit" class="btn btn-primary col-md-12">
                                  {{ __('Save') }}
                              </button>
                          </div>
                      </div>
                  </form>
                  @else
                  <i><h4>You are logged in with {{ ucfirst(Auth::user()->provider_id) }}. Please change your password at their respective site.</h4></i>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
