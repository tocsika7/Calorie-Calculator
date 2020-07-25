<?php 

include 'includes/autoloader.inc.php';
    // Var for the alert message 
    $msg = '';

    if(filter_has_var(INPUT_POST,'submit')){
        $name = htmlentities($_POST['name']);
        $age = htmlentities($_POST['age']);
        $weight = htmlentities($_POST['weight']);

        if(!empty($name) && !empty($age) && !empty($weight)){
            //Empty form passed
            // Name validation 
            if (preg_match("/[^A-Za-z'-]/", $name)){
                // Age validation 
                if(filter_var($age,FILTER_VALIDATE_INT, 
                    array("options" => array("min_range"=>0, "max_range"=>100)))){
                    //Weight validation 
                    if(filter_var($weight,FILTER_VALIDATE_INT, 
                        array("options" => array("min_range"=>0, "max_range"=>500)))){
                        $msg = 'Succesfull submission';
    
                        session_start();
                        $_SESSION['name']=$name;
                        $_SESSION['age']=$age;
                        $_SESSION['weight']=$weight;
                        $person = new Person($name,$weight,$age);
                        $_SESSION['person']=$person;
                
                        header('Location: index.php');
                    }
                    //Weight validation fail
                    else{
                        $msg =  "Please enter a valid weight between 0-500";
                    }
                }
                //Age validation fail
                else{
                    $msg =  "Please enter a valid age between 0-100";
                }
            } else{
                // Name validation fail 
                $msg = 'Please enter a valid name!';
            }
        } else{
            // Empty form fail
            $msg = 'Please fill in all fields!';
        }

     
    }

    