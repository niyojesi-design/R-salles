<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Index des catégories</title>
</head>
<body>
    <h1>Index des catégories</h1>
    <a href="{{ route('categories.create') }}">Créer une catégorie</a>
    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
            <button><a href="{{ route('categories.edit', $category) }}">Modifier</a></button>
             <form method="POST" action="{{ route('categories.destroy', $category) }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
        @endforeach
    </ul>
</body>
</html>