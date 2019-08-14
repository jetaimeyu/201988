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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="container">
                <form action="{{ route('form.submit') }}" method="post">

                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">标题</label>
                        <input type="text" name="title" class="form-control" placeholder="请输入标题" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="">URL</label>
                        <input type="text" name="url" class="form-control" placeholder="请输入URL" value="{{ old('url') }}">
                    </div>
                    <fileupload-component></fileupload-component>
                    <button type="submit" class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

