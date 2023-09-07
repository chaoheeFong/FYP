@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
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
    </head>

    <style>.star {
    cursor: pointer;
    font-size: 24px;
    margin-right: 5px;
}

.selected {
    color: #FFD700;
}</style>


<body>

<div class="container">
    <h1>Feedback Now!</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('feedback.submit') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="service">Service:</label>
            <select id="service" name="service" class="form-control" required>
                <option value="cat-boarding">Cat Boarding</option>
                <option value="cat-grooming">Cat Grooming</option>
                <option value="vet-medic">Vet Medic</option>
            </select>
        </div>

        <div id="star-container" class="form-group"></div>
<input type="hidden" id="star" name="star" required>

        <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
        </div>
        
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const starContainer = document.getElementById('star-container');
        const starInput = document.getElementById('star');
        
        for (let i = 1; i <= 5; i++) {
            const star = document.createElement('span');
            star.innerHTML = '&#9733;';
            star.classList.add('star');
            star.addEventListener('click', function() {
                starInput.value = i;
                updateStars(i);
            });
            starContainer.appendChild(star);
        }

        function updateStars(selected) {
            const stars = document.querySelectorAll('.star');
            stars.forEach(function(star, index) {
                if (index < selected) {
                    star.classList.add('selected');
                } else {
                    star.classList.remove('selected');
                }
            });
        }
    });
</script>
<script src="../js/app.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
@endsection
