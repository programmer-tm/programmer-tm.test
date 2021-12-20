<div class="body_admin">
    <div class="body_admin_block">
	    <table class="body_admin_table" border="1">
		    Персональный профиль:
			<tr>
				<td>Имя</td>
				<td>Фамилия</td>
    			<td>Статус</td>
				<td>Аватар</td>
				<td>Пароль</td>
				<td>Взаимодействие</td>
			</tr>
			<form action="/admin/?edit=1" method="post" enctype="multipart/form-data">
			<tr>
				<input type="text" name="user_id" value="<?=$user['id']?>" hidden>
				<td><input type="text" name="name" value="<?=$user['name'];?>"></td>
				<td><input type="text" name="surname" value="<?=$user['surname'];?>"></td>
				<?php if ($user['status'] == 1):?>
				<td>Модератор</td>
				<?php elseif ($user['status'] == 2):?>
				<td>Пользователь</td>
				<?php endif;?>
				<td><img src="/img/<?=$_SESSION["avatar"];?>" alt="<?=$_SESSION["login"];?>" style="border-radius: 100vh; width: 5.5vh; height: 5.5vh; margin-top: 1vh;"><input name="userfile" type="file" /></td>
				<td><input type="text" name="password" value="***"></td>
				<td><button type="submit">Сохранить</button></td>
			</tr>
			</form>
		</table>
	</div>
	<div class="body_admin_block">
		<?php if ($commentList):?>
			<table class="body_admin_table" border="1">
				Комментарии:
				<tr>
					<td>Комментарий к посту</td>
					<td>Логин на сайте</td>
					<td>Кто оставил</td>
					<td>Текст комментария</td>
	    			<td>Изменить статус</td>
					<td>Взаимодействие</td>
				</tr>
				<?php foreach($commentList as $list):?>
				<form action="/admin/?edit=2" method="post" enctype="multipart/form-data">
				<tr>
					<input type="text" name="post_id" value="<?=$list['id']?>" hidden>
					<td><?=$list['title'];?></td>
					<?php if (!is_null($list['nickname'])):?>
					<td><?=$list['nickname'];?></td>
					<?php else:?>
					<td>Не зарегистрирован</td>
					<?php endif;?>
					<td><input type="text" name="name" value="<?=$list['name']?>"></td>
					<td><input type="text" name="text" value="<?=$list['text']?>"></td>
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