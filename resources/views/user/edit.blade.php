@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form action="/user/{{ Auth::user()->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" >{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" name="user[name]" value="{{ old('user[name]', Auth::user()->name) }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">{{ __('area') }}</label>

                            <div class="col-md-6">
                                <select name="user[area_id]" id="area_id" class="form-control @error('area_id') is-invalid @enderror">
                                    <option value="">-- 選択してください --</option>
                                    @foreach (App\User::$areas as $key => $area)
                                    <option value="{{ $key }}" @if (old('user[area_id]', Auth::user()->area_id) == $key) selected @endif>{{ $area }}</option>
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
                                <select name="user[job_id]" id="job_id" class="form-control @error('job_id') is-invalid @enderror">
                                    <option value="">-- 選択してください --</option>
                                    @foreach (App\User::$jobs as $key => $job)
                                    <option value="{{ $key }}" @if (old('user[job_id]', Auth::user()->job_id) == $key) selected @endif>{{ $job }}</option>
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
                                    {{ __('Modify') }}
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