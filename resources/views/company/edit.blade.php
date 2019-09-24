@extends('layouts.app')

@section('title', 'Edit Company Detail')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-12"> --}}
            {{-- @foreach ($datas as $data) --}}
            <div class="card">
                <div class="card-header">
                    <p> Edit <b> {{ $data->name }} </b> Company Profile </p>
                </div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card-body">

                    <form action="{{ url('company/update', $data->id) }}" method="POST" role="form" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="token" value="{{ Session::token() }}">

                        <div class="row">
                            <div class="col-md-6">
                                <strong> Name </strong>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $data->name }}" placeholder="CompanyName" autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <strong> Address </strong>
                                <input type="text" name="address"
                                    class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ $data->address }}" placeholder="CompanyAddress">

                                @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="row py-2">
                            <div class="col-md-5">
                                <strong> Email </strong>
                                <input type="text" name="company_email" class="form-control{{ $errors->has('company_email ') ? ' is-invalid' : '' }}" value="{{ $data->company_email }}" placeholder="mail@emailprovider.domain">

                                @if ($errors->has('company_email '))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('company_email ') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <strong> Logo </strong>
                                <input type="file" name="image_logo"
                                    class="form-control{{ $errors->has('image_logo') ? ' is-invalid' : '' }}"
                                    >
                                    {{-- value="{{ $data->image_logo }}"> --}}

                                @if ($errors->has('image_logo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('image_logo') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <strong> Website </strong>
                                <input type="url" name="website" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" value="{{ $data->website }}" placeholder="www.websiteurl.domain">

                                @if ($errors->has('website'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('website') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row py-2">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <button type="button" onclick="window.location='{{ url("companies") }}'"
                                    class="btn btn-success"> Back </button>

                                <button type="submit" class="btn btn-primary"> Update
                                </button>
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </form>

                </div>
            </div>

            {{-- @endforeach --}}
        {{-- </div> --}}

    </div>
</div>

<p> Wants to be in <a href="{{ url('employee/edit/{first_name}.{_}.{last_name}.{_}.{id}') }}"> edit employees </a> or <a href="{{ url('/') }}"> home </a> ? </p>

@endsection
