<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
		<title></title>
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-utils/concise-utils.min.css">
		<link rel="stylesheet" href="http://www.iut-fbleau.fr/css/concise-ui/concise-ui.min.css">
		<link rel="stylesheet" href="./css/style.css">
		<?php
				if (isset($_POST['op1'],$_POST['operation'],$_POST['op2'])) {
					$op1=$_POST['op1'];
					$op2=$_POST['op2'];
					$operation=$_POST['operation'];
					$verification1=filter_var($op1,FILTER_VALIDATE_INT);
					$verification2=filter_var($op2,FILTER_VALIDATE_INT);
					if ($verification1 && $verification2) {
						switch ($operation) {
							case '+':
								$res=$op1+$op2;
								break;
							case '-':
								$res=$op1-$op2;
								break;

							case 'x':
								$res=$op1*$op2;
								break;

							case '/':
								if ($op2!=0) {
									$res=$op1/$op2;
								}
								else {$res="division par 0</li>";}
								break;
							
							default:
								$res=0;
								break;
						}
					}
				 } 
					
		?>
	</head>
	<body container>
		<h3 class="_bb1">Calculatrice</h3>
		
		<form  class="_text-center" method="POST">
			<!-- opérande 1 -->

			<input placeholder="un nombre" type="text" name="op1" />

			<!-- opération -->

			<select name="operation">
				<option value="+">+</option>
				<option value="-">-</option>
				<option value="x">x</option>
				<option value="/">/</option>
			</select>

			<!-- opérande 2 -->

			<input placeholder="un nombre" type="text" name="op2" />

			<input placeholder="<?php 
			if(isset($res)) 
			echo $res;
			?>"  type="text" name="res" value="<?php 
			if(isset($res)) 
			echo $res;
			?>" 
			/>

			<!-- bouton -->

			<button name="soumis"> Calculer</button>

		</div>
	</body>
</html>
