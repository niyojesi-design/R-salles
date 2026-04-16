<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une catégorie</title>
</head>
<body>
    <h1>Modifier une catégorie</h1>
    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf
        @method('PUT')
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" placeholder="Nom de la catégorie">
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <button type="submit">Modifier</button>
    </form>
</body>
</html>