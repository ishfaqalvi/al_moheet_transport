<?php

use App\Models\Branch;
use App\Models\ChargesType;
use App\Models\ExpenseType;
use App\Models\Client;
use App\Models\Setting;

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function branches()
{
    return Branch::where('status','Publish')->pluck('title','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function chargesTypes()
{
    return ChargesType::where('status','Publish')->pluck('title','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function expenseTypes()
{
    return ExpenseType::where('status','Publish')->pluck('title','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function clients()
{
    return Client::where('status',1)->pluck('name','id');
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function settings($key)
{
    return Setting::get($key);
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function dirhamToPkr($ammount)
{
	$responce = file_get_contents_curl("https://api.exchangerate-api.com/v4/latest/AED");
    $responce = json_decode($responce, true);
    $exchange_rate = $responce['rates']['PKR'];
    $converted_amount = $amount * $exchange_rate;
    return $converted_amount;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function pkrToDirham($ammount)
{
	$responce = file_get_contents_curl("https://api.exchangerate-api.com/v4/latest/AED");
    $responce = json_decode($responce, true);
    $exchange_rate = $responce['rates']['PKR'];
    $converted_amount = $amount / $exchange_rate;
    return $converted_amount;
}

/**
 * Get listing of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function pkrTodirhamConvRate()
{
	$responce = file_get_contents_curl("https://api.exchangerate-api.com/v4/latest/AED");
    $responce = json_decode($responce, true);
    $exchange_rate = $responce['rates']['PKR'];
    return $exchange_rate;
}

/**
 * Get HTML of a resource.
 *
 * @return \Illuminate\Http\Response
 */
function file_get_contents_curl($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}