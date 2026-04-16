<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #333;
        }

        /* NAVBAR */
        .navbar {
            background: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .navbar a {
            margin: 0 10px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #4a90e2;
        }

        .container {
            padding: 30px;
        }

        /* FORM */
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background: #4a90e2;
            color: white;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <div>
            <a href="/">Accueil</a>
            <a href="/about">About</a>
            <a href="/reservation">Réservation</a>
        </div>

        <div>
            <a href="/login">Connexion</a>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">

        <h1>Réservation</h1>
        <p>Créer une nouvelle réservation de salle</p>

        <form method="POST" action="{{ route('client.reservations.store', ['salle_id' => $salle->id]) }}">
            @csrf

            <label>ID Salle</label>
            <input type="text" name="salle_id" placeholder="Ex: 1">

            <label>Date début</label>
            <input type="datetime-local" name="start_time">

            <label>Date fin</label>
            <input type="datetime-local" name="end_time">

            <button class="btn btn-primary">Réserver</button>
        </form>

    </div>

</body>
</html>