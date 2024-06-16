<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Club Parascolaire</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/assets2/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets2/css/templatemo-scholar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets2/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets2/css/animate.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            text-align: center;
            font-weight: 700;
            color: #343a40;
        }

        h2 {
            font-size: 1.5rem;
            margin-top: 10px;
        }

        hr {
            border: 0;
            height: 1px;
            background: #ccc;
            margin: 20px auto;
            width: 80%;
        }

        h4, p {
            text-align: center;
            font-weight: 400;
            color: #555;
        }

        .btn-custom {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        .container {
            margin-top: 50px;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .highlight {
            color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Détails du Club</h1>
        <hr />
        <h2><span class="highlight">Club:</span>  {{ $clubs->name }}</h2>
        <div><h2 ><span class="highlight">Responsable:</span>  {{ $clubs->responsable->name }}</h2></div>
        <div><h2 class="highlight">Description:</h2> <p>{{ $clubs->description }}</p></div>
        <a href="{{ route('userFront.index') }}" class="btn-custom">Retour</a>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom jQuery Scripts -->
    <script>
        $(document).ready(function() {
            // Animation pour les titres et le bouton
            $('h1, h2').hide().fadeIn(1000);
            $('.btn-custom').hide().slideDown(1000);

            // Changer le fond de la description au survol
            $('p').hover(
                function() {
                    $(this).css('background-color', '#e9ecef');
                }, function() {
                    $(this).css('background-color', '#fff');
                }
            );

            // Animation au clic du bouton
            $('.btn-custom').click(function() {
                $(this).animate({
                    opacity: 0.5,
                    fontSize: "1.5em"
                }, 200 ).animate({
                    opacity: 1,
                    fontSize: "1em"
                }, 200 );
            });
        });
    </script>
</body>

</html>
