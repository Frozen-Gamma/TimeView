<?php
// mySQL information
$server = 'localhost';                   // MySql Server
$username = 'root';                      // MySql Username
$password = 'password' ;                 // MySql Password
$database = 'minecraft';                 // MySql Database
$LevelConstant = '20';

//Time information
//Time's to display (true to show a level, false to hide it)
$levelAllowed['Mining']=false;
$levelAllowed['WoodCutting']=false;
$levelAllowed['Combat']=false;
$levelAllowed['Range']=false;
$levelAllowed['Dexterity']=false;
$levelAllowed['Farming']=false;
$levelAllowed['Digging']=false;
$levelAllowed['Diving']=false;
$levelAllowed['Explosives']=false;
$levelAllowed['Health']=false;
$levelAllowed['Defence']=false;
$levelAllowed['Forgery']=false;
$levelAllowed['Scavenger']=false;
$levelAllowed['Prayer']=false;
$levelAllowed['Building']=false;

// The following should not be edited
$con = mysql_connect("$server","$username","$password");
if (!$con)
  {
  die('<div class="error">
Sorry, there appears to be a problem with accessing the database.<br>
The error message was :<br>
<br>
<span style="padding:4px;color:#fff;background-color:#000;">'.mysql_error().'</span><br>
<br>
This can be caused by one or more of the following :<br>
<br>
-<a href="http://dev.mysql.com/downloads/" target="_blank">MySQL</a> is not installed on the website\'s server<br>
-the config.php hasn\'t been properly edited; make sure your $server, $username, $password and $database variables are set correctly<br>
</div>');
  }
mysql_select_db("$database", $con); 
?>