<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Регистрация пользователя</h1>
        <form action="action.php" method="POST">
            <label>Имя:</label>
            <input type="text" name="first_name" placeholder="Введите имя" required>
            
            <label>Фамилия:</label>
            <input type="text" name="last_name" placeholder="Введите фамилию" required>
            
            <label>Email:</label>
            <input type="email" name="email" placeholder="example@mail.com" required>
            
            <label>Пароль:</label>
            <input type="password" name="password" placeholder="Введите пароль" required>
            
            <label>Подтверждение пароля:</label>
            <input type="password" name="confirm_password" placeholder="Повторите пароль" required>
            
            <label>Дата рождения:</label>
            <input type="date" name="birthdate" required>
            
            <label>Пол:</label>
            <select name="gender" required>
                <option value="">Выберите пол</option>
                <option value="male">Мужской</option>
                <option value="female">Женский</option>
                <option value="other">Другой</option>
            </select>
            
            <label>
                <input type="checkbox" name="agree" required> Я согласен с условиями
            </label>
            
            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>
