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
        <link rel="icon" type="image" href="assets/kittycamp.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/scss" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/scss" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="sass/app.scss" rel="stylesheet" />
</head>
<body id="app">

<div class="subscription-centered-header">Subscription Plans</div>
<body class="subscription-body">
    <div class="subscription-container">
    <div class="subscription-card">
      <h2 class="subscription-card-title">Free</h2>
      <div class="subscription-card-price">$0/month</div>
      <p class="subscription-card-description">Access to free features</p>
      <a href="#" class="subscription-card-button">Subscribe Now</a>
    </div>
    
    <div class="subscription-card">
      <h2 class="subscription-card-title">Basic</h2>
      <div class="subscription-card-price">$9.99/month</div>
      <p class="subscription-card-description">Access to basic features</p>
      <a href="#" class="subscription-card-button">Subscribe Now</a>
    </div>
    
    <div class="subscription-card">
      <h2 class="subscription-card-title">Premium</h2>
      <div class="subscription-card-price">$19.99/month</div>
      <p class="subscription-card-description">Access to premium features</p>
      <a href="#" class="subscription-card-button">Subscribe Now</a>
    </div>
  </div>
<script src="../js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>

@endsection
