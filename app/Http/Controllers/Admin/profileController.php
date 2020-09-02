<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\profileRequest;
use App\models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use function GuzzleHttp\Psr7\str;

class profileController extends Controller
{
    public function editProfile(){
            $id =  auth('admin')->user()->id;
            $admin = Admin::find($id);
            return view('admin.profile.edit',compact('admin'));


    }
    public function updateProfile(profileRequest $request){

        try {

           $id =  auth('admin')->user()->id;
           $admin = Admin::find($id);
            if (!$admin || $admin == null ){
                return redirect()->back()->with(['error'=>'admin is not found']);
            }

            DB::beginTransaction();
            $filename ="";
            if ($request->has('photo')){
                $deleteImage = Str::after($admin->image , 'localhost/');
//                $deleteImage = base_path('assets/'.$deleteImage);
                unlink($deleteImage);

                $filename = saveImage('profile',$request->photo);
                $admin->update(['image'=>$filename]);
            }
            if ($request->has('password')) {
                $admin->update(['password'=> bcrypt($request->password)]);
            }

            $admin->update([
                'name'=>$request->get('name'),
                'email'=>$request->get('email'),
            ]);


            DB::commit();
            return redirect()->back()->with(['success'=>__('admin/settingControl.updated is success')]);
        }catch (\Exception $ex){

            DB::rollBack();
            return redirect()->back()->with(['error'=>__('admin/settingControl.there is a problem try again')]);
        }
    }
}
