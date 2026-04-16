<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une salle</title>
</head>
<body>

<h1>Créer une salle</h1>

<form method="POST" action="{{ route('salles.store') }}" enctype="multipart/form-data">
    @csrf

    {{-- NAME --}}
    <label>Nom</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <span style="color:red">{{ $message }}</span>
    @enderror
    <br><br>

    {{-- DESCRIPTION --}}
    <label>Description</label>
    <textarea name="description">{{ old('description') }}</textarea>
    @error('description')
        <span style="color:red">{{ $message }}</span>
    @enderror
    <br><br>

    {{-- CATEGORY --}}
    <label>Catégorie</label>
    <select name="category_id">
        <option value="">-- Choisir --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <span style="color:red">{{ $message }}</span>
    @enderror
    <br><br>

    {{-- CAPACITY --}}
    <label>Capacité</label>
    <input type="number" name="capacity" value="{{ old('capacity') }}">
    @error('capacity')
        <span style="color:red">{{ $message }}</span>
    @enderror
    <br><br>

    {{-- LOCATION --}}
    <label>Localisation</label>
    <input type="text" name="location" value="{{ old('location') }}">
    @error('location')
        <span style="color:red">{{ $message }}</span>
    @enderror
    <br><br>

    {{-- IMAGE --}}
    <label>Image</label>
    <input type="file" name="image_path">
    @error('image_path')
        <span style="color:red">{{ $message }}</span>
    @enderror
    <br><br>

    {{-- PRICE --}}
    <label>Prix</label>
    <input type="number" step="0.01" name="price" value="{{ old('price') }}">
    @error('price')
        <span style="color:red">{{ $message }}</span>
    @enderror
    <br><br>

    <button type="submit">Créer</button>
</form>

</body>
</html>