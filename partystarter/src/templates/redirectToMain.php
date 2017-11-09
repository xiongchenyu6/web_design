<?php
$baseUrl = $GLOBALS['config']['urls']['baseUrl'];
?>

<a href="<?php echo $baseUrl ?>/index.php"/>Back to main in</a>
<p id="counter"></p>
<script>
    function main() {
        var seconds = 5;
        function tick() {
            var counter = document.getElementById("counter");
            seconds--;
            counter.innerHTML = seconds;
            if( seconds > 0 ) {
                setTimeout(tick, 1000);
            } else {
                window.location = "index.php"
            }
        }
        tick();
    }

    main();
</script>