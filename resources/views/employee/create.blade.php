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
                                <p> Register Employee </p>
                            </div>

                            <div class="card-body">

                                <form action="{{ url('employee/create') }}" method="POST">

                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong> First Name </strong>
                                            <input type="text" name="first_name"
                                                class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                value="{{ old('first_name') }}" placeholder="FirstName" required
                                                autofocus>

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
                                                value="{{ old('last_name') }}" placeholder="LastName" required>

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

                                        <div class="col-md-6">
                                            <strong> Phone Number </strong>
                                            <input type="number" name="phone_number"
                                                class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}"
                                                value="{{ old('phone_number') }}" placeholder="+234815679000" required>

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
                                            <select class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('company_name') }}" required>
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
                                            <button type="button" href="{{ url('employee') }}" class="btn btn-success"> Back </button>

                                            <button type="button" type="submit" class="btn btn-primary"> Save
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </div>

    </main>
    </div>
</body>

</html>
