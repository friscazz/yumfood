<?php

namespace App\Http\Controllers;

use App\Http\Resources\VendorResource;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return VendorResource::collection(Vendor::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
            $validation = Validator::make(Request::all(),[ 
            'name' => 'required|max:128',
            'logo' => 'required',
            ]);
            $response = array('response' => 'gagal', 'success'=>false);
            if($validation->fails()){
                $response['response'] = $validator->messages();
            }else{
                $vendors = new Vendor;
                $vendors->name = $request->name;
                $vendors->logo = $request->logo;
                $vendors->save();
            return response()->json($vendors);
            }
        
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

        $validation = Validator::make(Request::all(),[ 
            'name' => 'required|max:128',
            'logo' => 'required',
            ]);
            $response = array('response' => 'gagal', 'success'=>false);
            if($validation->fails()){
                $response['response'] = $validator->messages();
            }else{
                $name = $request->name;
                $logo = $request->logo;
                $vendors = Vendor::find($id);
                $vendors->name = $name;
                $vendors->logo = $logo;
                return response()->json($vendors);
            }
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vendors = Vendor::find($id);
        $vendors->delete();
        return 'Data Telah Dihapus';
    }
}
