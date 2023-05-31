<!DOCTYPE html>
<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <title>Laravel Crud Package</title>
        <link rel='stylesheet' href="{{ asset('vendor/crud/css/datatable.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <script src="{{ asset('vendor/crud/js/jquery-3.7.0-min.js') }}"></script>
        <script src="{{ asset('vendor/crud/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('vendor/crud/js/datatable.js') }}"></script>
        <script src="{{ asset('vendor/crud/js/app.js') }}"></script>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row mb-3">
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
            <div class="viewModal modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true"></div>
        </div>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
            
    </body>
</html>