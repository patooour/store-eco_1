<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\brandsRequest;
use App\Models\brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class brandController extends Controller
{
    public function index()
    {
        $brands = brand::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('admin.brands.index', compact('brands'));
    }


    public function create(){
        return view('admin.brands.add');
    }
    public function store(brandsRequest $request){

        try {
            if (!$request->has('is_active')) {
                $request->request->add(['is_active' => '0']);
            }

            $filename = saveImage('admin/brands', $request['avatar']);
            DB::beginTransaction();
            $brand = new brand();
            $brand->is_active = $request['is_active'];
            $brand->name = $request->name;
            $brand->photo = $filename;
            $brand->save();
            DB::commit();
            return redirect()->route('admin.brands')
                ->with(['success' => __('admin/settingControl.add is success')]);

        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()
                ->with(['error' => __('admin/settingControl.there is a problem try again')]);
        }

    }

    public function edit($id)
    {
        $brand = brand::find($id);
        if (!$brand || $brand == 'null') {
            return redirect()->route('admin.brands')->with(['error' => __('admin/brands/index.brand is not found')]);
        }
        return view('admin.brands.edit', compact('brand'));

    }

    public function update($id, brandsRequest $request)
    {

        try {
            $brand = brand::find($id);
            if (!$brand || $brand == 'null') {
                return redirect()->route('admin.brands')->with(['error' => __('admin/brands/index.brand is not found')]);
            }
            DB::beginTransaction();
            if (!$request->has('is_active')) {
                $request->request->add(['is_active' => '0']);
            } else {
                $request->request->add(['is_active' => '1']);
            }

            if ($request->has('avatar')) {
                if (!empty($brand->photo) ) {
                    $deleteImage = \Illuminate\Support\Str::after($brand->photo, 'assets/');
                  $deleteImage = base_path('assets/'.$deleteImage);
                    unlink($deleteImage);
                }

                $filename = saveImage('admin/brands', $request['avatar']);
                brand::where('id', $id)->update([
                    'photo' => $filename
                ]);
            }
            $brand->update([
                'is_active' => $request->get('is_active'),
            ]);
//            translations
            $brand->name = $request->name;
            $brand->save();


            DB::commit();
            return redirect()->back()->with(['success' => __('admin/settingControl.updated is success')]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['error' => __('admin/settingControl.there is a problem try again')]);
        }
    }
    public  function destroy($id){
        try {
            $brand = brand::find($id);

            if (!$brand || $brand == 'null') {
                return redirect()->route('admin.brands')
                    ->with(['error' => __('admin/brands/index.brand is not found')]);
            }
            if (!empty($brand->photo) ) {
                $deleteImage = \Illuminate\Support\Str::after($brand->photo, 'assets/');
                $deleteImage = base_path('assets/' . $deleteImage);
                unlink($deleteImage);
            }
            $brand->delete();

            return redirect()->back()
                ->with(['success' => __('admin/settingControl.delete is success')]);

        } catch (\Exception $ex) {

            return redirect()->back()
                ->with(['error' => __('admin/settingControl.there is a problem try again')]);
        }
    }
}
