<?php

namespace App\Http\Controllers\front;

use App\Model\Contact;
use App\Model\About;
use App\Model\Album;
use App\Model\Asset;
use App\Model\AssetCategory;
use App\Model\AssetImage;
use App\Model\Event;
use App\Model\Gallery;
use App\Model\News;
use App\Model\Notice;
use App\Model\Scholarship;
use App\Model\Slider;
use App\Model\Staff;
use App\Model\Tender;
use App\Model\Testimonial;
use App\Course;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Popup;

class IndexController extends Controller
{
    public function home(){
        $school_id = 1;
        $context = new Collection();

        $context->slider_notices = Notice::where('school_id',$school_id)->where('status',1)->orderBy('created_at','desc')->get(['id','title','created_at'])->take(6);
        $context->block_notices = $context->slider_notices->take(3);
        $context->tenders = Tender::where('school_id',$school_id)->where('status',1)->orderBy('created_at','desc')->get(['id','title','created_at'])->take(3);
        $context->news = News::where('school_id',$school_id)->where('status',1)->orderBy('created_at','desc')->get(['id','title','created_at'])->take(3);
        $context->events = Event::where('school_id',$school_id)->where('status',1)->orderBy('created_at','desc')->get(['id','title','created_at'])->take(3);
        $context->sliders = Slider::where('status',$school_id)->where('school_id',1)->get();
        $context->scholarships = Scholarship::where('school_id',$school_id)->where('status',1)->orderBy('created_at','desc')->get(['id','title','created_at']);
        $context->testimonials = Testimonial::where('school_id',$school_id)->where('status',1)->orderBy('created_at','desc')->get()->take(5);

//        $assetCategories = AssetCategory::where('school_id',$school_id)->get(['id','title']);
//        foreach ($assetCategories as $category){
//            $image = null;
//            if($category->assets){
//                $ids = $category->assets->pluck('id')->toArray();
//                $image = AssetImage::whereIn('asset_id',$ids)->inRandomOrder()->first();
//            }
//            $category->preview_image = $image? 'thumbnail/'.$image->image : null;
//        }
//        $context->asset_categories = $assetCategories;
        $context->staffs = Staff::inRandomOrder()->get()->take(6);
        $albums = Album::where('school_id',1)->get();
        $popups = Popup::where('status','active')->get();
        return view('front.index',compact('context', 'albums','popups'));
    }

    public function contact(){
        return view('front.contact');
    }

    public function courses($slug){
        $course = Course::where('slug',$slug)->first();
        $allcourses = Course::where('id','!=',$course->id)->get();
        return view('front.courses',compact('course','allcourses'));
    }


    public function contactStore(Request $request){


        $contact = new Contact();
        $contact->name = $request['name'];
        $contact->email = $request['email'];
        $contact->subject = $request['subject'];
        $contact->phone = $request['phone'];
        $contact->message = $request['message'];
        $success = $contact->save();

        if($success){

            return response()->json([
                'status' => 'success',
            ], 201);
        }else{
            return response()->json([
                'status' => 'error',
            ], 201);
        }
    }


    public function gallery(){
        $albums = Album::where('school_id',1)->get();
        return view('front.gallery',compact('albums'));
    }

    public function singleAlbum($slug){
        $album = Album::where('slug',$slug)->first();
        $galleries = isset($album->gallerys) ? $album->gallerys : [];
        return view('front.gallery-single',compact('galleries','album'));
    }

    public function about(){
        return view('front.about');
    }

    public function mission_vision(){
        return view('front.school.mission-vision');
    }
    public function principal_note(){
        return view('front.school.principal-note');
    }

    public function asset_category($id, $date){
        $asset_category = AssetCategory::findOrFail($id);
        $assets = $asset_category->assets;
        $images = [];
        foreach ($assets as $asset){
            if(isset($asset->assetImages)){
                foreach ($asset->assetImages as $img) {
                    if (file_exists(public_path() . '/' . $img->image)) {
                        $images[] = $img->image;
                    }
                }
            }
        }
        return view('front.school.asset-single', compact('assets','asset_category','images'));
    }

    public function calendar(){
        return view('front.calendar');
    }

    public function frontLanguage(Request $request){
        $language= $request->language;
        Session::put('front_lang_session', $language);

        return redirect()->back();
    }

}
