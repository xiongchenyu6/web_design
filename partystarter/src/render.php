<?php
    require_once(realpath(dirname(__FILE__) . "/config.php"));

    $renderLayoutWithContentFile = function ($contentFile, $variables = array())
    {
        $contentFileFullPath = TEMPLATES_PATH . "/" . $contentFile;

        if (file_exists($contentFileFullPath)) {
            $renderFunc = function() use($contentFileFullPath,$variables){
                if (count($variables) > 0) {
                    foreach ($variables as $key => $value) {
                        if (strlen($key) > 0) {
                            ${$key} = $value;
                        }
                    }
                }
               return require_once($contentFileFullPath);
            };
        }
        else {
            $renderFunc = function() {require_once(TEMPLATES_PATH . "/error.php");};
        }
        renderBody($renderFunc);

    };
    $renderLayoutWithContent = function($templateString){

        $renderFunc = function() use($templateString) {echo $templateString;};
        renderBody($renderFunc);
    };

    function renderBody($bodyGenerator){

        require_once(TEMPLATES_PATH . "/header.php");

        echo "<div id=\"container\">\n"
            . "\t<div id=\"content\">\n";

        // close container div
        echo "</div>\n";
        echo "</div>\n";
        $bodyGenerator();
        require_once(TEMPLATES_PATH . "/footer.php");
    };
?>
