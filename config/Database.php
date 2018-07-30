<?php

class Database 
{
	private static $dbName 	   = 'test';
	private static $dbHost 	   = 'mysql';
	private static $dbUsername = 'dev';
	private static $dbPassword = 'dev';

	private static $conn = null;

	public function __construct()
	{
	}

	public static function connect()
	{
		if (null == self::$conn)
		{
			try
			{
				self::$conn =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbPassword); 
			} 
			catch(PDOException $e)
			{
				die($e->getMessage());
			}
		}
		return self::$conn;
	}

	public static function disconnect()
	{
		self::$conn = null;
	}
}