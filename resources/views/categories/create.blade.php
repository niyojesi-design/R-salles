<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une catégorie</title>
</head>
<body>
    <h1>Créer une catégorie</h1>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <label for="name">Nom</label>
        <input type="text" name="name" id="name"  value="{{ old('name') }}" placeholder="Nom de la catégorie">
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <button type="submit">Créer</button>
    </form>
</body>
</html>