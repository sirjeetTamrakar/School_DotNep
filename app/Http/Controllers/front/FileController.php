<?php

namespace App\Http\Controllers\front;

use App\Model\Download;
use App\Model\Event;
use App\Model\Exam;
use App\Model\News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    public function result($year){
        $exams = Exam::whereYear('start_date',$year)->get();
        return view('front.result',compact('exams'));
    }

    public function download(){
        $context = new Collection();
        $context->downloads = Download::where('status',1)->orderBy('created_at','desc')->get();
        $context->recent_news = News::where('school_id',1)->where('status',1)->orderBy('created_at','desc')->get()->take(5);
        $context->recent_events = Event::where('school_id',1)->where('status',1)->orderBy('created_at','desc')->get()->take(5);
        return view('front.content.download',compact('context'));
    }

    public function singleDownload($id, $date){
        $context = new Collection();
        $context->recent_downloads = Download::where('status',1)->where('id','!=',$id)->orderBy('created_at','desc')->get()->take(5);
        $download = Download::findOrFail($id);
        return view('front.content.single-download',compact('download','context'));
    }
}
