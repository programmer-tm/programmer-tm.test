<?php
// Опишем переменную page:
$page = "Твой мир";
// Тут список моделек, нужных нам на текущий момент:
$menu = '<a href="/logout" title="Покинуть сайт!">Выход</a>';
include "../models/mysql.php";
// Список закончен. Модельки собирают данные из базы или конфига.
// Опишем параметры запроса. (Пока общий вид)
$params="where id = '{$_SESSION['id']}'";
// Таблица, откуда будем забирать данные:
$table='users';
// Получим пользователя:
$user = oneContent($table, $params);

function comMod(){
    if ($_GET['mod'] != ""){
        // Опишем параметры запроса. (Пока общий вид)
        $params="where id = '{$_GET['mod']}'";
        // Таблица, откуда будем забирать данные:
        $table='comments';
        // Получим из базы запись:
        $commentMod = oneContent($table, $params);
        if ($commentMod && $commentMod['status'] == "2"){
                // Если удален, то восстановим в реестре до пупликации:
                // Опишем параметры запроса. (Пока общий вид)
                $params="SET `moder_id` = {$_SESSION['id']}, `status` = 0 where id = '{$_GET['mod']}'";
                updContent($table, $params);
            } elseif ($commentMod && $commentMod['status'] == "1") {
                // Иначе, снимаем с публикации...
                 // Опишем параметры запроса. (Пока общий вид)
                 $params="SET `moder_id` = {$_SESSION['id']}, `status` = 0 where id = '{$_GET['mod']}'";
                 updContent($table, $params);
            } elseif ($commentMod && $commentMod['status'] == "0") {
                // А тут публикуем
                 // Опишем параметры запроса. (Пока общий вид)
                 $params="SET `moder_id` = {$_SESSION['id']}, `status` = 1 where id = '{$_GET['mod']}'";
                 updContent($table, $params);
            }
        // И запустим переадрес...
        header("Location: /admin/");
    }
}

function comEdit($status){
    // Изменение комментариев
    if ($_GET['edit'] == "2"){
        // Проверим коммент и статус юзера:
        // Опишем параметры запроса. (Пока общий вид)
        $params="where id = '{$_POST['post_id']}'";
        // Таблица, откуда будем забирать данные:
        $table='comments';
        $commentEdit = oneContent($table, $params);
        if ($commentEdit){
            if ($status == "0" || $status == "1"){
                // Опишем параметры запроса. (Пока общий вид)
                $params="SET `name` = '{$_POST['name']}', `text` = '{$_POST['text']}' where id = {$_POST['post_id']}";
                //die($params);
                updContent($table, $params);
            } elseif ($status == "2" && $commentEdit['user_id'] == $_SESSION['id']) {
                // Опишем параметры запроса. (Пока общий вид)
                $params="SET `text` = '{$_POST['text']}' where id = {$_POST['post_id']}";
                updContent($table, $params);
            }
            header("Location: /admin");
        } else {
            header("Location: /admin");
        }
    }
}

function userEdit($status, $avatar = ""){
    function genParams($avatar = ""){
        $params['name'] = $_POST['name'];
        $params['surname'] = $_POST['surname'];
        $params['avatar'] = $avatar;
        $params['password'] = $_POST['password'];
        $string="SET";
        foreach ($params as $title => $value){
            if ($value != ""){
                if ($title == "password"){
                    if ($value != "***"){
                    $value = password_hash($value, PASSWORD_DEFAULT);
                    } else {
                        break;
                    }
                }
                $string = "{$string} `{$title}` = '{$value}',";
            }
        }
        return substr($string,0,-1)." where `id` = '{$_POST['user_id']}'";
    }
    if ($_GET['edit'] == '1' && $_SESSION['login'] != "" && $status == '0'){
        // Таблица, откуда будем забирать данные:
        $table='users';
        $params = genParams($avatar);
        updContent($table, $params);
        header("Location: /admin");
    }elseif ($_SESSION['id'] == $_POST['user_id']){
        // Таблица, откуда будем забирать данные:
        $table='users';
        $params = genParams($avatar);
        updContent($table, $params);
        header("Location: /admin");
    }
}

if ($user['status'] == "2"){
    userEdit($user['status'], $avatar);

    // Получим список комментариев:
    $commentList = freeContent("SELECT comments.id, posts.title as title, comments.name, comments.email, comments.text, comments.user_id as user, (select users.nickname from users join comments where user = users.id limit 1) as nickname, comments.status, users.nickname as moder FROM `comments` join `posts` LEFT OUTER join `users` on comments.moder_id = users.id where posts.id = comments.post_id and comments.user_id = {$_SESSION['id']} and comments.status != 2");
    if ($_GET['delete'] != ""){
        $params="SET `status` = '2' where id = '{$_GET['delete']}'";
        // Таблица, откуда будем забирать данные:
        $table='comments';
        updContent($table, $params);
        // И запустим переадрес...
        header("Location: /admin/");
    }
    comEdit($user['status']);
    
    $controller = "user";
}elseif ($user['status'] == "1"){
    // Получим список всех комментариев:
    $commentList = freeContent("SELECT comments.id, posts.title as title, comments.name, comments.email, comments.text, comments.user_id as user, (select users.nickname from users join comments where user = users.id limit 1) as nickname, comments.status, users.nickname as moder FROM `comments` join `posts` LEFT OUTER join `users` on comments.moder_id = users.id where posts.id = comments.post_id");
    // Если не админ, то пишем статус - удалено:
    // Опишем параметры запроса. (Пока общий вид)
    if ($_GET['delete'] != ""){
        $params="SET `moder_id` = '{$_SESSION['id']}', `status` = 2 where id = '{$_GET['delete']}'";
        // Таблица, откуда будем забирать данные:
        $table='comments';
        updContent($table, $params);
        // И запустим переадрес...
        header("Location: /admin/");
    }
    comMod();
    comEdit($user['status']);
    userEdit($user['status']);
    $controller = "moder";
}elseif ($user['status'] == "0"){
    // Получим список пользователей:
    $userList = allContent($table);
    // Таблица, откуда будем забирать данные:
    $table='posts';
    // Получим список записей:
    $postList = allContent($table);
    // Получим список всех комментариев:
    $commentList = freeContent("SELECT comments.id, posts.title as title, comments.name, comments.email, comments.text, comments.user_id as user, (select users.nickname from users join comments where user = users.id limit 1) as nickname, comments.status, users.nickname as moder FROM `comments` join `posts` LEFT OUTER join `users` on comments.moder_id = users.id where posts.id = comments.post_id");
    // не меняем контроллер
    if ($_GET['delete'] != ""){
        // Если админ, то дадим убить окончательно...
        // Опишем параметры запроса. (Пока общий вид)
        $params="WHERE `id` = '{$_GET['delete']}'";
        // Таблица, откуда будем забирать данные:
        $table='comments';
        delContent($table, $params);
        // И запустим переадрес...
        header("Location: /admin/");
    }
    comMod();
    comEdit($user['status']);
    userEdit($user['status']);
    // Повышение или понижение прав юзверя:
    if ($_GET['userMod'] != ""){
        // Функционал только для админа:
        if ($_GET['userMod'] != $_SESSION['id'] && $_GET['userMod'] != '1'){
            $params = "where id = '{$_GET['userMod']}'";
            $table = "users";
            $userMod = oneContent($table, $params);
                if ($userMod['status'] == 2){
                    $params = "SET `status` = '1' where id = '{$_GET['userMod']}'";
                    updContent($table, $params);
                } else {
                    $params = "SET `status` = '2' where id = '{$_GET['userMod']}'";
                    updContent($table, $params);
                }
            header("Location: /admin/");
        } else {
            header("Location: /admin/");
        }
    }

    // Поправить ошибки в посте:
    if ($_GET['edit'] =="3"){
        // Функционал только для админа!
        $params="where id = '{$_POST['postId']}'";
        // Таблица, откуда будем забирать данные:
        $table='posts';
        $postEdit = oneContent($table, $params);
        if ($postEdit){
            $params="SET `title` = '{$_POST['postTitle']}', `text` = '{$_POST['postText']}' where id = '{$_POST['postId']}'";
            updContent($table, $params);
            header("Location: /admin/");
            
        } else {
            header("Location: /admin/");
        }
    }

    // Удалить прочтения поста:
    if ($_GET['kill'] != ""){
        // Функционал только для админа!
        $params="where id = '{$_GET['kill']}'";
        // Таблица, откуда будем забирать данные:
        $table='posts';
        $postEdit = oneContent($table, $params);
        if ($postEdit){
                $params="SET `reading` = '0' where id = '{$_GET['kill']}'";
                updContent($table, $params);
                header("Location: /admin/");
        } else {
            header("Location: /admin/");
        }
    }

    // Грохать юзеров!
    if ($_GET['deleteUser'] != ""){
        // Только для админа!
        if ($_SESSION['id'] != $_GET['deleteUser']){
            $params="";
            $table="comments";
            $commentList = allContent($table);
            foreach ($commentList as $comment){
                if ($comment['user_id'] == $_GET['deleteUser']){
                    $params="WHERE `id` = {$comment['id']}";
                    delContent($table, $params);
                    //mysqli_query($bd, "DELETE FROM `comments` WHERE `id` = {$comment['id']}");
                }
            }
            $params="WHERE `id` = {$_GET['deleteUser']}";
            $table="users";
            delContent($table, $params);
            //mysqli_query($bd, "DELETE FROM `users` WHERE `id` = {$_GET['deleteUser']}");
            header("Location: /admin/");
        } else {
            header("Location: /admin/");
        }
    }

    // Добавляем запись
    if ($_GET['addPost'] == "1"){
        // Только для админа: (добавить стих)
        $params="(`title`, `text`) VALUES ('{$_POST['postTitle']}', '{$_POST['postText']}')";
        // Таблица, откуда будем забирать данные:
        $table='posts';
        addContent($table, $params);
        header("Location: /admin/");
    }

    // Удаляем запись:
    if ($_GET['deletePost'] != ""){
        // Удалим пост (админский уровень)
        $table='comments';
        $commentList = allContent($table);
        foreach ($commentList as $comment){
            if ($comment['post_id'] == $_GET['deletePost']){
                $params = "WHERE `id` = {$comment['id']}";
                delContent($table, $params);
                //mysqli_query($bd, "DELETE FROM `comments` ");
            }
        }
        $params="WHERE `id` = {$_GET['deletePost']}";
        $table='posts';
        delContent($table, $params);
        //mysqli_query($bd, "DELETE FROM `posts` WHERE `id` = {$_GET['deletePost']}");
        header("Location: /admin/");
    }
}
// Админ панели реализованы.