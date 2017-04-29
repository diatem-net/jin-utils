<?php

/**
 * Jin Framework
 * Diatem
 */

namespace Jin\Utils;

/**
 * Boite à outils pour les chaînes de caractères
 */
class StringTools
{

  /**
   * Retourne la longueur de la chaîne de caractères
   *
   * @param  string  $string  Chaîne de caractères
   * @return integer          Longueur de la chaîne
   */
  public static function len($string)
  {
    return strlen($string);
  }

  /**
   * Permet de reconstituer une chaîne de caractère à partir d'un tableau de chaînes
   *
   * @param  array   $pieces  Tableau de chaînes de caractères
   * @param  string  $glue    (optional) Caractère de séparation des éléments reconstitués (Chaîne vide par défaut)
   * @return array
   */
  public static function implode($pieces, $glue = '')
  {
    return implode($glue, $pieces);
  }

  /**
   * Teste si la chaine contient une sous-châine spécifiée
   *
   * @param  string  $string  Chaîne de caractères
   * @param  string  $search  Chaîne recherchée
   * @param  boolean $noCase  (optional) Ne pas prendre en compte la casse (FALSE par défaut)
   * @return boolean          TRUE si la chaîne contient la sous-chaîne
   */
  public static function contains($string, $search, $noCase = false)
  {
    return self::firstIndexOf($string, $search, $noCase) == -1;
  }

  /**
   * Teste si la chaîne débute par le préfixe indiqué
   *
   * @param  string  $string  Chaîne de caractères
   * @param  string  $prefix  Préfixe à tester
   * @param  boolean $noCase  (optional) Ne pas prendre en compte la casse (FALSE par défaut)
   * @return boolean          TRUE si la chaîne débute par le préfixe indiqué
   */
  public static function startsWith($string, $prefix, $noCase = false)
  {
    if ($noCase) {
      return strtolower(substr($string, 0, strlen($prefix))) == strtolower($prefix);
    } else {
      return substr($string, 0, strlen($prefix)) == $prefix;
    }
  }

  /**
   * Teste si la chaîne finit par le suffixe indiqué
   *
   * @param  string  $string  Chaîne de caractères
   * @param  string  $suffix  Suffixe à tester
   * @param  boolean $noCase  (optional) Ne pas prendre en compte la casse (FALSE par défaut)
   * @return boolean          TRUE si la chaîne finit par le suffixe indiqué
   */
  public static function endsWith($string, $suffix, $noCase = false)
  {
    $length = strlen($suffix);
    if ($noCase) {
      return strtolower(substr($string, strlen($string) - $length, $length)) == strtolower($suffix);
    } else {
      return substr($string, strlen($string) - $length, $length) == $suffix;
    }
  }

  /**
   * Cherche la première occurence d'une sous-chaîne dans la chaîne en commençant à l'index spécifié. Retourne -1 si aucune occurence n'est trouvée
   *
   * @param  string  $string      Chaîne de caractères
   * @param  string  $search      Chaîne à rechercher
   * @param  boolean $noCase      (optional) Ne pas prendre en compte la casse (FALSE par défaut)
   * @param  integer $startIndex  (optional) Index à partir duquel commencer la recherche (0 par défaut)
   * @return integer              Position de la chaîne recherchée, -1 si aucune occurence n'est trouvée
   */
  public static function firstIndexOf($string, $search, $noCase = false, $startIndex = 0)
  {
    if ($noCase) {
      $index = stripos($string, $search, $startIndex);
    } else {
      $index = strpos($string, $search, $startIndex);
    }
    return ($index === false) ? -1 : $index;
  }

  /**
   * Cherche la dernière occurence d'une sous-chaîne dans la chaîne en limitant la recherche à l'index spécifié.
   * Retourne -1 si aucune occurence n'est trouvée
   *
   * @param  string  $string    Chaîne de caractères
   * @param  string  $search    Chaîne à rechercher
   * @param  boolean $noCase    (optional) Ne pas prendre en compte la casse (FALSE par défaut)
   * @param  integer $endIndex  (optional) Index limitant la recherche (Par défaut la recherche débute à la fin de la chaîne)
   * @return integer            Position de la chaîne recherchée, -1 si aucune occurence n'est trouvée
   */
  public static function lastIndexOf($string, $search, $noCase = false, $endIndex = 0)
  {
    if ($noCase) {
      $index = strripos($string, $search, $endIndex);
    } else {
      $index = strrpos($string, $search, $endIndex);
    }
    return ($index === false) ? -1 : $index;
  }

  /**
   * Analyse la chaîne pour trouver lex expressions qui correspondent à l'expression régulière fournie
   *
   * @param  string  $string      Chaîne de caractères
   * @param  string  $regex       Expression régulière
   * @param  integer $startIndex  (optional) Index où débuter la recherche (0 par défaut)
   * @return array                Tableau multidimensionnel
   */
  public static function getMatches($string, $regex, $startIndex = 0)
  {
    $matches = array();
    preg_match_all($regex, $string, $matches, PREG_OFFSET_CAPTURE, $startIndex);
    return $matches[0];
  }

  /**
   * Retourne le caractère à l'index spécifié
   *
   * @param  string  $string   Chaîne de caractères
   * @param  integer $index    Index
   * @return string            Caractère trouvé à l'index spécifié
   */
  public static function charAt($string, $index)
  {
    return substr($string, $index, 1);
  }

  /**
   * Retourne une portion de chaîne
   *
   * @param  string  $string  Chaîne de caractères
   * @param  integer $index   Index à partir duquel prélever la sous-chaîne
   * @param  integer $length  (optional) Longueur de la chaîne à prélever. (Par défaut correspondra à toute la fin de la chaîne)
   * @return string          Portion de chaîne
   */
  public static function substring($string, $index, $length = 0)
  {
    return substr($string, $index, $length);
  }

  /**
   * Retourne la sous-chaîne de caractères au début de la chaîne
   *
   * @param  string  $string  Chaîne de caractère
   * @param  integer $length  Nombre de caractères à retourner
   * @return string           Sous chaîne de caractères
   */
  public static function left($string, $length)
  {
    return substr($string, 0, $length);
  }

  /**
   * Retourne la sous-chaîne de caractères à la fin de la chaîne
   *
   * @param  string  $string  Chaîne de caractère
   * @param  integer $length  Nombre de caractères à retourner
   * @return string           Sous chaîne de caractères
   */
  public static function right($string, $length)
  {
    return substr($string, strlen($string) - $length, $length);
  }

  /**
   * Coupe la chaîne en un tableau
   *
   * @param  string  $string     Chaîne de caractères
   * @param  string  $delimiter  (optional) Caractère ou chaîne utilisée pour découper le tableau. (Si la chaîne est vide ou non fournie la chaîne sera découpée pour chaque caractère)
   * @return array               Tableau de chaînes de caractères
   */
  public static function explode($string, $delimiter = '')
  {
    if ($delimiter == '') {
      return str_split($string);
    } else {
      return explode($delimiter, $string);
    }
  }

  /**
   * Remplace les occurences de la sous-chaîne dans la chaîne
   *
   * @param  string  $string       Chaîne de caractères
   * @param  string  $search       Chaine à rechercher
   * @param  string  $replacement  Chaine de remplacement
   * @param  boolean $noCase       (optional) Ne pas tenir compte de la casse (FALSE par défaut)
   * @return string                Chaîne de caractère modifiée
   */
  public static function replaceAll($string, $search, $replacement, $noCase = false)
  {
    if ($noCase) {
      return str_replace($search, $replacement, $string);
    } else {
      return str_ireplace($search, $replacement, $string);
    }
  }

  /**
   * Remplace la première occurence de la sous-chaîne dans la chaîne
   *
   * @param  string  $string       Chaîne de caractères
   * @param  string  $search       Chaine à rechercher
   * @param  string  $replacement  Chaine de remplacement
   * @param  boolean $noCase       (optional) Ne pas tenir compte de la casse (FALSE par défaut)
   * @return string                Chaîne de caractère modifiée
   */
  public static function replaceFirst($string, $search, $replacement, $noCase = false)
  {
    $search = self::replaceAll($search, '/', '\/');
    if ($noCase) {
      return preg_replace('/' . $search . '/i', $replacement, $string, 1);
    } else {
      return preg_replace('/' . $search . '/', $replacement, $string, 1);
    }
  }

  /**
   * Remplace la dernière occurence de la sous-chaîne dans la chaîne
   *
   * @param  string  $string       Chaîne de caractères
   * @param  string  $search       Chaine à rechercher
   * @param  string  $replacement  Chaine de remplacement
   * @param  boolean $noCase       (optional) Ne pas tenir compte de la casse (FALSE par défaut)
   * @return string                Chaîne de caractère modifiée
   */
  public static function replaceLast($string, $search, $replacement, $noCase = false)
  {
    if ($noCase) {
      $position = strripos($string, $search);
    } else {
      $position = strrpos($string, $search);
    }
    if ($position !== false) {
      return substr_replace($string, $replacement, $position, strlen($search));
    }
    return $string;
  }

  /**
   * Analyse la chaîne et remplace toutes les expressions qui correspondent à l'expression régulière fournie
   *
   * @param  string  $string       Chaîne de caractères
   * @param  string  $regex        Expression régulière
   * @param  string  $replacement  Chaîne de remplacement
   * @return string                Chaîne de caractère modifiée
   */
  public static function replaceAllMatches($string, $regex, $replacement)
  {
    return preg_replace($regex, $replacement, $string);
  }

  /**
   * Analyse la chaîne et remplace toutes lla première expressions qui correspond à l'expression régulière fournie
   *
   * @param  string  $string       Chaîne de caractères
   * @param  string  $regex        Expression régulière
   * @param  string  $replacement  Chaîne de remplacement
   * @return string                Chaîne de caractère modifiée
   */
  public static function replaceFirstMatch($string, $regex, $replacement)
  {
    return preg_replace($regex, $replacement, $string, 1);
  }

  /**
   * Met la chaîne en minuscules
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne en minuscules
   */
  public static function toLowerCase($string)
  {
    return strtolower($string);
  }

  /**
   * Met la chaîne en majuscules
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne en majuscules
   */
  public static function toUpperCase($string)
  {
    return strtoupper($string);
  }

  /**
   * Met le premier caractère de la chaîne en majuscule
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne avec le premier caractère en majuscule
   */
  public static function firstCarToUpperCase($string)
  {
    return ucfirst($string);
  }

  /**
   * Formate une chaîne en lui passant un tableau de correspondances.
   * Les mots clés sont à insérer sous la forme %cle%.
   * Le système va recherche les clés dans le tableau fourni correspondants aux mots clés détectés.
   *
   * @param  string  $string        Chaîne de caractères
   * @param  array   $replacements  Clés à remplacer (Tableau associatif obligatoirement)
   * @return string                 Chaîne formatée
   */
  public static function format($string, $replacements)
  {
    foreach ($replacements as $key => $value) {
      $string = str_replace('%'. $key .'%', $value, $string);
    }
    return $string;
  }

  /**
   * Effectue une césure d'une chaîne en respectant les mots
   *
   * @param  string  $string   Chaîne de caractères
   * @param  integer $length   Longueur de la ligne en nombre de caractères
   * @param  string  $cresure  (optional) Chaîne utilisée pour effectuer le retour à la ligne (balise BR par défaut)
   * @param  integer $height   (optional) Nombre maximal de lignes (-1 par défaut, c'est à dire pas de maximum)
   * @param  string  $suffix   (optional) Suffixe à afficher si le texte dépasse le nombre de lignes maximal.
   * @return string            Chaîne formatée
   */
  public static function wordWrap($string, $length, $cresure = '<br/>', $height = -1, $suffix = '')
  {
    $string = self::removeHtmlTags($string);
    $string = wordwrap($string, $length, $cresure);
    $elements = self::explode($string, $cresure);
    if (count($elements) + 1 > $height && $height != -1) {
      $string = '';
      for ($i = 0; $i <= $height; $i++) {
        $string .= $elements[$i];
        if ($i < ($height)) {
          $string .= $cresure;
        } elseif ($i == ($height)) {
          $string .= $suffix;
        }
      }
    }
    return $string;
  }

  /**
   * Supprime les espaces blancs en début et fin de chaîne
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne de caractère modifiée
   */
  public static function deleteWhiteSpaces($string)
  {
    return trim($string);
  }

  /**
   * Encode au format uuencode
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne de caractères encodée
   */
  public static function uuEncode($string)
  {
    return convert_uuencode($string);
  }

  /**
   * Décode du format uuencode
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne de caractères décodée
   */
  public static function uuDecode($string)
  {
    return convert_uudecode($string);
  }

  /**
   * Encode au format HTML
   *
   * @param  string  $string        Chaîne de caractères
   * @param  boolean $specialChars  (optional) Si TRUE, encode également les caractères spéciaux &"'<> (TRUE par défaut)
   * @return string                 Chaîne encodée
   */
  public static function htmlEncode($string, $specialChars = true)
  {
    if ($specialChars) {
      $string = htmlspecialchars($string);
    }
    return htmlentities($string);
  }

  /**
   * Décode une chaîne au format HTML
   *
   * @param  string  $string        Chaîne de caractères
   * @param  boolean $specialChars  (optional) Si TRUE, décode également les caractères spéciaux &"'<> (TRUE par défaut)
   * @return string                 Chaîne décodée
   */
  public static function htmlDecode($string, $specialChars = true)
  {
    if ($specialChars) {
      $string = htmlspecialchars_decode($string);
    }
    return html_entity_decode($string);
  }

  /**
   * Génère une valeur de hashage
   *
   * @param  string  $string     Chaîne de caractères
   * @param  string  $algorithm  (optional) Algorithme à utiliser (md5 par défaut)
   * @return string              Valeur de hashage
   */
  public static function hashCode($string, $algorithm = 'md5')
  {
    return hash($algorithm, $string);
  }


  /**
   * Génère une valeur de hashage avec une clé utilisée pour générer la variance HMAC de l'empreinte numérique.
   *
   * @param  string $string     Chaîne de caractères à hasher
   * @param  string $key        Clé de variance
   * @param  string $algorithm  (optional) Algorithme à utiliser (md5 par défaut)
   * @return string
   */
  public static function hmac($string, $key, $algorithm = 'md5')
  {
    return hash_hmac($algorithm, $string, $key);
  }

  /**
   * Supprime toutes les balises HTML
   *
   * @param  string  $string  Chaîne de caractère
   * @return string           Chaîne de caractère nettoyée
   */
  public static function removeHtmlTags($string)
  {
    return strip_tags($string);
  }

  /**
   * Nettoie un nom de fichier de tous les caractères spéciaux
   *
   * @param  string  $fileName  Chaîne de caractère
   * @return string             Chaîne de caractère nettoyée
   */
  public static function cleanFileName($fileName)
  {
    $fileNameParts = explode('.', $fileName);
    $extension = array_pop($fileNameParts);
    $fileName = implode($fileNameParts);
    return self::clean($fileName) .'.'. $extension;
  }

  /**
   * Nettoie la chaîne de caractère de tous les caractères spéciaux
   *
   * @param  string  $string  Chaîne de caractère
   * @return string           Chaîne de caractère nettoyée
   */
  public static function clean($string)
  {
    $string = self::removeHtmlTags($string);
    setlocale(LC_CTYPE, 'fr_FR.UTF-8');
    $string = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $string);
    $string = str_replace(' ', '-', $string);
    $string = strtolower($string);
    $string = trim($string, '-');
    $string = preg_replace('/[^\w-]/', '', $string);
    $string = preg_replace('/-+/', '-', $string);
    return $string;
  }

  /**
   * Encode la chaîne au format URL
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne de caractères encodée
   */
  public static function urlEncode($string)
  {
    return urlencode($string);
  }

  /**
   * Décode une chaîne au format Url
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne de caractère décodée
   */
  public static function urlDecode($string)
  {
    return urldecode($string);
  }

  /**
   * Encode une chaîne ISO8859-1 au format utf8
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne de caractères encodée
   */
  public static function utf8Encode($string)
  {
    return utf8_encode($string);
  }

  /**
   * Encode une chaîne utf8 au format ISO8859-1
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne de caractères décodée
   */
  public static function utf8Decode($string)
  {
    return utf8_decode($string);
  }

  /**
   * Encode une chaîne en MIME base64
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne de caractères encodée
   */
  public static function base64Encode($string)
  {
    return base64_encode($string);
  }

  /**
   * Décode une chaîne en MIME base64
   *
   * @param  string  $string  Chaîne de caractères
   * @return string           Chaîne de caractères décodée
   */
  public static function base64Decode($string)
  {
    return base64_decode($string);
  }

  /**
   * Génère un lien mailto protégé
   *
   * @param  string $email  Adresse mail
   * @param  string $name   (optional) Nom du contact lié à l'adresse mail
   * @param  string $text   (optional) Texte à utiliser pour le lien
   * @return string
   */
  public static function protectEmailLink($email, $name = null, $text = null)
  {
    $email = preg_replace("/\"/", "\\\"", $email);
    if ($name == null) {
      $name = $email;
    }
    if ($text == null) {
      $text = $name;
    }
    $clear = sprintf('document.write(\'<a href="mailto:%s">%s</a>\')', $email, $text);
    $encrypted = '';
    for ($i = 0; $i < strlen($clear); $i++) {
      $encrypted .= '%'. bin2hex(substr($clear, $i, 1));
    }
    return sprintf('<script type="text/javascript">eval(unescape(\'%s\'))</script>', $encrypted);
  }
}
