@extends('layouts.default')

@section('content')
    <h1>Добро пожаловать на главную страницу</h1>
    <div class="content">
        <p>Имя: {{ $name }}</p>
        <p>Должность: {{ $position }}</p>
        <p>Адрес: {{ $address }}</p>

        @if($age > 18)
        <p>Возраст: {{ $age }}</p>
        @else
        <p>Этот человек слишком молод.</p>
        @endif
    </div>

@stop