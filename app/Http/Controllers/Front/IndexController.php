<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Model\SiteSetting;
use App\Model\MailSend;

use App;

use App\Model\Gen\Portfolio;
use App\Model\Gen\About;
use App\Model\Gen\Sale;
use App\Model\Gen\Contact;
use App\Model\Gen\Service;


class IndexController extends Controller{
    function getIndex (Request $request, $locale = 'ru'){
        if ($request->has('lang') && !in_array($request->get('lang'), ['ru', 'kz']))
            abort(404);

        if ($request->get('lang') == 'kz')
            $locale = 'kz';

        App::setLocale($locale);
        $contact = Contact::first();

        $ar = array();
        $ar['lang'] = $locale;
        $ar['title'] = 'RUX.kz';
        $ar['site_setting'] = new SiteSetting();
        $ar['ports'] = Portfolio::get();
        $ar['about'] = About::first();
        $ar['sales'] = Sale::orderBy('id', 'desc')->get();
        $ar['services'] = Service::orderBy('id', 'asc')->with('relImg')->get();

        $ar['contact'] = $contact;
        $ar['ar_coor'] = (array)json_decode($contact->coor_json	, true);

        return view('front.index', $ar);
    }


    function postIndex(Request $request){
        $to_email = SiteSetting::getNameByKey('main_email');

        $text = '';
        $text .= '<p><strong>Имя:</strong>'.$request->name.'</p>';
        $text .= '<p><strong>Телефон:</strong>'.$request->phone.'</p>';

        MailSend::send($to_email, 'Новое сообщение от сайта', $text, 'Administrator');

        return redirect()->back()->with('success', 'Ваше письмо успешно принято');
    }
}
