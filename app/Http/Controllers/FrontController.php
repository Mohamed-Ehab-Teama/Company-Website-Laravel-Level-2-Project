<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\StoreSubscriberRequest;
use App\Models\Message;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //

    public function index()
    {
        return view('front.index' ,get_defined_vars() );
    }


    public function about()
    {
        return view('front.about' ,get_defined_vars() );
    }


    public function contact()
    {
        return view('front.contact' ,get_defined_vars() );
    }

    
    public function services()
    {
        return view('front.services' ,get_defined_vars() );
    }

    public function subscriberStore( StoreSubscriberRequest $request )
    {
        $data = $request->validated();
        Subscriber::create($data);
        return back()->with('success', " Subscribed Successfully ");
    }
    
    
    public function contactStore( StoreMessageRequest $request )
    {
        $data = $request->validated();
        Message::create($data);
        return back()->with('success', " Message Sent Successfully ");
    }

}
