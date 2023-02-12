<!DOCTYPE html>
<html>
    <head>
        <title>Code HW2</title>
    </head>
    <body>
        <?php

        function isbn($code)
        {
            $code = preg_replace('/[^0-9X]/', '', $code); //remove any characters that aren't integers or the letter X
            $length = strlen($code);
            if ($length == 10) //check if string is still 10 digits long
            {
            $sum=0;
            for($i=0; $i<=($length-2); $i++)
            {   
                 $sum += (int)$code[$i]*(10-$i);
                
            }
            if ($code[$length-1] =="X")
            {
                $sum += 10;
            }
            else
            {
                $sum += (int)$code[$length-1];
            }
            $check = $sum%11;
            
            if ($check == 0)
            {
                return true;
            }
            else
            {
                return false;
            }
            }
            else
            {
                return false;
            }
        }

        echo "<h1>Challenge: ISBN Validation</h1>";

        $isbn = "156881111X";

        echo "Checking $isbn for validity...<br>";
        $result = isbn($isbn);
        
        if ($result==TRUE)
        {
            echo "This is a valid ISBN!";
        }
        else
        {
            echo "This is NOT a valid ISBN!";
        }

        function toss_coin($flips)
            {
                if ($flips == 1)
                {
                    echo "Flipping a coin 1 time...<br>"; //conditional grammar for a single toss situation
                }
                else
                {
                    echo "Flipping a coin $flips times...<br>";
                }
                for ($i=1; $i<=$flips; $i++)
                {
                    $flip = mt_rand(0,1);
                    if ($flip==0)
                        {
                            echo '<img src= "heads.jpg">';
                        }
                    else if ($flip==1)
                        {
                            echo '<img src= "tails.jpg">';
                        }
                }
                echo "<br>";
            }

            function twoheads() 
            {
                $tosses = 0;
                $headsInARow = 0;

                echo "Beginning the coin flipping...<br>";
                
                while ($headsInARow < 2) 
                {
                    $toss = mt_rand(0, 1);
                    $tosses++;
                    if ($toss == 0) 
                    {
                        $headsInARow = 0;
                        echo '<img src= "tails.jpg">';
                    } 
                    else 
                    {
                        $headsInARow++;
                        echo '<img src= "heads.jpg">';
                    }
                }
                echo "<br>";
                echo "It took $tosses tosses to flip two heads in a row.";
            }
            echo "<h1>Coin Toss!</h1>";
            
            toss_coin(1);
            toss_coin(3);
            toss_coin(5);
            toss_coin(7);
            toss_coin(9);

            twoheads();
        ?>
    </body>
</html>