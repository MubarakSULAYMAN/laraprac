@include('layouts.inc.header')

<body>

    <div id="app">

        @include('layouts.inc.nav')

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">

                    {{-- @if(auth('')->user())
                        @yield('content')
                    @endif --}}
                    @yield('content')
                    
                </div>
            </div>
        </main>

    </div>

</body>
