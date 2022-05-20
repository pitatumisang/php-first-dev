<?php

   class Connetion{
       public static function make($config){

        $dsn = 'mysql:host=localhost;dbname='.$config['database'];

        try{
            $pdo = new PDO($dsn,$config['user'], $config['password'],$config['options']);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
            
        }catch(PDOException $e){
            die($e->getMessage());
        }

       }
   }
