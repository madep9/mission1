<?php
include 'data/pdo.php';
/* création de l'objet $pdo d'accès aux données*/
$pdo = PdoGsb::getPdoGsb();
include 'vue/v_entete.php';

//si request me renvoie pas quelque chose  alors uc = controleur
if (!isset($_REQUEST['uc']))
{
    $uc='controler';
}
//si request me renvoie quelque chose  alors else

else{
    $uc=$_REQUEST['uc'];
}

switch ($uc)
{
    case 'controler':
       { include 'controleur/c_controler.php';}
    
}




include 'vue/v_piedpage.php';