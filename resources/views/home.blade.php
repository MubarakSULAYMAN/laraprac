@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <b> Activity Dashboard </b> </div>

                <div class="card-body">
                        @if (session('status==1'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>

                            @elseif(auth('')->user())
                                <div class="card-body">
                                    
                                    <p> Welcome here {{ Auth::user()->name}} , your last login was at {{ Auth::user()->last_login_at }} via {{ auth('')->user()->last_login_ip }}. </p>
                                    <p> Will you like to check the registered <a href="{{ url('employees') }}"> employees </a> or <a href="{{ url('companies') }}"> companies </a>. </p>
                                    
                                </div>
                        
                            @else

                                @unless (Auth::check())
                                    You are not signed in.
                                @endunless

                                {{-- @guest()
                                    You are not signed in.
                                @endguest --}}
                        @endif
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
