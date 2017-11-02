<?php
$acc = $GLOBALS['acc'];
?>
<div class="leftNav">
    <div><button>My Profile</button></div>
    <div><button>My Host</button></div>
    <div><button>My Join</button></div>
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
    <div style="display: none" class="host">
        <button>Create New</button>
    </div>
    <div style="display: none" class="join">
        <button>PayAll</button>
    </div>
</div>
