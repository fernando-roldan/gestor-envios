<!DOCTYPE html>
<html lang="en"{{ str_replace('_', '-', app()->getLocale()) }}>

    <head>
        @include('layouts.simple.head')
        @include('layouts.simple.css')
    </head>
    <body>
        <main class="main" id="top">
            @include('layouts.simple.sidebar')
            @include('layouts.simple.header')
            <div class="content">
                <div id="app">
                    @yield('main_content')
                </div>
                @include('layouts.simple.footer') 
            </div>
        </main>
        @include('layouts.simple.scripts')
    </body>
</html>