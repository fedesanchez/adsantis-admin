<?php
/** @package Santis::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/Phreezable.php");
require_once("LineaMap.php");

/**
 * LineaDAO provides object-oriented access to the linea table.  This
 * class is automatically generated by ClassBuilder.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * Add any custom business logic to the Model class which is extended from this DAO class.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Santis::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class LineaDAO extends Phreezable
{
	/** @var int */
	public $IdLinea;

	/** @var int */
	public $IdCategoria;

	/** @var string */
	public $Img;

	/** @var string */
	public $Resumen;
	
	/** @var string */
	public $Descripcion;

	/** @var string */
	public $Atributos;

	/** @var string */
	public $Nombre;

	public $Novedad;

	public $ColorFondo;


}
?>