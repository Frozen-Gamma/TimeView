<head><title>LevelCraft</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="bin/sorttable.js"></script>
</head>
<body>
<!-
Developped by
-DigidragonZX
-Shadoxfix
-!>
<script type="text/javascript">
<!--
function getLevel(n,LevelConstant)
{
	var level=1;
	var Constant=LevelConstant/100;
	if (n<=0) level=1;
	else
	{
	for (var i=1;i<1000;i++)
	{
		var levelAti=(100*(i*(i*Constant)));
		if (levelAti>=n)
		{
			level=i;
			break;
		}
	}
	}
	return level;
}
//-->
</script>

<?php

//define levels
$levels=array();
array_push($levels,'Mining');
array_push($levels,'WoodCutting');
array_push($levels,'Combat');
array_push($levels,'Range');
array_push($levels,'Dexterity');
array_push($levels,'Farming');
array_push($levels,'Digging');
array_push($levels,'Diving');
array_push($levels,'Explosives');
array_push($levels,'Health');
array_push($levels,'Defence');
array_push($levels,'Forgery');
array_push($levels,'Scavenger');
array_push($levels,'Prayer');
array_push($levels,'Building');

//icons
$levelPic['Mining']='img/Pickaxe.png';
$levelPic['WoodCutting']='img/Axe.png';
$levelPic['Combat']='img/Sword.png';
$levelPic['Range']='img/Bow.png';
$levelPic['Dexterity']='img/Boots.png';
$levelPic['Farming']='img/Hoe.png';
$levelPic['Digging']='img/Shovel.png';
$levelPic['Diving']='img/Pumpkin.png';
$levelPic['Explosives']='img/TNT.png';
$levelPic['Health']='img/Heart.png';
$levelPic['Defence']='img/Chestplate.png';
$levelPic['Forgery']='img/Furnace.png';
$levelPic['Scavenger']='img/Bucket.png';
$levelPic['Prayer']='img/Bone.png';
$levelPic['Building']='img/Cobblestone.png';

include ('config.php');
echo '<center><img src="img/Logo.png" />';
$sql = mysql_query("SELECT * FROM ExperienceTable ORDER BY name");
echo '<table class="sortable"><thead><tr style="height:32px;">
<th style="height:32px;">Player</th>
';

foreach ($levels as $value)
{
if ($levelAllowed[$value]==true)
{
echo '<th style="width:32px;height:32px;"><img alt="'.$value.'" title="'.$value.'" src="'.$levelPic[$value].'" width="32" height="32" /></th>
';
}
}

echo '</tr></thead>';

$tabN=0;
$tabVal=array();

while($row = mysql_fetch_array($sql))
	{
		echo '<tr><td>'.$row['name'].'</td>';
		
		foreach ($levels as $value)
		{
		if ($levelAllowed[$value]==true)
		{
		echo getLevel($row[$value.'Exp']);
		}
		}
		
		echo '</tr>';
	}
	echo '</table></center>';
	
	function getLevel($n){
	global $LevelConstant,$tabN,$tabVal;
	$tabVal[$tabN]=$n;
	$tabN++;
	return '<td id="TabCell'.(string)($tabN-1).'"></td>';
	}
	
	echo '
	
	<script type="text/javascript">
	<!--	
	var tabVal=new Array();
	';
	
	for ($i=0;$i<$tabN;$i++)
	{
	echo 'tabVal['.(string)$i.']="'.(string)$tabVal[$i].'";';
	}
	
	echo '
	
	for (var i in tabVal)
	{
	document.getElementById("TabCell"+i).innerHTML=getLevel(parseFloat(tabVal[i]),'.$LevelConstant.');
	}
	
	//-->
	</script>
	
	';
	
	mysql_close();
?>
</body>