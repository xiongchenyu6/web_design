<div class="leftNav">
    <div><button>My Profile</button></div>
    <div><button>My Host</button></div>
    <div><button>My Join</button></div>
</div>
<div class="main">
    <div class="profile">
        <table action="register.php" method="post" enctype="multipart/form-data">
            <tr>
                <td for="username">Name*:</td>
                <td required id="username" name="username"/></tr>
            <tr>
                <td for="email">Email*:</td>
                <td required id="email" type="email" name="email"/>
            </tr>
            <tr>
                <td for="self_description">About Yourself*:</td>
                <td required id="self_description" type="text" name="self_description"/>
            </tr>
            <tr>
                <td for="fileToUpload">Profile Photo*:</td>
                <td required type="file" name="fileToUpload" id="fileToUpload"></tr>

        </table>
    </div>
    <div>

    </div>
</div>
