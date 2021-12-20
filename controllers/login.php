<?php
// Опишем переменную page:
$page = "Вход на сайт";
// Тут список моделек, нужных нам на текущий момент:
include "../models/mysql.php";
// Список закончен. Модельки собирают данные из базы или конфига.
// Пишем переменную навигации:
$menu='<a onclick="javascript:history.back(); return false;" title="Назад в будущее!">Назад</a>';

// Обеспечиваем логин и разлогин юзеров (пароль в открытом виде!!!):
if ($_POST['login'] && $_POST['password'] && !$_SESSION['login'])
{
    // Опишем параметры запроса. (Пока общий вид)
    $params="where `nickname` = '{$_POST['login']}'";
    // Таблица, откуда будем забирать данные:
    $table='users';
    // Запрашиваем пользователя из БД:
    $user = oneContent($table, $params);
    // Если таковая запись есть, то:
    if ($user){
        // Проверяем пароль на соответствие:
        if (password_verify($_POST['password'], $user['password'])){
            // Опишем параметры запроса. (Пока общий вид)
            $params="SET `token` = '' where `nickname` = '.{$_POST['login']}.'";
            // Коль все хорошо, то мы чистим токен на сброс пароля, коль он был или не был
            updContent($table, $params);
            // Впишем ид юзера:
            $_SESSION["id"] = $user['id'];
            // Впишем логин
            $_SESSION['login'] = $user['nickname'];
            // Впишем аву юзера:
            if (is_null($user['avatar'])){
                // Коль нет авы - грустный слоник :-)
                $_SESSION["avatar"] = "null.jpeg";
            } else {
                // Иначе - аватарку даем
                $_SESSION["avatar"]=$user['avatar'];
            }
            // Отправим сообщение пользователю об успехе
            $message = 'Приветствуем, '.$user['nickname'].'!';
            header("Location: /admin/");
        } else {
            // Отправим сообщение пользователю о неудаче
            $message = 'Внимание неверный пароль!';
        }
    } else {
        // Отправим сообщение пользователю о неудаче
        $message = 'Внимание Такого пользователя нет на сайте!';
    }
} elseif ($_POST['nickname'] && $_POST['name'] && $_POST['surname'] && $_POST['email'] && $_POST['password'] && $_POST['password2']){
    // Опишем параметры запроса. (Пока общий вид)
    $params="where `nickname` = '{$_POST['nickname']}'";
    // Таблица, откуда будем забирать данные:
    $table='users';
    // Запрашиваем пользователя из БД:
    $user = oneContent($table, $params);
    if (!$user){
        // Опишем параметры запроса. (Пока общий вид)
        $params="where `email` = '".$_POST['email']."'";
        // Запрашиваем пользователя из БД:
        $user = oneContent($table, $params);
        if (!$user){
            if ($_POST['password'] == $_POST['password2']){
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                // Опишем параметры запроса. (Пока общий вид)
                $params="(`nickname`, `name`, `surname`, `email`, `password`, `status`) VALUES ('{$_POST['nickname']}', '{$_POST['name']}', '{$_POST['surname']}', '{$_POST['email']}', '{$password}', '2')";
                addContent($table, $params);
                // Опишем параметры запроса. (Пока общий вид)
                $params="SET `token` = '' where `nickname` = '.{$_POST['nickname']}.'";
                // Коль все хорошо, то мы чистим токен на сброс пароля, коль он был или не был
                updContent($table, $params);
                $params="where `nickname` = '{$_POST['nickname']}'";
                // Запрашиваем пользователя из БД:
                $user = oneContent($table, $params);
                // Впишем ид юзера:
                $_SESSION["id"] = $user['id'];
                // Впишем логин
                $_SESSION['login'] = $user['nickname'];
                // Впишем аву юзера:
                if (is_null($user['avatar'])){
                    $_SESSION["avatar"] = "null.jpeg";
                } else {
                    $_SESSION["avatar"] = $user['avatar'];
                }
                $nick = $user['nickname'];
                $pass = $user['password'];
                $message = "Доброе время суток, Вы зарегистрировались на сайте $title.\r\n Ваш логин: $nick\r\nВаш пароль: $pass\r\nНе забывайте эти данные.";
                // Тут почта, куда скинем ссылочку:
                $email = $user['email'];
                // Отправляем
                mail($email, 'Регистрация на сайте', $message);
                header("Location: /admin/");
            } else {
                $message = 'Пароли не совпадают!';
            }
        } else {
            $message = 'Пользователь с таким email уже есть на сайте!';
        }
    } else {
        $message = 'Пользователь с таким логином уже есть на сайте!';
    }
}