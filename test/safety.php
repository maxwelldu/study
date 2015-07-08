<?php
$list = [
    "/[^0-9a-z&_-]{1}(union|select|insert|update|delete|alter|drop|create|shutdown|substring|exec|declare|ascii|case|concat|group_concat|load_file|char|hex|replace|len|sleep|benchmark|waitfor|having|xp_cmdshell|charindex|sp_oacreate|sp_execute)[^0-9a-z&_-]{1}.+/is",
    "/[^0-9a-z&_-]{1}(and|or)[^0-9a-z&_-]{1}[^&]*(?:=|>|<|between.+and|is.*true|is.*false|is.*null|\\(.*\\))/is",
    "/[^0-9a-z&_-]{1}(and|or)[^0-9a-z&_-]+(?:true|false|null|[0-9]+|'.*')/is",
    "/(?:<|<.*[^0-9a-z&_-]{1})(href|src|body|meta|object|script|style|table|td|div|background|applet|embed|frame|link|layer|input|img|bgsound|base|xss|doctype|entity|form)(?:>|[^0-9a-z&_-]{1}.*>)/is"
];
$url = "<script href src body></script> <sctipt>";
foreach($list as $rule){
    echo preg_match($rule,$url).PHP_EOL;
}