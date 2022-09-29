<?php
    session_start();
// Regex
define('REGEX_NO_NUMBER',"^[A-Za-zéèêëàâäôöûüç' \-]+$");
define('REGEX_ZIPCODE','^[0-9]{5}$');
define('REGEX_LINKEDIN','^(https:\/\/)?((www\.|fr\.)?([a-zA-Z0-9\.\/=\?\-]*))$');
define('REGEX_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
define('REGEX_TEXTAREA','^[a-zA-Z0-9 ,.\'-]');
define('REGEX_PASSWORD', '^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}');
define('REGEX_AGE', '^[0-9]{1,3}$');

// Tableau de valeurs pour mes champs
define('CIVILITY', ['HOMME', 'FEMME', 'AUTRE']);
define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);
define('TYPEOFWALKYZ',['Courte balade  (≃ 1h)', 'Longue balade (> 2h)', 'Faire jouer nos chiens', 'Autre']);
define('WHENWALKYZ', ['En semaine, pendant la journée', 'En semaine le soir', 'Le week-end','Autre']);
define('STATS', ['dominant', 'Passif-Agressif', 'Timide', 'Amical', 'Indépendant', 'Joueur']);
define('BEHAVIOR', ['Joueur', 'Très peu intéressé par les autres chiens','Il préfère faire sa vie de son côté', 'Se comporte mal avec les autres chiens' ]);


// nécessaire pour la database
define('DSN', 'mysql:host=localhost;dbname=walkyz');
define('LOGIN', 'root');
define('PASSWORD', '');

//Message erreurs divers a modifier
define('ERRORS', [
    0=>'Une erreur inconnue s\'est produite',
    1=>'Problème de connexion à la BDD',
    2=>'Erreur lors de la récupération du patient',
    3=>'Patient non trouvé',
    4=>'Erreur lors de la mise à jour du patient',
    5=>'Patient non mis à jour, ce patient existe déjà',
    6=>'Erreur lors de la création du rendez-vous',
    7=>'Rendez-vous non créé',
    8=>'Erreur lors de la récupération du rendez-vous',
]);

define('MESSAGES', [
    1=>'Patient mis à jour',
    2=>'Le rendez-vous a été créé',
    3=>'Le rendez-vous a bien été mis à jour',
]);

// JWT
define('SECRET_KEY', '/wIr#j_]d$fTCk%;lL.wblFOox_}a?');
