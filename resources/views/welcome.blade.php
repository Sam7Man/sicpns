<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIT CPNS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{URL::asset('assets/img/logo.png')}}" rel="icon">
  <link href="{{URL::asset('assets/img/logo.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{URL::asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i')}}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{URL::asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{URL::asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      {{-- <h1 class="logo"><a href="{{url('#')}}">SIT CPNS</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
      <h1> <a href="#" class="logo"><img src="{{URL::asset('/assets/img/logo.png')}}" alt="" class="img-fluid">SIT-CPNS</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#services">Fitur</a></li>
          <li><a class="nav-link scrollto" href="#faq">F.A.Q</a></li>
          <li><a class="nav-link scrollto" href="#location">Lokasi</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1>Sistem Informasi Tryout CPNS</h1>
          <h2>Kamu dapat memulai ujian dengan menekan tombol dibawah ini.</h2>
        </div>
      </div>
      <div class="text-center">
        <a href="{{url('/home')}}" class="btn-get-started scrollto">Mulai Ujian!</a>
      </div>

      <div class="row icon-boxes">
        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon">
              <i class="bx bx-book"></i>
            </div>
            <h4 class="title">TKP (Tes Karakteristik Pribadi)</a></h4>
            <p class="description">Pertanyaan dalam tes ini menilai tentang perilaku terkait pelayanan publik, jejaring kerja, sosial budaya, teknologi informasi dan komunikasi serta profesionalisme.</p>
          </div>
        </div>

        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon">
              <i class="bx bx-book"></i>
            </div>
            <h4 class="title">TWK (Tes Wawasan Kebangsaan)</h4>
            <p class="description">Pertanyaan dalam uji TWK digunakan untuk menilai penguasan pengetahuan dan kemampuan implementasi nasionalisme, integritas, bela negara, pilar negara dan bahasa Indonesia.</p>
          </div>
        </div>

        <div class="col-md-4 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon">
              <i class="bx bx-book"></i>
            </div>
            <h4 class="title">TIU (Tes Intelegensia Umum)</a></h4>
            <p class="description">Tes ini menilai 3 kemampuan verbal peserta yang meliputi analogi, silogisme dan analitis.</p>
            <p class="description">Kemudian kemampuan numerik berhubungan dengan berhitung, deret angka, perbandingan kuantitatif dan soal cerita. Serta kemampuan figural untuk mengukur kemampuan peserta dalam bernalar.</p>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>About Us</h2>
        </div>
        <div class="row content justify-content-lg-evenly">
          <div class="col-lg-7">
            <p>
              Sistem Informasi Try Out CPNS (SIT CPNS) adalah suatu sistem yang berguna untuk membantu persiapan dari masyarakat untuk menghadapi ujian seleksi CPNS terkhususnya pada tahapan Seleksi Kemampuan Dasar(SKD).Pada aplikasi ini tersedia beberapa paket Try Out SKD Yaitu paket TIU (Tes Intelegensi Umum),  TKP (Tes Karakteristik Pribadi), dan TWK (Tes Wawasan Kebangsaan).
              Dan juga, setelah selesai mengerjakan Try Out, peserta dapat melihat skor nya tersebut.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Aplikasi Sistem CAT (Computer Assisted Test)</li>
              <li><i class="ri-check-double-line"></i> Tipe Soal HOTS</li>
              <li><i class="ri-check-double-line"></i> Papan Pengumuman Hasil Nilai</li>
            </ul>
            <p>
              Akun akan diberikan oleh penyelenggara tryout. Jika kamu belum mendapatkan akun, segera minta kepada pihak penyelenggara agar kamu dapat memulai tryout.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Fitur</h2>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bx bx-book"></i>
              </div>
              <h4>Paket Try out</h4>
              <p>SIT CPNS menyediakan beberapa macam paket Try Out yang dapat digunakan peserta. Terdapat beberapa paket Try Out SKD Yaitu paket TIU (Tes Intelegensi Umum),  TKP (Tes Karakteristik Pribadi), dan TWK (Tes Wawasan Kebangsaan).</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-3" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange ">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bx bx-file"></i>
              </div>
              <h4>Menyesuaikan Kisi-Kisi</h4>
              <p>SIT CPNS selalu update dan menyesuaikan soal dengan kisi-kisi SKD TWK, TIU & TKP terbaru.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-pink">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="bx bx-tachometer"></i>
              </div>
              <h4>Fleksibel</h4>
              <p>SIT CPNS bersifat Online sehingga peserta dapat menyesuaikan waktu pengerjaan Try Out tersebut.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-yellow">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,503.46388370962813C374.79870501325706,506.71871716319447,464.8034551963731,527.1746412648533,510.4981551193396,467.86667711651364C555.9287308511215,408.9015244558933,512.6030010748507,327.5744911775523,490.211057578863,256.5855673507754C471.097692560561,195.9906835881958,447.69079081568157,138.11976852964426,395.19560036434837,102.3242989838813C329.3053358748298,57.3949838291264,248.02791733380457,8.279543830951368,175.87071277845988,42.242879143198664C103.41431057327972,76.34704239035025,93.79494320519305,170.9812938413882,81.28167332365135,250.07896920659033C70.17666984294237,320.27484674793965,64.84698225790005,396.69656628748305,111.28512138212992,450.4950937839243C156.20124167950087,502.5303643271138,231.32542653798444,500.4755392045468,300,503.46388370962813"></path>
                </svg>
                <i class="bx bx-receipt"></i>
              </div>
              <h4>Laporan Hasil Ujian</h4>
              <p>Terdapat fitur laporan hasil ujian Try Out pribadi peserta untuk evaluasi peningkatan kemampuan dan penguasaan materi.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-3" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-red">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,532.3542879108572C369.38199826031484,532.3153073249985,429.10787420159085,491.63046689027357,474.5244479745417,439.17860296908856C522.8885846962883,383.3225815378663,569.1668002868075,314.3205725914397,550.7432151929288,242.7694973846089C532.6665558377875,172.5657663291529,456.2379748765914,142.6223662098291,390.3689995646985,112.34683881706744C326.66090330228417,83.06452184765237,258.84405631176094,53.51806209861945,193.32584062364296,78.48882559362697C121.61183558270385,105.82097193414197,62.805066853699245,167.19869350419734,48.57481801355237,242.6138429142374C34.843463184063346,315.3850353017275,76.69343916112496,383.4422959591041,125.22947124332185,439.3748458443577C170.7312796277747,491.8107796887764,230.57421082200815,532.3932930995766,300,532.3542879108572"></path>
                </svg>
                <i class="bx bx-slideshow"></i>
              </div>
              <h4>Try Out Simulasi CAT BKN</h4>
              <p>Latihan Soal mirip dengan simulasi CAT BKN. Membuat peserta semakin terbiasa saat menghadapi CAT resmi dari BKN.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 d-flex align-items-stretch mt-3" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-teal">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,566.797414625762C385.7384707136149,576.1784315230908,478.7894351017131,552.8928747891023,531.9192734346935,484.94944893311C584.6109503024035,417.5663521118492,582.489472248146,322.67544863468447,553.9536738515405,242.03673114598146C529.1557734026468,171.96086150256528,465.24506316201064,127.66468636344209,395.9583748389544,100.7403814666027C334.2173773831606,76.7482773500951,269.4350130405921,84.62216499799875,207.1952322260088,107.2889140133804C132.92018162631612,134.33871894543012,41.79353780512637,160.00259165414826,22.644507872594943,236.69541883565114C3.319112789854554,314.0945973066697,72.72355303640163,379.243833228382,124.04198916343866,440.3218312028393C172.9286146004772,498.5055451809895,224.45579914871206,558.5317968840102,300,566.797414625762"></path>
                </svg>
                <i class="bx bx-devices"></i>
              </div>
              <h4>Mudah Diakses</h4>
              <p>Kami menyadari, setiap orang memiliki akses yang berbeda-beda. Karenanya kami membuat yang mudah dipahami dan dapat diakses dimana saja baik di computer ataupun smartphone.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pertanyaan Seputas SIT CPNS</h2>
          {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
        </div>

        <div class="faq-list">
          <ul>
            <li data-aos="fade-up">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">Bagaimana cara daftar SIT CPNS? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                <p>
                  Kamu terlebih dahulu harus menghubungi admin untuk meminta akun yang telah diregistrasi oleh admin.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Saya lupa password akun saya, bagaimana solusinya? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Kamu bisa menghubungi admin dan meminta password yang baru.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">Bagaimana cara mengerjakan try out? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Silakan login ke akun kamu terlebih dahulu. Setelah itu pilih menu “Ujian” dan pilih paket Try Out yang ingin dikerjakan.
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">Paket Soal Apa Saja Yang Tersedia? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Terdapat beberapa paket Try Out SKD Yaitu paket TIU (Tes Intelegensi Umum),  TKP (Tes Karakteristik Pribadi), dan TWK (Tes Wawasan Kebangsaan).
                </p>
              </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">Apakah pengerjaan soal Try Out dapat dikerjakan kapan saja? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                <p>
                  Ya, peserta terlebih dahulu harus mendapatkan akun dengan cara menghubungi admin setelah itu peserta dapat mengerjakan Try Out kapan saja dan dimana saja karena Try Out nya bersifat fleksibel.
                </p>
              </div>
            </li>

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Location Section ======= -->
    <section id="location" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Lokasi</h2>
          <p>Lokasi tempat ujian dilaksanakan.</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.36652391112!2d99.1462049504111!3d2.38349899825445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e00fdad2d7341%3A0xf59ef99c591fe451!2sDel%20Institute%20of%20Technology!5e0!3m2!1sen!2sbg!4v1622927415850!5m2!1sen!2sbg" frameborder="0" allowfullscreen></iframe>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6 footer-contact">
            <h3>Institut Teknologi Del</h3>
            <p>
              Jl. Sisingamangaraja, Sitoluama<br>
              Laguboti, Toba Samosir<br>
              Sumatera Utara, Indonesia<br>
              <strong>Kode Pos:</strong> 22381<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right scrollto"></i> <a href="#about">Tentang</a></li>
              <li><i class="bx bx-chevron-right scrollto"></i> <a href="#services">Fitur</a></li>
              <li><i class="bx bx-chevron-right scrollto"></i> <a href="#faq">F.A.Q</a></li>
            </ul>
          </div>

          <!-- ======= Contact Section ======= -->
          <div class="col-lg-3 col-md-6 footer-newsletter">
            <div class="info" id="contact">
              <div class="email">
                <h4><i class="bi bi-envelope"></i> Email:</h4>
                <p>sitcpns@gmail.com</p>
              </div>

              <div class="phone">
                <h4><i class="bi bi-telephone"></i> Telp:</h4>
                <p>+62 632 654321</p>
              </div>
              <div class="social-links pt-3 pt-md-0">
                <a href="https://twitter.com/BKNgoid" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="http://www.bkn.go.id/" class="facebook"><i class="bx bx-globe"></i></a>
                <a href="https://www.instagram.com/bkngoidofficial/" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>
          <!-- ======= End Contact Section ======= -->  
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          Copyright &copy; 2021 <strong><span>Institut Teknologi Del</span></strong>. All Rights Reserved
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{URL::asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{URL::asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{URL::asset('assets/js/main.js')}}"></script>

</body>

</html>