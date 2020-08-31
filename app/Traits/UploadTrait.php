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

    public function verifyAndStoreFile( $request, $fieldname , $directory ) {

        if( $request->hasFile( $fieldname ) ) {
            if (!$request->file($fieldname)->isValid()) {

                flash('Invalid Image!')->error()->important();

                return redirect()->back()->withInput();
            }

            return $request->file($fieldname)->store('uploads/' . $directory, 'public');
        }
        return null;
    }
}