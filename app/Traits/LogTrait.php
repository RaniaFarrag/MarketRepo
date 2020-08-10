<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/9/2020
 * Time: 11:32 AM
 */
namespace App\Traits;

use App\Models\Log;

trait logTrait{

    public function addLog($user_id, $model_name, $content_ar, $content_en){
        Log::create([
            'user_id' =>$user_id,
            'model_name' => $model_name,
            'content:ar' => $content_ar,
            'content:en' => $content_en
        ]);
    }

}