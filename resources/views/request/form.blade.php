<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <title>表单请求</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <div class="container">
                <form action="">
                    <fileupload-component></fileupload-component>
                    <button type="submit" class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

