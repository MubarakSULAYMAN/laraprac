@extends('layouts.app')

@section('title', 'Add New Employee')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <p> Register Employee </p>
                </div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card-body">

                    <form action="{{ url('employee/save') }}" method="POST" role="form" enctype="multipart/form-data">

                        @csrf
                        
                        <input type="hidden" name="token" value="{{ Session::token() }}">

                        <div class="row">
                            <div class="col-md-6">
                                <strong> First Name </strong>
                                <input type="text" name="first_name"
                                    class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                    value="{{ old('first_name') }}" placeholder="FirstName" autofocus>

                                @if ($errors->has('first_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <strong> Last Name </strong>
                                <input type="text" name="last_name"
                                    class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                    value="{{ old('last_name') }}" placeholder="LastName">

                                @if ($errors->has('last_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-md-6">
                                <strong> Email </strong>
                                <input type="text" name="employee_email "
                                    class="form-control{{ $errors->has('employee_email') ? ' is-invalid' : '' }}"
                                    value="{{ old('employee_email') }}" placeholder="mail@emailprovider.domain">

                                @if ($errors->has('employee_email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('employee_email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <strong> Phone Number </strong>
                                <input type="tel" name="phone_number"
                                    class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                    value="{{ old('phone_number') }}" placeholder="+234815679000">

                                @if ($errors->has('phone_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-md-6">
                                <strong> Company </strong>
                                <select class="form-control{{ $errors->has('company') ? ' is-invalid' : '' }}"
                                    name="company" value="{{ old('company') }}">
                                    <option value=""> Select Company </option>

                                    @foreach($companies as $company)
                                    <option value=" {{ $company->id }} "> {{ $company->name }} </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('company'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-6" style="margin-top:2%;">
                                    <button type="button" onclick="window.location='{{ url("employees") }}'" class="btn btn-success"> Back </button>

                                    <button type="submit" class="btn btn-primary"> Save </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<p> Wants to be in <a href="{{ url('company/create') }}"> create companies </a> or <a href="{{ url('/') }}"> home </a> ? </p>

@endsection
