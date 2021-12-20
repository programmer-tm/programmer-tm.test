<?php
unset($_SESSION["login"]);
unset($_SESSION["id"]);
unset($_SESSION["avatar"]);
header("Location: /?ok=1");