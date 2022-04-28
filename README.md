## Tentang Aplikasi

Aplikasi penyimpanan awan (Cloud Storage) yang dibuat menggunakan framework laravel dan menggunakan bot telegram yang berfungsi sebagai media penyimpanan. 
Pengguna dapat menyimpan file dengan batasan 2GB Per-File tanpa ada batasan (Unlimited). Aplikasi ini dibuat untuk digunakan secara gratis.

<li>Support Hosting berbayar dan Hosting gratis.</li>
<li>Tidak perlu memiliki space besar pada hosting.</li>


## Cara Install
<li>Buat channel bot. Lihat tutorial buat bot nya [shorturl.at/fpwV3] Lihat tutorial bagian ke-2. Atau bisa lihat di google</li>
<li>Clone Repository nya <pre>https://github.com/mfndi/Cloud-Storage-Laravel.git</pre>
<li>Ubah file .env.example menjadi .env</li>
<li>Konfigurasi DB kalian
<pre>DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=NAMA_DATABASE
DB_USERNAME=USERNAME_DATABASE
DB_PASSWORD=PASSWORD_DATABASE
</pre>
    Setelah itu jalankan perintah <pre>php artisan migrate:fresh</pre>
    </li>
<li>Bisa juga kalian meng-import database yang sudah saya sediakan pada repositori</li>
<li>Buka file .env kembali setelah itu edit pada bagian 
    <pre>TELEGRAM_BOT_TOKEN=YOUR_TOKEN
TELEGRAM_WEBHOOK_URL=YOUR_URL/api/fecore/webhook
</pre>
 Copy token bot yang sudah anda dapatkan (lihat tutorial yang pertama) dan url website wejib https</li>
<li>Jika semua sudah selesai maka sekarang anda dapat login dengan <pre>Email: fecore@fecore.my.id Password: fecore123</pre>
    (dapat login dengan Email dan Password tersebut jika anda sudah meng-import database yang sudah di sediakan di repositori</li>

<li>Jika sudah login, maka pada dashboard buka menu setting lalu klik Webhook setelah itu check status webhook anda. Jika status sudah sukses maka 
    buka menu setting lagi lalu pilih ID Chat Telegram setelah itu ikuti intruksi untuk medaftarkan Akun Telegram anda</li>
<li>Selesai</li>
