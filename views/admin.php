<div class="body_admin">
	<div class="body_admin_block">
		<table class="body_admin_table" border="1">
			Поправить личные данные:
			<tr>
				<td>Логин</td>
				<td>Имя</td>
				<td>Фамилия</td>
				<td>Почта</td>
				<td>Статус</td>
				<td>Аватар</td>
				<td>Пароль</td>
				<td>Взаимодействие</td>
			</tr>
			<?php foreach ($userList as $user):?>
			<form action="/admin/?edit=1" method="post" enctype="multipart/form-data">
			<tr>
				<input type="text" name="user_id" value="<?=$user['id']?>" hidden>
				<td><?=$user['nickname'];?></td>
				<td><input type="text" name="name" value="<?=$user['name'];?>"></td>
				<td><input type="text" name="surname" value="<?=$user['surname'];?>"></td>
				<td><?=$user['email'];?></td>
				<?php if ($user['status'] == 1):?>
				<td><a href="/admin/?userMod=<?=$user['id'];?>">Модератор</a></td>
				<?php elseif ($user['status'] == 2):?>
				<td><a href="/admin/?userMod=<?=$user['id'];?>">Пользователь</a></td>
				<?php elseif ($user['status'] == 0):?>
				<td><a href="/admin/?userMod=<?=$user['id'];?>">Администратор</a></td>
				<?php endif;?>
				<?php if ($user["avatar"] == ""):?>
				<td><img src="/img/null.jpeg" alt="<?=$user["nickname"];?>" style="border-radius: 100vh; width: 5.5vh; height: 5.5vh; margin-top: 1vh;"><input name="userfile" type="file" /></td></td>
				<?php else:?>
				<td><img src="/img/<?=$user["avatar"];?>" alt="<?=$user["nickname"];?>" style="border-radius: 100vh; width: 5.5vh; height: 5.5vh; margin-top: 1vh;"><input name="userfile" type="file" /></td></td>
				<?php endif;?>
				<td><input type="text" name="password" value="***"></td>
				<td><button type="submit">Сохранить</button> | <a href="/admin/?deleteUser=<?=$user['id'];?>">Удалить</a></td>
			</tr>
			</form>
			<?php endforeach;?>
		</table>
	</div>
	<div class="body_admin_block">
		<table class="body_admin_table" border="1">
			Посты:
			<tr>
				<td>Изображение</td>
				<td>Заголовок</td>
				<td>Текст</td>
				<td>Количество прочтений</td>
				<td>Взаимодействие</td>
			</tr>
			<?php foreach($postList as $string):?>
			<tr>
			<form action="/admin/?edit=3" method="post" enctype="multipart/form-data">
				<input type="text" name="postId" value="<?=$string['id']?>" hidden>
				<td><img src="/img/<?php echo ($string['image']) ?: 'null.jpeg';?>" style="border-radius: 100vh; width: 13vh; height: 13vh; margin-top: 0.5vh;"></td>
				<td><input type="text" name="postTitle" value="<?=$string['title']?>"></td>
				<td><textarea rows="19" name="postText" cols="50"><?=$string['text']?></textarea></td>
				<td><?=$string['reading']?> | <a href="/admin/?kill=<?=$string['id']?>">Сброс</a></td>
				<td><button type="submit">Сохранить</button> | <a href="/admin/?deletePost=<?=$string['id']?>">Удалить</a></td>
			</form>
			</tr>
			<?php endforeach;?>
			<tr>
			<form action="?addPost=1" method="post" enctype="multipart/form-data">
				<td><img src="/img/null.jpeg" style="border-radius: 100vh; width: 13vh; height: 13vh; margin-top: 0.5vh;"></td>
				<td><input type="text" name="postTitle" placeholder="Заголовок"></td>
				<td><textarea rows="19" name="postText" cols="50" placeholder="Текст"></textarea></td>
				<td>-</td>
				<td><button type="submit">Опубликовать</button></td>
			</form>
			</tr>
		</table>
	</div>
	<div class="body_admin_block">
		<?php if ($commentList):?>
		<table class="body_admin_table" border="1">
			Комментарии:
			<tr>
				<td>Комментарий к посту</td>
				<td>Кто оставил</td>
				<td>Email</td>
				<td>Текст комментария</td>
				<td>Логин на сайте</td>
				<td>Кто разрешил</td>
				<td>Изменить статус</td>
				<td>Взаимодействие</td>
			</tr>
			<?php foreach($commentList as $list):?>
			<form action="/admin/?edit=2" method="post" enctype="multipart/form-data">
			<tr>
				<input type="text" name="post_id" value="<?=$list['id']?>" hidden>
				<td><?=$list['title'];?></td>
				<td><input type="text" name="name" value="<?=$list['name']?>"></td>
				<td><?=$list['email'];?></td>
				<td><input type="text" name="text" value="<?=$list['text']?>"></td>
				<?php if (!is_null($list['nickname'])):?>
				<td><?=$list['nickname'];?></td>
				<?php else:?>
				<td>Не зарегистрирован</td>
				<?php endif;?>
				<?php if (!is_null($list['moder'])):?>
				<td><?=$list['moder'];?></td>
				<?php else:?>
				<td>-</td>
				<?php endif;?>
				<?php if($list['status'] == 0):?>
				<td><a href="/admin/?mod=<?=$list['id'];?>">Опубликовать</a></td>
				<?php elseif($list['status'] == 1):?>
				<td><a href="/admin/?mod=<?=$list['id'];?>">Снять с публикации</a></td>
				<?php else:?>
				<td><a href="/admin/?mod=<?=$list['id'];?>">Восстановить</a></td>
				<?php endif;?>
				<td><button type="submit">Сохранить</button> | <a href="/admin/?delete=<?=$list['id'];?>">Удалить</a></td>
			</form>
			</tr>
			<?php endforeach;?>
		</table>
		<?php else:?>
			Нет комментариев, вот прям совсем нет :-)
		<?php endif;?>
	</div>
</div>