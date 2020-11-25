<?php

namespace App\Http\Controllers;

use App\Models\Optional;
use Illuminate\Http\Request;

class OptionalController extends Controller
{
    protected $optional;

    public function __construct()
    {
        $this->optional = new Optional();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $optionals = $this->optional->optionals();
        return view("admin.optional.index", compact(['optionals']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Optional  $optional
     * @return \Illuminate\Http\Response
     */
    public function show(Optional $optional)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Optional  $optional
     * @return \Illuminate\Http\Response
     */
    public function edit(Optional $optional)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Optional  $optional
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {

        $data =$req->toArray();
        $this->validate($req, [
            'name' => 'required|max:190',
            'value' => 'required|max:190',
            'description' => 'required|max:190'
        ], [
            'name.required' => 'Name field need filled',
            'name.max'=>'Name need less than 190 characters',
            'value.required' => 'Name field need filled',
            'value.max'=>'Name need less than 190 characters',
            'description.required' => 'Name field need filled',
            'description.max'=>'Name need less than 190 characters',
        ]);
        $slug = str_slug($data['name'],'-');
        $data['meta_key'] = $slug;
        $res = $this->optional->_update($data);
        return response()->json(['res'=>$res]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Optional  $optional
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
            $status =  $this->optional->_delete($data['id']);
            return response()->json(['status'=>$status]);
        }
        return response()->json(['status'=>false]);
    }
}
