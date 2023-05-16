<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = "http://62.84.121.82:8080/api/login";
    $data = array(
        "email" => $_POST['email'],
        "password" => $_POST['password']
    );
    $headers = array(
        "Content-Type: application/json"
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo json_encode(array("success" => false, "message" => 'Curl error: ' . curl_error($ch)));
    }

    curl_close($ch);

    $responseData = json_decode($response, true);

    if ($responseData['success'] === true) {
        $token = $responseData['data']['token'];
        // Сохранение токена в куки
        setcookie('token', $token, time() + (86400 * 30), '/'); // Кука действительна в течение 30 дней и доступна на всем сайте ("/")
    
        // Перенаправление пользователя на страницу cards.html
        echo '<script>window.location.href = "../Cards/cards.html";</script>';
        exit();
    } else {
        echo json_encode(array("success" => false, "message" => "Login failed. Please try again."));
    }
}
?>
