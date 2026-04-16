<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Index des catégories</title>
</head>
<body>
    <h1>Index des catégories</h1>
    <a href="{{ route('salles.create') }}">Créer une catégorie</a>
    <ul>
        @foreach ($salles as $salles)
        <div>
            <img src='{{ $salles->image }}' alt='salle1'/>
            <span>{{ $salles->price }}</span>
            <li>{{ $salles->name }}</li>
        </div>
            <button><a href="{{ route('salles.edit', $salles) }}">Modifier</a></button>
             <form method="POST" action="{{ route('salles.destroy', $salles) }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
        @endforeach
    </ul>
</body>
</html>