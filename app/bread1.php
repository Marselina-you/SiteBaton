<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	
	<link rel="stylesheet" href="css/app.min.css">
	<script src="js/app.min.js"></script>
		

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu</title>
</head>
    <?php   
        require_once('appvars.php');
        require_once('undertitle.html');
        $son = new mysqli('localhost','root','root', 'zabatonom');
$select2 = $son->query("SELECT  foto, name, description, ingredient1, ingredient2, ingredient3, value, nal, slogan, t1, t2, t3  FROM ass WHERE types = 'черный хлеб' LIMIT 180");
$bread = 'ЧЕРНЫЙ ХЛЕБ';
?>
        <body>
        	<div class="container-fluid">
        		<div class="block-undertitle d-flex flex-column col-lg-10 offset-lg-1">
				<div class="block-undertitle-href d-flex col-lg-12 justify-content-between">
			        <div class="wrap-block-undertitle-href col-lg-4"><div class="href-product block-undertitle-hrefAll block-undertitle-href1  fontSans size26px text-center"><a href="all_view_product.php?size=bread" class="bardcolor">ЧЕРНЫЙ ХЛЕБ</a></div></div>
			        <div class="wrap-block-undertitle-href1 col-lg-4"><div class="href-product block-undertitle-hrefAll block-undertitle-href2 fontSans size26px text-center"><a href="all_view_product.php?size=cake" class="bardcolor">ПИРОЖНЫЕ</a></div></div>
			        <div class="wrap-block-undertitle-href col-lg-4"><div class="href-product block-undertitle-hrefAll block-undertitle-href3 fontSans size26px text-center"><a href="all_view_product.php?size=loaf" class="bardcolor">БЕЛАЯ ВЫПЕЧКА</a></div></div>
			    </div>
			    <div class="block-undertitle-img d-flex col-lg-12 justify-content-center">
			        <div class="href-product block-undertitle-imgs"><a href="view.php?size=bread"><img src="../images/dest/bread.gif"></a></div>
			        <div class="href-product block-undertitle-imgs"><a href="view.php?size=cake"><img src="../images/dest/kexon.gif"></a></div>
			        <div class="href-product block-undertitle-imgs"><a href="view.php?size=loaf"><img src="../images/dest/bag.gif"></a></div>
			    </div>
			</div>
			<?php echo'<div class="nows1"><div class="lightbrowncolor size45px fontTahoma text-center font-weight-bold padding25">' .$bread. '</div>';
				while($info = $select2->fetch_array()){
		echo'<div class="block-content d-flex flex-column"><div class="block-left-right d-flex justify-content-center"><div class="block-left col-xl-4 flex-column">
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
		</div><div class="d-flex justify-content-center"><img src="../images/dest/razdel1.png"></div></div>';}
		
			?></div>
</div>
        	<script src="js/view_product.js"></script>
        	<?php 
	require_once('footer.html');
	?>
        </body>
</html>