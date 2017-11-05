
<?php
$isGuest = false;
$isComment = false;
if($type == "guest"): ?>
    <div class="hostInfo">
        <?php
        extract($hostInfo);
        echo "<img src='/$profile_photo'>";
        echo "<span>$username</span>";
        echo "<span>$email</span>";
        echo "<span>$self_description</span>";
        ?>
    </div>
    <hr>
    <div class="guestsList">
        <?php
        foreach ($guestList as $guest){
            extract($guest);
            echo "<img src='/$profile_photo'>";
            echo "<span>$username</span>";
            echo "<span>$email</span>";
            echo "<span>$self_description</span>";
            echo "<span>$comment</span>";
            echo "<span>$rate</span>";
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

