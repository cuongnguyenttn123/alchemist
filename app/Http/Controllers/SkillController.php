<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    protected $category;
    protected $skill;

    /**
     * SkillController constructor.
     * Init category
     */
    public function __construct()
    {
        $this->category = new Category();
        $this->skill = new Skill();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->category->categories();
        $skills = $this->skill->skills();
        return view('admin.skill.index', compact(['categories','skills']));
    }
    public function update(Request $req, Skill $skill)
    {
        $data =$req->toArray();
        $this->validate($req, [
            'name' => 'required|max:50',
            '_category' => 'numeric|min:1'
        ], [
            'name.required' => 'Name field need filled',
            'name.max'=>'Name need less than 50 characters',
            '_category.min' => 'Something was failed, please choose again'
        ]);
        $status = $this->skill->_update($data);
        if($status){
            return redirect(route('admin.skills'))->with('success','Your action was success!');
        }else{
            return redirect(route('admin.skills'))->with('error','Your action was failed');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
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
            $status =  $this->skill->_delete($data['id']);
            return response()->json(['status'=>$status]);
        }
        return response()->json(['status'=>false]);
    }
    //s2nhomau
    public function listSkill(){
        $categories = $this->category->list_categorys();
        $skills = $this->skill->list_skills();
        //return $skills;
        return view('admin.skill.index', compact(['categories','skills']));
    }
    //end
}
