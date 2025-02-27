<?php


function Date_format_($date): string
{
    return date_format(date_create($date),"Y/m/d");
}
