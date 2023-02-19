<!DOCTYPE html>
<html>
    <head>
        <title>Code Homework #3</title>
    </head>
    <style>
        th {
            background-color: gray;
            color: white;
            padding: 4px 16px 4px 16px;
            border-radius: 4px;

           }
        td {
            border: 1px solid gray;
            border-radius: 4px;
        }

        td {
            padding: 2px 10px 2px 10px;
            }
    </style>

    <body>
        <?php
        $books = array (
            array("PHP and MySQL Web Development", "Luke", "Welling", 144,  "Paperback", 31.63),
            array("Web Design with HTML, CSS, JavaScript and jQuery", "Jon", "Duckett", 135, "Paperback", 41.23),
            array("PHP Cookbook: Solutions & Examples for PHP Programmers", "David", "Sklar", 14, "Paperback", 40.88),
            array("JavaScript and JQuery: Interactive Front-End Web Development", "Jon", "Duckett", 251, "Paperback", 22.09),
            array("Modern PHP: New Features and Good Practices", "Josh", "Lockhart", 7, "Paperback", 28.49),
            array("Programming PHP", "Kevin", "Tatroe", 26, "Paperback", 28.96)
        );
        echo "<table><tr><th>Title</th><th>First Name</th><th>Last Name</th><th>Number of Pages</th><th>Type</th><th>Price</th></tr>";
        $totalprice=0;
        for($row = 0; $row <count($books); $row++) {
            $totalprice += $books[$row][5];
            echo "<tr>";
            for ($col = 0; $col<6; $col++) {
                echo "<td>".$books[$row][$col]."</td>";
            }
            echo "</tr>";
        }
        echo "</table><br>";
        echo "<h3>Your total price is: $totalprice</h3><br>";

        function twoheads($num) 
            {
                if($num<=0 || $num>10)
                {
                    echo "Invalid entry. Please enter a whole number between 1 and 10.";
                }
                else
                {
                $tosses = 0;
                $headsInARow = 0;

                echo "Beginning the coin flipping...<br>";
                
                while ($headsInARow < $num) 
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
                echo "It took $tosses tosses to flip $num heads in a row.";
                }
            }

            twoheads(4);

        ?>

    </body>
</html>