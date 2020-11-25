<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createPackageMemberShipRequest;
use App\Models\PackageMembership;
use App\Models\PackageMembershipMeta;
use Auth;
use App\Models\Role;

class packageMembershipController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['adminLogin','verified']);
    }
	public function getList(){
		$all_packs = PackageMembership::all();
		$all_packs_meta = PackageMembershipMeta::all();
		return view('admin.mempack.list', compact('all_packs', 'all_packs_meta'));
	}

	public function getCreate(){
    	$user_types = Role::wherein('name',['Alchemist','Seeker'])->get();
		return view('admin.mempack.add', compact('user_types'));
	}

	public function postCreate(createPackageMemberShipRequest $request){
		$new_pack = new PackageMembership;
		$new_pack->title = $request->title;
	    $new_pack->price = $request->price;
	    $new_pack->duration = $request->duration;
	    $new_pack->type = $request->type;
	    $new_pack->description = $request->description;

		if($new_pack -> save()) {
			/*if (!empty($request->meta_key) && !empty($request->meta_value)) {
				$array_meta = array_combine($request->meta_key, $request->meta_value);
				foreach ($array_meta as $key => $value) {
					if (!empty($key) && !empty($value)) {
						$pack_meta = new PackageMembershipMeta;
						$pack_meta->_packet = $new_pack->id;
						$pack_meta->meta_key = $key;
						$pack_meta->meta_value = $value;
						$pack_meta->save();
					}
				}
			}*/
		}
		return redirect()->route('mempack.list')->with('add','Success');
	}

	public function getEdit($id){
		$packs_edit = PackageMembership::findOrFail($id);
		$all_packs_meta = $packs_edit->meta;
		$user_types = Role::wherein('name',['Alchemist','Seeker'])->get();
		return view('admin.mempack.edit', compact('user_types','packs_edit', 'all_packs_meta'));
	}

	public function postEdit(createPackageMemberShipRequest $request, $id){
		$slug = str_slug($request->title);
		$packs_edit = PackageMembership::findOrFail($id);
		$packs_edit->title = $request->title;
	    $packs_edit->price = $request->price;
	    $packs_edit->duration = $request->duration;
	    $packs_edit->type = $request->type;
	    $packs_edit->description = $request->description;

		if($packs_edit->save()) {
			$pack_meta = PackageMembershipMeta::where('_packet', $id)->first();
			if(count((array)($pack_meta)) > 0){
				PackageMembershipMeta::where('_packet', $id)->delete();
			}

			/*$array_meta = array_combine($request->meta_key, $request->meta_value);
			// dd($array_meta);
			foreach ($array_meta as $key => $value) {
				if (!empty($key) && !empty($value)) {
					$pack_meta = new PackageMembershipMeta;
					$pack_meta->_packet = $id;
					$pack_meta->meta_key = $key;
					$pack_meta->meta_value = $value;
					$pack_meta->save();
				}
			}
			if (isset($request->meta)) {
				foreach ($request->meta as $key => $value) {
					$pack_meta = new PackageMembershipMeta;
					$pack_meta->_packet = $id;
					$pack_meta->meta_key = $key;
					$pack_meta->meta_value = $value;
					$pack_meta->save();
				}
			}*/
			return redirect()-> back();
		}
	}

	public function getDelete($id){
			$pack_del = PackageMembership::where('id', $id) -> delete();
			return redirect()-> back()->with('add','Success');
	}
}
