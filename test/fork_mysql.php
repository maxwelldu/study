<?php
$link = mysql_connect('localhost', 'root', '123456');
mysql_select_db('wxlife', $link) or die('Could not select database.');

$result = mysql_query('SELECT * from wx_file limit 1');


$pid = pcntl_fork();
if ($pid == -1) {
    die('could not fork');
} else if ($pid) {
    $row = mysql_fetch_assoc($result);
    print_r($row);
    pcntl_wait($status); //Protect against Zombie children
} else {
    $row = mysql_fetch_assoc($result);
    print_r($row);
    exit;
}
