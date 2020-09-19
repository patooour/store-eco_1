<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\tagsRequest;
use App\Models\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class tagController extends Controller
{
    public function index()
    {
        $tags = tag::orderBy('id','DESC')->paginate(PAGINATION_COUNT);
        return view('admin.tags.index', compact('tags'));
    }


    public function create(){
        return view('admin.tags.add');
    }
    public function store(tagsRequest $request){

        try {
            $tag = new tag();
            $tag->name = $request->name;
            $tag->slug =  $request->slug;
            $tag->save();
            return redirect()->route('admin.tags')
                ->with(['success' => __('admin/settingControl.tag is success')]);

        } catch (\Exception $ex) {

            return redirect()->back()
                ->with(['error' => __('admin/settingControl.there is a problem try again')]);
        }

    }

    public function edit($id)
    {
        $tag = tag::find($id);
        if (!$tag || $tag == 'null') {
            return redirect()->route('admin.tags')->with(['error' => __('admin/tags/index.tag is not found')]);
        }
        return view('admin.tags.edit', compact('tag'));

    }

    public function update($id, tagsRequest $request)
    {

        try {
            $tag = tag::find($id);
            if (!$tag || $tag == 'null') {
                return redirect()->route('admin.tags')->with(['error' => __('admin/tags/index.tag is not found')]);
            }
            DB::beginTransaction();
            $tag->update([
                'slug' => $request->get('slug'),
            ]);
//            translations
            $tag->name = $request->name;
            $tag->save();

            DB::commit();
            return redirect()->back()->with(['success' => __('admin/settingControl.updated is success')]);
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with(['error' => __('admin/settingControl.there is a problem try again')]);
        }
    }
    public  function destroy($id){
        try {
            $tag = tag::find($id);

            if (!$tag || $tag == 'null') {
                return redirect()->route('admin.tags')
                    ->with(['error' => __('admin/tags/index.tag is not found')]);
            }
            $tag->delete();

            return redirect()->back()
                ->with(['success' => __('admin/settingControl.delete is success')]);

        } catch (\Exception $ex) {
            return redirect()->back()
                ->with(['error' => __('admin/settingControl.there is a problem try again')]);
        }
    }
}
