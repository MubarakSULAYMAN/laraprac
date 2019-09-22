@extends('layouts.app')

@section('title', 'Edit Company Detail')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-md-12"> --}}

            <div class="card">
                <div class="card-header">
                    <p> Edit <b> {{ $data->company_name }} </b> Company Profile </p>
                </div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card-body">

                    <form action="{{ url('company/update, $company->name') }}" method="POST" role="form" enctype="multipart/form-data">

                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <strong> Name </strong>
                                <input type="text" name="name"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    value="{{ $data->company_name }}" placeholder="CompanyName" autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <strong> Address </strong>
                                <input type="text" name="address"
                                    class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                    value="{{ $data->address }}" placeholder="CompanyAddress">

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
                                <input type="email" name="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    value="{{ $data->email }}" placeholder="mail@emailprovider.domain">

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <strong> Logo </strong>
                                <input type="file" name="logo_image"
                                    class="form-control{{ $errors->has('logo_image') ? ' is-invalid' : '' }}"
                                    value="{{ $data->logo_image }}">

                                @if ($errors->has('logo_image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('logo_image') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <strong> Website </strong>
                                <input type="url" name="website"
                                    class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}"
                                    value="{{ $data->website }}" placeholder="www.websiteurl.domain">

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

                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </div>
                            <div class="col-md-4">

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        {{-- </div> --}}

    </div>
</div>

@endsection
