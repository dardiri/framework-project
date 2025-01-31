<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Karir - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-8 col-md-5 pt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center mb-4">
                                        <h1 class="h4 text-gray-900">Halo! Silahkan Login </h1>
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                        @endif
                                        @if($message = Session::get('failed'))
                                        <div class="alert alert-danger">
                                            <p>{{ $message }}</p>
                                        </div>
                                        @endif
                                    </div>
                                    <form class="user" action="{{ route('login.auth') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="identity" class="form-control form-control-user"
                                                id="login-identity" value="{{ old('identity') }}"
                                                placeholder="Masukkan Email atau Username">
                                        </div>
                                        @if ($errors->has('identity'))
                                            <div class="alert alert-danger">{{ $errors->first('identity') }}</div>
                                        @endif
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="login-pass" placeholder="Password">
                                        </div>
                                        @if ($errors->has('password'))
                                            <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ url('registrasi') }}">Buat Akun</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ url('forget-password') }}">Lupa Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @include('layouts.back-end._js')

</body>

</html>
