<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $birthdate = $_POST['birthdate'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $agree = $_POST['agree'] ?? '';

    // Валидация
    if (empty($first_name)) {
        $errors[] = "Имя обязательно для заполнения";
    }
    
    if (empty($last_name)) {
        $errors[] = "Фамилия обязательна для заполнения";
    }
    
    if (empty($email)) {
        $errors[] = "Email обязателен для заполнения";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Введите корректный email";
    }
    
    if (empty($password)) {
        $errors[] = "Пароль обязателен для заполнения";
    } elseif (strlen($password) < 6) {
        $errors[] = "Пароль должен быть не менее 6 символов";
    }
    
    if ($password !== $confirm_password) {
        $errors[] = "Пароли не совпадают";
    }
    
    if (empty($birthdate)) {
        $errors[] = "Дата рождения обязательна";
    }
    
    if (empty($gender)) {
        $errors[] = "Выберите пол";
    }
    
    if (empty($agree)) {
        $errors[] = "Вы должны согласиться с условиями";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результат регистрации</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php if (empty($errors) && $_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <h1>✅ Регистрация успешна!</h1>
            <p>Добро пожаловать, <?php echo htmlspecialchars($first_name . " " . $last_name); ?>!</p>
            <p>Email: <?php echo htmlspecialchars($email); ?></p>
            <p>Дата рождения: <?php echo htmlspecialchars($birthdate); ?></p>
            <p>Пол: <?php echo htmlspecialchars($gender); ?></p>
            <a href="index.php">← Вернуться к регистрации</a>
        <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
            <h1>❌ Ошибка регистрации</h1>
            <div class="errors">
                <?php foreach ($errors as $error): ?>
                    <p class="error">• <?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
            <a href="index.php">← Вернуться назад</a>
        <?php else: ?>
            <h1>Страница обработки формы</h1>
            <p>Пожалуйста, заполните <a href="index.php">форму регистрации</a>.</p>
        <?php endif; ?>
    </div>
</body>
</html>
