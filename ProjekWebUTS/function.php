<?php

function filter_array($array, $term)
{
    $matches = array();
    foreach ($array as $a) {
        if ($a['val4'] == $term) {
            $matches[] = $a;
        } elseif ($a['val3'] == $term) {
            $matches[] = $a;
        } elseif ($a['val1'] == $term) {
            $matches[] = $a;
        }
        elseif ($a['val5'] == $term) {
            $matches[] = $a;
        } elseif ($a['val8'] == $term) {
            $matches[] = $a;
        } elseif ($a['val9'] == $term) {
            $matches[] = $a;
        }
    }
    return $matches;
}


function dropDown($array, $key, $keyValue)
{
    return array_filter($array, function ($value) use ($key, $keyValue) {
        return $value[$key] == $keyValue;
    });
}
