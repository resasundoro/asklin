<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\M_Kriteria_KlinikController;
use App\Http\Controllers\M_Ruang_KlinikController;
use App\Http\Controllers\M_Fasilitas_KlinikController;
use App\Http\Controllers\M_Layanan_KlinikController;
use App\Http\Controllers\KlinikController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\M_KaryawanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\Rumah_SakitController;
use App\Http\Controllers\AsuransiController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SurveyorController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Ruang_KlinikController;
use App\Http\Controllers\M_PersyaratanController;
use App\Http\Controllers\PersyaratanController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  
// Page
Route::get('/', [PageController::class, 'index'])->name('home');
  
Auth::routes();

// Datatable
Route::get('users/list', [UserController::class, 'getUsers'])->name('users.list');
Route::get('roles/list', [RoleController::class, 'getRoles'])->name('roles.list');
Route::get('kriteria_klinik/list', [M_Kriteria_KlinikController::class, 'getKriteria'])->name('kriteria_klinik.list');
Route::get('m_ruang_klinik/list', [M_Ruang_KlinikController::class, 'getM_Ruang'])->name('m_ruang_klinik.list');
Route::get('fasilitas_klinik/list', [M_Fasilitas_KlinikController::class, 'getFasilitas'])->name('fasilitas_klinik.list');
Route::get('klinik/list', [KlinikController::class, 'getKlinik'])->name('klinik.list');
Route::get('m_karyawan/list', [M_KaryawanController::class, 'getM_Karyawan'])->name('m_karyawan.list');
Route::get('karyawan/list', [KaryawanController::class, 'getKaryawan'])->name('karyawan.list');
Route::get('rumah_sakit/list', [Rumah_SakitController::class, 'getRumah_Sakit'])->name('rumah_sakit.list');
Route::get('asuransi/list', [AsuransiController::class, 'getAsuransi'])->name('asuransi.list');
Route::get('surveyor/list', [SurveyorController::class, 'getSurveyor'])->name('surveyor.list');
Route::get('ruang_klinik/list', [Ruang_KlinikController::class, 'getRuang'])->name('ruang_klinik.list');
Route::get('m_persyaratan/list', [M_PersyaratanController::class, 'getM_Persyaratan'])->name('m_persyaratan.list');
Route::get('persyaratan/list', [PersyaratanController::class, 'getPersyaratan'])->name('persyaratan.list');

// Wilayah
Route::post('getKota', [WilayahController::class, 'getKota'])->name('getKota');
Route::post('getKecamatan', [WilayahController::class, 'getKecamatan'])->name('getKecamatan');
Route::post('getKelurahan', [WilayahController::class, 'getKelurahan'])->name('getKelurahan');
  
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('roles', RoleController::class);
    Route::post('roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::post('roles/delete', [RoleController::class, 'destroy'])->name('roles.delete');

    Route::resource('users', UserController::class);
    Route::post('users/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users/store', [UserController::class, 'store'])->name('users.store');
    Route::post('users/delete', [UserController::class, 'destroy'])->name('users.delete');

    Route::resource('kriteria_klinik', M_Kriteria_KlinikController::class);
    Route::post('kriteria_klinik/edit', [M_Kriteria_KlinikController::class, 'edit'])->name('kriteria_klinik.edit');
    Route::post('kriteria_klinik/store', [M_Kriteria_KlinikController::class, 'store'])->name('kriteria_klinik.store');
    Route::post('kriteria_klinik/delete', [M_Kriteria_KlinikController::class, 'destroy'])->name('kriteria_klinik.delete');
    
    Route::resource('m_ruang_klinik', M_Ruang_KlinikController::class);
    Route::post('m_ruang_klinik/edit', [M_Ruang_KlinikController::class, 'edit'])->name('m_ruang_klinik.edit');
    Route::post('m_ruang_klinik/store', [M_Ruang_KlinikController::class, 'store'])->name('m_ruang_klinik.store');
    Route::post('m_ruang_klinik/delete', [M_Ruang_KlinikController::class, 'destroy'])->name('m_ruang_klinik.delete');

    Route::resource('fasilitas_klinik', M_Fasilitas_KlinikController::class);
    Route::post('fasilitas_klinik/edit', [M_Fasilitas_KlinikController::class, 'edit'])->name('fasilitas_klinik.edit');
    Route::post('fasilitas_klinik/store', [M_Fasilitas_KlinikController::class, 'store'])->name('fasilitas_klinik.store');
    Route::post('fasilitas_klinik/delete', [M_Fasilitas_KlinikController::class, 'destroy'])->name('fasilitas_klinik.delete');

    Route::resource('klinik', KlinikController::class);
    Route::post('klinik/store', [KlinikController::class, 'store'])->name('klinik.store');
    Route::post('klinik/delete', [KlinikController::class, 'destroy'])->name('klinik.delete');
    Route::post('klinik/show', [KlinikController::class, 'lihat'])->name('klinik.show');

    Route::resource('m_karyawan', M_KaryawanController::class);
    Route::post('m_karyawan/edit', [M_KaryawanController::class, 'edit'])->name('m_karyawan.edit');
    Route::post('m_karyawan/store', [M_KaryawanController::class, 'store'])->name('m_karyawan.store');
    Route::post('m_karyawan/delete', [M_KaryawanController::class, 'destroy'])->name('m_karyawan.delete');

    Route::resource('karyawan', KaryawanController::class);
    Route::post('karyawan/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::post('karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::post('karyawan/delete', [KaryawanController::class, 'destroy'])->name('karyawan.delete');

    Route::resource('rumah_sakit', Rumah_SakitController::class);
    Route::post('rumah_sakit/edit', [Rumah_SakitController::class, 'edit'])->name('rumah_sakit.edit');
    Route::post('rumah_sakit/store', [Rumah_SakitController::class, 'store'])->name('rumah_sakit.store');
    Route::post('rumah_sakit/delete', [Rumah_SakitController::class, 'destroy'])->name('rumah_sakit.delete');

    Route::resource('asuransi', AsuransiController::class);
    Route::post('asuransi/edit', [AsuransiController::class, 'edit'])->name('asuransi.edit');
    Route::post('asuransi/store', [AsuransiController::class, 'store'])->name('asuransi.store');
    Route::post('asuransi/delete', [AsuransiController::class, 'destroy'])->name('asuransi.delete');

    Route::resource('surveyor', SurveyorController::class);
    Route::post('surveyor/edit', [SurveyorController::class, 'edit'])->name('surveyor.edit');
    Route::post('surveyor/store', [SurveyorController::class, 'store'])->name('surveyor.store');
    Route::post('surveyor/delete', [SurveyorController::class, 'destroy'])->name('surveyor.delete');

    Route::get('pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::get('pendaftaran/edit', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');
    Route::put('pendaftaran/{id}/update', [PendaftaranController::class, 'update'])->name('pendaftaran.update');
    Route::get('pendaftaran/sdm', [PendaftaranController::class, 'sdm'])->name('pendaftaran.sdm');
    Route::put('pendaftaran/draft', [PendaftaranController::class, 'draft'])->name('pendaftaran.draft');
    Route::put('pendaftaran/submit', [PendaftaranController::class, 'submit'])->name('pendaftaran.submit');

    Route::resource('ruang_klinik', Ruang_KlinikController::class);
    Route::post('ruang_klinik/edit', [Ruang_KlinikController::class, 'edit'])->name('ruang_klinik.edit');
    Route::post('ruang_klinik/store', [Ruang_KlinikController::class, 'store'])->name('ruang_klinik.store');
    Route::post('ruang_klinik/delete', [Ruang_KlinikController::class, 'destroy'])->name('ruang_klinik.delete');

    Route::resource('m_persyaratan', M_PersyaratanController::class);
    Route::post('m_persyaratan/edit', [M_PersyaratanController::class, 'edit'])->name('m_persyaratan.edit');
    Route::post('m_persyaratan/store', [M_PersyaratanController::class, 'store'])->name('m_persyaratan.store');
    Route::post('m_persyaratan/delete', [M_PersyaratanController::class, 'destroy'])->name('m_persyaratan.delete');

    Route::resource('persyaratan', PersyaratanController::class);
    Route::post('persyaratan/edit', [PersyaratanController::class, 'edit'])->name('persyaratan.edit');
    Route::post('persyaratan/store', [PersyaratanController::class, 'store'])->name('persyaratan.store');
    Route::post('persyaratan/delete', [PersyaratanController::class, 'destroy'])->name('persyaratan.delete');

    Route::get('status-akreditasi', [PageController::class, 'status_akreditasi'])->name('status_akreditasi');

    Route::get('user-profil', [PageController::class, 'user_profil'])->name('user_profil');

    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update/password', [ProfileController::class, 'password'])->name('profile.update.password');
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/update/account', [ProfileController::class, 'update_account'])->name('profile.update.account');
});