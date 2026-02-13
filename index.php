<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="">First Number</label>
        <input name= "firstNumber"  type="number">
        <label for="secondNumber">Second Number</label>
        <input name= "secondNumber" type="number">
        <select name="operator" id="">
            <option value="+">Additon</option>
             <option value="-">Subtraction</option>
              <option value="*">Multiplication</option>
               <option value="/">Division</option>
        </select>
        <br>

        <button type="submit">Submit</button>



    </form>
    <?php  
    if ($_SERVER["REQUEST_METHOD"]== 'POST'){

        //sanitize input
        $firstNumber= filter_input(INPUT_POST,'firstNumber', FILTER_SANITIZE_NUMBER_FLOAT);
         $secondNumber= filter_input(INPUT_POST,'secondNumber', FILTER_SANITIZE_NUMBER_FLOAT);
          $operator= htmlspecialchars($_POST['operator']); 
          $errors=false;

          //check if empty input exists

          if ( empty($firstNumber)||empty($secondNumber)||empty($operator)){
         echo "<p class='error'>Please fill all fields 🐥</p>";

            $errors= true;
          }

          //check if empty input is not numeric


          if ( !is_numeric($firstNumber)||!is_numeric($secondNumber)){
            echo "<p class='error'>Only numbers please 🐥</p>";
            $errors= true;
          }


          //check operator



          if (!$errors){
            $value= 0;
          
            switch($operator){
                
                case "+":
                    $value= $firstNumber + $secondNumber;
                    break;
                case "-":
                    $value= $firstNumber - $secondNumber;
                    break;
                case "*":
                    $value= $firstNumber * $secondNumber;
                    break;
                case "/":
                    $value= $firstNumber / $secondNumber;
                    break;
                default:
                echo "<p> something went wrong </p>";
                    
                    break;                


            }
            //outut calculation
           echo "<p class='result'>Result = " . $value . " 🦆✨</p>";




          }

    }
    ?>
</body>
</html>