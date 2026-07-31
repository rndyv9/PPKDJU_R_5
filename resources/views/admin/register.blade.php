
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Form | Portofolio Rendy</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets_admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets_admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <div class="text-center mb-4">
                                @error('email')
                                    <span class="bg-danger text-white p-2 rounded">{{ $message }}</span>
                                @enderror
                            </div>

                            <form class="user" method="post" action="{{ route('action-register') }}">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="fname" class="form-control form-control-user" id="fnama"
                                            placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lname" class="form-control form-control-user" id="lnama"
                                            placeholder="Last Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="email"
                                        placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="password" placeholder="Password" required>
                                        <small id="password-warning" class="form-text text-danger" style="display: none;">Password minimal 6 karakter</small>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="repeat" class="form-control form-control-user"
                                            id="repeat" placeholder="Repeat Password" required>
                                            <small id="repeat-warning" class="form-text text-danger" style="display: none">Password tidak sama</small>
                                    </div>

                                </div>
                                <button type="submit" id="submit-btn" name="submit" class="btn btn-primary btn-user btn-block">
                                    Register Now</button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets_admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets_admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets_admin/js/sb-admin-2.min.js') }}"></script>

    <script>
        const passwordInput = document.getElementById('password');
        const warningText = document.getElementById('password-warning');
        const repeatInput = document.getElementById('repeat');
        const repeatWarningText = document.getElementById('repeat-warning');
        const submitBtn = document.getElementById('submit-btn');
        submitBtn.disabled = true;

        passwordInput.addEventListener('input', function() {
            // console.log('test');
            if (this.value.length > 0 && this.value.length < 3) {
                warningText.style.display = 'inline';
                submitBtn.disabled = true;
            } else {
                submitBtn.disabled = true;
                warningText.style.display = 'none'
            }
        });

        repeatInput.addEventListener('input', function() {
            if (this.value !== passwordInput.value) {
                repeatWarningText.style.display = 'inline';
                submitBtn.disabled = true;
            } else {
                submitBtn.disabled = false;
                repeatWarningText.style.display = 'none';
            }
        });
    </script>

</body>

</html>
