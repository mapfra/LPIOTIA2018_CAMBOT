<?php
class cambot
{
	private $commande;
	public $result;
	public $mqtt;
	public function __construct($post)
	{
		require("phpMQTT.php"); // inclut la librairie PHP MQTT
		$server = "localhost"; // définition de l'host du serveur MQTT
		$port = 1883; // définition 
		$client_id = "phpMQTT-publisher";
		$this->mqtt=new phpMQTT($server, $port, $client_id); // création du client à partir de la classe phpMQTT
			
		if(isset($post['cmd']))
		{
			$this->commande=$post['cmd'];
			switch ($this->commande)
			{
				case "forward":
					$this->forward();
				break;
				case "backward":
					$this->backward();
				break;
				case "left":
					$this->left();
				break;
				case "right":
					$this->right();
				break;
			}
		}
		echo $this->result;
	}
	private function forward() // fonction qui permet d'envoyer au topic "cambot" du serveur MQTT la commande "avancer"
	{
		$this->result = $this->send_command("avancer"); 
	}	
	private function backward() // fonction qui permet d'envoyer au topic "cambot" du serveur MQTT la commande "reculer"
	{
		$this->result = $this->send_command("reculer"); 
	}
	private function left()
	{
		$this->result = $this->send_command("gauche"); // fonction qui permet d'envoyer au topic "cambot" du serveur MQTT la commande "gauche"
	}
	private function right()
	{
		$this->result = $this->send_command("droite"); // fonction qui permet d'envoyer au topic "cambot" du serveur MQTT la commande "droite"
	}	
	private function send_command($command) // fonction qui envoi le message au serveur MQTT 
	{	
		if ($this->mqtt->connect(true, NULL, "", "")) { // connexion au serveur MQTT
			$this->mqtt->publish("cambot", $command, 0); //publication sur le topic cambot la commande reçu dans le parametre de la fonction
			$this->mqtt->close(); // déconnexion du serveur MQTT
			return $command." : OK"; // retourne la commande + ": OK " pour confirmer la publication sur le serveur MQTT
		}
	}
}

?>