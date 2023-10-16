<?php

if(!isset($sistemaSolar)){
    $sistemaSolar = new Sistema();
}else{
    $sistemaSolar=>load();
}