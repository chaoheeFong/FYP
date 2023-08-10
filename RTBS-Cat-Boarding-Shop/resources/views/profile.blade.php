@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Kitty camp</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/kittycamp.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/scss" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/scss" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="sass/app.scss" rel="stylesheet" />
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
<body>
  <div class="container">
    <div class="profile mt-5">
      <div class="text-center">
        <h1 class="mb-4">Kitty Camp Profile</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header text-center">
              <h5 class="card-title">{{ Auth::user()->name }}</h5>
            </div>
            <div class="card-body">
              <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
              <p><strong>Email Address:</strong> {{ Auth::user()->email }}</p>
              <p><strong>Contact:</strong> {{ Auth::user()->contact }}</p>
              <p><strong>Role:</strong> {{ Auth::user()->role }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
@endsection