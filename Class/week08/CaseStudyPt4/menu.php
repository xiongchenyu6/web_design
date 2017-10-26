<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 11/10/17
 * Time: 2:53 PM
 */
require_once(realpath(dirname(__FILE__) . "/php/config.php"));
require_once(MODULES_PATH . "/Food.php");
$food = new Food('food');
$foodList = $food->all();
$postData = file_get_contents('php://input');
if($postData != NULL){
    $json = json_decode($postData, true);
    require_once(MODULES_PATH . "/Meal.php");
    require_once(MODULES_PATH . "/Order.php");
    $meal = new Meal('meal');
    $order = new Order('order');
    $newMeal = $meal->createMeal();
    $order->createOrder($newMeal['id'],$json);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Xiong Chenyu Coffee House</title>
        <meta charset="utf-8">
        <link href="css/style.css" rel="stylesheet"/>
    </head>

    <body>
        <nav>
            <a href="index.html"></a>
            <!-- http://www.rickjmorris.com/school/2008/fall/N490/ch_4/javajam/javalogo.gif -->
        </nav>
        <aside>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="music.html">Music</a></li>
                <li><a href="jobs.html">Jobs</a></li>
                           <li><a href="priceUpdate.php">UpdatePrice</a></li>
                                      <li><a href="history.php">History</a></li>
            </ul>
        </aside>
        <main>
                <h2>Coffee at JavaJam</h2>
                <table>
                    <tbody>
                        <?php
                        foreach($foodList as $food) {
                            $foodPrice = number_format(($food['price'] /100), 2, '.',' ');
                            $foodName = $food['name'];
                            $foodId = $food['id'];
                            echo"<tr>";
                            echo"<td><strong>$foodName</strong></td>";
                            echo"<td> Regular house blend , decafllienate coffee, or flavor of the day.<br>";
                            echo"Endless Cup \$S $foodPrice";

                            echo"<input onchange=\"addFood(event,$foodId,$foodPrice)\" name=\"\" type=\"checkbox\" value=\"$foodPrice\"\/>";
                            echo"<input onkeyup=\"changeAmount(event,$foodId)\" name=\"\" type=\"text\" value=\"0\"\/>";
                            echo"</td>";
                            echo"<td>Subtotal : <span id=\"sub$foodId\">0.00</span><br>";
                            echo"</td>";
                            echo"</tr>";
                        }
                        ?>
                    </tbody>
                </table>
<input type='button' onclick="buy()" value="Sublit"></input>
                          <span id="total">0.00</span>
        </main>
        <footer>Copyright &copy; 2014 JavaJam Coffee House<br>
            <a href="mailto:cxiong001@e.ntu.edu.sg">cxiong001@e.ntu.edu.sg</a></footer>
    </body>
    <script src="js/menu.js">
    </script>
</html>