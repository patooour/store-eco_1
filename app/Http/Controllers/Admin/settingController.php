<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\setting;
use Illuminate\Http\Request;

class settingController extends Controller
{
    public function editShipping($type)
    {
        setting::all();
        if ($type === 'free') {
            $shippingMethod = setting::where('key', '=', 'free_shipping_label')->first();
        }
        elseif ($type === 'inner') {
            $shippingMethod = setting::where('key', '=', 'local_label')->first();
        }
        elseif ($type === 'outer') {
            $shippingMethod = setting::where('key', '=', 'outer_label')->first();
        }
        else{
            $shippingMethod = setting::where('key', '=', 'free_shipping_label')->first();
        }
        return view('admin.settings.shipping.edit',[
            'shippingMethod' => $shippingMethod
        ]);
    }
}
