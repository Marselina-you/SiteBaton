<?php
session_start();//Запускаем сессии 
/* Класс для авторизац*/
class AuthClass {
    private $_login = "demo"; //Устанавливаем логин
    private $_password = "byaka"; //Устанавливаем пароль

    /**
     * Проверяет, авторизован пользователь или нет
     * Возвращает true если авторизован, иначе false
     * @return boolean 
     */
     
    public function isAuth() {
        if (isset($_SESSION["is_auth"])) { //Если сессия существует
            return $_SESSION["is_auth"]; //Возвращаем значение переменной сессии is_auth (хранит true если авторизован, false если не авторизован)
        }
        else return false; //Пользователь не авторизован, т.к. переменная is_auth не создана
    }
    public function auth($login, $passwors) {
        if ($login == $this->_login && $passwors == $this->_password) { //Если логин и пароль введены правильно
            $_SESSION["is_auth"] = true; //Делаем пользователя авторизованным
            $_SESSION["login"] = $login; //Записываем в сессию логин пользователя
            return true;
        }
        else { //Логин и пароль не подошел
            $_SESSION["is_auth"] = false;
            return false; 
        }
    }
    /**
     * Метод возвращает логин авторизованного пользователя 
     */
    public function getLogin() {
        if ($this->isAuth()) { //Если пользователь авторизован
            return $_SESSION["login"]; //Возвращаем логин, который записан в сессию
        }
    }
    public function out() {
        $_SESSION = array(); //Очищаем сессию
        session_destroy(); //Уничтожаем
    }
}
$auth = new AuthClass();
if (isset($_POST["login"]) && isset($_POST["password"])) { //Если логин и пароль были отправлены
    if (!$auth->auth($_POST["login"], $_POST["password"])) { //Если логин и пароль введен не правильно
        echo "<h2 style=\"color:red;\">Неправильно!!</h2>";
    }
}
if (isset($_GET["is_exit"])) { //Если нажата кнопка выхода
    if ($_GET["is_exit"] == 1) {
        $auth->out(); //Выходим
        header("Location: ?is_exit=0"); //Редирект после выхода
    }
}
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/app.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>
   <body>
    <div class='container-fluid'>
<?php if ($auth->isAuth()) { //  Если пользователь авторизован, приветствуем:  
    echo "Здравствуйте, " . $auth->getLogin() ;//Показываем кнопку выхода
    echo "<br/><br/><a href=\"?is_exit=1\">Выйти</a>
    <table class='admin_table col-lg-10 '>
<thead class='admin_table-thead'><tr>

<th class='admin_table__cell'>Имя</th>
<th class='admin_table__cell'>Имя-aнгл</th>
<th class='admin_table__cell'>Цена</th>
<th class='admin_table__cell'>Описание</th>
<th class='admin_table__cell'>Краткое</th>
<th class='admin_table__cell'>К-и</th>
<th class='admin_table__cell'>Срок</th>
<th class='admin_table__cell'>Наличие</th>
<th class='admin_table__cell'>Страна</th>
<th class='admin_table__cell'>Фото</th>
<th class='admin_table__cell my_href'><a href=''>Удаление</th></a></tr>
</thead>";
$son = new mysqli('localhost','root','root', 'letkino');
// Возьмите данные профиля из базы данных
 $select = $son->query("SELECT id, foto, name_rus, name, value, description, calories, life, nal, country, short_description FROM edit WHERE name IS NOT NULL ORDER BY name  LIMIT 180");
    while($info = $select->fetch_array()){
      echo"<tr>
<td class='admin_table__cell'>".$info['name_rus']."</td>
<td class='admin_table__cell'>".$info['name']."</td>
<td class='admin_table__cell'>".$info['value']."</td>
<td class='admin_table__cell'>".$info['description']."</td>
<td class='admin_table__cell'>".$info['short_description']."</td>
<td class='admin_table__cell'>".$info['calories']."</td>
<td class='admin_table__cell'>".$info['life']."</td>
<td class='admin_table__cell'>".$info['nal']."</td>
<td class='admin_table__cell'>".$info['country']."</td>
<td class='admin_table__cell'>".$info['foto']."</td>
<td class='admin_table__cell my_href'><a href=''>удалить</a></td>
</tr>"; 
}
echo '<form enctype="multipart/form-data" method="post" class="forma" action="admin2.php">
      <input type="hidden" name="MAX_FILE_SIZE" value="" /><tr>
      <td class="admin_table__cell" bgcolor="#f2bff3"><input type="text" class="backgraund no_border input_name_rus" name="name_rus"  id="name_rus"/></td>
      <td class="admin_table__cell" bgcolor="#f2bff3"><input type="text" class="backgraund no_border input_names" name="names"  /></td>
      <td class="admin_table__cell" bgcolor="#f2bff3"><input class="input_width backgraund no_border" type="text"   name="value"  /></td>
      <td class="admin_table__cell" bgcolor="#f2bff3"><textarea class="no_border backgraund no_border size_area" type="text" name="description"  /></textarea></td>
       <td class="admin_table__cell" bgcolor="#f2bff3"><textarea class="backgraund no_border input_names" type="text" name="short_description"  /></textarea></td>
      <td class="admin_table__cell no_padding" bgcolor="#f2bff3"><input class="input_width_2 backgraund no_border" type="text" name="calories"  /></td>
      <td class="admin_table__cell no_padding" bgcolor="#f2bff3"><input class="input_width_2 backgraund no_border" type="text" name="life"  /></td>
      <td class="admin_table__cell" bgcolor="#f2bff3">
      <select name="nal" class="input_names">
  <option>в наличии</option>
  <option>нет в наличии</option>
</select ></td>
<td class="admin_table__cell no_padding" bgcolor="#f2bff3"><input class="input_width backgraund no_border" type="text" name="country" id="country"/></td>
      <td class="admin_table__cell" bgcolor="#f2bff3">
        <input class="hidden" type="file" name="new_picture" multiple/>
      </td>
      <td class="admin_table__cell" bgcolor="#f2bff3"></td>
      </tr>  </table><input type="submit" value="Сохранить" name="submit" /></form>';
} 
else { //Если не авторизован, показываем форму ввода логина и пароля
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/app.min.css">
  </head>
    <body>
      <div class="container-fluid">
        <div class="wrap-login_form col-lg-8 offset-lg-2"> 
          <div class="login_form col-lg-12">
            <div class="col-lg-8"><h3>Авторизация</h3></div>
            <div class="col-lg-8"><h4>Только для администраторов сайта</h4></div>
            <form method="post" action="" class="wrap-form col-lg-12">
              <div class="wrap-login-input row">
                <label for="login" class="login-label col-lg-3">Логин:</label>
                <input type="text" class="login_form-input" name="login" value="<?php echo (isset($_POST["login"])) ? $_POST["login"] : null;  ?>" />
              </div>
              <div class="wrap-login-input row">
                 <div class="login_form-label col-lg-3">Пароль: </div>
                 <div class="wrap-login_form-input"><input type="password" class="login_form-input" name="password" value="" /></div>
              </div>
                <input type="submit" value="Войти" class="btn btn-primary" />
            </form>
          </div>     
      </div>
    </div>
</body>
</html>
<?php } ?>