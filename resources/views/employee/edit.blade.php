@extends('layouts.app')

@section('title', 'Edit Employee Detail')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-12"> --}}

            <div class="card">
                <div class="card-header">
                    <p> Edit <b> {{ $data->first_name . " ". $data->last_name }} </b> Profile </p>
                </div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card-body">

                    <form action="{{ url('employee/create') }}" method="POST" role="form" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <strong> First Name </strong>
                                <input type="text" name="first_name"
                                    class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                    value="{{ $data->first_name }}" placeholder="FirstName" autofocus>

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
                                    value="{{ $data->last_name }}" placeholder="LastName">

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
                                    class="form-control{{ $errors->has('employee_email ') ? ' is-invalid' : '' }}"
                                    value="{{ $data->employee_email }}" placeholder="mail@emailprovider.domain">

                                @if ($errors->has('employee_email '))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('employee_email ') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <strong> Phone Number </strong>
                                <input type="number" name="phone_number"
                                    class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                    value="{{ $data->phone_number }}" placeholder="+234815679000">

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
                                <select class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}"
                                    name="company_name" value="{{ $data->company_name }}">
                                    <option value=""> Select Company </option>

                                    @foreach($companies as $company)
                                    <option value=" {{ $company->id }} "> {{ $company->company_name }} </option>
                                    @endforeach
                                </select>

                                @if ($errors->has('company_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-6" style="margin-top:2%;">
                                <div class="col-md-4">

                                </div>
                                <button type="button" onclick="window.location='{{ url("employees") }}'" class="btn btn-success"> Back
                                </button>

                                <button type="submit" class="btn btn-primary"> Save
                                </button>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>

<p> Wants to be in <a href="{{ url('employee/edit/{name}') }}"> edit employees </a> ? </p>

@endsection
