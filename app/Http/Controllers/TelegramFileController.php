<?php

namespace App\Http\Controllers;

use Telegram;
//use Telegram\Bot\Laravel\Facades\Telegram;
use App\Models\User;
use GuzzleHttp\Client;
use App\Models\IdTelegram;
use Illuminate\Support\Str;
use App\Models\TelegramFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Telegram\Bot\FileUpload\InputFile;
use Illuminate\Support\Facades\Response;
// use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
//use Symfony\Component\HttpFoundation\Response;

class TelegramFileController extends Controller
{


    // {{-- 
    //     ############################
    //     #Jangan Hilangkan Copyright :) 
    //     #Author : Efendi (Fecore)
    //     ############################
    // --}}

    public function storeUpload(Request $request)
    {
        $idTelegram = IdTelegram::all();

            foreach($idTelegram as $id){
                $chat_id = $id['chat_id'];
            }

     //ddd($request->file('file'));
        $validate = $request->validate([
            'caption' => ['required','max:255'],
            'file' => ['required']
        ]);
        //Str::random(2) . '.' . $photo->getClientOriginalExtension()
        $file = $request->file('file');
        $updates = Telegram::sendDocument([
            'chat_id' => $chat_id,
            'document' => InputFile::createFromContents(\file_get_contents($file->getRealPath()),$file->getClientOriginalName()),
            'caption' =>  $request->caption,
        ]);

    
        $document = $updates->getDocument();
        $audio = $updates->getAudio();
        $video = $updates->getVideo();

        if(isset($document)){
            $file_name = $document->getFileName();
            $mimeType = $document->getMimeType();
                $split = explode('/', $mimeType);
            $typeFile = $split[0];
            $file_id = $document->getFileId();
            $file_unique_id = $document->getFileUniqueId();
            $file_size = $document->getFileSize();
            $date = $updates->getDate();
                }elseif(isset($audio)){
                    $file_name = $audio->getFileName();
                    $mimeType = $audio->getMimeType();
                        $split = explode('/', $mimeType);
                    $typeFile = $split[0];
                    $file_id = $audio->getFileId();
                    $file_unique_id = $audio->getFileUniqueId();
                    $file_size = $audio->getFileSize();
                    $date = $updates->getDate();
                }elseif(isset($video)){
                        $file_name = $video->getFileName();
                        $mimeType = $video->getMimeType();
                            $split = explode('/', $mimeType);
                        $typeFile = $split[0];
                        $file_id = $video->getFileId();
                        $file_unique_id = $video->getFileUniqueId();
                        $file_size = $video->getFileSize();
                        $date = $updates->getDate();
                    }else{
                        return redirect('/dashboard/file-manager/upload')->with('status', 'Gagal Upload');
                    }
        
        $randomCode = bin2hex(random_bytes(5));
        TelegramFile::create([
            'file_name' => $file_name,
            'caption' => $validate['caption'],
            'type_file' => $typeFile,
            'file_id' => $file_id,
            'file_unique_id' => $file_unique_id,
            'file_size' => $file_size,
            'random_code_file' => $randomCode,
            'date' => $date
        ]);

        return redirect('/dashboard/file-manager/upload')->with('status', 'Berhasil Upload');
        
    }



    public function storeUploadApk()
    {

        // $id = IdTelegram::where('chat_id', "5244531375")->count();
        // if($id > 0){
        //     ddd("sudah ada id");
        // }//cek id nya bener apa ngga

        $updates = Telegram::commandsHandler(true);
        $chat_id = trim($updates->getChat()->getId());
        $caption = $updates->getMessage()->getCaption();
        $document = $updates->getMessage()->getDocument();
        $audio = $updates->getMessage()->getAudio();
        $video = $updates->getMessage()->getVideo();
        $message = $updates->getMessage()->getText();
        $username = $updates->getChat()->getUsername();
        $date = $updates->getMessage()->getDate();

        $id = IdTelegram::where('chat_id', $chat_id)->count();
            
        //untuk registrasi chat id
            if(strpos($message, "/id") === 0){ 
                $tokenId = explode(" ", $message);
              $ressIdTelegram = IdTelegram::where('reg_code', $tokenId[1])
                ->update([
                    'chat_id' => $chat_id,
                    'username' => $username
                ]);
                    if($ressIdTelegram){
                        return  Telegram::sendMessage([
                        'chat_id' => $chat_id,
                        'text' => "Berhasil Simpan CHAT ID"
                        ]);
                    }else{
                        return  Telegram::sendMessage([
                            'chat_id' => $chat_id,
                            'text' => "Gagal, Kemungkinan Kode Atau Perintah Registrasi Salah"
                            ]);
                    }
            }
            //end registrasi id

            if($id > 0){//cek apakah chat id nya udah kedaftar apa belum

                //lupa password / ganti password
                if(strpos($message, "/passwd") === 0){
                    $split_1 = explode(" ", $message);
                    $email = $split_1[1];
                    $password_baru = Hash::make($split_1[2]);
                        if(strlen($split_1[2]) < 6){
                            return  Telegram::sendMessage([
                                'chat_id' => $chat_id,
                                'text' => "Password Minimal 6 Huruf"
                            ]); 
                            return false;
                        }
                    $cekEmail =  User::where('email', $email)->count();
                        if($cekEmail > 0){
                            User::where('email', $email)->update([
                                'password' => $password_baru
                            ]);
                            return  Telegram::sendMessage([
                                'chat_id' => $chat_id,
                                'text' => "Password Berhasil Di Ganti"
                            ]); 
                            return false;

                        }else{
                            return  Telegram::sendMessage([
                                'chat_id' => $chat_id,
                                'text' => "Email Tidak Terdaftar!"
                            ]); 
                            return false;
                        }
                }
                ////End lupa password / ganti password


                //upload file via aplikasi telegram lalu auto simpan ke database
                if(isset($caption)){//cek captionnya
                    if(isset($document)){//cek type file
                        $file_name = $document->getFileName();
                        $mimeType = $document->getMimeType();
                        $split = explode('/', $mimeType);
                        $typeFile = $split[0];
                        $file_id = $document->getFileId();
                        $file_unique_id = $document->getFileUniqueId();
                        $file_size = $document->getFileSize();
                             }
                            elseif(isset($audio)){
                                $file_name = $audio->getFileName();
                                $mimeType = $audio->getMimeType();
                                    $split = explode('/', $mimeType);
                                $typeFile = $split[0];
                                $file_id = $audio->getFileId();
                                $file_unique_id = $audio->getFileUniqueId();
                                $file_size = $audio->getFileSize();
                                        }elseif(isset($video)){
                                                $file_name = $video->getFileName();
                                                $mimeType = $video->getMimeType();
                                                    $split = explode('/', $mimeType);
                                                $typeFile = $split[0];
                                                $file_id = $video->getFileId();
                                                $file_unique_id = $video->getFileUniqueId();
                                                $file_size = $video->getFileSize();
                                            }
                                            else{
                                                return  Telegram::sendMessage([
                                                    'chat_id' => $chat_id,
                                                    'text' => "Ada Kesalahan, File tidak tersimpan"
                                                ]);   
                                            }//end cek type file

                                     TelegramFile::create([
                                    'file_name' => $file_name,
                                    'caption' => $caption,
                                    'type_file' => $typeFile,
                                    'file_id' => $file_id,
                                    'file_unique_id' => $file_unique_id,
                                    'file_size' => $file_size,
                                    'date' => $date
                                 ]);
                                 return  Telegram::sendMessage([
                                    'chat_id' => $chat_id,
                                    'text' => "Berhasil Upload"
                                ]);  ////end upload file via aplikasi telegram lalu auto simpan ke database


                }else{
                    return  Telegram::sendMessage([
                        'chat_id' => $chat_id,
                        'text' => "Caption/Note Wajib Di Isi ya! "
                    ]);   
                }

           }else{
            return  Telegram::sendMessage([
                'chat_id' => $chat_id,
                'text' => "Sistem Tidak Mengenal Anda!"
            ]);   
           }//cek apakah chat id nya udah kedaftar apa belum
           
    }


    public function downloadFile(TelegramFIle $telegramfile)
    {
        $response = Telegram::getFile([
            'file_id' => $telegramfile->file_id
        ]);
        
        $client = new Client(['base_uri' => 'https://api.telegram.org']);
        $response = $client->request('GET', '/file/bot'.env('TELEGRAM_BOT_TOKEN').'/'.$response->getFilePath());
        return $response;
    }  
   
}

