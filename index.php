<?php
if(empty ($_POST) && empty($_GET))
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Пользователи</title>
</head>
<body>
<div style="width:30%;margin-left:auto;margin-right:auto;background-color:#bcbcbc;height:400px;padding:50px">
<form action="index.php?q=goods" method="post">
<input type="hidden" name="q" value="goods" placeholder="ID Пользователя">
<input type="text" name="name" placeholder="Имя" required style="width:100%;height:30px">
<input type="email" name="email" placeholder="Эл Почта" required style="width:100%;height:30px">
<input type="number" name="number" placeholder="Телефон" required style="width:100%;height:30px">
<textarea name="message" style="width:100%;height:50px"></textarea>
<input type="submit" value="Добавить"></div>
</body></html>
<?php }else{
// Получение данных из тела запроса
function getFormData($method) {

    // GET или POST: данные возвращаем как есть
    if ($method === 'GET') return $_GET;
    if ($method === 'POST') return $_POST;


    return $data;
}

// Определяем метод запроса
$method = $_SERVER['REQUEST_METHOD'];

// Получаем данные из тела запроса
$formData = getFormData($method);


// Разбираем url
$url = (isset($_GET['q'])) ? $_GET['q'] : '';
$url = rtrim($url, '/');
$urls = explode('/', $url);

// Определяем роутер и url data
$router = $urls[0];
$urlData = array_slice($urls, 1);

// Подключаем файл-роутер и запускаем главную функцию
include_once 'routers/' . $router . '.php';
route($method, $urlData, $formData);}
