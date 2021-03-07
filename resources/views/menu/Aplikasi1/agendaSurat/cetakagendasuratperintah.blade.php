<!doctype html>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    </head>
    <style>
        html{
            font-family:calibri;
            font-size:11px;
        }
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 3px;
            text-align: center;
        }
        small{
            font-size:13px;
            /* margin-top:10px; */
        }
        .no-border{
            border:none;
        }
    </style>
    <body>
        <div class="flex-center position-ref full-height">   
            <center>
                <h2 style="margin-bottom:0px">Rekapitulasi Data Surat Perintah</h2>                
               
            </center>
            <center>
                <table style="margin-top:20px">
                    <thead>
                        <tr>
                            <th>No</th>                    
                            <th>Tgl. Keluar</th>    
                            <th>Tgl. Diteruskan</th>          
                            <!-- <th>Kepada</th>                     -->
                            <th>Tujuan</th>                    
                            <th>Indeks</th>       
                            <th>Klasifikasi</th>    
                            <th>Ringkasan</th>       
                            <th>Catatan</th>       
                            <th>Tgl. Input</th>       
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;
                        ?>
                        @foreach($datas_sr as $du)                         
                        <tr >
                            <th>{{$no++}}</th>                                   
                            <th>{{ date("d M Y", strtotime($du->tanggal_keluar)) }}</th>           
                            <th>{{ date("d M Y", strtotime($du->tanggal_diteruskan)) }}</th>           
                            <!-- <th>{{$du->kepada}}</th>            -->
                            <th>{{$du->tujuan}}</th>          
                            <th>{{$du->indeks}}</th>       
                            <th>{{$du->klasifikasi_surat}}</th>          
                            <th>{{$du->isi_ringkas}}</th>           
                            <th>{{$du->catatan}}</th>                               
                            <th>{{ date("d M Y", strtotime($du->created_at)) }}</th>           
                        </tr>
                        @endforeach                           
                    </tbody>
                </table>           
                <br><br><br>
                <table class="no-border">
                    <tbody>
                        <tr>
                            <th  class="no-border" style="padding-left:30px;padding-bottom:60px;">Mengetahui, <br> KEPALA SUB BAGIAN</th>
                            <th  class="no-border" style="padding-left:400px"></th>
                            <th  class="no-border" style="padding-bottom:65px;">KAUR TU & PERPUSTAKAAN</th>
                        </tr>
                    </tbody>
                </table>        
                <table class="no-border">
                    <tbody>
                        <tr>
                            <th  class="no-border" style="padding-bottom:60px;">(..........................................................)</th>
                            <th  class="no-border" style="padding-left:360px"></th>
                            <th  class="no-border" style="padding-bottom:65px;">(..........................................................)</th>
                        </tr>
                    </tbody>
                </table>           
            </center>
        </div>
     </body>
</html>