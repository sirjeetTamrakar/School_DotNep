<?php

namespace App\Http\Controllers\admin;

use App\Model\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{


    public function about(){

        return view('admin.about.about');
    }


    public function history(){

        return view('admin.about.history');
    }


    public function welcomeMessage(){

        return view('admin.about.welcome-message');
    }


    public function aboutStudent(){

        return view('admin.about.student');
    }


    public function basicInfo(){

        return view('admin.about.basic-info');
    }


    public function update(Request $request){
//        dd($request);
        $inputs = $request->only(
            'name',
            'site_description',
            'description',
            'address',
            'phone',
            'email',
            'province_number',
            'vdc_name',
            'vdc_address',
            'vdc_phone',
            'logo',
            'favicon',
            'vdc_logo',
            'facebook_link',
            'twitter_link',
            'youtube_link',
            'history',
            'welcome_message',
            'about',
            'adhyaksh_name',
            'adhyaksh_image',
            'adhyaksh_message',
            'principal_name',
            'principal_image',
            'principal_message',
            'total_student',
            'total_teachers',
            'total_administrations',
            'male_student',
            'female_student',
            'dalit_student',
            'disable_student'
        );

        foreach ($inputs as $inputKey => $inputValue) {
            if ($inputKey == 'logo' || $inputKey == 'favicon' || $inputKey == 'vdc_logo' || $inputKey == 'principal_image' || $inputKey == 'adhyaksh_image') {
                $file = $inputValue;
                // Delete old file
                $this->deleteImage($inputKey);
                // Upload file & get store file name
                $fileName = imageUpload($file,'images/about/');;
                $inputValue = $fileName;
            }
            About::updateOrCreate(['key' => $inputKey], ['value' => $inputValue, 'school_id' => 1]);
        }

        return redirect()->back()->with('success', 'Successfully updated!!');

    }


    public function deleteImage($inputKey){

        $about = About::where('key', '=', $inputKey)->first();

        if(isset($about->value)){
        $file_path = public_path().'/'.$about->value;
        $thumbnail_path = public_path().'/thumbnail/'.$about->value;
            if(file_exists($file_path)){
            unlink($file_path);
            }
            if(file_exists($thumbnail_path)){
                unlink($thumbnail_path);
            }
        }
    }

    public function bannerUpdate(Request $request){
        
        
        
        
        $inputKeys = ['bannerImage', 'contactImage'];
        
        foreach($inputKeys as $inputKey){
            
            if ($request->hasFile($inputKey)){
            $this->deleteImage($inputKey);

            $file = $request->file($inputKey);
            $time = time();
            $path = 'admin/banner/';

            $db_path = $path.$time.$file->getClientOriginalName();
            $ImageUpload = \Image::make($file);
            $originalPath = public_path('admin/banner/');

            if(!\File::isDirectory($originalPath)){
                \File::makeDirectory($originalPath, 0777, true, true);
            }

            $ImageUpload->save($originalPath.$time.$file->getClientOriginalName());

            About::updateOrCreate(['key' => $inputKey], ['value' => $db_path, 'school_id' => 1]);
            

        }
        }
        
        return redirect()->back()->with('success','Banner Image Changed');
        
    }

}
