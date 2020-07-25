<?php

class PersonDB extends Dbh{


    protected function insertPerson($name, $age, $weight){

        $name = mysqli_real_escape_string($this->connect(), $name);

        
        $sql = "INSERT INTO person (name, age ,weight) VALUES ('$name', $age, $weight)";
        $this->connect()->query($sql);

    }

    protected function insertIntake($calories, $protein, $fat, $carbs){
        $sql = "INSERT INTO intake (calories, protein, fat, carbs)
         VALUES ($calories, $protein, $fat, $carbs)";
        $this->connect()->query($sql);
    }


}