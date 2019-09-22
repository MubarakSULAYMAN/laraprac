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
                                <p> Employees </p>
                            </div>

                            <div class="card-body">
                                <button type="button" href="" class="btn btn-success"> Create new
                                    employee </button>
                            </div>

                            <div class="card-body">

                                <div class="card">
                                    <div class="card-header">
                                        <p> Employees List </p>
                                    </div>

                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-sm table-striped table-hover table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" width="20px"> No </th>
                                                        <th scope="col" width="70px"> First Name </th>
                                                        <th scope="col" width="70px"> Last Name </th>
                                                        <th scope="col" width="100px"> Email </th>
                                                        <th scope="col" width="80px"> Phone Number </th>
                                                        <th scope="col" width="100px"> Company </th>
                                                        <th scope="col" width="80px"> Action </th>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                    {{-- @foreach  --}}
                                                    <tr>
                                                        <th scope="row"> ->id }} </th>
                                                        <td> ->first_name }} </td>
                                                        <td> ->last_name }} </td>
                                                        <td> ->email }} </td>
                                                        <td> ->phone_number }} </td>
                                                        <td> ->company }} </td>
                                                        <td>
                                                            <button type="button" href="" class="btn btn-light"> Edit
                                                            </button>
                                                            <button type="button" href="" class="btn btn-danger"> Delete
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    {{-- @endforeach --}}

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

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
