<?php
// Тут список моделек, нужных нам на текущий момент:
include "../models/menu.php";
include "../models/mysql.php";
// Список закончен. Модельки собирают данные из базы или конфига.
// Опишем параметры запроса. (Пока общий вид)
$params="where id = '{$_GET['id']}'";
// Таблица, откуда будем забирать данные:
$table='posts';
// Выдернем пост и положим его в нашу переменку:
$post=oneContent($table, $params);
// Проверим, выдралось ли что-либо:
if ($post){
    // Опишем переменную page:
    $page = $post['title'];
    // Коли нашли пост, то мы ему приплюсуем статус прочтения:
    $reading = ++$post['reading'];
    // Впишем сие модификатор в БД:
    $params="SET `reading` = '{$reading}' where id = '{$_GET['id']}'";
    updContent($table, $params);
} else {
    $message="Лажа...";
    $controller="404";
    include "../controllers/$controller.php";
}
// Таблица, откуда будем забирать данные:
$table="comments";
// Опишем параметры запроса. (Пока общий вид)
$params="WHERE post_id = '{$_GET['id']}'";
// Выдернем все комменты и положим их в нашу переменку:
$comments=allContent($table, $params);
// Включим счетчик:
$commentCount = 0;
// Если есть список, то:
if ($comments){
    // Перебор списка:
    foreach ($comments as $com){
    // Если есть коммент со статусом опубликовано:
        if ($com['status'] == 1){
        // Фиксируем это в значении счетчика, чтобы на фронте не считать
            $commentCount = ++$commentCount;
            // Пишем в новый массив коммент.
            $newComments[]=$com;
        }
    }
    // Переобработка массива комментов:
    if ($newComments != ""){
        $comments = $newComments;
    }
}

// Проверим текст коммента, если есть, то делаем что-то...
if ($_POST['text']){
    if ($_SESSION['id'] != ""){
        // Получим имя и емал:
        $params = "where id = '{$_SESSION['id']}'";
        $table = "users";
        $user = oneContent($table, $params);
        //Если есть юзер, то пишем с ним:
        $params = "(`post_id`, `name`, `email`, `text`, `user_id`, `status`) VALUES ('{$_GET['id']}', '{$user['name']}', '{$user['email']}', '{$_POST['text']}', '{$_SESSION['id']}', '0')";
        $table = "comments";
        addContent($table, $params);
        //mysqli_query($bd, "INSERT INTO `comments` (`post_id`, `name`, `email`, `text`, `user_id`, `status`) VALUES ('{$comment['post_id']}', '{$db['name']}', '{$db['email']}', '{$comment['text']}', '{$_SESSION['id']}', '0')");
    } else {
        //Иначе пишем без него:
        $params = "(`post_id`, `name`, `email`, `text`, `status`) VALUES ('{$_GET['id']}', '{$_POST['name']}', '{$_POST['email']}', '{$_POST['text']}', '0')";
        $table = "comments";
        addContent($table, $params);
        
        //mysqli_query($bd, "INSERT INTO `comments` (`post_id`, `name`, `email`, `text`,`status`) VALUES ('{$comment['post_id']}', '{$comment['name']}', '{$comment['email']}', '{$comment['text']}', '0')");
    }
    // Отправим сообщение пользователю об успехе
    $message = 'Комментарий отправлен на рассмотрение';
}