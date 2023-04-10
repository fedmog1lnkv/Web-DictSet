<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы входа
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Считывает и проверяет данные
    $data = file('Данные/' . 'data.txt');
    // $user_exists = false;
    foreach ($data as $line) {
		$user = explode(',', $line);
        $passw = explode(',', $line);
        // $user = explode(',', $line);
		// if ($user[0] === $username && $passw[1] === $password) {
        if ($user[0] === $username && $passw[1] === $password) {
            // $user_exists = true;
			echo '<script>alert("Вы успешно вошли"); window.location.href="home.html";</script>';
            exit;
        }
    }

    // Если данные неверны - ошибка
    if ($user_exists) {
        header('Location: main.html');
        exit;
    } else {
        echo '<script>alert("Неверное имя пользователя или пароль"); history.back();</script>';
        exit;
    }
}
?>