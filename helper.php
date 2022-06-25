<?php

function presentPrice($price)
{
    //$fmt = numfmt_create('de_DE', NumberFormatter::CURRENCY);
    //return numfmt_format_currency($fmt, $price / 100, "") . "\n";
    return number_format(floatval($price), 2, '.', ' ') . ' $';
}
