<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Калькулятор</h1>
        <form method="POST">
            <input type="number" name="num1" placeholder="Число 1" step="any" required>
            <input type="number" name="num2" placeholder="Число 2" step="any" required>
            
            <div style="display: flex; gap: 10px; margin: 20px 0;">
                <button type="submit" name="operation" value="add" style="background: #28a745;">+</button>
                <button type="submit" name="operation" value="subtract" style="background: #007bff;">-</button>
                <button type="submit" name="operation" value="multiply" style="background: #17a2b8;">×</button>
                <button type="submit" name="operation" value="divide" style="background: #ffc107;">÷</button>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['operation'])) {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];
            $result = null;
            $error = null;
            
            if (!is_numeric($num1) || !is_numeric($num2)) {
                $error = "Введите корректные числа";
            } else {
                switch ($operation) {
                    case 'add':
                        $result = $num1 + $num2;
                        $op_sign = "+";
                        break;
                    case 'subtract':
                        $result = $num1 - $num2;
                        $op_sign = "-";
                        break;
                    case 'multiply':
                        $result = $num1 * $num2;
                        $op_sign = "×";
                        break;
                    case 'divide':
                        if ($num2 == 0) {
                            $error = "Ошибка: деление на ноль невозможно!";
                        } else {
                            $result = $num1 / $num2;
                            $op_sign = "÷";
                        }
                        break;
                    default:
                        $error = "Неизвестная операция";
                }
            }
            
            if ($error) {
                echo "<div class='errors'><p class='error'>❌ $error</p></div>";
            } elseif ($result !== null) {
                echo "<div class='result'>";
                echo "<h2>Результат: $num1 $op_sign $num2 = " . round($result, 4) . "</h2>";
                echo "</div>";
            }
        }
        ?>
        
        <a href="index.php">← На главную</a>
    </div>
</body>
</html>
