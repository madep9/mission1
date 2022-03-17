<?php
if (!isset($_REQUEST['action']))
{
    $action='accueil';
}
//si request me renvoie quelque chose  alors else

else{
    $action=$_REQUEST['action'];
}

switch ($action){
    case'accueil':
        {include 'vue/Accueil.php';

            break;
        
        }
    case 'form':
        {
            $idVisteurs=$pdo->getIdVisiteur();
           // var_dump($idVisteurs);
            include 'vue/formulaire.php';
        break;
        }  
    case'sélection':
        {include 'data/pdo.php';

        break;
        } 
    case 'valider':
        {
          
           
           $repId=$_REQUEST["idvisiteur"];
           $rep=$_REQUEST["annee"];
           $repa=$_REQUEST["mois"];
           $melange=$rep.$repa;
        
           $RES=$pdo->insertfraisforfait($repId,$melange);
           foreach($_REQUEST['tab'] as $k=>$quantite){
      

               if($k=='REP'){$RES=$pdo->insertResultatRep($repId,$melange,'REP',$quantite);}

                if($k=='NUI'){$RES=$pdo->insertResultatNui($repId,$melange,'NUI',$quantite);}

                if($k=='ETP'){$RES=$pdo->insertResultatEtp($repId,$melange,'ETP',$quantite);}

                if($k=='KM'){$RES=$pdo->insertResultatKm($repId,$melange,'KM',$quantite);}
           }
                echo"c'est validé";
        }   
           
    
        break;
    }




