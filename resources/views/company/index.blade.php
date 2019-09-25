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
                    <button onclick="window.location='{{ url("company/create") }}'" class="btn btn-success">
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

                            @if(session()->get('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div><br />
                            @endif

                            <div class="table-responsive">
                                <table class="table table-sm table-striped table-hover table-bordered">

                                    @csrf

                                    <input type="hidden" name="token" value="{{ Session::token() }}">

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
                                            <td> {{$company->company_email }} </td>
                                            <td>
                                                <button
                                                    onclick="window.location='{{ url("company/edit", $company->name) }}'"
                                                    class="btn btn-light"> Edit
                                                </button>

                                                <form class="btn" method="POST" action="company/delete/{{$company->name }}">
                                                    
                                                    @csrf 
                                                    @method('DELETE')
                                            
                                                        <input type="submit" class="btn btn-danger" value="Delete" onClick="return confirm('Are you sure you want to delete this? Changes are irreversible.')" >
                                                </form>


                                                {{-- <button method="DELETE" type="submit" formaction="company/delete/{{$company->name }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this? Changes are irreversible.') " > Delete </button> --}}

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

    <p> Wants to be in <a href="{{ url('employees') }}"> employees </a> or <a href="{{ url('/') }}"> home </a> ? </p>

    @endsection
