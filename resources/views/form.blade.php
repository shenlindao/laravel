<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ФОРМА</title>
</head>

<body>
    <form method="POST" action="/store_form">
        @csrf
        <div>
            <label for="first_name">Имя</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>
        <div>
            <label for="last_name">Фамилия</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit">ОТПРАВИТЬ</button>
    </form>
</body>

</html>