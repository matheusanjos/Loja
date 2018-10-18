<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{asset('css/app.css')}}" rel = "stylesheet">
    <link href="{{asset('css/style.css')}}" rel = "stylesheet">
    <meta name="csrf-token" content = "{{csrf_token()}}">
    <title>Lojinha</title>
</head>
<body>

    <div class = "container">

        @component('components.nav', ['current'=>$current])
        @endcomponent

        @hasSection('body')
            @yield('body')
        @endif

    </div>
    <script src="{{asset('js/app.js')}}" type = "text/javascript"></script>
</body>
</html>