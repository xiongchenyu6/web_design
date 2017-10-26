<?php if(isset($_POST['type'])):
require_once(realpath(dirname(__FILE__) . "/php/config.php"));
require_once(MODULES_PATH . "/Food.php");
$food = new Food('food');
if($_POST['type'] == "price"){
    echo(json_encode($food->sumByProduct()));
}else if($_POST['type'] == "quantity"){
    echo(json_encode($food->quantityByProduct()));
}else if($_POST['type'] == "sort" ){
    echo(json_encode($food->sumByProductSort()));
}else{
    echo(json_encode($food->sumByProductByDate()));
}
?>

<?php else: ?>
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
            <h2>Click to generate daily sales report</h2>
                <div id="showData"></div>
                <table>
                    <tbody>
                        <tr><td><button onclick="show('price')">Click</button></td><td>Total dollar sales by product</td></tr>
                              <tr><td><button onclick="show('quantity')">Click</button></td><td>Sales quantities by product categories</td></tr>
                                                                                                                                                                                                    <tr><td><button onclick="show('sort')">Click</button></td><td>Product category with achieved the highest dollar sales</td></tr>

                                                                                                                                                                                                                                                                                                                        <tr><td><button onclick="show('date')">Click</button></td><td>Product category with achieved the highest dollar sales</td></tr>


                    </tbody>
                </table>
        </main>
        <footer>Copyright &copy; 2014 JavaJam Coffee House<br>
            <a href="mailto:cxiong001@e.ntu.edu.sg">cxiong001@e.ntu.edu.sg</a></footer>
    </body>
    <script src="js/history.js">
    </script>
</html>
<?php endif; ?>
