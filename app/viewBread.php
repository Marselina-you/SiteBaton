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
	<?php 
	require_once('undertitle.html');
	?>
	<div class="container-fluid assortiment-container">
		<div class="wrap-assortiment-container d-flex flex-column">
			<div class="assortiment-container__title d-flex justify-content-center"><div class="lightbrowncolor size45px fontTahoma text-center font-weight-bold col-lg-6 padding25">ЧЕРНЫЙ ХЛЕБ</div></div>
		    
		
	
		<?php  require_once('appvars.php');
		
		$son = new mysqli('localhost','root','root', 'zabatonom');
// Возьмите данные профиля из базы данных
 $select = $son->query("SELECT  foto, name, description, ingredient1, ingredient2, ingredient3, value, nal, slogan, t1, t2, t3  FROM ass WHERE types = 'черный хлеб' LIMIT 180");
    while($info = $select->fetch_array()){
    	
    	echo'<div class="block-content d-flex flex-column"><div class="block-left-right d-flex"><div class="block-left col-xl-6 col-lg-5 col-md-4 col-sm-4 col-xs-4 flex-column">
				<div class="d-flex justify-content-center block-left__img"><img src="'.MM_UPLOADPATH. $info['foto'].'"  alt="" /></div>';
                echo'<div class="d-flex justify-content-center"><div class="darkbrowncolor size20px fontTahoma padding-15">'.$info['value'].'</div></div>';
				echo'<div class="d-flex justify-content-center"><div class="darkbrowncolor size20px fontTahoma padding-15">'.$info['nal'].'</div></div>
				</div>';
				echo'  <div class="block-right col-xl-6 col-lg-7 col-md-8 col-sm-8 col-xs-8 d-flex flex-column"><div class="bardcolor fontSegoeScript size35px padding-15">'.$info['name'].'</div>';
				
				echo'<div class="bardcolor size29px fontTahoma padding-15">+ Описание</div><div class="hidden col-lg-9 darkbrowncolor fontSegoeScript size20px">'.$info['description'].'</div>';
				echo'<div class="bardcolor size29px fontTahoma padding-15">+ основные ингредиенты</div><div class="hidden"><div class="darkbrowncolor fontSegoeScript size20px"><span> - </span>'.$info['ingredient1'].'</div>';
				echo'<div class="darkbrowncolor fontSegoeScript size20px"><span> - </span>'.$info['ingredient2'].'</div>';
				echo'<div class="darkbrowncolor fontSegoeScript size20px"><span> - </span>'.$info['ingredient3'].'</div></div>';
				
				echo'<div class="lightbrowncolor size35px fontSegoeScript padding-15">'.$info['slogan'].'</div>';
				echo'<div class="block-right-ellips col-xl-12 col-lg-12"><div class="d-flex">
					<div class="d-flex justify-content-center align-items-center toppig_view toppig_view1 whitecolor size24px fontTahoma">'.$info['t1'].'</div></div>';
				echo'<div class="d-flex"><div class="d-flex toppig_view toppig_view2 whitecolor size24px fontTahoma justify-content-center align-items-center">'.$info['t2'].'</div></div>';
                echo'<div class="d-flex"><div class="d-flex justify-content-center align-items-center toppig_view toppig_view3 whitecolor size24px fontTahoma">' .$info['t3']. '</div></div>
			</div></div>
		</div><div class="d-flex justify-content-center"><img src="../images/dest/razdel1.png"></div></div>'; }?>
	
</div></div>
<?php 
	require_once('footer.html');
	?>
</body>
</html>