<?php 

class FoodDB extends Dbh{


    protected function insertFood($person_id, $name, $calories, $carbs,$protein,$fat){
        $sql = "INSERT INTO food (person_id, name, calories ,carbs, protein, fat) VALUES ($person_id, '$name', $calories, $carbs, $protein, $fat);";
        $this->connect()->query($sql);
    }

    protected function getPersonID(){
        $sql = "SELECT id FROM person ORDER BY id DESC LIMIT 1;";
        $query = $this->connect()->query($sql);
        
        $id =  mysqli_fetch_all($query, MYSQLI_ASSOC);
        
        foreach($id as $i){
            return intval($i['id']);
        }
    }
    
    protected function getFoods(){
        $id = $this->getPersonID();
        $sql = "SELECT * FROM food WHERE person_id = $id";
        $query = $this->connect()->query($sql);

        return $query;
    }
      
   
}