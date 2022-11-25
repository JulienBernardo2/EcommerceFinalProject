<?php

$q = $_REQUEST["q"];


$out = substr(strstr($q, 'S'), strlen('S'));

$test3 = strstr($out, 'O', true);

$test2 = substr(strstr($q, 'O'), strlen('O'));

$test = strstr($q, ' S', true);


$test3--;

echo "

<a href ='/Profile/addRating/$test/$test3/$test2' class=' btn btn-success btnSave' name='upvote'> Save
 </a>
";

?>