<?php

    include 'includes/person_valid.inc.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorie Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <div class="container">
            <div class="user signinBx">    
                <div class="imgBx"><img src="img/bg.jpg"></div>   
                <div class="formBx">
                    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                        <?php if($msg != ''): ?>
                            <div class="alert"><?php echo $msg; ?></div>
                        <?php endif; ?>    
                        <h2>Calorie Calculator</h2>
                        <input type="text" name="name" placeholder="Name">
                        <input type="text" name="age" placeholder="Age">
                        <input type="text" name="weight" placeholder="Weight">
                        <input type="submit" name="submit" value="Calculate">
                    </form>
                </div>
            </div> 
        </div>
    </section>
</body>
</html>