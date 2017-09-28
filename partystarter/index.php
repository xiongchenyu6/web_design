<?php
/**
 * Created by IntelliJ IDEA.
 * User: xiongchenyu
 * Date: 28/9/17
 * Time: 2:12 PM
 */

    require_once(realpath(dirname(__FILE__) . "/src/config.php"));

    require_once(realpath(dirname(__FILE__) . "/src/render.php"));


    /*
        Now you can handle all your php logic outside of the template
        file which makes for very clean code!
    */

    $setInIndexDotPhp = "Hey! I was set in the index.php file.";

    // Must pass in variables (as an array) to use in template
    $variables = array(
        'setInIndexDotPhp' => $setInIndexDotPhp
    );

    $renderLayoutWithContentFile("home.php", $variables);

?>