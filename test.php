<?php
$a = 10;
function call(){
    global $a;
    $a = "sdfd";
    echo $a;
}
call();
echo $a;
?>