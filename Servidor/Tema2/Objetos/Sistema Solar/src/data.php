<?php

if(!isset($sistemaSolar)){
    $sistemaSolar = new Sistema();
}else{
    if (file_exists(FILE_NAME)){
        $sistemaSolar->load();
    }
}


?>