

<?php 


    class Person extends PersonDB{

        private $name;
        private $age;
        private $weight;
        private $calories;
        private $protein;
        private $fat; 
        private $carbs;


        function __construct($name,$weight,$age){
            $this->name = $name;
            $this->age = $age;
            $this->weight = $weight;
            $this->calories = $this->calculateCalories($weight);
            $this->protein = $this->calculateProtein($weight);
            $this->fat = $this->calculateFat($this->calories,$this->protein);
            $this->carbs = $this->calculateCarbs($this->calories,$this->protein,$this->fat);

            $this->insertPerson($this->name, $this->age, $this->weight);
            $this->insertIntake($this->calories, $this->protein, $this->fat, $this->carbs);
        }

        public function getID(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }
        
        public function getAge(){
            return $this->age;
        }

        public function getWeight(){
            return $this->weight;
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
   
        public function calculateCalories($weight){
            return ceil((($weight*30)+($weight*35))/2);
        }

        public function calculateProtein($weight){
            return $weight*2;
        }

        public function calculateFat($calories,$protein){
            $proteinInCalories = $protein*4;
            return ceil((($calories-$proteinInCalories)*0.25)/9);
        }

        public function calculateCarbs($calories,$protein,$fat){
            $proteinInCalories = $protein*4;
            $fatInCalories = $fat*9;
            return ceil(($calories-$proteinInCalories-$fatInCalories)/4);
        }

        public function haveFood(Food $food){
            $this->calories -= $food->getCalories();
            $this->protein -= $food->getProtein();
            $this->fat -= $food->getFat();
            $this->carbs -= $food->getCarbs();

        }

       

    }



   
?>