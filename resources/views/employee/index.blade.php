@extends('layouts.app')

@section('title', 'Registered Employees Details')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <p> Employees </p>
                </div>

                <div class="card-body">
                    <button type="button" onclick="window.location='{{ url("employee/create") }}'"
                        class="btn btn-success"> Create new
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

                                        @foreach($details as $employee)
                                        <tr>
                                            <th scope="row"> {{$employee->id }} </th>
                                            <td> {{$employee->first_name }} </td>
                                            <td> {{$employee->last_name }} </td>
                                            <td> {{$employee->employee_email}} </td>
                                            <td> {{$employee->phone_number }} </td>
                                            <td> {{$employee->company }} </td>
                                            <td>
                                                <button type="button"
                                                    onclick="window.location='{{ url("employee/edit") }}'"
                                                    class="btn btn-light"> Edit
                                                    {{-- <button type="button" onclick="window.location='{{ url("employee/edit", $employee->$first_name .'_' .$last_name .'_' .$id) }}'"
                                                    class="btn btn-light"> Edit --}}
                                                </button>
                                                <button type="button" href="" class="btn btn-danger"> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach

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

<p> Wants to be in <a href="{{ url('companies') }}"> companies </a> ? </p>

@endsection
