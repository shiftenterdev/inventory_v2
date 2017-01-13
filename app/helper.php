<?php

function colors()
{
    $color = ['#4aa3df', '#2980b9', '#9b59b6', '#34495e', '#8e44ad', '#27ae60', '#8e44ad', '#1abc9c', '#d35400', '#e74c3c', '#c0392b'];

    return $color[rand(0, 10)];
}

function app_date($date='')
{
    if(empty($date)){
        return '';
    }
    return date('d-m-Y',strtotime($date));
}

function money($amount)
{
    return number_format($amount,2);
}

function title($text)
{
    return ucwords($text);
}