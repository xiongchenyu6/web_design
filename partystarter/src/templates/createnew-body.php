<br><br>
<div class="createnew" align="center">
    <img src="/../../public/img/ps_img.jpeg" width="10%" height="10%" align="center"></img><br><br><br>
    <h1> Create New Party </h1><br>


    <form action="createnew.php" method="post">  <!-- NEED HELP TO WRITE THIS PHP -->
        <div>

            <label for="partyname">Party Name: </label>
            <input id="partyname" name="event_name" required/><br><br></div>
        <div>
            <label for="datetime">Date & Time: </label>  <!-- NEED TO CHANGE FIELD TYPE -->
            <input id="datetime" type="datetime-local" name="time" required/><br><br></div>
        <div>
            <label for="address">Address:</label>
            <input id="address" type="address" name="place" required/><br><br></div>

        <div>
            <label for="region">Region:</label>
            <select name="region">
                <option value="central">Central</option>
                <option value="north">North</option>
                <option value="south">South</option>
                <option value="east">East</option>
                <option value="west">West</option>

            </select><br><br></div>
        <div>
            <label for="theme">Theme:</label>
            <input id="theme" type="theme" name="theme" required/><br><br></div>
        <div>
            <label for="desc">Party Details:</label>
            <input id="desc" type="desc" name="description" required/><br><br></div>

        <div>
            <label for="price">Ticket Price:</label>
            <input id="price" type="number" name="price" min="0" required/><br><br></div>
        <div>
            <label for="max">No. of Tickets:</label>
            <input id="max" type="number" min="1" name="maximum" required/><br><br></div>

        <div>
            <input style="display: none" name="user_id" value="<?php echo($_SESSION['userId']) ?>"/><br><br></div>
        <input id="submit" type="submit" value="Create Party" name="submit">
</div>

</form><br>
All fields are required.
<div>

</div>
<br><br><br><br></div>


