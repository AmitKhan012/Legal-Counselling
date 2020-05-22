<?php
		
	$db_create = new mysqli('localhost','root','') or die('unable to connect');	
	
	$db_create->query('CREATE DATABASE `legal_counselling`')  or die('DATABASE creation failed');

	$db_create->query('CREATE TABLE `legal_counselling`.`clients` (
	  `username` varchar(50)  NOT NULL,
  	`first_name` VARCHAR(50),
   	`last_name` VARCHAR(50),
   	`email` VARCHAR(50),
    `password` VARCHAR(50) NOT NULL,
    `contract_number` VARCHAR(12) ,
    `gender` VARCHAR(8),
	PRIMARY KEY (`username`) 
);') or die('clients table creation failed');	
	$db_create->query('CREATE TABLE `legal_counselling`.`lawers` (
	  `username` varchar(50)  NOT NULL,
  	`first_name` VARCHAR(50),
   	`last_name` VARCHAR(50),
   	`email` VARCHAR(50),
    `password` VARCHAR(50) NOT NULL,
    `contract_number` VARCHAR(12) ,
    `gender` VARCHAR(8),
	PRIMARY KEY (`username`) 
);') or die('lawers table creation failed');	
  
?>