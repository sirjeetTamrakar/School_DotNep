<?php

namespace App\Http\Controllers\front;

use App\Model\Event;
use App\Model\News;
use App\Model\Tender;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TenderController extends Controller
{
    public function tender(){
        $context = new Collection();
        $context->tenders = Tender::where('school_id',1)->where('status',1)->orderBy('created_at','desc')->get();
        $context->recent_news = News::where('school_id',1)->where('status',1)->orderBy('created_at','desc')->get()->take(5);
        $context->recent_events = Event::where('school_id',1)->where('status',1)->orderBy('created_at','desc')->get()->take(5);
        return view('front.content.tender',compact('context'));
    }
    public function singleTender($id,$date){
        $context = new Collection();
        $context->recent_tenders = Tender::where('school_id',1)->where('status',1)->where('id','!=',$id)->orderBy('created_at','desc')->get()->take(5);
        $tender = Tender::findOrFail($id);
        return view('front.content.single-tender',compact('tender', 'context'));
    }
}
