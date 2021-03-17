<?php
// Роутер
function route($method, $urlData, $formData) {
require_once("Db.php");
    // GET /goods/{goodId}
    if ($method === 'GET' && count($urlData) === 1) {
        // Получаем id Пользователя
        $goodId = $urlData[0];

        // Вытаскиваем пользователя из базы...
    $query=$con->query("SELECT * FROM  users WHERE id='$goodId' ");
while($row=mysqli_fetch_array($query)) {
$userinfo=$row;}
        // Выводим ответ клиенту
        echo json_encode(array(
            'method' => 'GET',
            'id' => $goodId,
            'name' => $userinfo['name'],
            'email' => $userinfo['email'],
            'phone number' => $userinfo['p_number'],
            'message' => $userinfo['message']
        ));

        return;
    }


    // Добавление нового пользователя
    // POST /goods
    if ($method === 'POST' && empty($urlData)) 
    {

    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $message=$_POST['message'];
        // Добавляем пользователя в базу...
$con->query("INSERT INTO users (`name`,`email`,`p_number`,`message`)
            VALUES ('$name','$email','$number','$message')");
        // Выводим ответ клиенту
        echo json_encode(array(
            'method' => 'POST',
            'id' => rand(1, 100),
            'formData' => $formData
        ));
        
        return;
    }

    // Возвращаем ошибку
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(array(
        'error' => 'Bad Request'
    ));

}
