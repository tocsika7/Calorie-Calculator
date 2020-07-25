<?php 


class Food extends FoodDB{

    private $name; 
    private $weight;
    private $calories; 
    private $protein;
    private $fat; 
    private $carbs;

    function __construct($name,$calories,$fat,$carbs,$protein){
        $this->name = $name;
        $this->calories = $calories;
        $this->carbs = $carbs;
        $this->fat = $fat;
        $this->protein = $protein;
    }

    public function getName(){
        return $this->name;
    }


    public function getCalories(){
        return $this->calories;
    }

    public function getProtein(){
        return $this->protein;
    }

    public function getFat(){
        return $this->fat;
    }

    public function getCarbs(){
        return $this->carbs;
    }

    public function foodAdded(){
        $this->insertFood($this->getPersonID(),$this->name,$this->calories,$this->carbs,$this->protein,$this->fat);
    }

    public function listFoods(){
        $foods = mysqli_fetch_all($this->getFoods(),MYSQLI_ASSOC);

        return $foods;
    }


}


