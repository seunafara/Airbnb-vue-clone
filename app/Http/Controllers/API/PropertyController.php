<?php

namespace App\Http\Controllers\API;

use App\Property;
use App\User;
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


        return Property::with('user')->latest()->paginate(4);
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


             $this->validate($request, [
                 'name' => 'required|string|max:50',
                 'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
                 'price' => 'required|string|min:2',
                 'rooms' => 'required|string',
                 'location' => 'required|string',
                 'description' => 'required|string|max:3000'
             ]);



        if($request->photo){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            // the class below depends on -> http://image.intervention.io/getting_started/installation
            \Image::make($request->photo)->save(public_path('img/property/').$name);

            $request->merge(['photo' => $name]);


        }


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

    public function loadAll($location, $paginate) {
        return Property::with('user')->latest()->where('location', $location)->paginate($paginate);
    }

    public function loadRandom($limit)
    {
        return Property::with('user')->inRandomOrder()->paginate($limit);
    }

    public function findProperty(){

        if ($search = \Request::get('q')) {
            $properties = Property::with('user')->where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                    ->orWhere('price','LIKE',"%$search%")->orWhere('location','LIKE',"%$search%");
            })->paginate(20);
        }else{
            $properties= Property::with('user')->latest()->paginate(9);
        }
        return $properties;
    }

    public function findSpecificProperty($location){


        if ($search = \Request::get('q')) {

            $properties = Property::with('user')->where('location', $location)->where(function($query) use ($search){
                $query->where('name','LIKE',"%$search%")
                    ->orWhere('price','LIKE',"%$search%")->orWhere('location','LIKE',"%$search%");
            })->paginate(3);
        }else{
            $properties= Property::with('user')->latest()->where('location', $location)->paginate(3);
        }
        return $properties;
    }

    public function property($id){
        $property = Property::with('user')->where('id', $id)->first();

        return $property;

    }



}
