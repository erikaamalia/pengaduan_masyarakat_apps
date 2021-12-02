<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use App\Conversations\ExampleConversation;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('iya|ya|y', function (BotMan $bot) {
            $user = $bot->getUser();
            $bot->startConversation(new ExampleConversation());
        })->stopsConversation();

        $botman->hears('topik|Topik', function (BotMan $bot) {
            $bot->startConversation(new ExampleConversation());
        })->stopsConversation();

        $botman->hears('About|about|Tentang|tentang', function (BotMan $bot) {
            $bot->reply('Chatbot ini digunakan untuk memberikan informasi kepada pengguna tentang bagaimana menggunakan aplikasi ini.
            Apabila ada yang belum bisa dijawab oleh chatbot silahkan hubungi petugas dengan email hosnolarifin220@gmail.com atau WA 085346993155');
        })->stopsConversation();

        $botman->fallback(function(BotMan $bot) {
            $bot->reply('Mohon maaf, perintah ini tidak dikenali. Silahkan hubungi admin dengan email hosnolarifin87@gmail.com atau WA 085346993155 untuk mengetahui pertanyaan Anda. Terimaksih');
        });

        $botman->listen();
    }

}
