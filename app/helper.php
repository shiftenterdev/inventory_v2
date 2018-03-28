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
    return conf('currency').' '.number_format($amount,2);
}

function title($text)
{
    return ucwords($text);
}

function conf($key)
{
    return \App\Models\Config::where('title',$key)->pluck('value');
}

function thumb($url){
//    $lfm_helper = \Unisharp\Laravelfilemanager\traits\LfmHelpers;
//    $full_file_path = ; // get this from db
//    $thumb_url = $lfm_helper->getThumbUrl($full_file_path);
//    return substr_replace($url, 'thumbs', $pos, 0);
}