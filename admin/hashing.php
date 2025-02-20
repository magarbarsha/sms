<?php
$text="admin";
$hashed_pass=password_hash($text , PASSWORD_DEFAULT);
echo "TEXT".$text;
echo "<br>HASH: .$hashed_pass";

echo "<br>" .password_verify("hello", $hashed_pass);
if(password_verify("hello",$hasded_pass)){
    echo "true";
}
else{
    echo "false";
}
?>