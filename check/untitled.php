<?php
 
$key = 'password to (en/de)crypt';
$string = '323BCE10'; // note the spaces
 echo $string;
 $string =mb_convert_encoding($string, "EUC-JP", "auto");
$encrypted = (md5($string));
$decrypted = md5($string);
 
echo 'Encrypted:' . "\n";
var_dump($encrypted);
 
echo "\n";
 
echo 'Decrypted:' . "\n";
var_dump($decrypted); // spaces are preserved
 
?>