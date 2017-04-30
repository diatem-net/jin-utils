<?php

/**
 * Jin Framework
 * Diatem
 */

namespace Jin2\Utils;

use Jin2\Utils\StringTools;

/**
 * Boite à outil pour les numériques
 */
class NumberTools
{

  /**
   * Permet de formater un nombre selon des critères précis
   *
   * @param  integer  $number          Nombre à formater
   * @param  integer  $decimals        Nombre de décimales à conserver
   * @param  string   $thousandMarker  (optional) Séparateur utiliser pour séparer les milliers (espace par défaut)
   * @param  string   $decimalMarker   (optional) Séparateur à utiliser pour les virgules (. par défaut)
   * @return string                    Nombre formaté
   */
  public static function numberFormat($number, $decimals, $thousandMarker = ' ', $decimalMarker = '.')
  {
    return number_format($number, $decimals, $decimalMarker, $thousandMarker);
  }

  /**
   * Arrondi un nombre selon les règles monétaires européennes
   *
   * @param  integer  $number  Nombre à arrondir
   * @return integer           Nombre arrondi
   */
  public static function euroRound($number)
  {
    return round((float) $number, 2, PHP_ROUND_HALF_EVEN);
  }

  /**
   * Arrondi à l'entier inférieur
   *
   * @param  integer  $number  Nombre à arrondir
   * @return integer           Nombre arrondi
   */
  public static function floor($number)
  {
    return floor($number);
  }

  /**
   * Arrondi selon les règles standard
   *
   * @param  integer  $number    Nombre à arrondir
   * @param  integer  $decimals  (optional) Nombre de décimales à conserver (2 par défaut)
   * @return integer             Nombre arrondi
   */
  public static function round($number, $decimals = 0)
  {
    return round((float) $number, $decimals);
  }

  /**
   * Arrondi à l'entier supérieur
   *
   * @param  integer  $number  Nombre à arrondir
   * @return integer           Nombre arrondi
   */
  public static function ceil($number)
  {
    return ceil($number);
  }

  /**
   * Permet de savoir si un nombre est un entier
   *
   * @param  integer  $number  Nombre à tester
   * @return boolean           TRUE si le nombre est un entier
   */
  public static function isInt($number)
  {
    return is_int($number);
  }

  /**
   * Permet de savoir si un nombre est un nombre à virgule flotante
   *
   * @param  integer  $number  Nombre à tester
   * @return boolean           TRUE si le nombre est un nombre à virgule flotante
   */
  public static function isFloat($number)
  {
    return is_float($number);
  }

  /**
   * Permet de savoir si une chaine est un nombre
   *
   * @param  string  $string  Chaîne à tester
   * @return boolean          TRUE si la chaîne est un nombre
   */
  public static function isNumber($string)
  {
    return !is_nan($string);
  }

  /**
   * Fonction exponentielle
   *
   * @param  integer  $number  Nombre sur lequel appliquer l'exponentielle
   * @return integer           Résultat de la fonction exponentielle
   */
  public static function exp($number)
  {
    return exp((float) $number);
  }

  /**
   * Fonction exponentielle-1
   *
   * @param  integer  $number  Nombre sur lequel appliquer l'exponentielle61
   * @return integer           Résultat de la fonction exponentielle-1
   */
  public static function expM1($number)
  {
    return expm1((float) $number);
  }

  /**
   * Mettre un nombre à une puissance donnée
   *
   * @param  integer  $number    Nombre
   * @param  integer  $exponent  (optional) Exposant (2 par défaut)
   * @return integer             Résultat
   */
  public static function power($number, $exponent = 2)
  {
    return pow((float) $number, $exponent);
  }

  /**
   * Effectue la racine nième d'un nombre
   *
   * @param  integer  $number    Nombre
   * @param  integer  $exponent  (optional) Exposant (2 par défaut)
   * @return integer             Résultat
   */
  public static function square($number, $exponent = 2)
  {
    return pow((float) $number, (1 / $exponent));
  }

  /**
   * Transforme une chaîne en nombre (si transformable)
   *
   * @param  string   $string  Chaîne de caractères représentant un nombre
   * @return integer           Nombre résultant de la conversion
   */
  public static function toNumber($string)
  {
    return (float) StringTools::replaceFirst($string, ',', '.');
  }

}
