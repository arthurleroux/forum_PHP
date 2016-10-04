<?php

session_start();

/* Fichiers de configuration */
include('conf/settings.php');		// Configuration de l'acc�s � la base de donn�es

/* Librairies */
include('lib/database.lib.php');	// Classe de la base de donn�es

/* Classes */
include('models/Member.class.php');
include('models/Topic.class.php');
include('models/Message.class.php');
// ajouter ici les diff�rentes classes cr��es


