<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clefs secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C'est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d'installation. Vous n'avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'a3m');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'root');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'root');

/** Adresse de l'hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8mb4');

/** Type de collation de la base de données.
  * N'y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clefs uniques d'authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n'importe quel moment, afin d'invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '57?.Lm!:E~j1_$w%f A0}81?;KplkHz+_ JHsA8Sy~g/fMrH(Bg>k?eSk,&HStGz');
define('SECURE_AUTH_KEY',  'fnzn4 *0ICF-3^Z>%6@HtG|5ch>^?dJc,zX4F#YnjD&lX}:&}[b+;8a{;`oGK;;p');
define('LOGGED_IN_KEY',    '4|B2rQu{IYqF:~~}RaA-<j?DJX- Y5|VED1i>A!rXI=*t4b%&3RrTxLcI:vog3lV');
define('NONCE_KEY',        'IBC]OG%QgP,wl!DF#cXs6rx4u-4pRxM]lJ@k!9pL}ya~pdT=bm|y5-Bh-4%$o3ei');
define('AUTH_SALT',        '+T=/<UrEf.&tg4 |<9u98FQlS:&_I+GkgxtQ+>3hICGz+oKOq|2f!?)W9dn`-d]!');
define('SECURE_AUTH_SALT', 'A([`J!6Fd/NL[eiz)>9WGe,+aeuxH,7@Y<I-.t|sSwr|Mv4T@.75-Qz,G)_>Ufm;');
define('LOGGED_IN_SALT',   ' gt5)|TMAt5$b<|Wf_q~t::&fxV@IV/w+P!j_]2#*;|5@^_>dKtp|=`NP{pVQzQj');
define('NONCE_SALT',       'Ry-8e-a?EDUf^/oZk^+I|;?6Sq;ZYVDBpd?X<9eb/Y+@5*Sym4o.adK|#@]kYKp{');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N'utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés!
 */
$table_prefix  = 'a3m_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l'affichage des
 * notifications d'erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d'extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 */
define('WP_DEBUG', false);

/* C'est tout, ne touchez pas à ce qui suit ! Bon blogging ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');