<?php 

    include 'includes/autoloader.inc.php';

session_start();

$person = $_SESSION['person'];

$alert_msg = '';

if(filter_has_var(INPUT_POST,'submit')){

    $name = htmlentities($_POST['name']);
    $calories = htmlentities($_POST['calories']);
    $fat = htmlentities($_POST['fat']);
    $carbs = htmlentities($_POST['carbs']);
    $protein = htmlentities($_POST['protein']);
;

    //Empty values
    if(!empty($name) && !empty($calories) &&
        !empty($fat) && !empty($carbs) && !empty($protein)){
        

                //Other 
                if(filter_var($calories,FILTER_VALIDATE_FLOAT) &&
                    filter_var($protein,FILTER_VALIDATE_FLOAT) &&
                    filter_var($fat,FILTER_VALIDATE_FLOAT) &&
                    filter_var($carbs,FILTER_VALIDATE_FLOAT)){  

                        $food = new Food($name,$calories,$fat,$carbs,$protein);
                        $person->haveFood($food);
                        $food->foodAdded();
                        $foods= $food->listFoods();
                        $_SESSION['foods'] = $foods;
                        header( "Location: {$_SERVER['REQUEST_URI']}", true, 303 );
                    }
                    else{
                        $alert_msg = 'Please give valid values!';
                    }

        } else{
            $alert_msg = 'Please fill in all fields!';
        }
}