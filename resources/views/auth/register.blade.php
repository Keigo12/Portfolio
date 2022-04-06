@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

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
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('生年月日') }}</label>

                            <div class="col-md-6">
                                <input id="birthdayr" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthdayr') }}"  placeholder="2022/01/01">

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                          <div class="form-group row">
                            <label for="sex_id" class="col-md-4 col-form-label text-md-right">{{ __('sex') }}</label>

                            <div class="col-md-6">
                                <select name="sex_id" id="sex_id" class="form-control @error('sex_id') is-invalid @enderror">
                                    <option value="">-- 選択してください --</option>
                                    <option value="1">男性</option>
                                    <option value="2">女性</option>
                                    <option value="3">その他</option>
                                </select>

                                @error('sex_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        
                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('area') }}</label>

                            <div class="col-md-6">
                                <select name="area_id" id="area_id" class="form-control @error('area_id') is-invalid @enderror">
                                    <option value="">-- 選択してください --</option>
                                    @foreach (App\User::$areas as $key => $area)
                                    <option value="{{ $key }}" @if (old('area_id') == $key) selected @endif>{{ $area }}</option>
                                    @endforeach
                                </select>

                                @error('area_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="job" class="col-md-4 col-form-label text-md-right">{{ __('job') }}</label>

                            <div class="col-md-6">
                                <select name="job_id" id="job_id" class="form-control @error('job_id') is-invalid @enderror">
                                    <option value="">-- 選択してください --</option>
                                    @foreach (App\User::$jobs as $key => $job)
                                    <option value="{{ $key }}" @if (old('job_id') == $key) selected @endif>{{ $job }}</option>
                                    @endforeach
                                </select>

                                @error('job_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
