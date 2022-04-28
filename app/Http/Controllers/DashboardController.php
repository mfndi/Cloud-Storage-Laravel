<?php

namespace App\Http\Controllers;

use Telegram;
use App\Models\User;
use App\Models\TelegramFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//Mengatur View yang ada di Dashboard
class DashboardController extends Controller
{
    public function index(){
       $AudioImageVideo = TelegramFile::whereIn('type_file', ['image', 'audio', 'video'])->count();
       $OtherDoc = TelegramFile::orderBy('type_file')->count();
       $countOtherDoc = $OtherDoc - $AudioImageVideo ;
        // ddd($countOtherDoc);

        return view('dashboard.index',[
            'audio' => TelegramFile::where('type_file', 'audio')->count(),
            'image' => TelegramFile::where('type_file', 'image')->count(),
            'video' => TelegramFile::where('type_file', 'video')->count(),
            'allDoc' => $countOtherDoc
        ]);
    }


    public function users()
    {
        return view('dashboard.users', [
            'users' => User::all()
        ]);
    }

    public function storeUser(Request $request)
    {   
        //ddd($request);
            if($request->password != $request->password_confirm){
                return redirect('/dashboard/users')->with('error', 'Password tidak sama');
            }


        $validate = $request->validate([
            'name' => ['required', 'min:3' ,'max:255'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:6', 'max:255'],
            'ran_code' => ['required','max:255']
        ]);

        $validate['password'] = Hash::make($validate['password']);
        User::create($validate);
        return redirect('/dashboard/users')->with('success', 'Berhasil Membuat User');

    } 

    public function destroyUser(User $users)
    {
        User::where('email',$users->email)->delete();
        return redirect('/dashboard/users');
    }

    public function viewSetWebhook()
    {
        return view('dashboard.Webhook');
    }

    public function setWebhook()
    {
        $response = Telegram::setWebhook(['url' => env('TELEGRAM_WEBHOOK_URL')]);
        if($response){
            return redirect('/dashboard/Webhook')->with('success', 'Berhasil Terhubung WebHook');
        }else{
            return redirect('/dashboard/Webhook')->with('error', 'Pastikan Token Bot Sudah Di Simpan');
        }
    }

    public function fileManager(Request $request)
    {
      
        return view('dashboard.filemanager', [
            'telegramfiles' => TelegramFile::latest()->filter()->paginate(20)->withQueryString()
        ]);
    }

    public function viewDetailFile(TelegramFile $telegramfile)
    {
        return view('dashboard.detailFile', [
            'telegramfile' => $telegramfile
        ]);
            //ddd($telegramfile);
    }

    public function viewUpload()
    {
        return view('dashboard.upload');
    }

    public function fileDestroy(Telegramfile $telegramfile)
    {
        
        Telegramfile::where('random_code_file',$telegramfile->random_code_file)->delete();
        return redirect('/dashboard/file-manager');
    }
}
