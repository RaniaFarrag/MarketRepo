<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WhatsAppController extends Controller
{
    use LogTrait;
    use UploadTrait;
    protected $company_model;

    public function __construct(Company $company)
    {
        $this->company_model = $company;
    }


    /** Whatsapp Messages */
    public function WhatsappMessages(){
        if (Auth::user()->hasRole('ADMIN')) {
//            $companies = $this->company_model::whereNotNull('whatsapp')->with(['sector' , 'subSector'])
//                ->orderBy('created_at', 'desc')->paginate(20);
            $companies = $this->company_model
                ::orderBy('whatsapp' , 'desc')
                ->orderBy('website' , 'desc')
                ->orderBy('email' , 'desc')
                ->with(['sector' , 'subSector'])
                ->paginate(20);
        }

        else{
//            $companies = $this->company_model::whereNotNull('whatsapp')
//                ->where(function ($q){
//                    $q->where('user_id' , Auth::user()->id)
//                        ->orWhereIn('representative_id' , Auth::user()->childs()->pluck('id'));
//                })->with(['sector' , 'subSector'])->orderBy('created_at', 'desc')->paginate(20);

            $companies = $this->company_model->WhereIn('sector_id', Auth::user()->sectors->pluck('id'))
                ->orderBy('whatsapp' , 'desc')
                ->orderBy('website' , 'desc')
                ->orderBy('email' , 'desc')
                ->with(['sector' , 'subSector'])->paginate(20);
//                $this->company_model::where(function ($q){
//                    $q->where('user_id' , Auth::user()->id)
//                        ->orWhereIn('representative_id' , Auth::user()->childs()->pluck('id'));
//                        })

            //dd($companies);
        }

        return view('system.whatsapp.view')->with('companies' , $companies);

    }


    public function send_text($request){
        //dd($request->messagetxt);
        $curl = curl_init();
        $token = "UYbGcupMzhq2aPwbcNiswLEhMwNIAx1o1qXRzH3wXU8ymQESRVh9dXieQ2rVGO4G";
        $data = [
            'phone' => $request->whatsapp,
            'message' => $request->messagetxt,
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        Alert::success('success', trans('dashboard.sent succesfully'));
        return redirect(route('whatsapp_message'));
    }

    public function send_text2($request , $mobiles){
        //dd($request->all());

        foreach ($mobiles as $mobile){
            $curl = curl_init();
            $token = "UYbGcupMzhq2aPwbcNiswLEhMwNIAx1o1qXRzH3wXU8ymQESRVh9dXieQ2rVGO4G";
            $data = [
                'phone' => $mobile,
                'message' => $request->messagetxt,
            ];

            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Authorization: $token",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-message");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);
        }

        Alert::success('success', trans('dashboard.sent succesfully'));
        return redirect(route('whatsapp_message'));
    }

    /*****************************************************/

    public function send_image($request , $image){
        //dd($image);

        $curl = curl_init();
        $token = "UYbGcupMzhq2aPwbcNiswLEhMwNIAx1o1qXRzH3wXU8ymQESRVh9dXieQ2rVGO4G";
        $data = [
            'phone' => $request->whatsapp,
            'caption' => $request->messagetxt, // can be null
            'image' => $image,
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-image");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        Alert::success('success', trans('dashboard.sent succesfully'));
        return redirect(route('whatsapp_message'));
    }

    public function send_image2($request , $image , $mobiles){
        //dd($image);
        foreach ($mobiles as $mobile){
            $curl = curl_init();
            $token = "UYbGcupMzhq2aPwbcNiswLEhMwNIAx1o1qXRzH3wXU8ymQESRVh9dXieQ2rVGO4G";
            $data = [
                'phone' => $mobile,
                'caption' => $request->messagetxt, // can be null
                'image' => $image,
            ];

            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Authorization: $token",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-image");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);
        }

        Alert::success('success', trans('dashboard.sent succesfully'));
        return redirect(route('whatsapp_message'));
    }

    /****************************************************/

    public function send_document($request , $file , $original_name){
        //dd($original_name);
        $curl = curl_init();
        $token = "UYbGcupMzhq2aPwbcNiswLEhMwNIAx1o1qXRzH3wXU8ymQESRVh9dXieQ2rVGO4G";
        $data = [
            'phone' => $request->whatsapp,
            'document' => $file,
            //'caption' => $request->messagetxt,
            'caption' => $original_name,
            'message' => 'hello world',

        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-document");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        if ($request->messagetxt){
            return $this->send_text($request);
        }

        Alert::success('success', trans('dashboard.sent succesfully'));
        return redirect(route('whatsapp_message'));
    }

    public function send_document2($request , $file , $mobiles , $original_name){
        foreach ($mobiles as $mobile){
            $curl = curl_init();
            $token = "UYbGcupMzhq2aPwbcNiswLEhMwNIAx1o1qXRzH3wXU8ymQESRVh9dXieQ2rVGO4G";
            $data = [
                'phone' => $mobile,
                'document' => $file,
                'caption' => $original_name,
            ];

            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Authorization: $token",
                )
            );
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-document");
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);


        }

        if ($request->messagetxt){
            return $this->send_text2($request , $mobiles);
        }
        Alert::success('success', trans('dashboard.sent succesfully'));
        return redirect(route('whatsapp_message'));
    }

    /******************************************************/

    public function send_video($request ,$video){
        //dd($video);
        $curl = curl_init();
        $token = "UYbGcupMzhq2aPwbcNiswLEhMwNIAx1o1qXRzH3wXU8ymQESRVh9dXieQ2rVGO4G";
        $data = [
            'phone' => $request->whatsapp,
            'caption' => $request->messagetxt, // can be null
            'video' => $video,
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization: $token",
            )
        );
        curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-video");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl);

        Alert::success('success', trans('dashboard.sent succesfully'));
        return redirect(route('whatsapp_message'));
    }

    public function send_video2($request ,$video , $mobiles){
        foreach ($mobiles as $mobile){
            $curl = curl_init();
            $token = "UYbGcupMzhq2aPwbcNiswLEhMwNIAx1o1qXRzH3wXU8ymQESRVh9dXieQ2rVGO4G";
            $data = [
                'phone' => $mobile,
                'caption' => $request->messagetxt, // can be null
                'video' => $video,
            ];

            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Authorization: $token",
                )
            );
            curl_setopt($curl, CURLOPT_URL, "https://teras.wablas.com/api/send-video");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl);
        }

        Alert::success('success', trans('dashboard.sent succesfully'));
        return redirect(route('whatsapp_message'));
    }


    /************************************************/

    /** Send Whatsapp Messages */
    public function sendWhatsappMessage(Request $request){
        $whatsapp = preg_split("/\\r\\n|\\r|\\n/",  $request->whatsapp);

        if(count($whatsapp) > 1) {
            //dd(preg_split("/\\r\\n|\\r|\\n/",  $request->whatsapp));
            //$mobiles = json_decode($request->ids[0], true);

            if ($request->type == 'text') {
                return $this->send_text2($request, $whatsapp);
            }
            elseif ($request->type == 'image') {
                //dd(22);
                if($request->hasFile('document')){
                    //dd(55);
                    $file = $request->file('document');
                    $extension = $file->getClientOriginalExtension();
                    $fileName  = time().'_image.'.$extension;
                    $file->move(public_path("/files") , $fileName);

                    $image = asset("/files/". $fileName);
                }
                return $this->send_image2($request , $image , $whatsapp);
            }
            elseif ($request->type == 'document') {
                if($request->hasFile('document')){
                    $file_ = $request->file('document');
                    $original_name = $file_->getClientOriginalName();
                    $original_name = pathinfo($original_name,PATHINFO_FILENAME);
                    $extension = $file_->getClientOriginalExtension();
                    $fileName  = time().'_file.'.$extension;
                    $file_->move(public_path("/files") , $fileName);

                    $file = asset("/files/". $fileName);

                }
                return $this->send_document2($request , $file , $whatsapp , $original_name);
            }
            elseif ($request->type == 'video'){
                if($request->hasFile('document')){
                    $file_ = $request->file('document');
                    $extension = $file_->getClientOriginalExtension();
                    $fileName  = time().'_video.'.$extension;
                    $file_->move(public_path("/files") , $fileName);

                    $video = asset("/files/". $fileName);

                }
                return $this->send_video2($request , $video , $whatsapp);
            }
        }

        else{
            //dd(55);
            if ($request->type == 'text'){
                return $this->send_text($request);
            }
            elseif ($request->type == 'image'){
//                if($request->hasFile('document')){
//                    $image = asset('storage/whatsapp/images/'.$this->storeWhatsappimages($request , 'document'));
//                }

                if($request->hasFile('document')){
                    $file = $request->file('document');
                    //$filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $fileName  = time().'_image.'.$extension;
                    $file->move(public_path("/files") , $fileName);

                    $image = asset("/files/". $fileName);
                }

                return $this->send_image($request , $image);
            }
            elseif ($request->type == 'document'){
                if($request->hasFile('document')){
                    $file_ = $request->file('document');
                    $original_name = $file_->getClientOriginalName();
                    $original_name = pathinfo($original_name,PATHINFO_FILENAME);
                    $extension = $file_->getClientOriginalExtension();
                    $fileName  = time().'_file.'.$extension;
                    $file_->move(public_path("/files") , $fileName);

                    $file = asset("/files/". $fileName);

                }
                return $this->send_document($request , $file , $original_name);
            }
            elseif ($request->type == 'video'){
                if($request->hasFile('document')){
                    $file_ = $request->file('document');
                    $extension = $file_->getClientOriginalExtension();
                    $fileName  = time().'_video.'.$extension;
                    $file_->move(public_path("/files") , $fileName);

                    $video = asset("/files/". $fileName);

                }
                return $this->send_video($request , $video);
            }
        }
    }
}
