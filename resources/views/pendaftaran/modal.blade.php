<!-- MODAL SDM & RS & ASURANSI -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <form action="javascript:void(0)" id="form" class="mb-4" novalidate="novalidate" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="id_klinik" id="id_klinik">
                <div class="modal-body" id="sdm">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Peranan</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control h-auto" data-msg-required="Peranan" name="id_kategori" id="id_kategori" required>
                                <option value="0">==Pilih==</option>
                                <option value="1" id="op1">Penanggung Jawab Klinik</option>
                                <option value="2" id="op2">Dokter Praktek</option>
                                <option value="3" id="op3">Tenaga Keperawatan</option>
                                <option value="4" id="op4">Tenaga Kesehatan Lain</option>
                                <option value="5" id="op5">Tenaga SDM Lain</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row align-items-center grup1">
                        <label class="col-sm-3 text-start text-sm-end mb-0 nama">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap Dokter Dengan Gelar" required/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center grup2">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Teknis Kefarmasian / Apoteker</label>
                        <div class="col-sm-9">
                            <input type="text" id="farmasi_apoteker" name="farmasi_apoteker" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row align-items-center grup3">
                        <label class="col-sm-3 text-start text-sm-end mb-0 npa_idi">NO NPA IDI</label>
                        <div class="col-sm-9">
                            <input type="text" id="npa_idi" name="npa_idi" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row align-items-center grup4">
                        <label class="col-sm-3 text-start text-sm-end mb-0 no_sib_sik">No. SIB/SIK</label>
                        <div class="col-sm-9">
                            <input type="text" id="no_sib_sik" name="no_sib_sik" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup5">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Nomor STR</label>
                        <div class="col-sm-9">
                            <input type="text" id="no_str" name="no_str" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup6">
                        <label class="col-sm-3 text-start text-sm-end mb-0 no_sip">Nomor SIPA</label>
                        <div class="col-sm-9">
                            <input type="text" id="no_sip" name="no_sip" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup7">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Tgl Akhir SIP</label>
                        <div class="col-sm-9">
                            <input type="date" id="tgl_akhir_sip" name="tgl_akhir_sip" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup8">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Tgl Akhir SRT</label>
                        <div class="col-sm-9">
                            <input type="date" id="tgl_akhir_str" name="tgl_akhir_str" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup9">
                        <label class="col-sm-3 text-start text-sm-end mb-0">No Telpon</label>
                        <div class="col-sm-9">
                            <input type="text" id="no_tlf" name="no_tlf" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup10">
                        <label class="col-sm-3 text-start text-sm-end mb-0 ket_sib_sik">Keterangan SIB/SIK</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="ket_sib_sik" name="ket_sib_sik"></textarea>
                        </div>
                    </div>
                    <div class="form-group row grup11">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Ijazah Terakhir</label>
                        <div class="col-sm-9">
                            <input type="text" id="ijazah_terakhir" name="ijazah_terakhir" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup12">
                        <label class="col-sm-3 text-start text-sm-end mb-0 no_sip">Pekerjaan / Jabatan</label>
                        <div class="col-sm-9">
                            <input type="text" id="jabatan" name="jabatan" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row grup13">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Upload Data</label>
                        <div class="col-sm-9">
                            <label for="foto_sip" class="form-label">Upload SIP</label>
                            <input class="form-control" type="file" id="foto_sip" name="foto_sip">
                            <label for="foto_str" class="form-label">Upload STR</label>
                            <input class="form-control" type="file" id="foto_str" name="foto_str">
                        </div>
                    </div>
                    <div class="form-group row grup14">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Upload Data</label>
                        <div class="col-sm-9">
                            <label for="foto_sip" class="form-label">Upload Ijazah</label>
                            <input class="form-control" type="file" id="foto_ijazah" name="foto_ijazah">
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="rs">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 text-start text-sm-end mb-0 rs">Nama RS</label>
                        <div class="col-sm-9">
                            <input type="text" name="rs" id="rs" class="form-control" placeholder="Nama Rumah Sakit" required/>
                            <input type="text" name="asuransi" id="asuransi" class="form-control" placeholder="Nama Perusahaan" required/>
                        </div>
                    </div>
                    <div class="form-group row align-items-center kontak">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Nama Kontak</label>
                        <div class="col-sm-9">
                            <input type="text" name="kontak" id="kontak" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Alamat</label>
                        <div class="col-sm-9">
                            <input type="text" name="alamat" id="alamat" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Jarak</label>
                        <div class="col-sm-9">
                            <input type="text" name="jarak" id="tlf" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Telepon</label>
                        <div class="col-sm-9">
                            <input type="text" name="tlf" id="tlf" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row kerjasama">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Upload Data</label>
                        <div class="col-sm-9">
                            <label for="kerjasama" class="form-label">Upload Bukti Kerjasama</label>
                            <input class="form-control" type="file" name="kerjasama" id="kerjasama">
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="rk">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Ruang</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control h-auto" data-msg-required="ruang" name="id_ruang_klinik" id="id_ruang_klinik" required>
                                <option value="0">==Pilih==</option>
                                @foreach ($mrk as $i)
                                    <option value="{{ $i->id }}">{{ $i->ruang }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Upload Ruang Klinik</label>
                        <div class="col-sm-9">
                            <label for="foto" class="form-label">Upload Ruang Klinik</label>
                            <input class="form-control" type="file" name="foto" id="foto">
                        </div>
                    </div>
                </div>
                <div class="modal-body" id="ps">
                    <div class="form-group row align-items-center">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Kategori</label>
                        <div class="col-sm-9">
                            <select class="form-select form-control h-auto" data-msg-required="kategori" name="id_persyaratan" id="id_persyaratan" required>
                                <option value="0">==Pilih==</option>
                                @foreach ($mps as $i)
                                    <option value="{{ $i->id }}">{{ $i->kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-start text-sm-end mb-0">Dokumen</label>
                        <div class="col-sm-9">
                            <label for="foto" class="form-label">Upload Persyaratan Izin</label>
                            <input class="form-control" type="file" name="dokumen" id="dokumen">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>