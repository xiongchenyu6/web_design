<?php
$acc = $GLOBALS['acc'];
$host = new Host('host');
$guest = new Guest('guest');
$myHostList = $host->findHostListByUserId($_SESSION['userId']);
$myJoinList = $guest->findJoinListByUserId($_SESSION['userId']);
?>
<div class="leftNav">
    <div><button id="profileB">My Profile</button></div>
    <div><button id="hostB">My Host</button></div>
    <div><button id="joinB">My Join</button></div>
</div>
<div class="main">
    <div class="profile">
        <table action="register.php" method="post" enctype="multipart/form-data">
            <tr>
                <td >Name*:</td>
                <td>
                    <?php echo($acc['username']); ?>
                </td>
            </tr>
            <tr>
                <td >Email*:</td>
                <td>
                    <?php echo($acc['email']); ?>
                </td>
            </tr>
            <tr>
                <td>Self Description*: </td>
                <td>
                    <?php echo($acc['self_description']); ?>
                </td>
                </td>
            </tr>
        </table>
    </div>
</div>
<div style="display: none" class="host">
    <table>
        <?php
        foreach($myHostList as $party){
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
            if($avalaible == true) {
                echo("<button onclick='request(\"close\",$id)'>");
                echo("Close");
                echo("</button>");
            }else{
                echo("<button disabled>");
                echo("Closed");
                echo("</button>");
            }
            echo("</td>");
            echo("</tr>");
        }
        ?>
    </table>
    <a href="createnew.php"><button>Create New</button></a>
</div>
<div style="display: none" class="join">
    <?php
    foreach($myJoinList as $party){
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
        if($payment == false){
            echo("<button onclick='request(\"pay\",$id,$user_id)'>");
            echo("Pay");
            echo("</button>");
            echo("<button onclick='request(\"cancel\",$id,$user_id)'>");
            echo("cancel");
            echo("</button>");
        }else{
            echo("<button disabled>");
            echo("Paid");
            echo("</button>");
        }
        echo("<button onclick='window.location.href= \"partyDetail.php/?id=$id\" '>");
        echo("Detail");
        echo("</button>");
        echo("</td>");
        echo("</tr>");
    }
    ?>
</div>
