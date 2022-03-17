<?php
/** 
 * Classe d'accès aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application GSB
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoGsb qui contiendra l'unique instance de la classe
 
 * @package default
 * @author Cheri Bibi
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoGsb{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=gsbfrais';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp); 
		PdoGsb::$monPdo->query("SET CHARACTER SET utf8");
		PdoGsb::$monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	public function _destruct(){
		PdoGsb::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
	public  static function getPdoGsb(){
		if(PdoGsb::$monPdoGsb==null){
			PdoGsb::$monPdoGsb= new PdoGsb();
		}
		return PdoGsb::$monPdoGsb;  
	}


/**
 * Test : retourne les informations d'un visiteur par son id*/
 
 public function getInfosVisiteur($id){
		$req = "select visiteur.nom as nom, visiteur.prenom as prenom from visiteur 
		where visiteur.id = '$id' ";
		$rs = PdoGsb::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	public function getIdVisiteur(){
		$req = "select id from visiteur";
		$rs = PdoGsb::$monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	}	
	public function insertfraisforfait($repId,$melange)
	{
		$req="INSERT INTO fichefrais (idVisiteur,mois,idEtat)
		VALUES ('$repId','$melange','RB')";

	  $resultat = PdoGsb::$monPdo->exec($req);

	}
	public function insertResultatRep($repId,$melange,$rep1,$quantite)
	{
		try {
		 $req="INSERT INTO lignefraisforfait
		  VALUES ('$repId','$melange','$rep1',$quantite)";
		$resultat = PdoGsb::$monPdo->exec($req);
		} catch (PDOException $e) {

			die("Error!: " . $e->getMessage() . "<br/>");
	
		}

	}
	public function insertResultatNui($repId,$melange,$rep2,$quantite)
	{
		$req="INSERT INTO lignefraisforfait
		VALUES ('$repId','$melange','$rep2',$quantite)";

	  $resultat = PdoGsb::$monPdo->exec($req);


	}
	public function insertResultatEtp($repId,$melange,$rep3,$quantite)
	{
		$req="INSERT INTO lignefraisforfait
		VALUES ('$repId','$melange','$rep3',$quantite)";

	  $resultat = PdoGsb::$monPdo->exec($req);

	}
	public function insertResultatKm($repId,$melange,$rep4,$quantite)
	{
		$req="INSERT INTO lignefraisforfait
		VALUES ('$repId','$melange','$rep4',$quantite)";

	  $resultat = PdoGsb::$monPdo->exec($req);


	}

}