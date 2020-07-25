<?php 
 
    require_once 'includes/food_validaiton.inc.php';


    $foods = $_SESSION['foods'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie Calculator</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="welcome">
        <h4>Calorie Calculator</h4>
        <div class="info-container">
            <div class="user-info"><?php echo $person->getName()?></div>
            <br>
            <div class="user-info"><?php echo "Age: ". $person->getAge(); ?></div>
            <br>
            <div class="user-info"><?php echo "Weight: ". $person->getWeight(). " kg"; ?></div>
        </div>
    </div>
    <div class="home">
        <div class="add-food">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <?php if($alert_msg!=''): ?>
                    <div class="alert"><?php echo $alert_msg; ?></div>
                <?php endif; ?>
                <h2>Add Food</h2>
                <input type="text" name="name" placeholder="Name">
                <br>
                <input type="text" name="calories" placeholder="Calories">
                <br>
                <input type="text" name="protein" placeholder="Protein">
                <br>
                <input type="text" name="fat" placeholder="Fat">
                <br>
                <input type="text" name="carbs" placeholder="Carbs">
                <br>
                <input type="submit" name="submit" value="Add">
            </form>
        </div>
        <div class="intake-box">
            <h3>Daily Intake</h3>
                <div class="intake kcal">Calories: <?php echo $person->getCalories(); ?></div>
                <div class="intake protein">Protein: <?php echo $person->getProtein(); ?></div>
                <div class="intake fat">Fat: <?php echo $person->getFat(); ?></div>
                <div class="intake carbs">Carbs: <?php echo $person->getCarbs(); ?></div>
            
        </div>
    </div>
    <div class="foods-eaten">
        <h3>Foods Eaten:</h3>
        <br>
        <?php if(!empty($foods)): ?>
            <?php foreach($foods as $f): ?>
                <div class="food">
                    <h3><?php echo $f['name']. " ". $f['calories']." kcal"; ?></h3>
                    <div class="food-info-box">
                        <div class="food-info protein"><?php echo "P: ". $f['protein'] ?></div>
                        <div class="food-info fat"><?php echo "F: ". $f['fat'] ?></div>
                        <div class="food-info carbs"><?php echo "C: ".$f['carbs'] ?></div>              
                   </div>  
                </div>
                <br>
            <?php endforeach;?>
            <?php endif; ?>
    </div>
</body>
</html>