<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f5f5f5, #e8f5e9);
        }

        header {
            background: #0a5c36;
            color: white;
            padding: 15px;
            text-align: center;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .card h3 {
            color: #0a5c36;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            background: gold;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
        }

        .btn:hover {
            background: #d4af37;
        }

        footer {
            text-align: center;
            padding: 10px;
            background: #0a5c36;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Bienvenue</h1>
</header>

<h2>Les salles disponibles</h2>

<div class="container">
    @foreach($salles as $salle)
        <div class="card">
            <h3>{{ $salle->name }}</h3>
            <p><strong>Capacité :</strong> {{ $salle->capacity }} personnes</p>
            <p>{{ $salle->description }}</p>
            <p><strong>Prix :</strong> {{ $salle->price }} Fbu</p>

    <a href="{{ route('login') }}" class="btn">
        réserver
    </a>
        </div>
    @endforeach
</div>
<!-- 
<div style="text-align:center;">
    <a href="{{ route('login') }}" class="btn">Réserver</a>
</div> -->

<footer>
    <p>© 2026 - Application de réservation</p>
</footer>

</body>
</html>