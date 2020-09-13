<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\subCategoriesRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class subCategoriesController extends Controller
{

    public function index()
    {
        $categories = category::whereNotNull('parent_id')->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
//        $categories-> makevisible(['translations']);

        return view('admin.subCategories.index', compact('categories'));
    }
    public function create(){
        $categories = category::whereNull('parent_id')->orderBy('id','DESC')->paginate(PAGINATION_COUNT);

        return view('admin.subCategories.add',compact('categories'));
    }
    public function store(subCategoriesRequest $request){


        try {
            if (!$request->has('is_active')) {
                $request->request->add(['is_active' => '0']);
            }

            $filename = saveImage('admin/subCategories', $request['avatar']);
            DB::beginTransaction();
            $category = new category();
            $category->slug = $request['slug'];
            $category->is_active = $request['is_active'];
            $category->name = $request['name'];
            $category->parent_id = $request['parent_id'];
            $category->image = $filename;
            $category->save();
            DB::commit();
            return redirect()->route('admin.subCategories')
                ->with(['success' => __('admin/settingControl.add is success')]);

        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()
                ->with(['error' => __('admin/settingControl.there is a problem try again')]);
        }

    }

    public function edit($id)
    {
        $category = category::find($id);
        $categories = category::whereNull('parent_id')->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        $categories-> makevisible(['translations']);

        if (!$category || $category == 'null') {
            return redirect()->route('admin.subCategories')->with(['error' => __('admin/subCategories/index.category is not found')]);
        }

        return view('admin.subCategories.edit',compact('category','categories'));

    }

    public function update($id, subCategoriesRequest $request)
    {

        try {
            $category = category::find($id);

            if (!$category || $category == 'null') {
                return redirect()->route('admin.subCategories')->with(['error' => __('admin/categories/index.category is not found')]);
            }

            DB::beginTransaction();
            if (!$request->has('is_active')) {
                $request->request->add(['is_active' => '0']);
            } else {
                $request->request->add(['is_active' => '1']);
            }

            if ($request->has('avatar')) {
                if (!empty($category->image) ) {
                    $deleteImage = \Illuminate\Support\Str::after($category->image, 'localhost/');
//                  $deleteImage = base_path('assets/'.$deleteImage);
                    unlink($deleteImage);
                }

                $filename = saveImage('admin/subCategories', $request['avatar']);
                category::where('id', $id)->update([
                    'image' => $filename
                ]);
            }
            $category->update([
                'slug' => $request->get('slug'),
                'is_active' => $request->get('is_active'),
                'parent_id' => $request->get('parent_id'),
            ]);
//            translations
            $category->name = $request->name;
            $category->save();


            DB::commit();
            return redirect()->back()->with(['success' => __('admin/settingControl.updated is success')]);

        } catch (\Exception $ex) {
            DB::rollBack();

            return redirect()->back()->with(['error' => __('admin/settingControl.there is a problem try again')]);
        }
    }
    public  function destroy($id){

        try {
            $category = category::find($id);

            if (!$category || $category == 'null') {
                return redirect()->route('admin.subCategories')
                    ->with(['error' => __('admin/categories/index.category is not found')]);
            }
            if (!empty($category->image) ) {
                $deleteImage = \Illuminate\Support\Str::after($category->image, 'assets/');
                $deleteImage = base_path('assets/'.$deleteImage);
                unlink($deleteImage);
            }
            $category->delete();

            return redirect()->back()
                ->with(['success' => __('admin/settingControl.delete is success')]);

        } catch (\Exception $ex) {

            return redirect()->back()
                ->with(['error' => __('admin/settingControl.there is a problem try again')]);
        }
    }
}
