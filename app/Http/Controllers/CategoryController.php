<?php

namespace App\Http\Controllers;
use App\Libs\Boss\Boss;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Myconst;
class CategoryController extends Controller
{
    public static $title = 'Category';
    protected $category;
    public function __construct()
    {
        $this->category = new Category();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->categories();
       // return $categories;
        return view('admin.category.index', compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $data = $req->toArray();
        if(!$data['id']){
            $this->validate($req, [
                'name' => 'required|unique:category|max:50',
                '_parent' => 'min:0'
            ], [
                'name.required' => 'Name field need filled',
                'name.unique' => 'Name was already existed',
                '_parent.min' => 'Something was failed, please choose again'
            ]);
        }else{
            $this->validate($req, [
                'name' => 'required|max:50',
                '_parent' => 'min:0'
            ], [
                'name.required' => 'Name field need filled',
                '_parent.min' => 'Something was failed, please choose again'
            ]);
        }

        $status = $this->category->_update($data);
        if($status){
            return redirect(route('admin.categories'))->with('success','Your action was successfully!');
        }else{
            return redirect(route('admin.categories'))->with('error','Your action got something wrong!');
        }
    }

    public function delete(Request $req)
    {
        $this->validate($req, [
            'id' => 'required|min:1',
        ], [
            'id.required' => 'id field need passing',
            'id.min' => 'Something was failed, please choose again'
        ]);
        $data = $req->toArray();
        if($data['id']){
           $status =  $this->category->_delete($data['id']);
           return response()->json(['status'=>$status]);
        }
        return response()->json(['status'=>false]);
    }
    //delete category
    public function delete_category(Request $request){
        $category = Category::find($request -> id);
        //return response()->json(['status'=>$category ->Skill_category->count()]);

        if(($category ->project_categorys-> count()>0) || ($category ->Skill_category->count() >0) ){
            return response()->json(['status'=>false]);
        }else{
            //kiểm tra xem có con ko
            $check_parents = Category::where('_parent',$request -> id)->get();
            if(count($check_parents) > 0){
                //update lại con
                foreach ($check_parents as $check_parent) {
                    $check_parent -> _parent = 0;
                    $check_parent -> save();
                }
                //xóa category
                $chek = $category -> delete();
                if($chek){
                    return response()->json(['status'=>$chek]); 
                }else{
                    return response()->json(['status'=>false]);
                }
            }else{
                $chek = $category -> delete();
                if($chek){
                    return response()->json(['status'=>$chek]); 
                }else{
                    return response()->json(['status'=>false]);
                } 
           }
        }
        
    }
    //get list category
    public function listCategory(){
        $categories = Category::select('category.*')->orderBy('id', 'desc')->paginate(Myconst::PAGINATE_ADMIN);
        //$categories = Category::All();
        return view('admin.category.index', compact('categories'));
    }
    public function createCategory(Request $request){
       // return $request;
        if($request ->id == 0){
             $this->validate($request, [
                'name' => 'required|unique:category|max:50',
                '_parent' => 'min:0'
            ], [
                'name.required' => 'Name field need filled',
                'name.unique' => 'Name was already existed',
                '_parent.min' => 'Something was failed, please choose again'
            ]);
            $new_category = new Category;
            $new_category -> name = $request ->name;
            $new_category -> _parent = $request ->_parent;
            if( $new_category -> save()){
                return redirect(route('admin.categories'))->with('success','Your action was successfully!');
            }else{
                return redirect(route('admin.categories'))->with('error','Your action got something wrong!');
            }
        }else{
            $this->validate($request, [
                'name' => 'required|max:50',
                '_parent' => 'min:0'
            ], [
                'name.required' => 'Name field need filled',
                '_parent.min' => 'Something was failed, please choose again'
            ]);
            $update_category = Category::find($request ->id);
            $update_category -> name = $request ->name;
            $update_category -> _parent = $request ->_parent;
            if( $update_category -> save()){
                return redirect(route('admin.categories'))->with('success','Your action was successfully!');
            }else{
                return redirect(route('admin.categories'))->with('error','Your action got something wrong!');
            }
        }
        
    }
}
