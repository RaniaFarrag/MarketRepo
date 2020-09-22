<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/9/2020
 * Time: 03:37 PM
 */
namespace App\Traits;

use Illuminate\Http\Request;

trait UploadTrait{

    public function verifyAndStoreFile($request, $fieldname) {

        if( $request->hasFile( $fieldname ) ) {
            if (!$request->file($fieldname)->isValid()) {

                flash('Invalid Image!')->error()->important();

                return redirect()->back()->withInput();
            }
            $file_name = time().'_'.$request->file($fieldname)->getClientOriginalName();
            $request->file($fieldname)->storeAs('public/images' , $file_name);
            //dd($request->file($fieldname)->storeAs('public/images' , $file_name));
            return $file_name;
//            return $path = $request->file($fieldname)->storeAs('uploads' , $file_name);
        }
        return null;
    }
}