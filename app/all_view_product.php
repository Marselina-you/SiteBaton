
<?php  require_once('appvars.php');
$son = new mysqli('localhost','root','root', 'zabatonom');
$select1 = $son->query("SELECT  foto, name, description, ingredient1, ingredient2, ingredient3, value, nal, slogan, t1, t2, t3  FROM ass WHERE types = 'белая выпечка' LIMIT 180");
$select2 = $son->query("SELECT  foto, name, description, ingredient1, ingredient2, ingredient3, value, nal, slogan, t1, t2, t3  FROM ass WHERE types = 'черный хлеб' LIMIT 180");
$select3 = $son->query("SELECT  foto, name, description, ingredient1, ingredient2, ingredient3, value, nal, slogan, t1, t2, t3  FROM ass WHERE types = 'пирожные' LIMIT 180");
$bread = 'ЧЕРНЫЙ ХЛЕБ';
$cake = 'ПИРОЖНЫЕ';
$loaf = 'БЕЛАЯ ВЫПЕЧКА';
if ($_GET["size"] == "loaf") {
	echo'<div class="lightbrowncolor size45px fontTahoma text-center font-weight-bold padding25">' .$loaf. '</div>';
	while($info = $select1->fetch_array()){
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
}
elseif ($_GET["size"] == "cake") {
	echo'<div class="lightbrowncolor size45px fontTahoma text-center font-weight-bold padding25">' .$cake. '</div>';
	while($info = $select3->fetch_array()){
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
}
elseif ($_GET["size"] == "bread") {
	echo'<div class="lightbrowncolor size45px fontTahoma text-center font-weight-bold padding25">' .$bread. '</div>';
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
}

	?> 
	