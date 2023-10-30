@extends('layouts.app')
@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ $user->count() }}</h3>

            <p>Semua Pengguna</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="{{ route('user') }}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $user->where('role_id', 1)->count() }}</h3>

            <p>Admin</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="{{ route('user', 1) }}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $user->where('role_id', 2)->count() }}</h3>

            <p>Dosen</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="{{ route('user', 2) }}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $user->where('role_id', 3)->count() }}</h3>

            <p>Asesor</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="{{ route('user', 3) }}" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>Grafik Kualifikasi Akademik</h5>
            <p class="p-1 text-danger font-weight-bold mb-0">Skor =  {!! number_format($scorePendidikanPascaSarjana, 2, ',', '.'); !!}</p>
          </div>
          <div class="card-body text-center">
            <canvas id="pendidikanPascaSarjana" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>Grafik Kualifikasi Akademik</h5>
            <p class="p-1 text-danger font-weight-bold mb-0">Skor = {!! number_format($scoreJabatanAkademik, 2, ',', '.'); !!}</p>
          </div>
          <div class="card-body text-center">
            <canvas id="jabatanAkademikChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>Grafik Penelitian DTPS</h5>
            <p class="p-1 text-danger font-weight-bold mb-0">Skor = {!! number_format($scorePenelitianDTPS, 2, ',', '.'); !!}</p>
          </div>
          <div class="card-body text-center">
            <canvas id="penelitianDTPSChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>Grafik Pengabdian Kepada Masyarakat DTPS</h5>
            <p class="p-1 text-danger font-weight-bold mb-0">Skor = {!! number_format($scorePKMDTPS, 2, ',', '.'); !!}</p>
          </div>
          <div class="card-body text-center">
            <canvas id="pengabdianDTPSChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>Grafik Publikasi Ilmiah</h5>
            <p class="p-1 text-danger font-weight-bold mb-0">Skor = {!! number_format($scorePublikasiIlmiah, 2, ',', '.'); !!}</p>
          </div>
          <div class="card-body text-center">
            <canvas id="publikasiIlmiah" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>Grafik Karya Ilmiah DTPS</h5>
            <p class="p-1 text-danger font-weight-bold mb-0">Skor = {!! number_format($scoreKaryaIlmiahDTPS, 2, ',', '.'); !!}</p>
          </div>
          <div class="card-body text-center">
            <canvas id="karyaIlmiah" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>Capaian Score Indikator</h5>
          </div>
          <div class="card-body text-center">
            <canvas id="capaianAkreditasi" width="600" height="400"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h5>Nilai Akreditasi</h5>
          </div>
          <div class="card-body text-center">
            <canvas id="nilaiAkreditasi" width="600" height="400"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ChartJS -->
<script src="{{ url('/assets/backend/') }}/plugins/chart.js/Chart.min.js"></script>
<!-- Page specific script -->
<script>
  $(function() {    
    /* jQueryKnob */

    $('.knob').knob({
      draw: function() {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a = this.angle(this.cv) // Angle
            ,
            sa = this.startAngle // Previous start angle
            ,
            sat = this.startAngle // Start angle
            ,
            ea // Previous end angle
            ,
            eat = sat + a // End angle
            ,
            r = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor &&
            (sat = eat - 0.3) &&
            (eat = eat + 0.3)

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor &&
              (sa = ea - 0.3) &&
              (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
        }
      }
    });
    /* END JQUERY KNOB */


    
    //-------------
    //- GRAFIK PENDIDIKAN PASCA SARJANA -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pendidikanPascaSarjana = $('#pendidikanPascaSarjana').get(0).getContext('2d')
    var donutData        = {
      labels: [
        'S2',
        'S3',
      ],
      datasets: [
        {
          data: [
            {{ $inputA->where('pendidikan_pasca_sarjana', 'S2')->count() / $user->where('role_id', 2)->count() * 100 }} ,
            {{ $inputA->where('pendidikan_pasca_sarjana', 'S3')->count() / $user->where('role_id', 2)->count() * 100 }}],
          backgroundColor : ['#DC3545', '#00a65a'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(pendidikanPascaSarjana, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    });

    
    //-------------
    //- GRAFIK JABATAN AKADEMIK -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var jabatanAkademikChartCanvas = $('#jabatanAkademikChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
        'Guru Besar',
        'Lektor',
        'Lektor Kepala',
      ],
      datasets: [
        {
          data: [
            {{ $inputA->where('jabatan_akademik', 'Guru Besar')->count() / $user->where('role_id', 2)->count() * 100 }},
            {{ $inputA->where('jabatan_akademik', 'Lektor')->count() / $user->where('role_id', 2)->count() * 100 }},
            {{ $inputA->where('jabatan_akademik', 'Lektor Kepala')->count() / $user->where('role_id', 2)->count() * 100 }}
          ],
          backgroundColor : ['#DC3545', '#00a65a', '#00c0ef'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(jabatanAkademikChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    });


    //---------------------
    //- GRAFIK PENELITIAN DTPS -
    //---------------------
    var areaChartData = {
      labels  : ['2020/2021', '2021/2022', '2022/2023'],
      datasets: [
        {
          label               : 'Lembaga Dalam Negeri (diluar PT)',
          backgroundColor     : 'rgba(220,53,69, 1)',
          borderColor         : 'rgba(220,53,69, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(220,53,69, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
                                  {{ round($inputB->where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputB->where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputB->where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Perguruan Tinggi/Mandiri',
          backgroundColor     : 'rgba(255,193,7, 1)',
          borderColor         : 'rgba(255,193,7, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(255,193,7, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
                                  {{ round($inputB->where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputB->where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputB->where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Lembaga Luar Negeri',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
                                  {{ round($inputB->where('sumber_pembiayaan', 'Lembaga Luar Negeri')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputB->where('sumber_pembiayaan', 'Lembaga Luar Negeri')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputB->where('sumber_pembiayaan', 'Lembaga Luar Negeri')->where('tahun', 'TS')->count()) }}
                                ]
        },
      ]
    }
    var penelitianDTPSChartCanvas = $('#penelitianDTPSChart').get(0).getContext('2d')
    var penelitianDTPSChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    var temp2 = areaChartData.datasets[2]
    penelitianDTPSChartData.datasets[2] = temp2
    penelitianDTPSChartData.datasets[0] = temp1
    penelitianDTPSChartData.datasets[1] = temp0

    var penelitianDTPSChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(penelitianDTPSChartCanvas, {
      type: 'bar',
      data: penelitianDTPSChartData,
      options: penelitianDTPSChartOptions
    })


    //---------------------
    //- GRAFIK PENGABDIAN KEPADA MASYARAKAT DTPS -
    //---------------------
    var areaChartDataPengabdian = {
      labels  : ['2020/2021', '2021/2022', '2022/2023'],
      datasets: [
        {
          label               : 'Lembaga Dalam Negeri (diluar PT)',
          backgroundColor     : 'rgba(220,53,69, 1)',
          borderColor         : 'rgba(220,53,69, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(220,53,69, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
                                  {{ round($inputC->where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputC->where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputC->where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Perguruan Tinggi/Mandiri',
          backgroundColor     : 'rgba(255,193,7, 1)',
          borderColor         : 'rgba(255,193,7, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(255,193,7, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [
                                  {{ round($inputC->where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputC->where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputC->where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Lembaga Luar Negeri',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [
                                  {{ round($inputC->where('sumber_pembiayaan', 'Lembaga Luar Negeri')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputC->where('sumber_pembiayaan', 'Lembaga Luar Negeri')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputC->where('sumber_pembiayaan', 'Lembaga Luar Negeri')->where('tahun', 'TS')->count()) }}
                                ]
        },
      ]
    }
    var penelitianDTPSChartCanvas = $('#pengabdianDTPSChart').get(0).getContext('2d')
    var penelitianDTPSChartData = $.extend(true, {}, areaChartDataPengabdian)
    var temp0 = areaChartDataPengabdian.datasets[0]
    var temp1 = areaChartDataPengabdian.datasets[1]
    var temp2 = areaChartDataPengabdian.datasets[2]
    penelitianDTPSChartData.datasets[2] = temp2
    penelitianDTPSChartData.datasets[0] = temp1
    penelitianDTPSChartData.datasets[1] = temp0

    var penelitianDTPSChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(penelitianDTPSChartCanvas, {
      type: 'bar',
      data: penelitianDTPSChartData,
      options: penelitianDTPSChartOptions
    })


    //---------------------
    //- GRAFIK PUBLIKASI ILMIAH -
    //---------------------
    var areaChartPublikasiIlmiah = {
      labels  : ['2020/2021', '2021/2022', '2022/2023'],
      datasets: [
        {
          label               : 'Jurnal Nasional Tidak Terakreditasi',
          backgroundColor     : 'rgb(255, 87, 51)',
          borderColor         : 'rgb(255, 87, 51)',
          pointRadius         : false,
          pointColor          : 'rgb(255, 87, 51)',
          pointStrokeColor    : '#FF5733',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(255, 87, 51)',
          data                : [
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Nasional Tidak Terakreditasi')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Nasional Tidak Terakreditasi')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Nasional Tidak Terakreditasi')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Jurnal Nasional Terakreditasi',
          backgroundColor     : 'rgb(255, 215, 0)',
          borderColor         : 'rgb(255, 215, 0)',
          pointRadius         : false,
          pointColor          : 'rgb(255, 215, 0)',
          pointStrokeColor    : '#FFD700',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(255, 215, 0)',
          data                : [
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Nasional Terakreditasi')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Nasional Terakreditasi')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Nasional Terakreditasi')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Jurnal Internasional',
          backgroundColor     : 'rgb(50, 205, 50)',
          borderColor         : 'rgb(50, 205, 50)',
          pointRadius          : false,
          pointColor          : '#32CD32',
          pointStrokeColor    : 'rgb(50, 205, 50)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(50, 205, 50)',
          data                : [
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Internasional')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Internasional')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Internasional')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Jurnal Internasional Bereputasi',
          backgroundColor     : 'rgb(135, 206, 250)',
          borderColor         : 'rgb(135, 206, 250)',
          pointRadius          : false,
          pointColor          : '#87CEFA',
          pointStrokeColor    : 'rgb(135, 206, 250)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(135, 206, 250)',
          data                : [
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Internasional Bereputasi')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Internasional Bereputasi')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Jurnal Internasional Bereputasi')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Seminar Wilayah/Lokal/Perguruan Tinggi',
          backgroundColor     : 'rgb(255, 105, 180)',
          borderColor         : 'rgb(255, 105, 180)',
          pointRadius          : false,
          pointColor          : '#FF69B4',
          pointStrokeColor    : 'rgb(255, 105, 180)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(255, 105, 180)',
          data                : [
                                  {{ round($inputD->where('media_publikasi', 'Seminar Wilayah/Lokal/Perguruan Tinggi')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Seminar Wilayah/Lokal/Perguruan Tinggi')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Seminar Wilayah/Lokal/Perguruan Tinggi')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Seminar Nasional',
          backgroundColor     : 'rgb(128, 0, 128)',
          borderColor         : 'rgb(128, 0, 128)',
          pointRadius          : false,
          pointColor          : '#800080',
          pointStrokeColor    : 'rgb(128, 0, 128)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(128, 0, 128)',
          data                : [
                                  {{ round($inputD->where('media_publikasi', 'Seminar Nasional')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Seminar Nasional')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Seminar Nasional')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Seminar Internasional',
          backgroundColor     : 'rgb(255, 69, 0)',
          borderColor         : 'rgb(255, 69, 0)',
          pointRadius          : false,
          pointColor          : '#FF4500',
          pointStrokeColor    : 'rgb(255, 69, 0)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(255, 69, 0)',
          data                : [
                                  {{ round($inputD->where('media_publikasi', 'Seminar Internasional')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Seminar Internasional')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Seminar Internasional')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Tulisan Di Media Massa Wilayah',
          backgroundColor     : 'rgb(0, 206, 209)',
          borderColor         : 'rgb(0, 206, 209)',
          pointRadius          : false,
          pointColor          : '#00CED1',
          pointStrokeColor    : 'rgb(0, 206, 209)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(0, 206, 209)',
          data                : [
                                  {{ round($inputD->where('media_publikasi', 'Tulisan Di Media Massa Wilayah')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Tulisan Di Media Massa Wilayah')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Tulisan Di Media Massa Wilayah')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Tulisan Di Media Massa Nasional',
          backgroundColor     : 'rgb(138, 43, 226)',
          borderColor         : 'rgb(138, 43, 226)',
          pointRadius          : false,
          pointColor          : '#8A2BE2',
          pointStrokeColor    : 'rgb(138, 43, 226)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(138, 43, 226)',
          data                : [
                                  {{ round($inputD->where('media_publikasi', 'Tulisan Di Media Massa Nasional')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Tulisan Di Media Massa Nasional')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Tulisan Di Media Massa Nasional')->where('tahun', 'TS')->count()) }}
                                ]
        },
        {
          label               : 'Tulisan Di Media Massa Internasional',
          backgroundColor     : 'rgb(255, 255, 0)',
          borderColor         : 'rgb(255, 255, 0)',
          pointRadius          : false,
          pointColor          : '#FFFF00',
          pointStrokeColor    : 'rgb(255, 255, 0)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgb(255, 255, 0)',
          data                : [
                                  {{ round($inputD->where('media_publikasi', 'Tulisan Di Media Massa Internasional')->where('tahun', 'TS-2')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Tulisan Di Media Massa Internasional')->where('tahun', 'TS-1')->count()) }},
                                  {{ round($inputD->where('media_publikasi', 'Tulisan Di Media Massa Internasional')->where('tahun', 'TS')->count()) }}
                                ]
        },
      ]
    }
    var penelitianDTPSChartCanvas = $('#publikasiIlmiah').get(0).getContext('2d')
    var penelitianDTPSChartData = $.extend(true, {}, areaChartPublikasiIlmiah)
    var temp0 = areaChartPublikasiIlmiah.datasets[0]
    var temp1 = areaChartPublikasiIlmiah.datasets[1]
    var temp2 = areaChartPublikasiIlmiah.datasets[2]
    penelitianDTPSChartData.datasets[2] = temp2
    penelitianDTPSChartData.datasets[0] = temp1
    penelitianDTPSChartData.datasets[1] = temp0

    var penelitianDTPSChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(penelitianDTPSChartCanvas, {
      type: 'bar',
      data: penelitianDTPSChartData,
      options: penelitianDTPSChartOptions
    })



    //---------------------
    //- GRAFIK Karya Ilmiah DTPS -
    //---------------------
    var karyaIlmiahAreaChart = {
      labels  : ['Jumlah'],
      datasets: [
        {
          label               : 'Lembaga Dalam Negeri (diluar PT)',
          backgroundColor     : 'rgba(220,53,69, 1)',
          borderColor         : 'rgba(220,53,69, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(220,53,69, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$inputE->count()}}]
        },
      ]
    }
    var karyaIlmiahCanvas = $('#karyaIlmiah').get(0).getContext('2d')
    var karyaIlmiahData = $.extend(true, {}, karyaIlmiahAreaChart)
    var temp0 = karyaIlmiahAreaChart.datasets[0]
    karyaIlmiahData.datasets[0] = temp0

    var karyaIlmiahOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(karyaIlmiahCanvas, {
      type: 'bar',
      data: karyaIlmiahData,
      options: karyaIlmiahOptions
    })



    //-------------
    //- Grafik Capaian Nilai Akreditasi -
    //-------------
    var capaianAkreditasi = document.getElementById("capaianAkreditasi");

    var marksData = {
      labels: ["Kualifikasi Akademik", "Jabatan Akademik", "Penelitian DTPS", "PKM DTPS", "Publikasi Ilmiah", "Karya Ilmiah DTPS"],
      datasets: [
        {
          label: "TS",
          backgroundColor: "rgba(255, 87, 51,0.2)",
          data: [
            0, 
            0, 
            {!! number_format($scorePenelitianDTPS0, 2, '.', '.'); !!}, 
            {!! number_format($scorePKMDTPS0, 2, '.', '.'); !!}, 
            {!! number_format($scorePublikasiIlmiah0, 2, '.', '.'); !!}, 
            0
          ]
        }, {
          label: "TS-1",
          backgroundColor: "rgba(135, 206, 250,0.2)",
          data: [
            0, 
            0, 
            {!! number_format($scorePenelitianDTPS1, 2, '.', '.'); !!}, 
            {!! number_format($scorePKMDTPS1, 2, '.', '.'); !!}, 
            {!! number_format($scorePublikasiIlmiah1, 2, '.', '.'); !!}, 
            0
          ]
        }, {
          label: "TS-2",
          backgroundColor: "rgba(255, 255, 0,0.2)",
          data: [
            0,
            0, 
            {!! number_format($scorePenelitianDTPS2, 2, '.', '.'); !!}, 
            {!! number_format($scorePKMDTPS2, 2, '.', '.'); !!}, 
            {!! number_format($scorePublikasiIlmiah2, 2, '.', '.'); !!}, 
            0
          ]
        }, {
          label: "Keseluruhan",
          backgroundColor: "rgba(128, 0, 128,0.2)",
          data: [
            {!! number_format($scorePendidikanPascaSarjana, 2, '.', '.'); !!}, 
            {!! number_format($scoreJabatanAkademik, 2, '.', '.'); !!}, 
            {!! number_format($scorePenelitianDTPS, 2, '.', '.'); !!}, 
            {!! number_format($scorePKMDTPS, 2, '.', '.'); !!}, 
            {!! number_format($scorePublikasiIlmiah, 2, '.', '.'); !!}, 
            {!! number_format($scoreKaryaIlmiahDTPS, 2, '.', '.'); !!},
          ]
        }
      ]
    };

    var radarChart = new Chart(capaianAkreditasi, {
      type: 'radar',
      data: marksData
    });



    //---------------------
    //- GRAFIK Karya Ilmiah DTPS -
    //---------------------
    var karyaIlmiahAreaChart = {
      labels  : ['Jumlah'],
      datasets: [
        {
          label               : 'Lembaga Dalam Negeri (diluar PT)',
          backgroundColor     : 'rgba(220,53,69, 1)',
          borderColor         : 'rgba(220,53,69, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(220,53,69, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [{{$inputE->count()}}]
        },
      ]
    }
    var karyaIlmiahCanvas = $('#karyaIlmiah').get(0).getContext('2d')
    var karyaIlmiahData = $.extend(true, {}, karyaIlmiahAreaChart)
    var temp0 = karyaIlmiahAreaChart.datasets[0]
    karyaIlmiahData.datasets[0] = temp0

    var karyaIlmiahOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(karyaIlmiahCanvas, {
      type: 'bar',
      data: karyaIlmiahData,
      options: karyaIlmiahOptions
    })



    //-------------
    //- Grafik Nilai Akreditasi -
    //-------------
    var nilaiAkreditasi = document.getElementById("nilaiAkreditasi");

    var marksDataNikaiAkreditasi = {
      labels: ["Seluruh", "TS-2", "TS-1", "TS"],
      datasets: [{
        label: 'Nilai Akreditasi',
        backgroundColor: "rgba(255, 87, 51,0.2)",
        data: [
          {!! number_format($scorePenelitianDTPS + $scorePKMDTPS + $scorePublikasiIlmiah, 2, '.', '.'); !!},
          {!! number_format($scorePenelitianDTPS0 + $scorePKMDTPS0 + $scorePublikasiIlmiah0, 2, '.', '.'); !!},
          {!! number_format($scorePenelitianDTPS1 + $scorePKMDTPS1 + $scorePublikasiIlmiah1, 2, '.', '.'); !!},
          {!! number_format($scorePenelitianDTPS2 + $scorePKMDTPS2 + $scorePublikasiIlmiah2, 2, '.', '.'); !!},
        ]
      }]
    };

    var radarChart = new Chart(nilaiAkreditasi, {
      type: 'radar',
      data: marksDataNikaiAkreditasi
    });

  });
</script>
@endsection