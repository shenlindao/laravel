@extends('layouts.default')

@section('content')

<h1>Добавить книгу</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="content">
    <form name="add-new-book" id="add-new-book" action="{{url('store-form')}}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" id="author" name="author" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="published_year">Год издания</label>
            <input type="number" id="published_year" name="published_year" min="1900" max="2099" required>
        </div>

        <div class="form-group select-container">
            <label for="genre">Жанр</label>
            <select name="genre" id="genre" class="form-control" required>
                <option value="fantasy">Fantasy</option>
                <option value="sci-fi">Sci-Fi</option>
                <option value="mystery">Mystery</option>
                <option value="drama">Drama</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>

@stop