<?php

namespace App\Http\Controllers;

use App\Models\PostMen;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class PostMenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|PostMen[]
     */
    public function index()
    {
        return PostMen::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\MessageBag
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:App\Models\PostMen,email',
            'category' => 'required|json'
        ]);*/
        $validator = Validator::make(
            $request->all(),[
                'name' => 'required|string',
                'email' => 'required|email|unique:App\Models\PostMen,email',
                'category' => 'required|json'
            ],
            [
                'email.unique' => 'The email already exists'
            ]
        );

        if($validator->fails()){
            return $validator->errors();
        }

        return PostMen::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return PostMen::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $item = PostMen::find($id);
        $item->update($request->all());
        return $item;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy($id)
    {
        return PostMen::destroy($id);
    }
}
