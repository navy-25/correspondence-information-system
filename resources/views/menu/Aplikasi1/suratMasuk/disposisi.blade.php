<style>
    table {
        border-collapse: collapse;
        font-family:sans-serif;
    }

    table, th, td {
        border: 1px solid black;
        font-size:10px;
    }
</style>

<table border=1>
    <tr>
        <td colspan=4 style="width:250px;padding:5px">
            <H1 style="margin:0px;margin-top:10px;margin-bottom:10px"> 
            <CENTER>
                <b>
                    KEJAKSAAN NEGERI BATU
                </b>
            </CENTER>
            </H1>
        </td>
    </tr>
    <tr>
        <td colspan=4 style="width:250px;padding:5px">
            <H3 style="margin:5px"> 
            <CENTER>
                <b>
                    KARTU PENERUSAN DISPOSISI
                </b>
            </CENTER>
            </H3>
        </td>
    </tr>
    <tr>
        <td style="height:50px;padding:5px;width:100px">
            <b> No. Agenda/Registrasi</b>
        </td>
        <td  style="height:50px;padding:5px;width:140px">
            : {{$sm->indeks}}
        </td>
        <td   colspan=2 style="height:50px;padding:5px">
            <b> Tingkat Keamanan </b> : <br>  {{$sm->sifat_surat}}
        </td>
    </tr>
    <tr>
        <td style="height:50px;padding:5px;width:100px">
            <b> Perihal </b>
        </td>
        <td colspan=3 style="height:50px;padding:5px;width:140px">
            : {{$sm->perihal}}
        </td>                
    </tr>
    <tr>
        <td style="height:50px;padding:5px;width:100px">
            <b> Asal Surat </b>
        </td>
        <td colspan=3 style="height:50px;padding:5px;width:140px">
            :  {{$sm->dari}}
        </td>                
    </tr>
    <tr>
        <td style="height:50px;padding:5px;width:100px">
            <b>Isi Ringkasan </b>
        </td>
        <td colspan=3 style="height:50px;padding:5px;width:140px">
            :  {{$sm->isi_ringkas}}
        </td>                
    </tr>
    <tr>
        <td style="height:50px;padding:5px;width:100px">
            <b> Tanggal Surat </b>
        </td>
        <td colspan=3 style="height:50px;padding:5px;width:140px">
            :  {{ date("d F Y", strtotime($sm->tanggal_masuk)) }}
        </td>                
    </tr>
        <tr>
        <td style="height:50px;padding:5px;width:100px">
            <b> Diterima Tanggal </b>
        </td>
        <td colspan=3 style="height:50px;padding:5px;width:140px">
            : {{ date("d F Y", strtotime($sm->tanggal_diteruskan)) }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>No. Surat</b> : {{$sm->no_surat}}
        </td>                
    </tr>
    <tr>
        <td colspan=4 style="width:400px;padding:5px">
            <CENTER>
                <b>
                    Tanggal Penyelesaian &nbsp;&nbsp;&nbsp; 
                </b>
                : {{ date("d F Y", strtotime($dsm->tanggal_verifikasi)) }}
            </CENTER>
            <!-- <small style="margin:0px"> BATU </small> -->
        </td>
    </tr>
    </tr>
    <tr>
        <td colspan=2  style="height:50px;padding:5px;width:140px;border-right:none">
            <b> Intruksi / Disposisi Kajari :  </b> <br>
            <i>{{$dsm->catatan_admin_kepala}} </i> <br>
            
        </td>     
                
        <td style="border-left:none">
            <center>
            @if($dsm->ttd == 'Disetujui')
                <img src="img/ttd.png" alt="" width="80px" height="80px" >
            @endif    
            </center>
        </td>
        <td style="height:50px;padding:5px;width:100px">
            Diteruskan kepada :
            <br><br>
            <br><br>
            {{$sm->diteruskan}}
        </td>
    </tr>
    <tr>
        <td colspan=3 style="height:70px;padding:5px;width:140px">
            <b>CATATAN KASI/KASUBAG :  </b> <br>
            
                <i>{{$dsm->catatan_admin_tu}} </i> <br>
        </td>                
        <td style="height:50px;padding:5px;width:100px;">
            Paraf : 
            <br><br> <br><br> 
            KAUR. TU
        </td>
    </tr>
</table>