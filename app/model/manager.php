<?php

class Manager{

    protected function connection(){
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=portfolio;charset=utf8', 'root', '');
        }

        catch(Exception $e){
            throw new Exception('Error : '.$e->getMessage());
        }

        return $bdd;
    }
}