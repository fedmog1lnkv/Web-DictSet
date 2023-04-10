<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы регистрации
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Считывает и проверяет данные
    $data = file('data.txt');
    foreach ($data as $line) {
        $user = explode(',', $line);
        $mail = explode(',', $line);
        if ($user[0] === $username) {
            echo '<script>alert("Пользователь с таким именем уже существует"); history.back();</script>';
            exit;
        }
        if ($mail[1] === $email) {
            echo '<script>alert("Электронная почта уже занята"); history.back();</script>';
            exit;
        }
    }

    // дата для записи в файл
    $data = $username . ',' . $password . ',' . $email . "\n";
    // открытие файла и запись в него
    // $file = fopen('data.txt', 'a');

	// Открытие папки Данные и запись данных в файл data
	$file = fopen('Данные/' . 'data.txt', 'w');
    fwrite($file, $data);
    fclose($file);
    echo '<script>alert("Вы успешно зарегистрировались"); window.location.href="main.html";</script>';
}
?>