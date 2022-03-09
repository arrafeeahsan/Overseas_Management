<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SliderImage;
use App\Models\Client;
use App\Models\Visa;
use App\Models\VisaNews;

class IndexController extends Controller
{
    public function index(){
        $enableImages = SliderImage::get()->where('image_status', '=', 'enable');
        $clients = Client::all();
        $visainprogress = Visa::get()->where('visa_status', '=', 'Visa in progress');
        $hasgone = Visa::get()->where('visa_status', '=', 'Has gone');
        $stamplingdone = Visa::get()->where('visa_status', '=', 'Visa stampling done');
        $enableNews = VisaNews::get()->where('news_status', '=', 'Enable');
       
        return view('welcome-index', ['sliders' => $enableImages, 'clients' => $clients, 'visainprogress' => $visainprogress, 'hasgone' => $hasgone, 'stamplingdone' => $stamplingdone, 'tickers' => $enableNews ]);

    }

    public function visaProcess(){
        $enableImages = SliderImage::get()->where('image_status', '=', 'enable');


        return view('visa-process', ['sliders' => $enableImages]);
    }

    public function visaDocuments(){
        $enableImages = SliderImage::get()->where('image_status', '=', 'enable');


        return view('visa-documents', ['sliders' => $enableImages]);
    }

    public function visaWorkers(){
        $enableImages = SliderImage::get()->where('image_status', '=', 'enable');


        return view('visa-workers', ['sliders' => $enableImages]);
    }

    public function newsDetails($id){
        $enableImages = SliderImage::get()->where('image_status', '=', 'enable');
        $data = VisaNews::find($id);
        
        return view('/news-details', ['sliders' => $enableImages, 'details' => $data]);
    }


}
