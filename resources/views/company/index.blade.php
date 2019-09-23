@extends('layouts.app')

@section('title', 'Registered Companis Details')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <p> Registered Companies </p>
                </div>

                <div class="card-body">
                    <button type="button" onclick="window.location='{{ url("company/create") }}'"
                        class="btn btn-success">
                        Create new company </button>
                </div>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{session('status')}}
                </div>
                @endif

                <div class="card-body">

                    <div class="card">
                        <div class="card-header">
                            <p> Companies List </p>
                        </div>

                        <div class="card-body">

                            {{-- @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                        @endif --}}

                        <div class="table-responsive">
                            <table class="table table-sm table-striped table-hover table-bordered">

                                @csrf

                                <thead>
                                    <tr>
                                        <th scope="col" width="20px"> No </th>
                                        <th scope="col" width="140px"> Name </th>
                                        <th scope="col" width="180px"> Address </th>
                                        <th scope="col" width="80px"> Website </th>
                                        <th scope="col" width="120px"> Email </th>
                                        <th scope="col" width="60px"> Action </th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($datas as $company)
                                    <tr>
                                        <th scope="row"> {{$company->id }} </th>
                                        <td> {{$company->name }} </td>
                                        <td> {{$company->address }} </td>
                                        <td> {{$company->website }} </td>
                                        <td> {{$company->company_email}} </td>
                                        <td>
                                            <button type="button"
                                                onclick="window.location='{{ url("company/edit", $company->name) }}'"
                                                class="btn btn-light"> Edit
                                            </button>

                                            @csrf
                                            @method('DELETE')
                                            <button type="button"
                                                href="{{ url('company.destroy', $company->name)}}"
                                                class="btn btn-danger" onClick="
                                                $('a.delete').on('click', function() {
                                                    var choice = confirm('Do you really want to delete this record?');
                                                    if(choice === true) {
                                                        return true;
                                                    }
                                                    return false;
                                                });"> Delete
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

<p> Wants to be in <a href="{{ url('employees') }}"> employees </a> ? </p>

@endsection
