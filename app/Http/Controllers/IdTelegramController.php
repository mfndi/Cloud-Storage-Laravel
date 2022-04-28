<?php

namespace App\Http\Controllers;

use App\Models\IdTelegram;
use Illuminate\Http\Request;

class IdTelegramController extends Controller
{

    public function index()
    {
        return view('dashboard.idchat', [
            'idtele' => IdTelegram::all()
        ]);
    }
    
    public function setChatId()
    {
        

        $count = IdTelegram::count();
        if($count > 0){
            return redirect('/dashboard/chat-id')->with('status', 'Maksimal hanya boleh menyimpan 1 ID :)');
        }

        $random = bin2hex(random_bytes(3));
        
        IdTelegram::create([
            'reg_code' => $random
        ]);

        return redirect('/dashboard/chat-id')->with('code', $random);
    }

    public function destroy(IdTelegram $idtelegram)
    {
        
        IdTelegram::where('reg_code',$idtelegram->reg_code)->delete();
        return redirect('/dashboard/chat-id')->with('success', 'Berhasil Menghapus, anda dapat menambahkan kembali dengan cara klik tombol generate');
    }
}
