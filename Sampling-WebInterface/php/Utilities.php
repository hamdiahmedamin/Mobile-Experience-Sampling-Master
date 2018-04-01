<?php
/**
 * Experience Sampling Web-interface 1.0.0
 * This backend allows researchers to conduct surveys remotely using the mobile phone on Android and iOS.
 * 
 * This app is developed by BOSONIC.design in assignment of the department 
 * of Human-Technology Interaction @ Eindhoven, University of Technology.
 * 
 * info@bosonic.design || http://www.bosonic.design/
 * hti@tue.nl || https://www.tue.nl/en/university/departments/industrial-engineering-innovation-sciences/research/research-groups/human-technology-interaction/
 * 
 * Released on: March, 2018
 */

class Utilities{
	
	/*
		This function return sanitized $_GET variable from the URL string,
		or false when the variable does not exist.
		- $name = variable name in the URL.
	*/
	public static function getAndSanitize($name)
	{
		if(!($var = filter_input(INPUT_GET, $name, FILTER_SANITIZE_STRING)))
			$var = false;
		
		return $var;
	}
	
	/*
		This function return sanitized $_POST variable,
		or false when the variable does not exist.
		- $name = variable name in the URL.
	*/
	public static function getPostAndSanitize($name)
	{
		if(!($var = filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING)))
			$var = false;
		
		return $var;
	}
	
	/*
		This function takes a string value and returns it to a form suitable
		for sql queries.
		- $string = string that has to be formatted
	*/
	public static function stringFormat($string)
	{
		return '\''.$string.'\'';
	}
	
	/*
		This builds sql queries for inserting multiple records.
		- $table = table to insert records into
		- $columns = array containing the names of the columns to be populated
		- $values = array containing arrays with input values for each column
	*/
	public static function multiInsertBuilder($table, $columns, $values)
	{
		$query = "";
		$col = implode(",",$columns);
		for($i = 0; $i < sizeof($values); $i++)
		{
			$val = implode(",",$values[$i]);
			$query .= "INSERT INTO " . $table . "(". $col .") VALUES (". $val .");";
		}
		
		return $query;
	}
}

?>