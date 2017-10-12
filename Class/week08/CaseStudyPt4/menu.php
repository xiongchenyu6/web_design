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
                <li><a href="index.html">Home</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="music.html">Music</a></li>
                <li><a href="jobs.html">Jobs</a></li>
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
    echo "<tr>";
    echo"<tr>";
    echo"<td><strong>$foodName</strong></td>";
    echo"<td> Regular house blend , decafllienate coffee, or flavor of the day.<br>";
    echo"Endless Cup $foodPrice";
    echo"         <input onchange=\"calculate()\" id=\"a\" name=\"\" type=\"checkbox\" value=2\/>";
    echo"         <input  onkeyup=\"calculate()\"  id=\"f\" name=\"\" type=\"text\" value=\"\"\/>";
    echo"     </td>";
    echo" </tr>";
}
?>
                    </tbody>
                </table>
<input type='button' value="Sublit"></input>
        </main>
        <footer>Copyright &copy; 2014 JavaJam Coffee House<br>
            <a href="mailto:cxiong001@e.ntu.edu.sg">cxiong001@e.ntu.edu.sg</a></footer>
    </body>
    <script src="js/menu.js">
    </script>
</html>
