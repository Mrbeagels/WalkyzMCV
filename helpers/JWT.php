<?php
require_once __DIR__ . '/../config/config.php';

class JWT
{

    /**
     * 
     * Méthode permettant d'encoder en base64 une url en se protégeant de certains caractères génants pour une url
     * 
     * @param string $str
     * 
     * @return string
     */
    private static function base64url_encode(string $str): string
    {
        return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
    }

    /**
     * Méthode permettant de générer un jwt
     * 
     * @param array $payload
     * 
     * @return string
     */
    public static function generate(array $payload): string
    {

        $header = array('alg' => 'HS256', 'typ' => 'JWT');
        $header_json = json_encode($header);
        $header_encoded = self::base64url_encode($header_json);

        $payload_json = json_encode($payload);
        $payload_encoded = self::base64url_encode($payload_json);

        // Cryptage de la signature (composée du header et du payload)
        $signature = hash_hmac('SHA256', $header_encoded . '.' . $payload_encoded, SECRET_KEY, true);
        $signature_encoded = self::base64url_encode($signature);

        // Génération du token (header+payload+signature)
        $jwt = $header_encoded . '.' . $payload_encoded . '.' . $signature_encoded;

        return $jwt;
    }

    /**
     * Méthode permettant de récupérer toutes les infos contenues dans le payload avec vérification de l'authenticité
     * du jwt et de sa date d'expiration
     * 
     * @param string $jwt
     * 
     * @return object
     */
    public static function get(string $jwt): object|bool
    {
        $tokenParts = explode('.', $jwt);
        $header = base64_decode($tokenParts[0]);
        $payload = base64_decode($tokenParts[1]);
        $signature_provided = $tokenParts[2];

        // Vérification de la date d'expiration contenue dans le jwt
        $exp = json_decode($payload)->exp;
        if($exp < time()){
            return false;
        }

        // Cryptage de la signature (composée du header et du payload)
        $base64_url_header = self::base64url_encode($header);
        $base64_url_payload = self::base64url_encode($payload);
        $signature = hash_hmac('SHA256', $base64_url_header . '.' . $base64_url_payload, SECRET_KEY, true);
        $signature_url_encoded = self::base64url_encode($signature);

        // si la signature crytptée générée à partir de l'url et la signature contenue dans l'url sont identiques, 
        // Le JWT est valide, on retourne alors le payload sous forme d'objet
        if($signature_url_encoded===$signature_provided){
            return json_decode($payload);
        } else {
            return false;
        }
    }
}
