@extends('layouts.backend.main')

@section('breadcrumb')
    Detail Peserta {{ $k->nama_klinik }}
@endsection

@section('content')
<div class="row">
    <div class="col-xl-5">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Detail Klinik</div>
            </div>
            <div class="card-body">
                <div class="text-center chat-image mb-5">
                    <div class="mb-3">
                        <img alt="avatar" src="{{ asset('images/klinik/'.$k->logo_klinik) }}">
                    </div>
                    <div class="main-chat-msg-name">
                        <h5 class="mb-1 text-dark fw-semibold">{{ $k->status }} <a href="javascript::void()" onClick="status({{ $k->id }})"><i class="fe fe-edit"></i></a></h5>
                        <p class="text-muted mt-0 mb-0 pt-0 fs-13">No. Peserta: {{ $k->no_peserta }}</p>
                    </div>
                </div>
                <table class="table">
                    <tr>
                        <td>Anggota ASKLIN?</td>
                        <td>
                            @if($k->asklin == 0)
                                Tidak
                            @else
                                {{ $k->no_anggota }}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Klinik</td>
                        <td>{{ $k->nama_klinik.' ('.$k->jenis_klinik.')' }}</td>
                    </tr>
                    <tr>
                        <td>No. Ijin Klinik</td>
                        <td>{{ $k->no_ijin_klinik }}</td>
                    </tr>
                    <tr>
                        <td>Masa Berlaku Ijin</td>
                        <td>{{ date('d/m/Y', strtotime($k->tgl_terbit_ijin_klinik)) }} - {{ date('d/m/Y', strtotime($k->masa_berlaku_ijin_klinik)) }}</td>
                    </tr>
                    <tr>
                        <td>No. Telfon</td>
                        <td>{{ $k->tlf_klinik }}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>{{ $k->alamat_klinik.', RT '.$k->rt.' / RW '.$k->rw.', Kel. '.$kel->name.', Kec. '.$kec->name.', '.$kab->name.', '.$prov->name.' '.$k->kode_pos }}</td>
                    </tr>
                    <tr>
                        <td>Kriteria Klinik</td>
                        <td>
                            @foreach ($mkk as $i)
                            {{ (in_array($i->id, explode(",", $k->kriteria)) ? $i->kriteria.', ' : '')}}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Fasilitas Klinik</td>
                        <td>
                            @foreach ($mfk as $i)
                            {{ (in_array($i->id, explode(",", $k->kriteria)) ? $i->fasilitas.', ' : '')}}
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td>Layanan Klinik</td>
                        <td>
                            {{ (in_array(1, explode(",", $k->layanan)) ? 'Akunpuntur, ' : '')}}
                            {{ (in_array(2, explode(",", $k->layanan)) ? 'Bedah, ' : '')}}
                            {{ (in_array(3, explode(",", $k->layanan)) ? 'Gigi, ' : '')}}
                            {{ (in_array(4, explode(",", $k->layanan)) ? 'Kebidanan, ' : '')}}
                            {{ (in_array(5, explode(",", $k->layanan)) ? 'Penyakit Dalam, ' : '')}}
                            {{ (in_array(6, explode(",", $k->layanan)) ? 'Rehabilitasi Medik, ' : '')}}
                            {{ (in_array(7, explode(",", $k->layanan)) ? 'Umum, ' : '')}}
                            {{ (in_array(8, explode(",", $k->layanan)) ? 'Gigi, ' : '')}}
                            {{ (in_array(9, explode(",", $k->layanan)) ? 'Estetika, ' : '')}}
                            {{ (in_array(10, explode(",", $k->layanan)) ? 'Hemodialisa, ' : '')}}
                            {{ (in_array(11, explode(",", $k->layanan)) ? 'Mata, ' : '')}}
                            {{ (in_array(12, explode(",", $k->layanan)) ? 'Persalinan 24 Jam, ' : '')}}
                            {{ (in_array(13, explode(",", $k->layanan)) ? 'THT, ' : '')}}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">Penanggung Jawab Klinik</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $k->nama_pendaftar }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $k->status_pendaftar }}</td>
                    </tr>
                    <tr>
                        <td>No. Telfon</td>
                        <td>{{ $k->tlf_pendaftar }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="card-title">Kepemilikan Klinik</div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Nama</td>
                        <td>{{ $k->nama_pemilik }}</td>
                    </tr>
                    <tr>
                        <td>Status Kepemilikan</td>
                        <td>{{ $k->status_kepemilikan_klinik }}</td>
                    </tr>
                    @if($k->status_kepemilikan_klinik == "Badan Usaha")
                        <tr>
                            <td>Nama Badan Usaha</td>
                            <td>{{ $k->nama_badan.' ('.$k->bentuk_badan_usaha.')' }}</td>
                        </tr>
                    @elseif($k->status_kepemilikan_klinik == "Badan Hukum")
                        <tr>
                            <td>Nama Badan Hukum</td>
                            <td>{{ $k->nama_badan.' ('.$k->bentuk_badan_hukum.')' }}</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-7">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Penanggung Jawab Klinik</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Nama Dokter</th>
                            <th>NPA IDI/PDGI</th>
                            <th>No. STR</th>
                            <th>No. SIP</th>
                            <th>Tgl. Akhir SIP</th>
                            <th>Telepon</th>
                            <th>Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pj as $i)
                            <tr>
                                <td>{{ $i->nama }}</td>
                                <td>{{ $i->npa_idi }}</td>
                                <td>{{ $i->no_str }}</td>
                                <td>{{ $i->no_sip }}</td>
                                <td>{{ $i->tgl_akhir_sip }}</td>
                                <td>{{ $i->no_tlf }}</td>
                                <td>
                                    <a href="{{ asset('images/klinik/sdm/' . $i->foto_str) }}" target="_blank">STR</a>
                                    <br/>
                                    <a href="{{ asset('images/klinik/sdm/' . $i->foto_sip) }}" target="_blank">SIP</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dokter Praktek</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Nama Dokter</th>
                            <th>NPA IDI/PDGI</th>
                            <th>No. STR</th>
                            <th>No. SIP</th>
                            <th>Tgl. Akhir SIP</th>
                            <th>Telepon</th>
                            <th>Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dp as $i)
                            <tr>
                                <td>{{ $i->nama }}</td>
                                <td>{{ $i->npa_idi }}</td>
                                <td>{{ $i->no_str }}</td>
                                <td>{{ $i->no_sip }}</td>
                                <td>{{ $i->tgl_akhir_sip }}</td>
                                <td>{{ $i->no_tlf }}</td>
                                <td>
                                    <a href="{{ asset('images/klinik/sdm/' . $i->foto_str) }}" target="_blank">STR</a>
                                    <br/>
                                    <a href="{{ asset('images/klinik/sdm/' . $i->foto_sip) }}" target="_blank">SIP</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">TENAGA KEPERAWATAN</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>No. SIB/SIK</th>
                            <th>No. STR</th>
                            <th>Tgl. Akhir STR</th>
                            <th>Keterangan SIB/SIK </th>
                            <th>Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tp as $i)
                            <tr>
                                <td>{{ $i->nama }}</td>
                                <td>{{ $i->no_sib_sik }}</td>
                                <td>{{ $i->no_str }}</td>
                                <td>{{ $i->tgl_akhir_str }}</td>
                                <td>{{ $i->ket_sib_sik }}</td>
                                <td>
                                    <a href="{{ asset('images/klinik/sdm/' . $i->foto_str) }}" target="_blank">STR</a>
                                    <br/>
                                    <a href="{{ asset('images/klinik/sdm/' . $i->foto_sip) }}" target="_blank">SIP</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">TENAGA KESEHATAN LAIN</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Teknis Kefarmasian/Apoteker</th>
                            <th>No. STR</th>
                            <th>Tgl. Akhir STR</th>
                            <th>No. SIPA</th>
                            <th>No. SIAA / SIK</th>
                            <th>Keterangan SIPA/SIAA/SIK</th>
                            <th>Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tkl as $i)
                            <tr>
                                <td>{{ $i->nama }}</td>
                                <td>{{ $i->farmasi_apoteker }}</td>
                                <td>{{ $i->no_str }}</td>
                                <td>{{ $i->tgl_akhir_str }}</td>
                                <td>{{ $i->no_sip }}</td>
                                <td>{{ $i->no_sib_sik }}</td>
                                <td>{{ $i->ket_sib_sik }}</td>
                                <td>
                                    <a href="{{ asset('images/klinik/sdm/' . $i->foto_str) }}" target="_blank">STR</a>
                                    <br/>
                                    <a href="{{ asset('images/klinik/sdm/' . $i->foto_sip) }}" target="_blank">SIP</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">TENAGA SDM LAIN</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Ijazah Terakhir</th>
                            <th>Jabatan/Pekerjaan</th>
                            <th>Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tsl as $i)
                            <tr>
                                <td>{{ $i->nama }}</td>
                                <td>{{ $i->ijazah_terakhir }}</td>
                                <td>{{ $i->jabatan }}</td>
                                <td>
                                    <a href="{{ asset('images/klinik/sdm/' . $i->foto_ijazah) }}" target="_blank">Ijazah</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">TENAGA SDM LAIN</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Ijazah Terakhir</th>
                            <th>Jabatan/Pekerjaan</th>
                            <th>Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tsl as $i)
                            <tr>
                                <td>{{ $i->nama }}</td>
                                <td>{{ $i->ijazah_terakhir }}</td>
                                <td>{{ $i->jabatan }}</td>
                                <td>
                                    <a href="{{ asset('images/klinik/sdm/' . $i->foto_ijazah) }}" target="_blank">Ijazah</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">RUMAH SAKIT TERDEKAT</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Rumah Sakit</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Jarak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rs as $i)
                            <tr>
                                <td>{{ $i->rs }}</td>
                                <td>{{ $i->alamat }}</td>
                                <td>{{ $i->tlf }}</td>
                                <td>{{ $i->jarak }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">KERJASAMA DENGAN PROVIDER ASURANSI</h3>
            </div>
            <div class="card-body">
            <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Nama Perusahaan</th>
                            <th>Nama Kontak</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Bukti Kerjasama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asuransi as $i)
                            <tr>
                                <td>{{ $i->asuransi }}</td>
                                <td>{{ $i->kontak }}</td>
                                <td>{{ $i->alamat }}</td>
                                <td>{{ $i->tlf }}</td>
                                <td>
                                    <a href="{{ asset('images/klinik/asuransi/' . $i->kerjasama) }}" target="_blank">Dokumen</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DOKUMEN PERIZINAN</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <th>Dokumen</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Diperbarui</th>
                        <th>Tindakan</th>
                    </thead>
                    <tbody>
                        @foreach ($ps as $i)
                            <tr>
                                <td><a href="{{ asset('images/klinik/syarat/' . $i->dokumen) }}" target="_blank"><i class="fe fe-edit"></i></a></td>
                                <td>{{ $i->kategori }}</td>
                                <td>
                                    @if($i->status == 0)
                                        PENDING
                                    @elseif($i->status == 1)
                                        GAGAL<br><i>{{ $i->keterangan }}</i>
                                    @else
                                        TERVERIFIKASI
                                    @endif
                                </td>
                                <td>{{ $i->updated_at }}</td>
                                <td>
                                    @can('persyaratan-edit')
                                        <button class="btn btn-sm btn-secondary badge" type="button" onClick="persyaratan({{ $i->id }})"><i class="fa fa-pencil"></i></button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">FOTO RUANG KLINIK</h3>
            </div>
            <div class="card-body">
                <div class="row mt-lg-5">
                    @foreach ($rk as $i)
                        <div class="col-lg-4">
                            <span class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info-dark thumb-info-bottom-info-show-more thumb-info-no-zoom">
                                <span class="thumb-info-wrapper">
                                    <img src="{{ asset('images/klinik/ruang_klinik/' . $i->foto) }}" class="img-fluid">
                                    <span class="thumb-info-title">
                                        <span class="thumb-info-inner line-height-1">{{ $i->ruang }}</span>
                                        <span class="thumb-info-type opacity-8">{{ $i->created_at }}</span>
                                    </span>
                                </span>
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@include('klinik.modal')
@endsection