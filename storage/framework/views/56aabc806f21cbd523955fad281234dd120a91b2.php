<?php $__env->startSection('content'); ?>
    
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <li><a href="<?php echo e(route('faq')); ?>"><b><?php echo e(__('F.A.Q')); ?></b></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <section class="gry-bg py-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="p-4 bg-white">
                       <h2>Frequently Asked Questions (FAQ)</h2>
                            <div class="accordion" id="accordionExample">
                              <div class="card">
                                <div class="card-header" id="headingOne">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Bagaimana cara melakukan transaksi di <b>erbagi.com</b> ?
                                    </button>
                                  </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                  <div class="card-body">
                                    1.  Buka halaman utama  utuk melakukan pebelian pulsa<br>
                                    2.  Masukkan nomer tujuan yang akan diisi dengan benar pada bagian pulsa atau kolom search yang ada pada bagian atas secara otomatis sistem kami akan mendeteksi jenis provider yang anda gunakan sesui nomer yang anda isikan.<br>
                                    3.  Kemudian pilih nominal pulsa yang akan dibeli.<br>
                                    4.  Anda akan mendapat data nomor rekening tujuan dan nominal transfer yang harus anda bayar.<br>
                                    5.  Lakukan pembayaran dengan nominal yang ditampilkan. Harus sama dengan yang tertera di menu pembayaran anda, tidak dapat dibulatkan /dikurangi<br>
                                    6.  Klik tombol lajutkan membayar/konfirmasu<br>
                                    7.  Tunggu beberapa saat. Sistem akan memperoses pesanan secara otomatis.<br><br>

                                    Bagaimana cara mendaftar sebagai member di erbagi.com ?<br>
                                    1.  Buka halaman pendaftaran di ()<br>
                                    2.  Isikan data yang diminta dengan benar<br>
                                    3.  Klik tombol daftar<br>
                                    4.  Selesai<br><br>

                                    Bagaimana  cara mendaftar sebagai komunitas di erbagi.com<br>
                                    1.  Buka halaman pendaftaran di ()<br>
                                    2.  Isikan data yang diminta dengan benar<br>
                                    3.  Minta kode persetujuan daftar komunitas<br>
                                    4.  Kami akan mengirim kode persetujuan  daftar komunitas <br>
                                    5.  Masukkan kode <br>
                                    6.  Klik tombol daftar<br>
                                    7.  Selesai<br><br>

                                    Bagaimana cara verifikasi akun<br>
                                    Setelah anda melakukan pendaftaran, agar akun anda bisa digunakan sepenuhnya maka harus diverifikasi terlebih dahulu.<br>
                                    a.  Cara verifikasi email<br>
                                    1.  Klik tombol verifikasi email<br>
                                    2.  Lalu klik tombol dapatkan kode nanti kode verifikasi akan dikirim ke email anda<br>
                                    3.  Cek kotak masuk email anda. Jika tidak ada cek di folder spam pada email anda<br>
                                    4.  Masukkan kode yang kamu dapat tersebut dikolom verifikasi email<br>
                                    5.  Selesai<br>
                                    b.  Cara verifikasi no.hp<br>
                                    1.  Klik tombol verifikasi no.hp<br>
                                    2.  Lalu klik tombol dapatkan kode nanti kode verifikasi akan dikirim ke no.hp anda<br>
                                    3.  Cek kotak masuk sms pada HP anda<br>
                                    4.  Masukkan kode yang kamu dapat tersebut dikolom verifikasi no.hp tadi<br>
                                    5.  Selesai<br><br>

                                  </div>
                                </div>
                              </div>


                              <div class="card">
                                <div class="card-header" id="headingTwo">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Apa keuntungan jika menjadi member di <b>erbagi.com</b> ?
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                    1.  Member akan mendapatkan point yang dapat digunakan untuk mendonasi/menyumbang kepada komunitas yang ada diplatform erbagi.com<br>
                                    2.  Member dapat melakukan donasi langsung tampa melakukan pembelian<br>
                                    3.  Member dapat  menjadi sponsor dikegiatan yang dilakukan pada komunitas yang berada pada platform kami, untuk kemudian dapat diberikan feedbeck berupa pengiklanan nama/merek yang inigin diiklankan.<br>

                                  </div>
                                </div>
                              </div>


                              <div class="card">
                                <div class="card-header" id="headingThree">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                      Apa itu kode unik transaksi ?
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                  <div class="card-body">
                                   Setiap pembelian di erbagi.com dengan menggunakan metode pembayaran transfer bank akan ditambah kode unik.<br>
                                    Kode unik adalah tambahan nominal transfer (biaya 3 digit) yang fungsinya untuk pembeda antara transaksi satu dengan yang lainnya. Selain itu kode unik juga berfungsi agar pesanan anda bisa diproses otomatis oleh sistem.<br>
                                    Setiap transaksi memiliki kode unik yang berbeda-beda . sebagai contoh jika harga produk Rp. 50.000 maka anda akan mendapatkan kode unik (contoh 123) maka nominal yang harus anda bayar  Rp 50.123.<br>

                                  </div>
                                </div>
                              </div>

                              <div class="card">
                                <div class="card-header" id="headingFour">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                     Sudah melakukan pembayaran tapi produk yang dibeli belum masuk ?
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                  <div class="card-body">
                                    1.  Silahkan cek terlebih dahulu pulsa anda. Kadang pulsa sudah masuk mendahului notifikasi SMS dari operator.<br>
                                    2.  Apabila status sudah selesai, namun pulsa belum masuk, mohon ditunggu dikarenakan terkadang ada keterlambatan atau pending dari provider.<br>
                                    3.  Apabila status selasai dalam waktu 1 jam pulsa belum masuk silahkan hubungi customer servis kami.<br>

                                  </div>
                                </div>
                              </div> 


                              <div class="card">
                                <div class="card-header" id="headingFive">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                     Sudah transfer tapi status masih menunggu pembayaran ?
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                  <div class="card-body">
                                    <p>Hal ini biasanya terjadi pada member yang melakukan transfer namun nominal transfer tidak sesuai dengan yang tertera pada sistem kami. Contoh saat di halaman detail pembayaran jika sistem kami menginstruksikan transfer sejumlah RP 50.123 tapi anda transfer Rp. 50.000 maka transferan anda tidak akan terbaca oleh sistem kami. Jika nominal transfer anda tidak sesuai intruksi(salah/terbalik) silahkan segera hubungi customer servis kami , dan jangan lupa sertakan bukti transfer/foto buku tabungan halaman pertama.</p>
                                    <p>Jika susah transfer sesuai nominal yang diintruksikan oleh sistem namun statusnya masih menunggu pembayaran hal ini biasanya disebabkan karena dari pihak bank sedang ada gangguan, offline atau maintenance harian yang menyebabkan sistema kami tidak bisa membaca data mutasi. Jika hal ini terjadi, mohon ditunggu sampai proses gangguan pihak bank selesai. Jika lebih dari 1 jam masih tidak ada perubahan silahkan hubungi customer servis kami.</p>
                                    <p>Jadwal perkiraan internet banking offline:<br>
                                    Mandiri     : pukul 22.00-04.00 WIB<br>
                                    BCA     : pukul 21.00-01.00 WIB<br>
                                    BRI     : pukul 00.00-06.00 WIB<br>
                                    BNI     : Online 24 jam<br>
                                    Tidak ada yang tahu pasti jadwal bank ofline, jadwal diatas hanyalah perkiraan. Sebaiknya jika anda transaksi menggunakan metode transfer hindari transaksi diatas.</p>

                                  </div>
                                </div>
                              </div>   

                              <div class="card">
                                <div class="card-header" id="headingSix">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                      Apa itu point ?
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                                  <div class="card-body">
                                    Point adalah hasil setelah melakuakan pembelian yang diberikan kepada member yang kemudian dapat digunakan untuk didonasikan kepada komunitas yang ada pada platform erbagi.com  . Jumlah point sewaktu-waktu dapat berubah sesuai dengan kebijakan kami.
                                  </div>
                                </div>
                              </div> 


                              <div class="card">
                                <div class="card-header" id="headingSeven">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                      Cara menggunakan point ?
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                                  <div class="card-body">
                                    Setelah melakukan transaksi anda akan mendapatkan point yang kemudian langsung dapat digukana untuk didonasikan pada komunitas yang ada, pilih/tuju komunitas yang igin anda donasikan pilih donasi masukkan nominal sesuai degan point yang tertera pada keterangan point anda kemudian klik selesai.
                                  </div>
                                </div>
                              </div>


                              <div class="card">
                                <div class="card-header" id="headingEight">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                      Apa itu donasi langsung ?
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                                  <div class="card-body">
                                    Donasi langsung adalah donasi yang diberikan tanpa melakukan pembelian dierbagi.com dengan melakukan transfer langsung melalui bank,ATM,SMS banking, DLL.
                                  </div>
                                </div>
                              </div>  


                               <div class="card">
                                <div class="card-header" id="headingNine">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                      Cara menggunakan fitur donasi langsung 
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                                  <div class="card-body">
                                    Temukan/cari komunitas yang ingin anda donasikan , pilih menu donasi langsung pilih metode pembayaran yang ingin digunakan , masukkan nilai nominal yang ingin anda donasikan, lakukan transfer selesai.
                                  </div>
                                </div>
                              </div>

                              
                              <div class="card">
                                <div class="card-header" id="headingTen">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                      Apa itu komunitas ?
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                                  <div class="card-body">
                                    Komunitas adalah perkumpulan kelompok organisasi yang ingin melakukan kegiatan/event yang kemudian membuat proposal di erbagi.com untuk kemudian mendapatkan donasi dari pada member baik donasi melalui point,langsung(transfer) dan sponsor yang kemudian kami menyatukan antara pendonasi dan komunitas didalam platform <b>erbagi.com</b>.
                                  </div>
                                </div>
                              </div>


                              <div class="card">
                                <div class="card-header" id="headingEleven">
                                  <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                      Komunitas yang melanggar aturan dan ketentuan kami
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                                  <div class="card-body">
                                    Bagi para member dapat melaporkan komunitas yang memberi informasi kecurangan/kejanggalan/penipuan/mengandung sara, member dapat menggunakan fitur lapor. Kami akan segera menelusuri dan menyediki informasi yang diberikan, jika benar melanggar kami memiliki kewenangan untuk menghapus postingan tersebut , dan membekukan komunitas bersangkutan.
                                  </div>
                                </div>
                              </div>                                    


                            </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>