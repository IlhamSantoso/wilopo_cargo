<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('cms-admin/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ url('cms-admin/vendors/base/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('cms-admin/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ url('cms-admin/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ url('cms-admin/images/logo.svg') }}" alt="logo">
              </div>
              <h6 class="font-weight-light">Masuk untuk melanjutkan.</h6>
              <form class="pt-3" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg @error('username') is-invalid @enderror" id="exampleInputEmail1"
                    placeholder="Username" name="username" value="{{ old('username') }}" autofocus required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="exampleInputPassword1"
                    placeholder="Password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                @if (session()->has('LoginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ session('LoginError') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                @endif
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="{{ route('dashboard') }}">
                    SIGN IN
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ url('cms-admin/vendors/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ url('cms-admin/js/off-canvas.js') }}"></script>
  <script src="{{ url('cms-admin/js/hoverable-collapse.js') }}"></script>
  <script src="{{ url('cms-admin/js/template.js') }}"></script>
  <!-- endinject -->
</body>

</html>