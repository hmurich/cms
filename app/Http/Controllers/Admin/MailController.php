<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Model\MailSend;
use App\Model\SiteSetting;

class MailController extends Controller{
    function getIndex (Request $request){
        $ar = array();
        $ar['title'] = 'Входящие сообщения';
        $ar['items'] = MailSend::orderBy('id', 'desc')->paginate(24);

        /*
        $to_email = SiteSetting::getNameByKey('main_email');
        MailSend::send($to_email, 'Title', 'Note', 'Administrator');
        */

        return view('admin.mail.index', $ar);
    }

}
