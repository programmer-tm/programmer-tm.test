<div class="body_admin">
	<div class="body_admin_block">
	<?php if ($_GET['resetPassword'] == "" || $_GET['resetPassword'] == "1"):?>
		Восстановите мне пароль:
		<form action="/reset/?resetPassword=1" method="post" enctype="multipart/form-data">
			<label for="login"><b>Логин:</b></label>
			<input type="text" placeholder="Введите логин" name="login" required><br>
			<button type="submit">Сбросить пароль!</button>
			<button type="reset" class="cancelbtn">Отменить ввод данных!</button>
		</form>
	<?php else:?>
		Введите новый пароль:
		<form action="/reset/?resetPassword=<?=$_GET['resetPassword']?>" method="post" enctype="multipart/form-data">
			<label for="login"><b>Новый пароль:</b></label>
			<input type="password" placeholder="Введите пароль" name="password" required><br>
			<button type="submit">Установить пароль!</button>
			<button type="reset" class="cancelbtn">Отменить сие дело!</button>
	</form>
	<?php endif;?>
	</div>
</div>