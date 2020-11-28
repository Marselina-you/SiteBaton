<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	
	<link rel="stylesheet" href="css/app.min.css">
	<script src="js/app.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>header1</title>
</head>
<body>
	<?php require_once('adminPanel.html');
	require_once('appvars.php');
	$son = new mysqli('localhost','root','root', 'zabatonom');
// Возьмите данные профиля из базы данных
 $select = $son->query("SELECT  id, foto, name, description, ingredient1, ingredient2, ingredient3, value, nal, slogan, t1, t2, t3  FROM ass WHERE types = 'черный хлеб' LIMIT 180");
 $select1 = $son->query("SELECT  id, foto, name, description, ingredient1, ingredient2, ingredient3, value, nal, slogan, t1, t2, t3  FROM ass WHERE types = 'пирожные' LIMIT 180");
 $select2 = $son->query("SELECT  foto, name, description, ingredient1, ingredient2, ingredient3, value, nal, slogan, t1, t2, t3  FROM ass WHERE types = 'белая выпечка' LIMIT 180");
$deletes = $son->query("DELETE FROM ass WHERE id = '" . $_GET['id'] . "'");
if ($deletes) {
                    echo "Успешное удаление";
                } else {
                    echo "ошибка.";
                } 
 
	?>
	<div class="container-fluid assortiment-container">
		<div class="assortiment-types d-flex col-lg-12">
		<div class="assortiment-types__item col-lg-4 text-center"><div class="assortiment-types__name fontTahoma size26px darkbrowncolor padding-15">ЧЕРНЫЙ ХЛЕБ</div><?php
		 while($info = $select->fetch_array()){
    	
    	echo'<div class="wrap-assortiment-container d-flex flex-column col-lg-12">
		<div class="block-content-admin d-flex flex-column col-lg-12">
				<div class="imgValueNal d-flex align-items-center col-lg-12"><div class="d-flex justify-content-center block-left__imgAdmin col-lg-7"><img src="'.MM_UPLOADPATH. $info['foto'].'"  alt="" /></div>';
                echo'<div class="valueNal col-lg-5"><div class="d-flex justify-content-center"><div class="darkbrowncolor size20px fontTahoma padding-15">'.$info['value'].'</div></div>';
				echo'<div class="d-flex justify-content-center"><div class="darkbrowncolor size16px fontTahoma">'.$info['nal'].'</div></div></div></div>
				';
				echo'<div class="bardcolor fontSegoeScript size20px">'.$info['name'].'</div>';
				
				echo'<div class="bardcolor size20px fontTahoma">+ Описание</div><div class="hidden col-lg-12 darkbrowncolor  size16px">'.$info['description'].'</div>';
				echo'<div class="bardcolor size20px fontTahoma padding-15">+ основные ингредиенты</div><div class="hidden"><div class="darkbrowncolor size16px"><span> - </span>'.$info['ingredient1'].'</div>';
				echo'<div class="darkbrowncolor size16px"><span> - </span>'.$info['ingredient2'].'</div>';
				echo'<div class="darkbrowncolor size16px"><span> - </span>'.$info['ingredient3'].'</div></div>';
				
				echo'<div class="lightbrowncolor size20px fontSegoeScript padding-15">'.$info['slogan'].'</div>';
				echo'<div class="block-right-ellips col-xl-12 col-lg-12">
					<div class="d-flex justify-content-center align-items-center toppig_view__admin1  whitecolor size16px fontTahoma">'.$info['t1'].'</div>';
				echo'<div class="d-flex toppig_view__admin2  whitecolor size16px fontTahoma justify-content-center align-items-center">'.$info['t2'].'</div>';
                echo'<div class="d-flex justify-content-center align-items-center toppig_view__admin3 whitecolor size16px fontTahoma">' .$info['t3']. '</div>
			</div>
			<div class="d-flex padding-15"><div class="col-lg-6"><a href="adminView.php?id=' . $info['id'] . '">delete</a>
			</div><div class="col-lg-6">';
				
			echo'</div></div>
		</div>
		</div>'; 
	}

		
	?></div>
		<div class="assortiment-types__item col-lg-4 text-center"><div class="assortiment-types__name fontTahoma size26px darkbrowncolor padding-15">ПИРОЖНЫЕ</div><?php
		 while($info = $select1->fetch_array()){
    	
    	echo'<div class="wrap-assortiment-container d-flex flex-column col-lg-12">
		<div class="block-content-admin d-flex flex-column col-lg-12">
				<div class="imgValueNal d-flex align-items-center col-lg-12"><div class="d-flex justify-content-center block-left__imgAdmin col-lg-7"><img src="'.MM_UPLOADPATH. $info['foto'].'"  alt="" /></div>';
                echo'<div class="valueNal col-lg-5"><div class="d-flex justify-content-center"><div class="darkbrowncolor size20px fontTahoma padding-15">'.$info['value'].'</div></div>';
				echo'<div class="d-flex justify-content-center"><div class="darkbrowncolor size16px fontTahoma">'.$info['nal'].'</div></div></div></div>
				';
				echo'<div class="bardcolor fontSegoeScript size20px">'.$info['name'].'</div>';
				
				echo'<div class="bardcolor size20px fontTahoma">+ Описание</div><div class="hidden col-lg-12 darkbrowncolor  size16px">'.$info['description'].'</div>';
				echo'<div class="bardcolor size20px fontTahoma padding-15">+ основные ингредиенты</div><div class="hidden"><div class="darkbrowncolor size16px"><span> - </span>'.$info['ingredient1'].'</div>';
				echo'<div class="darkbrowncolor size16px"><span> - </span>'.$info['ingredient2'].'</div>';
				echo'<div class="darkbrowncolor size16px"><span> - </span>'.$info['ingredient3'].'</div></div>';
				
				echo'<div class="lightbrowncolor size20px fontSegoeScript padding-15">'.$info['slogan'].'</div>';
				echo'<div class="block-right-ellips col-xl-12 col-lg-12">
					<div class="d-flex justify-content-center align-items-center toppig_view__admin1  whitecolor size16px fontTahoma">'.$info['t1'].'</div>';
				echo'<div class="d-flex toppig_view__admin2  whitecolor size16px fontTahoma justify-content-center align-items-center">'.$info['t2'].'</div>';
                echo'<div class="d-flex justify-content-center align-items-center toppig_view__admin3 whitecolor size16px fontTahoma">' .$info['t3']. '</div>
			</div>
		</div></div>'; 
	}

		
	?></div>
<div class="assortiment-types__item col-lg-4 text-center"><div class="assortiment-types__name fontTahoma size26px darkbrowncolor padding-15">БЕЛАЯ ВЫПЕЧКА</div><?php
		 while($info = $select2->fetch_array()){
    	
    	echo'<div class="wrap-assortiment-container d-flex flex-column col-lg-12">
		<div class="block-content-admin d-flex flex-column col-lg-12">
				<div class="imgValueNal d-flex align-items-center col-lg-12"><div class="d-flex justify-content-center block-left__imgAdmin col-lg-7"><img src="'.MM_UPLOADPATH. $info['foto'].'"  alt="" /></div>';
                echo'<div class="valueNal col-lg-5"><div class="d-flex justify-content-center"><div class="darkbrowncolor size20px fontTahoma padding-15">'.$info['value'].'</div></div>';
				echo'<div class="d-flex justify-content-center"><div class="darkbrowncolor size16px fontTahoma">'.$info['nal'].'</div></div></div></div>
				';
				echo'<div class="bardcolor fontSegoeScript size20px">'.$info['name'].'</div>';
				
				echo'<div class="bardcolor size20px fontTahoma">+ Описание</div><div class="hidden col-lg-12 darkbrowncolor  size16px">'.$info['description'].'</div>';
				echo'<div class="bardcolor size20px fontTahoma padding-15">+ основные ингредиенты</div><div class="hidden"><div class="darkbrowncolor size16px"><span> - </span>'.$info['ingredient1'].'</div>';
				echo'<div class="darkbrowncolor size16px"><span> - </span>'.$info['ingredient2'].'</div>';
				echo'<div class="darkbrowncolor size16px"><span> - </span>'.$info['ingredient3'].'</div></div>';
				
				echo'<div class="lightbrowncolor size20px fontSegoeScript padding-15">'.$info['slogan'].'</div>';
				echo'<div class="block-right-ellips col-xl-12 col-lg-12">
					<div class="d-flex justify-content-center align-items-center toppig_view__admin1  whitecolor size16px fontTahoma">'.$info['t1'].'</div>';
				echo'<div class="d-flex toppig_view__admin2  whitecolor size16px fontTahoma justify-content-center align-items-center">'.$info['t2'].'</div>';
                echo'<div class="d-flex justify-content-center align-items-center toppig_view__admin3 whitecolor size16px fontTahoma">' .$info['t3']. '</div>
			</div>
		</div></div>'; 
	}

		
	?></div>

	
	
	 
	


 
   
	
   
	
</div></div>
<?php 
	require_once('footer.html');
	?>
</body>
</html>