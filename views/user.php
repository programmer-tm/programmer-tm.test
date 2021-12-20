<div class="body_admin">
	<div class="body_admin_block">
		<table class="body_admin_table" border="1">
			Поправить личные данные:
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
					<td>Текст комментария</td>
					<td>Статус</td>
					<td>Взаимодействие</td>
				</tr>
				<?php foreach($commentList as $list):?>
				<form action="/admin/?edit=2" method="post" enctype="multipart/form-data">
				<tr>
					<?php if($list['user'] == $_SESSION['id'] && $list['status'] != "2"):?>
					<input type="text" name="post_id" value="<?=$list['id']?>" hidden>
						<td><?=$list['title'];?></td>
						<td><input type="text" name="text" value="<?=$list['text']?>"></td>
						<?php if($list['status'] == 0):?>
						<td>Не опубликовано</td>
						<?php elseif($list['status'] == 1):?>
						<td>Опубликовано</td>
					    <?php endif;?>
						<td><button type="submit">Сохранить</button> | <a href="?delete=<?=$list['id'];?>">Удалить</a></td>
				    <?php endif;?>
				</tr>
				</form>
				<?php endforeach;?>
			</table>
		<?php else:?>
			Нет комментариев, вот прям совсем нет :-)
		<?php endif;?>
	</div>
</div>