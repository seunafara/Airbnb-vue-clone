<?php

namespace App\Http\Controllers\API;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PropertyController extends Controller
{

//    public function __construct()
//    {
//        $this->middleware('auth:api');
//
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Property::latest()->paginate(4);
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

        $user = auth('api')->user();

//        $property = new Property($request->all());
//        $property->user_id = Auth::user()->id;
//        $property->save();


             $this->validate($request, [
                 'name' => 'required|string|max:50',
                 'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
                 'price' => 'required|string|min:2',
                 'rooms' => 'required|string',
                 'location' => 'required|string',
                 'description' => 'required|string|max:3000'
             ]);


        return Property::create([
            'name' => $request['name'],
            'user_id' => $user->id,
            'email' => $request['email'],
            'price' => $request['price'],
            'rooms' => $request['rooms'],
            'location' => $request['location'],
            'description' => $request['description'],
            'photo' => $request['photo'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function loadLagos() {
        return Property::latest()->where('location', 'lagos')->paginate(4);
    }



}
