<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        - Restoran App | @stack('app_title') -
    </title>

    @include('pages.layouts.css.style-css')

    @stack('app_css')

</head>

<body id="page-top">

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ url('/login') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="username" class="form-control" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('pages.layouts.js.style-js')

    @stack('app_js')

</body>

</html>
