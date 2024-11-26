<?php

$passwd = '1233';

$finalPasswd = password_hash($passwd, PASSWORD_DEFAULT);

echo $finalPasswd;
