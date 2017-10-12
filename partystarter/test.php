<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 28/9/17
 * Time: 2:12 PM
 */

    require_once(realpath(dirname(__FILE__) . "/src/render.php"));


    $setInIndexDotPhp = "Hey! I was set in the test.php file.";

    $variables = array(
        'setInIndexDotPhp' => $setInIndexDotPhp
    );

    $renderLayoutWithContentFile("home.php", $variables);

?>
