<?php

require_once('appvars.php');
  $dbc = mysqli_connect('localhost','root','root','zabatonom');
    if (isset($_POST['submit'])) {

      $types = $_POST['types'];
      $name= $_POST['name'];
      $description = $_POST['description'];
      $ingredient1 = $_POST['ingredient1'];
      $ingredient2 = $_POST['ingredient2'];
      $ingredient3 = $_POST['ingredient3'];
      $value = $_POST['value'];
      $nal = $_POST['nal'];
      $slogan = $_POST['slogan'];
      $t1 = $_POST['t1'];
      $t2 = $_POST['t2'];
      $t3 = $_POST['t3'];

      $new_picture = mysqli_real_escape_string($dbc, trim($_FILES['new_picture']['name']));
      $new_picture_type = $_FILES['new_picture']['type'];
      $new_picture_size = $_FILES['new_picture']['size']; 
      list($new_picture_width, $new_picture_height) = getimagesize($_FILES['new_picture']['tmp_name']);
        $error = false;
// При необходимости проверьте и переместите загруженный файл изображения
          if (!empty($new_picture)) { 
            if ((($new_picture_type == 'image/gif') || ($new_picture_type == 'image/jpeg') || ($new_picture_type == 'image/pjpeg') ||
        ($new_picture_type == 'image/png')) && ($new_picture_size > 0) && ($new_picture_size <= MM_MAXFILESIZE) &&
        ($new_picture_width <= MM_MAXIMGWIDTH) && ($new_picture_height <= MM_MAXIMGHEIGHT)) {
              if ($_FILES['file']['error'] == 0) {
                $target = MM_UPLOADPATH . basename($new_picture);
                  if (move_uploaded_file($_FILES['new_picture']['tmp_name'], $target)) {
                    if (!empty($old_picture) && ($old_picture != $new_picture)) {
                    @unlink(MM_UPLOADPATH . $old_picture);
                   }
                  } 
            else {
              @unlink($_FILES['new_picture']['tmp_name']);
              $error = true;
              echo '<p class="error">Извините, возникла проблема с загрузкой вашей фотографии.</p>';
            }
              }
            }
          else {
        // Новый файл изображения недопустим, поэтому удалите временный файл и установите флаг ошибки
        @unlink($_FILES['new_picture']['tmp_name']);
        $error = true;
        echo '<p class="error">Изображение должно быть в формате GIF, JPEG или PNG размером не более' . (MM_MAXFILESIZE / 10024) .
          ' KB and ' . MM_MAXIMGWIDTH . 'x' . MM_MAXIMGHEIGHT . ' pixels in size.</p>';
          }
          }
 // Обновление данных профиля в базе данных
      if (!$error) {
        if (!empty($name)) {
        // Установите столбец картинка только в том случае, если есть новая картинка
          if (!empty($new_picture)&&!empty($types)&&!empty($name)&&!empty($description)&&!empty($ingredient1)&&!empty($ingredient2)&&!empty($ingredient3)&&!empty($value)&&!empty($nal)&&!empty($slogan)&&!empty($t1)&&!empty($t2)&&!empty($t3)) {
            $query = "INSERT INTO ass (foto, types, name, description, ingredient1, ingredient2, ingredient3, value, nal, slogan, t1, t2, t3 ) VALUES ('$new_picture',  '$types', '$name', '$description', '$ingredient1', '$ingredient2',  '$ingredient3', '$value', '$nal', '$slogan', '$t1', '$t2', '$t3')";
               
                echo'<html><head><title>Главная страница</title><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="css/app.min.css"><link rel="stylesheet" href="css/app.min.css"></head><body><div class=""><div class=""><img src="' . MM_UPLOADPATH . $new_picture . '"  alt="Profile Picture" /></div>';
                echo'<div class="lightbrowncolor size26px fontTahoma font-weight-bold">'  .$types. '</div>';
                 echo'<div class="bardcolor fontSegoeScript size22px">'  .$name. '</div>';
                  echo'<div class="darkbrowncolor fontSegoeScript">'  .$description. '</div>';
                   echo'<div class="">'  .$ingredient1. '</div>';
                    echo'<div class="">'  .$ingredient2. '</div>';
                     echo'<div class="">'  .$ingredient3. '</div>';
                      echo'<div class="">'  .$value. '</div>';
                       echo'<div class="">'  .$nal. '</div>';
                       echo'<div class="">'  .$slogan. '</div>';
                        echo'<div class="">'  .$t1. '</div>';
                         echo'<div class="">'  .$t2. '</div>';
                          echo'<div class="">'  .$t3. '</div></div></body></html>';



          }
        mysqli_query($dbc, $query);
        mysqli_close($dbc);
        exit();
        }else{
  echo 'Не все данные внесены<br/>';
}
      }
      }?>