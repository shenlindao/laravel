@extends('layouts.default')

@section('content')
    <h1>Контактная информация</h1>

    <div class="content">
        <p>Адрес: {{ $address }}</p>
        <p>Почтовый индекс: {{ $post_code }}</p>
        
        @if(!empty($email))
            <p>Email: {{ $email }}</p>
        @else
            <p>Адрес электронной почты не указан.</p>
        @endif
    
        <p>Телефон: {{ $phone }}</p>
    </div>

@stop
