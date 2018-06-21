<?php
/**
 * 
 */
class Validator
{

	public static function integer( $data )
	{
		return is_int( $data ) ? true : false;
	}

	public static function max( $data, $max )
	{
		return $data > $max ? true : false;
	}
}