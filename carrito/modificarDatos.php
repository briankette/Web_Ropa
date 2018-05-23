<?php 
session_start();

			$arreglo = $_SESSION['carrito'];
			$total=0;
			$numero=0;
			for ($i=0;$i<count($arreglo);$i++) { 
				if($arreglo[$i]['id']==$_POST['id']){
					$numero=$i;
				}
			}
			$arreglo[$numero]['Canti']=$_POST['Canti'];
			for ($i=0;$i<count($arreglo);$i++) { 
				$total=($arreglo[$i]['Price']*$arreglo[$i]['Canti'])+$total;
			}
			$_SESSION['carrito']=$arreglo;
			echo $total;
 ?>