<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dish;
class DishController extends Controller
{   
    public function index()
    {
        return Dish::All(); 
    }
    public function store(Request $request)
    {   
         $dishes = new Dish();
         $dishes->name = $request->name;
         $dishes->logo = $request->logo;
         $dishes->save();
            
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

                $name = $request->name;
                $logo = $request->logo;
                $vendors = Dish::find($id);
                $vendors->name = $name;
                $vendors->logo = $logo;
                return response()->json($vendors);
            
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendors = Dish::find($id);
        $vendors->delete();
        return 'Data Telah Dihapus';
    }
}
