<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use PDO;

class ExampleConversation extends Conversation
{

    public function pertanyaan()
    {
        $question = Question::create("Silahkan pilih topik yang ingin Anda tanyakan.")
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Bagaimana cara mengajukan aduan pada website?')->value('aduan'),
                Button::create('Bagaimana cara mengetahui apakah aduan kita diproses atau tidak?')->value('proses aduan'),
                Button::create('Apakah bisa membatalkan laporan/aduan yang telah kita buat?')->value('batal laporan'),
                Button::create('Bagaimana cara agar aduan cepat terverifikasi?')->value('verifikasi'),
                Button::create('Apakah setiap pengaduan masyarakat yang diterima oleh pengelola pengaduan sudah ditindaklanjuti dengan baik?')->value('tindak lanjut'),
                Button::create('Bagaimana cara login/masuk ke dalam website pengaduan?')->value('login'),
                Button::create('Bagaimana cara mendaftar akun baru pada website pengaduan?')->value('daftar'),
                Button::create('Bagaimana cara mengatasi jika lupa password?')->value('lupa password'),
                // Button::create('')->value(''),
                // Button::create('')->value(''),

            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                    case 'aduan':
                        $this->jawabanNya('Bagaimana cara mengajukan aduan pada website?');
                        break;
                    case 'proses aduan':
                        $this->jawabanNya('Bagaimana cara mengetahui apakah aduan kita diproses atau tidak?');
                        break;
                    case 'batal laporan':
                        $this->jawabanNya('Apakah bisa membatalkan laporan/aduan yang telah kita buat?');
                        break;
                    case 'lupa password':
                        $this->jawabanNya('Bagaimana cara mengatasi jika lupa password?');
                        break;
                    case 'login':
                        $this->jawabanNya('Bagaimana cara login/masuk ke dalam website pengaduan?');
                        break;
                    case 'daftar':
                        $this->jawabanNya('Bagaimana cara mendaftar akun baru pada website pengaduan?');
                        break;
                    case 'verifikasi':
                        $this->jawabanNya('Bagaimana cara agar aduan cepat terverifikasi?');
                        break;
                    case 'tindak lanjut':
                        $this->jawabanNya('Apakah setiap pengaduan masyarakat yang diterima oleh pengelola pengaduan sudah ditindaklanjuti dengan baik?');
                        break;
                    case '':
                        $this->jawabanNya('');
                        break;
                    case '':
                        $this->jawabanNya('');
                        break;
                    default:
                        # code...
                       break;
                }

            }
        });
    }

    public function jawabanNya($pertanyaan)
    {
        $ucapan ="Untuk melihat topik yang lain silahkan ketik 'topik' pada colom chat. Terimaksih, semoga membantu.";
        if ($pertanyaan == 'Bagaimana cara mengajukan aduan pada website?'){
            $jawaban = sprintf("Untuk mengajukan aduan
            1. Anda harus sudah mempunyai akun, lalu lakukan login/masuk. Namun jika belum mempunyai akun, silahkan mendaftar dahulu.
            2. Apabila sudah berhasil login/masuk, anda akan langsung diarahkan ke menu laporan.
            3. Silahkan isi form untuk aduan yang ingin anda inginkan.
            4. Pastikan aduan yang Anda ajukan itu valid.");
            $this->say($jawaban);
            $this->say($ucapan);
        }

        else if ($pertanyaan == 'Bagaimana cara mengetahui apakah aduan kita diproses atau tidak?'){
            $jawaban = sprintf("Cara mengetahui apakah aduan kita diproses atau tidak yaitu:
            1. Anda harus sudah terdaftar dan melakukan aduan melalui sistem ini.
            2. Silahkan login/masuk, kemudian pada menu navbar pilih 'Pengaduan'.
            3. Pada menu Pengaduan tersebut akan muncul status aduan yang sebelumnya telah diajukan.");
            $this->say($jawaban);
            $this->say($ucapan);
        }

        else if ($pertanyaan == 'Apakah bisa membatalkan laporan/aduan yang telah kita buat?'){
            $jawaban = sprintf("Untuk pembatalan laporan atau aduan tidak dapat dilakukan pada website Pengaduan Masyarakat.
            Jadi harap mengisi dengan benar laporan/aduan Anda sebelum di submit/dikirimkan.");
            $this->say($jawaban);
            $this->say($ucapan);
        }

        else if ($pertanyaan == 'Bagaimana cara mengatasi jika lupa password?'){
            $jawaban = sprintf("Cara mengatasi jika lupa password yaitu:
            1. Silahkan anda klik tombol masuk pada pojok kanan atas.
            2. Pada form login/masuk klik dibawah form 'Lupa kata sandi Anda'.
            3. Maka Anda akan diarahkan ke form lupa password.
            4. Masukkan email yang Anda daftarkan pada website kedalam form.
            5. Tunggu email konfirmasi perubahan password Anda yang akan di kirimkan ke alamat email Anda.");
            $this->say($jawaban);
            $this->say($ucapan);
        }

        elseif($pertanyaan == 'Bagaimana cara login/masuk ke dalam website pengaduan?'){
            $jawaban = sprintf("Cara login/masuk ke dalam website pengaduan yaitu:
            1. Pastikan anda sudah terdaftar dalam website.Jika belum terdaftar harap klik tombol daftar terlebih dahulu, lalu isi form yang ada dengan benar.
            2. Jika anda sudah terdaftar, silahkan klik tombol masuk/laporkan! maka anda akan diarahkan di halaman login.
            3. Silahkan masukkan email dan password/kata sandi anda untuk masuk.");
            $this->say($jawaban);
            $this->say($ucapan);
        }

        elseif($pertanyaan == 'Bagaimana cara mendaftar akun baru pada website pengaduan?'){
            $jawaban = sprintf("Cara mendaftar akun baru pada website pengaduan yaitu:
            1. Untuk mendaftarkan pengguna baru anda klik daftar pada homepage.
            2. Maka akan ditampilkan halaman untuk mendaftar, isilah form pada halaman daftar dengan benar.
            3. Jika semua form sudah terisi, silahkan klik register pastikan terjadi error.
            4. Apabila berhasil mendaftar, anda akan diarahkan ke halaman dashboard.");
            $this->say($jawaban);
            $this->say($ucapan);
        }

        elseif($pertanyaan == 'Bagaimana cara agar aduan cepat terverifikasi?'){
            $jawaban = sprintf("Cara agar aduan cepat terverifikasi yaitu:
            1. Anda harus melaporkan aduan anda dengan detail pada form isian.
            2. Jika aduan yang anda ajukan tergolong ringan maka proses verifikasi akan lebih cepat.
            3. Banyaknya laporan aduan, jika terdapat banyak aduan maka proses verifikasi aduan akan memakan waktu yang lama.");
            $this->say($jawaban);
            $this->say($ucapan);
        }

        elseif($pertanyaan == 'Apakah setiap pengaduan masyarakat yang diterima oleh pengelola pengaduan sudah ditindaklanjuti dengan baik?'){
            $jawaban = sprintf("Setiap pengaduan masyarakat yang diterima oleh pengelola pengaduan akan ditindak lanjuti sesuai dengan laporan dari
            masyarakat. Namun jika aduan yang diajukan tersebut tergolong berat maka butuh waktu dalam prosesnya. Sebaliknya jika aduannya tergolong
            ringan maka prosesnya akan lebih cepat dalam mewujudkannya.");
            $this->say($jawaban);
            $this->say($ucapan);
        }

        // elseif($pertanyaan == ''){
        //     $jawaban = sprintf("");
        //     $this->say($jawaban);
        //     $this->say($ucapan);
        // }

        // elseif($pertanyaan == ''){
        //     $jawaban = sprintf("");
        //     $this->say($jawaban);
        //     $this->say($ucapan);
        // }
    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->pertanyaan();
    }
}
