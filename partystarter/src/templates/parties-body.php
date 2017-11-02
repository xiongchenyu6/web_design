<h3 class="title">Our Upcoming Parties</h3>

<table>
    <?php
   foreach($parties as $party){
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
       if($user_id == $_SESSION['userId']){
           echo("<button disabled onclick='($id)'>");
           echo("Join");
           echo("</button>");
       }else{
           echo("<button onclick='join($id)'>");
           echo("Join");
           echo("</button>");
       }
       echo("</td>");
       echo("</tr>");
   }
    ?>
</table>

