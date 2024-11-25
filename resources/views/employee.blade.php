@extends('layouts.default')

@section('content')

<h1>Добавить или обновить информацию о работнике</h1>
<div class="content">
    <form action="store-form" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="surname">Фамилия</label>
            <input type="text" id="surname" name="surname" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="age">Возраст</label>
            <input type="number" id="age" name="age" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="position">Должность</label>
            <input type="text" id="position" name="position" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="tel" id="phone" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="position">Адрес проживания</label>
            <input type="text" id="adress" name="adress" class="form-control" required>
        </div>

        <div>
            <label for="json_data">Дополнительные данные (JSON):</label>
            <textarea name="json_data" id="json_data" rows="5" placeholder='{"key": "value"}'></textarea>
        </div>


        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>

@stop