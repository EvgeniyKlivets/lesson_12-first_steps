<?php

function redirect(string $path = '')
{
    header ('Location:' .SITE_URL .'/' .$path);
    exit;
}

function url (string $link =''): string
{
    return SITE_URL .'/' .$link;
}
