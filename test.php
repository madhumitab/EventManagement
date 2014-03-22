


<?php 
$user='ggomatom@indiana.edu';
$event='eid12';
shelloutput=shell_exec(./scripts/test.sh $user $event.' > /dev/null; echo $?');
echo trim($shellOutput); 
?>