<?php

/**
 * Jin Framework
 * Diatem
 */

namespace Jin2\Utils;

use Jin2\Utils\StringTools;
use Jin2\Utils\ArrayTools;

/**
 * Gestion de liste de valeurs (inspiré des méthodes de list de coldfusion)
 */
class ListTools
{

  /**
   * Modifie les séparateurs d'une liste
   *
   * @param  string $list          Liste à modifier
   * @param  string $oldDelimiter  Ancien séparateur
   * @param  string $newDelimiter  Nouveau séparateur
   * @return string
   */
  public static function changeDelims($list, $oldDelimiter, $newDelimiter)
  {
    return StringTools::replaceAll($list, $oldDelimiter, $newDelimiter);
  }

  /**
   * Ajoute un élément à la fin d'une liste
   *
   * @param  string $list       Liste à modifier
   * @param  string $value      Valeur à ajouter
   * @param  string $delimiter  Séparateur
   * @return string
   */
  public static function append($list, $value, $delimiter = ',')
  {
    if ($list == '') {
        $list = $value;
    } else {
        $list .= $delimiter.$value;
    }
    return $list;
  }

  /**
   * Recherche la position d'une valeur dans la liste
   *
   * @param  string $list       Liste source
   * @param  string $value      Valeur à rechercher
   * @param  string $delimiter  Séparateur
   * @return int|boolean        Position dans la liste
   */
  public static function find($list, $value, $delimiter = ',')
  {
    return ArrayTools::find(static::toArray($list, $delimiter), $value);
  }

  /**
   * Recherche la position d'une valeur dans la liste (en ne prenant pas en compte la casse)
   *
   * @param  string $list       Liste source
   * @param  string $value      Valeur à rechercher
   * @param  string $delimiter  Séparateur
   * @return int|boolean        Position dans la liste
   */
  public static function findNoCase($list, $value, $delimiter = ',')
  {
    return ArrayTools::findNoCase(static::toArray($list, $delimiter), $value);
  }

  /**
   * Définit si une liste contient une valeur donnée
   *
   * @param  string $list       Liste source
   * @param  string $value      Valeur à rechercher
   * @param  string $delimiter  Séparateur
   * @return boolean
   */
  public static function contains($list, $value, $delimiter = ',')
  {
    return is_numeric(ArrayTools::find(static::toArray($list, $delimiter), $value));
  }

  /**
   * Définit si une liste contient une valeur donnée (en ne tenant pas compte de la casse)
   *
   * @param  string $list       Liste source
   * @param  string $value      Valeur à rechercher
   * @param  string $delimiter  Séparateur
   * @return boolean
   */
  public static function containsNoCase($list, $value, $delimiter = ',')
  {
    return is_numeric(ArrayTools::findNoCase(static::toArray($list, $delimiter), $value));
  }

  /**
   * Supprime une valeur de la liste à une position donnée
   *
   * @param  string $list       Liste source
   * @param  int    $index      Index
   * @param  string $delimiter  Séparateur
   * @return string
   */
  public static function deleteAt($list, $index, $delimiter = ',')
  {
    return ArrayTools::deleteAt(static::toArray($list, $delimiter), $index);
  }

  /**
   * Retourne le premier élément de la liste
   *
   * @param  string $list       Liste source
   * @param  string $delimiter  Séparateur
   * @return string
   */
  public static function first($list, $delimiter = ',')
  {
    $array = static::toArray($list, $delimiter);
    return $array[0];
  }

   /**
   * Retourne le dernier élément de la liste
   *
   * @param  string $list       Liste source
   * @param  string $delimiter  Séparateur
   * @return string
   */
  public static function last($list, $delimiter = ',')
  {
    $array = static::toArray($list, $delimiter);
    if (isset($array[count($array) - 1])) {
      return $array[count($array) - 1];
    }
    return null;
  }

  /**
   * Retourne un élément de la liste, à la position donnée
   *
   * @param  string $list       Liste source
   * @param  int $index         Position
   * @param  string $delimiter  Séparateur
   * @return string
   */
  public static function ListGetAt($list, $index, $delimiter = ',')
  {
    $array = static::toArray($list, $delimiter);
    return $array[$index];
  }

  /**
   * Insère un élément dans la liste, à une position donnée
   *
   * @param  string $list       Liste source
   * @param  int    $index      Position
   * @param  string $value      Valeur
   * @param  string $delimiter  Séparateur
   * @return string
   */
  public static function ListInsertAt($list, $index, $value, $delimiter = ',')
  {
    $array = static::toArray($list, $delimiter);
    $array = ArrayTools::insertAt($array, $index, $value);
    return ArrayTools::toList($array, $delimiter);
  }

  /**
   * Retourne le nombre d'éléments d'une liste
   *
   * @param  string $list       Liste source
   * @param  string $delimiter  Séparateur
   * @return int
   */
  public static function len($list, $delimiter = ',')
  {
    $array = static::toArray($list, $delimiter);
    return count($array);
  }

  /**
   * Ajoute un élément en tête de liste
   * @param  string $list       Liste source
   * @param  string $value      Valeur à ajouter
   * @param  string $delimiter  Séparateur
   * @return string
   */
  public static function prepend($list, $value, $delimiter = ',')
  {
    $list = $value . $delimiter . $list;
     return $list;
  }

  /**
   * Redéfinit la valeur d'un des éléments d'une liste
   *
   * @param  string $list       Liste source
   * @param  int    $index      Position
   * @param  string $value      Valeur
   * @param  string $delimiter  Séparateur
   * @return string
   */
  public static function setAt($list, $index, $value, $delimiter = ',')
  {
    $array = static::toArray($list, $delimiter);
    $array[$index] = $value;
    return ArrayTools::toList($array, $delimiter);
  }

  /**
   * Convertit une liste en tableau
   *
   * @param  string $list       Liste source
   * @param  string $delimiter  Séparateur
   * @return string
   */
  public static function toArray($list, $delimiter = ',')
  {
    if ($list == '') {
      return array();
    } else {
      return StringTools::explode($list, $delimiter);
    }
  }

}