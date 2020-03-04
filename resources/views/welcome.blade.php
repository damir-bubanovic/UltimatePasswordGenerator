<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Ultimate Password Generator">
        <meta name="keywords" content="Password Generator">
        <meta name="author" content="Damir Bubanovic">

        <title>Ultimate Password Generator</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        {{-- <style src="{{ asset('sass/app.scss') }}"></style> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    </head>
    <body>

        {{-- News Bar --}}
        <div class="fixed-top">
            @include('components.news')
        </div>

        {{-- Main Content --}}
        <div id="app" class="flex-center position-ref full-height">

            <div class="content">
                @include('components.title')
                <div>
                    <create-pass-component></create-pass-component>
                </div>
            </div>

        </div>

        {{-- Go To Creator --}}
        <div class="fixed-bottom">
            @include('components.creator')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
