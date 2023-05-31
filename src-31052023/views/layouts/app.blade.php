<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <title>Laravel Crud Package</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    @if(request()->route()->getName() == 'index')
                        <a href="{{ route('create') }}" class="btn btn-primary float-end">Add</a>
                    @endif
                    @if(request()->route()->getName() == 'create')
                        <a href="{{ route('index') }}" class="btn btn-primary float-end">List</a>
                    @endif
                </div>
            </div>
            @yield('content')
        </div>
    </body>
</html>