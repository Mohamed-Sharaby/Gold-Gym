<?php

/**
 * Setting Name
 *
 * @param $name
 * @return mixed
 */
function getsetting($name)
{
    $setting = \App\Models\Setting::where('name', $name)->first();
    if (!$setting) {
        return "";
    }
    return $setting->value;
}

function country_code()
{
    return [
        '962' => '962',
        '965' => '965',
    ];
}

function location()
{
    return [
        'fixed' => 'ثابت',
        'moving' => 'متحرك',
    ];
}

function day_status()
{
    return [
        'work' => 'عمل',
        'holiday' => 'اجازة',
    ];
}

function device_type()
{
    return [
        'android' => 'اندرويد',
        'ios' => 'ايفون',
    ];
}

function tax_status()
{
    return [
        '0' => 'غير مفعل',
        '1' => 'مفعل',
    ];
}

function verify_status()
{
    $array = [
        'approved' => 'قبول',
        'rejected' => 'رفض',
    ];

    return $array;
}

function order_status()
{
    return [
        'pending' => 'قيد الانتظار',
        'confirmed' => 'مؤكد',
        'rejected' => 'مرفوض',
        'canceled' => 'ملغى',
        'finished' => 'منتهي'
    ];
}

function payment_methods()
{
    return [
        'cash' => 'الدفع عند الاستلام',
        'bank' => 'تحويل بنكى',
        'card' => 'بطاقة ائتمان',
    ];
}

/**
 * Upload Path
 *
 * @return string
 */
function uploadpath()
{
    return 'photos';
}

/**
 * Get Image
 *
 * @param $filename
 * @return string
 */
function getimg($filename)
{
    return asset($filename);
}


function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $unit = 'km', $decimals = 2)
{
    // Calculate the distance in degrees
    $degrees = rad2deg(acos((sin(deg2rad($point1_lat)) * sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat)) * cos(deg2rad($point2_lat)) * cos(deg2rad($point1_long - $point2_long)))));

    // Convert the distance in degrees to the chosen unit (kilometres, miles or nautical miles)
    switch ($unit) {
        case 'km':
            $distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
            break;
        case 'mi':
            $distance = $degrees * 69.05482; // 1 degree = 69.05482 miles, based on the average diameter of the Earth (7,913.1 miles)
            break;
        case 'nmi':
            $distance = $degrees * 59.97662; // 1 degree = 59.97662 nautic miles, based on the average diameter of the Earth (6,876.3 nautical miles)
    }

    return round($distance, $decimals);
}


////////////////////////////////////////////////////////////////////////

function uploadImage($file, $img)
{
    return '/storage/' . \Storage::disk('public')->putFile($file, $img);
}

function deleteImage($file, $img)
{
    \Storage::disk('public')->delete($file, $img);

    return true;
}

function getImgPath($img)
{
    return asset($img);
}

/////////////////////////////////////////////////////////////////////////////////////////////
class responder
{
    public static function success($data)
    {
        return response()->json(['status' => true, 'data' => $data]);
    }

    public static function error($data)
    {
        return response()->json(['status' => false, 'msg' => $data]);
    }
}

function orderStatusEn($status)
{
    return [
        'pending' => 'pending',
        'confirmed' => 'confirmed',
        'rejected' => 'rejected',
        'canceled' => 'canceled',
        'wait_for_rate' => 'waiting for rate',
        'finished' => 'finished'
    ][$status];
}

function orderStatusAr($status)
{
    return [
        'pending' => 'معلقة',
        'confirmed' => 'مؤكد',
        'rejected' => 'مرفوض',
        'canceled' => 'لاغي',
        'wait_for_rate' => 'في انتظار التقييم',
        'finished' => 'منتهي'
    ][$status];
}
