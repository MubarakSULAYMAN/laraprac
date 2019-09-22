<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title> Touchcore Test </title>
</head>

<body>
    <div id="app">

        <main class="py-4">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header">
                                <p> Register Company </p>
                            </div>

                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif

                            <div class="card-body">

                                <form action="{{ url('company/update, $company->id') }}" method="POST" role="form"
                                    enctype="multipart/form-data" class="form-disable" >

                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong> Name </strong>
                                            <input type="text" name="company_name"
                                                class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}"
                                                value="{{ old('company_name') }}" placeholder="CompanyName" required
                                                autofocus>

                                            @if ($errors->has('company_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('company_name') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <strong> Email </strong>
                                            <input type="email" name="email"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                value="{{ old('email') }}" placeholder="mail@emailprovider.domain"
                                                required>

                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row py-2">
                                        <div class="col-md-6">
                                            <strong> Logo </strong>
                                            <input type="file" name="logo_image"
                                                class="form-control{{ $errors->has('logo_image') ? ' is-invalid' : '' }}"
                                                value="{{ old('logo_image') }}">

                                            @if ($errors->has('logo_image'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('logo_image') }}</strong>
                                            </span>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <strong> Website </strong>
                                            <input type="url" name="website"
                                                class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}"
                                                value="{{ old('website') }}" placeholder="www.websiteurl.domain"
                                                required>

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
                                            <button type="button" onclick="window.location='{{ url("companies") }}'" class="btn btn-success"> Back </button>

                                            {{-- <button type="submit" class="btn btn-primary" {{ method_field('SAVE') }}> Save
                                            </button> --}}
                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Update
                                                    </button>
                            
                                                </div>
                                            </div>
                                            
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">  

{{-- $(.form-disable).on('submit', function() {
    var self = $(this),
    button = self.find('button[type-"submit"], button');

    button.attr('disabled', 'disabled');
}); --}}

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
        </main>

    </div>
</body>

</html>
