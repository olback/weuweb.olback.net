<?php
$output = shell_exec('git pull https://github.com/olback/weuweb.olback.net.git master');
http_response_code(200);
print($output);
?>