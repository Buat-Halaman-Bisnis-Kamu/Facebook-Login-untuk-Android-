## Facebook Login untuk Android

# Tutorial Singkat

Dengan SDK Facebook untuk Android, orang dapat masuk ke aplikasi Anda dengan Facebook Login. Saat orang masuk ke aplikasi Anda dengan Facebook, mereka dapat memberi izin ke aplikasi Anda sehingga Anda dapat mengambil informasi atau melakukan tindakan di Facebook atas nama mereka.

Untuk contoh proyek yang menunjukkan cara mengintegrasikan Facebook Login ke aplikasi Android, lihat FBLoginSample di GitHub.

Ikuti langkah-langkah di bawah untuk menambahkan Facebook Login ke aplikasi Anda.

1. Pilih Aplikasi atau Buat Aplikasi yang Baru
Pilih aplikasi atau buat aplikasi baru untuk memasukkan info tentang aplikasi Anda ke snippet kode berikut ini.
Cari aplikasi Anda
atauBuat Aplikasi Baru

2. Unduh Aplikasi Facebook
Unduh aplikasi Facebook dengan mengeklik tombol di bawah ini.
Unduh Facebook untuk Android

3. Mengintegrasikan SDK Facebook
SDK Facebook Login untuk Android merupakan komponen SDK Facebook untuk Android. Untuk menggunakan SDK Facebook Login di proyek Anda, jadikan SDK Facebook Login dependensi di Maven, atau unduh. Pilih metode yang Anda inginkan dengan tombol berikut.
SDK: MAVEN
Menggunakan Maven
Di proyek Anda, buka your_app > Gradle Scripts > build.gradle (Project) pastikan repositori berikut tercantum di buildscript { repositories {}}:
jcenter() Salin Kode
Dalam proyek Anda, buka your_app > Gradle Scripts > build.gradle (Module: app) dan tambahkan pernyataan penerapan berikut ini ke bagian dependencies{} untuk membuat dependensi ke versi terbaru dari SDK Facebook Login:
 implementation 'com.facebook.android:facebook-login:[5,6)'Salin Kode
Buat proyek Anda.
Saat Anda menggunakan SDK Facebook Login, acara dalam aplikasi Anda secara otomatis dicatat dan dikumpulkan untuk Facebook Analytics kecuali Anda menonaktifkan pencatatan acara otomatis. Untuk detail mengenai informasi apa yang dikumpulkan dan cara menonaktifkan pembuatan log peristiwa otomatis, lihat Pencatatan Log Peristiwa Aplikasi Otomatis.
4. Edit Sumber Daya dan Manifest Anda
Jika Anda menggunakan 5.15 atau versi lebih baru SDK Facebook untuk Android, Anda tidak perlu menambahkan aktivitas atau filter intent untuk Tab Khusus Chrome. Fungsionalitas ini disertakan dalam SDK.

Buat string untuk ID aplikasi Facebook Anda dan untuk aplikasi yang harus mengaktifkan Tab Khusus Chrome. Selain itu, tambahkan FacebookActivity ke manifest Android Anda.
Buka file /app/res/values/strings.xml Anda.
Tambahkan elemen berikut:
<string name="facebook_app_id">572531576767979</string> <string name="fb_login_protocol_scheme">fb572531576767979</string>Salin Kode
Buka file /app/manifest/AndroidManifest.xml Anda.
Tambahkan elemen uses-permission berikut setelah elemen application:
  <uses-permission android:name="android.permission.INTERNET"/>Salin Kode
Tambahkan elemen meta-data berikut, sebuah aktivitas untuk Facebook, dan sebuah aktivitas serta filter intent untuk Tab Khusus Chrome di dalam elemen application Anda.
<meta-data android:name="com.facebook.sdk.ApplicationId" android:value="@string/facebook_app_id"/> <activity android:name="com.facebook.FacebookActivity" android:configChanges= "keyboard|keyboardHidden|screenLayout|screenSize|orientation" android:label="@string/app_name" /> <activity android:name="com.facebook.CustomTabActivity" android:exported="true"> <intent-filter> <action android:name="android.intent.action.VIEW" /> <category android:name="android.intent.category.DEFAULT" /> <category android:name="android.intent.category.BROWSABLE" /> <data android:scheme="@string/fb_login_protocol_scheme" /> </intent-filter> </activity>Salin Kode
5. Asosiasikan Nama Paket dan Kelas Default Anda dengan Aplikasi Anda
Nama Paket
Nama paket Anda secara unik mengidentifikasi aplikasi Android Anda. Kami menggunakan ini untuk memungkinkan orang mengunduh aplikasi Anda dari Google Play jika mereka belum memasangnya. Anda dapat menemukan ini di Manifest Android Anda atau di file build.gradle aplikasi Anda.
com.example.myapp
Nama Kelas Aktivitas Default
Ini adalah nama kelas aktivitas yang dikualifikasi secara penuh yang menangani penautan dalam seperti com.example.app.DeepLinkingActivity. Kami menggunakan ini ketika kami menautkan dalam ke aplikasi Anda dari aplikasi Facebook. Anda juga dapat menemukan ini di Android Manifest.
com.example.myapp.MainActivity
Save
6. Berikan Hash Kunci Pengembangan dan Rilis untuk Aplikasi Anda
Untuk memastikan keaslian interaksi antara aplikasi Anda dan Facebook, Anda perlu memberi kami hash kunci Android untuk lingkungan pengembangan Anda. Jika aplikasi Anda sudah diterbitkan, Anda sebaiknya juga menambahkan hash kunci rilis.
Membuat Hash Kunci Pengembangan
Anda akan memiliki hash kunci pengembangan yang unik untuk setiap lingkungan pengembangan Android.
Mac OS
Anda akan memerlukan Alat Pengelolaan Kunci dan Sertifikat (keytool) dari Kit Pengembangan Java.
Untuk membuat hash kunci pengembangan, buka jendela terminal dan jalankan perintah berikut:
      
keytool -exportcert -alias androiddebugkey -keystore ~/.android/debug.keystore | openssl sha1 -binary | openssl base64Salin Kode
Windows
Anda akan membutuhkan hal-hal berikut:
Alat Pengelolaan Kunci dan Sertifikat (keytool) dari Kit Pengembangan Java
Library openssl openssl-for-windows untuk Windows dari Arsip Kode Google
Untuk membuat hash kunci pengembangan, jalankan perintah berikut pada command prompt di dalam folder SDK Java:
      
keytool -exportcert -alias androiddebugkey -keystore "C:\Users\USERNAME\.android\debug.keystore" | "PATH_TO_OPENSSL_LIBRARY\bin\openssl" sha1 -binary | "PATH_TO_OPENSSL_LIBRARY\bin\openssl" base64
      Salin Kode
Perintah ini akan menghasilkan hash kunci 28 karakter yang unik untuk lingkungan pengembangan Anda. Salin dan tempelkan ke kolom di bawah ini. Anda akan perlu memberikan hash kunci pengembangan untuk lingkungan pengembangan yang digunakan setiap orang yang mengerjakan aplikasi Anda.
Membuat Hash Kunci Rilis
Aplikasi Android harus ditandatangani secara digital dengan kunci rilis sebelum dapat Anda unggah ke toko. Untuk membuat hash kunci rilis, jalankan perintah berikut di Mac atau Windows dengan mengganti alias kunci rilis dan jalur ke penyimpanan kunci Anda:
      
keytool -exportcert -alias YOUR_RELEASE_KEY_ALIAS -keystore YOUR_RELEASE_KEY_PATH | openssl sha1 -binary | openssl base64Salin Kode
Ini akan menghasilkan string 28 karakter yang dapat Anda salin dan tempelkan ke kolom di bawah ini. Selain itu, lihat dokumentasi Android untuk menandatangani aplikasi Anda.
Hash Kunci
Mis: nm0bIrXpAM3cUsheUlyU7pwpjD4=
Save
7. Aktifkan Single Sign On untuk Aplikasi Anda
Aktifkan Single Sign On
Jika Anda ingin Pemberitahuan Android Anda memiliki kemampuan untuk membuka aplikasi Anda, aktifkan single sign on.

Masuk Tunggal (SSO)
Akan diluncurkan dari Pemberitahuan Android
Save
8. Tambahkan Tombol Facebook Login
Cara paling sederhana untuk menambahkan Facebook Login ke aplikasi Anda adalah dengan menambahkan LoginButton dari SDK. LoginButton merupakan elemen UI yang membungkus fungsi yang tersedia di LoginManager. Ketika seseorang mengeklik tombol tersebut, fitur masuk dimulai dengan izin yang ditetapkan di LoginManager. Tombol tersebut mengikuti status masuk, dan menampilkan teks yang tepat berdasarkan status autentikasi seseorang.
Untuk menambahkan tombol Facebook Login, terlebih dahulu tambahkan tombol tersebut ke file XML tata letak Anda:
<com.facebook.login.widget.LoginButton
    android:id="@+id/login_button"
    android:layout_width="wrap_content"
    android:layout_height="wrap_content"
    android:layout_gravity="center_horizontal"
    android:layout_marginTop="30dp"
    android:layout_marginBottom="30dp" /> Salin Kode
9. Daftarkan Callback
Sekarang buat callbackManager untuk menangani tanggapan masuk dengan memanggil CallbackManager.Factory.create.
callbackManager = CallbackManager.Factory.create();Salin Kode
Jika Anda menambahkan tombol ke Fragmen, maka Anda juga harus memperbarui aktivitas Anda untuk menggunakan fragmen Anda. Anda dapat menyesuaikan properti Login button dan mendaftarkan callback di metode onCreate() atau onCreateView() Anda. Properti yang dapat Anda sesuaikan meliputi LoginBehavior, DefaultAudience, ToolTipPopup.Style, dan izin pada LoginButton. Misalnya:
      
    loginButton = (LoginButton) findViewById(R.id.login_button);
    loginButton.setReadPermissions("email");
    // If using in a fragment
    loginButton.setFragment(this);    

    // Callback registration
    loginButton.registerCallback(callbackManager, new FacebookCallback<LoginResult>() {
        @Override
        public void onSuccess(LoginResult loginResult) {
            // App code
        }

        @Override
        public void onCancel() {
            // App code
        }

        @Override
        public void onError(FacebookException exception) {
            // App code
        }
    });Salin Kode
Untuk menanggapi hasil masuk, Anda harus mendaftarkan callback dengan LoginManager atau LoginButton. Jika Anda mendaftarkan callback dengan LoginButton, tidak perlu mendaftarkan callback di pengelola Masuk.
Anda menambahkan callback LoginManager ke metode onCreate() dari aktivitas atau fragmen Anda:
    callbackManager = CallbackManager.Factory.create();

    LoginManager.getInstance().registerCallback(callbackManager,
            new FacebookCallback<LoginResult>() {
                @Override
                public void onSuccess(LoginResult loginResult) {
                    // App code
                }

                @Override
                public void onCancel() {
                     // App code
                }

                @Override
                public void onError(FacebookException exception) {
                     // App code   
                }
    });Salin Kode
Jika masuk berhasil, parameter LoginResult memiliki AccessToken yang baru, dan izin paling baru yang diberikan atau ditolak.
Anda tidak memerlukan registerCallback agar berhasil masuk, Anda dapat memilih untuk mengikuti perubahan token akses saat ini dengan kelas AccessTokenTracker yang diuraikan di bawah.
Terakhir, di metode onActivityResult Anda, panggil callbackManager.onActivityResult untuk meneruskan hasil masuk ke LoginManager melalui callbackManager.
      @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        callbackManager.onActivityResult(requestCode, resultCode, data);
        super.onActivityResult(requestCode, resultCode, data);
    }Salin Kode
Setiap aktivitas dan fragmen yang Anda integrasikan dengan Masuk atau Bagikan FacebookSDK harus meneruskan onActivityResult ke callbackManager.
10. Periksa Status Masuk
Aplikasi Anda hanya dapat memiliki satu orang yang masuk dalam satu waktu, dan LoginManager mengatur AccessToken dan Profile terkini untuk orang tersebut. FacebookSDK menyimpan data ini dalam preferensi bersama dan mengaturnya pada awal sesi. Anda dapat melihat apakah seseorang sudah masuk dengan memeriksa AccessToken.getCurrentAccessToken() dan Profile.getCurrentProfile().
Anda dapat memuat AccessToken.getCurrentAccessToken dengan SDK dari cache atau dari bookmark aplikasi saat aplikasi Anda dibuka dari awal. Anda harus memeriksa validitasnya di metode onCreateActivity Anda:
AccessToken accessToken = AccessToken.getCurrentAccessToken();
boolean isLoggedIn = accessToken != null && !accessToken.isExpired();
  Salin Kode
Selanjutnya, Anda nantinya akan dapat melakukan masuk sebenarnya, seperti di OnClickListener tombol khusus:
      
LoginManager.getInstance().logInWithReadPermissions(this, Arrays.asList("public_profile"));Salin Kode
11. Aktifkan Masuk Ekspres
Masuk Ekspres memasukkan orang ke dalam dengan akun Facebooknya ke seluruh perangkat dan platform. Jika seseorang masuk ke aplikasi Anda di Android dan kemudian berganti perangkat, masuk ekspres akan memasukkannya dengan akun Facebooknya, dan bukannya memintanya memilih metode masuk. Ini menghindari membuat akun duplikat atau gagal masuk sama sekali. Kode berikut ini menunjukkan cara mengaktifkan login ekspres.
LoginManager.getInstance().retrieveLoginStatus(this, new LoginStatusCallback() { @Override public void onCompleted(AccessToken accessToken) { // User was previously logged in, can log them in directly here. // If this callback is called, a popup notification appears that says // "Logged in as <User Name>" } @Override public void onFailure() { // No access token could be retrieved for the user } @Override public void onError(Exception exception) { // An error occurred } });   Salin Kode
Langkah-Langkah Berikutnya
Selamat, Anda sudah menambahkan Facebook Login ke aplikasi Android Anda! Pastikan Anda melihat halaman dokumentasi kami lainnya untuk panduan lebih lanjut.
Terapkan Callback Penghapusan Datashare-external
Terapkan callback penghapusan data guna menanggapi permintaan orang untuk menghapus data mereka dari Facebook.
Token Akses dan Profilshare-external
Melacak token akses dan profil pengguna Anda.
Izinshare-external
Mengelola data yang mempunyai akses melalui Facebook Login.
Pemecahan Masalahshare-external
Mengalami masalah dalam mengintegrasikan Facebook Login? Lihat daftar masalah umum dan cara memecahkannya.
Tinjauan Aplikasishare-external
Tergantung data Facebook yang Anda minta dari orang yang menggunakan Facebook Login, Anda mungkin harus mengirimkan aplikasi Anda untuk ditinjau sebelum diluncurkan.


