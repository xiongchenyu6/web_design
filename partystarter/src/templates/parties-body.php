<h3 class="title">Our Upcoming Parties</h3>

<form action="/parties.php" method="get">
    <div>
        <label for="search">search</label>
        <input id="search" name="search"/><br><br></div>
        <input id="submit" type="submit" value="Search" name="submit"></div>
</form>

<table>
    <?php
    foreach ($parties as $party) {
        extract($party);
        echo("<tr>");
        echo("<td>");
        echo("<h3>Event Name : $event_name</h3><br>");
        echo("GET DESC : $description");
        echo("</td>");
        echo("");
        echo("<td>");
        echo("Theme: $theme<br>");
        echo("Date: $time<br>");
        echo("Region: $region<br>");
        echo("Price: $price<br>");
        echo("</td>");
        echo("<td>");
        if ($user_id == $_SESSION['userId']) {
            echo("<button disabled onclick='($id)'>");
            echo("Owner");
            echo("</button>");
        } else {
            require_once(MODULES_PATH . '/Guest.php');
            $guest = new Guest('guest');
            if ($guest->check($_SESSION['userId'], $id)) {
                echo("<button disabled onclick='join($id)'>");
                echo("Joined");
                echo("</button>");
            } else {
                if ($avalaible == true) {
                    echo("<button onclick='join($id)'>");
                    echo("Join");
                    echo("</button>");
                } else {

                    echo("<button disabled'>");
                    echo("Closed");
                    echo("</button>");
                }
            }
            echo("<button onclick='window.location.href= \"partyDetail.php/?id=$id\" '>");
            echo("Detail");
            echo("</button>");
            echo("</td>");
            echo("</tr>");
        }
    }
    ?>
</table>

