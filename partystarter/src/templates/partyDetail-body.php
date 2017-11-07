
<?php
$isGuest = false;
$isComment = false;
if($type == "guest"): ?>
    <h>Host Info</h>
    <div class="hostInfo">
        <?php
        extract($hostInfo);
        echo "<img src='/$profile_photo'>";
        echo "<br>";
        echo "<span>Host User name :$username</span>";
        echo "<br>";
        echo "<span>Host email:$email</span>";
        echo "<br>";
        echo "<span>Host self description:$self_description</span>";
        echo "<br>";
        ?>
    </div>
    <hr>
    <div class="guestsList">
        <h>Guest List</h>
        <?php
        foreach ($guestList as $guest){
            extract($guest);
            echo "<br>";
            echo "<img src='/$profile_photo'>";
            echo "<br>";
            echo "<span>Guest username: $username</span>";
            echo "<br>";
            echo "<span>Guest email: $email</span>";
            echo "<br>";
            echo "<span>Guest self description: $self_description</span>";
            echo "<br>";
            echo "<span>Guest comment: $comment</span>";
            echo "<br>";
            echo "<span>Guest rate: $rate</span>";
            echo "<br>";
            if($payment == true){
                echo "<span>Paid</span>";
            }else{
                echo "<span>Unpaid</span>";
            }
            if($user_id == $_SESSION['userId']){
                $isGuest = true;
                if($comment == null){
                    $isComment = false;
                } else{
                    $isComment = true;
                }
            }
        }
        ?>
    </div>
    <hr>
    <div class="hostDetails">
        <h>Party Info</h>
        <table>
            <?php
            extract($host);
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
            if($user_id == $_SESSION['userId']){
                echo("<button disabled onclick='($id)'>");
                echo("Owner");
                echo("</button>");
            }else{
                $guest = new Guest('guest');
                if($guest->check($_SESSION['userId'],$host['id'])){
                    echo("<button disabled onclick='join($id)'>");
                    echo("Joined");
                    echo("</button>");
                }
                    else{
                echo("<button onclick='join($id)'>");
                echo("Join");
                echo("</button>");}
            }
            echo("</td>");
            echo("</tr>");
            ?>
        </table>
    </div>
    <hr>
    <div class="commentsRate">
        <h1>Comments and rate</h1>
        <!-- rate and comments -->
        <?php if($isGuest && !$isComment): ?>
        <form action="/partyDetail.php" method="post">
            <input style="display: none" type="number" name="user_id" value="<?php echo $_SESSION['userId'];?>">
            <input style="display: none" type="number" name="host_id" value="<?php echo $host['id'];?>">
            <fieldset id="rate">
                <input type="radio" value="1" name="rate">
                <input type="radio" value="2" name="rate">
                <input type="radio" value="3" name="rate">
                <input type="radio" value="4" name="rate">
                <input type="radio" value="5" name="rate">
            </fieldset>
            <label for="comment">Comment</label>
            <input type="text" name="comment">
            <input type="submit" value="Confirm" name="submit">
        </form>
        <?php endif; ?>
    </div>
<?php else: ?>
    <?php
    echo("wrong Url");
    ?>
<?php endif; ?>

<!--Host info -->

<!--Other guests-->

<!--Host description-->

