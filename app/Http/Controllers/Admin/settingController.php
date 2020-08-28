<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ShippingRequest;
use App\models\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function updateShipping(ShippingRequest $request, $id){

        try {
           $setting = setting::find($id);
           if (!$setting || $setting == null ){
               return redirect()->back()->with(['error'=>'setting is not found']);
           }
           DB::beginTransaction();
            $setting -> update([
                'plain_value'=>$request->plain_value,

            ]);

            $setting->value = $request->value;
            $setting->save();
            DB::commit();
            return redirect()->back()->with(['success'=>__('admin/settingControl.updated is success')]);

        }catch (\Exception $ex){
            DB::rollBack();
            return redirect()->back()->with(['error'=>__('admin/settingControl.there is a problem try again')]);
        }
    }
}
