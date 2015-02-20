<?php
/** @package    Puntos::Model::DAO */

/** import supporting libraries */
require_once("verysimple/Phreeze/IDaoMap.php");
require_once("verysimple/Phreeze/IDaoMap2.php");

/**
 * PuntoVentaMap is a static class with functions used to get FieldMap and KeyMap information that
 * is used by Phreeze to map the PuntoVentaDAO to the punto_venta datastore.
 *
 * WARNING: THIS IS AN AUTO-GENERATED FILE
 *
 * This file should generally not be edited by hand except in special circumstances.
 * You can override the default fetching strategies for KeyMaps in _config.php.
 * Leaving this file alone will allow easy re-generation of all DAOs in the event of schema changes
 *
 * @package Puntos::Model::DAO
 * @author ClassBuilder
 * @version 1.0
 */
class PuntoVentaMap implements IDaoMap, IDaoMap2
{

	private static $KM;
	private static $FM;
	
	/**
	 * {@inheritdoc}
	 */
	public static function AddMap($property,FieldMap $map)
	{
		self::GetFieldMaps();
		self::$FM[$property] = $map;
	}
	
	/**
	 * {@inheritdoc}
	 */
	public static function SetFetchingStrategy($property,$loadType)
	{
		self::GetKeyMaps();
		self::$KM[$property]->LoadType = $loadType;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetFieldMaps()
	{
		if (self::$FM == null)
		{
			self::$FM = Array();
			self::$FM["IdPunto"] = new FieldMap("IdPunto","punto_venta","id_punto",true,FM_TYPE_INT,11,null,true);
			self::$FM["Nombre"] = new FieldMap("Nombre","punto_venta","nombre",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Direccion"] = new FieldMap("Direccion","punto_venta","direccion",false,FM_TYPE_VARCHAR,255,null,false);
			self::$FM["Telefono"] = new FieldMap("Telefono","punto_venta","telefono",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Email"] = new FieldMap("Email","punto_venta","email",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Latitud"] = new FieldMap("Latitud","punto_venta","latitud",false,FM_TYPE_VARCHAR,45,null,false);
			self::$FM["Longitud"] = new FieldMap("Longitud","punto_venta","longitud",false,FM_TYPE_VARCHAR,45,null,false);
		}
		return self::$FM;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function GetKeyMaps()
	{
		if (self::$KM == null)
		{
			self::$KM = Array();
		}
		return self::$KM;
	}

}

?>