<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::resource('', 'HomeController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');

    Route::delete('sdm_category/destroy', 'SdmCategoryController@massDestroy')->name('sdm_category.massDestroy');

    Route::resource('sdm_category', 'SdmCategoryController');


    Route::resource('event_category', 'EventCategoryController');
    Route::delete('event_category/destroy', 'EventCategoryController@massDestroy')->name('event_category.massDestroy');

    Route::resource('insidental_category', 'InsidentalCategoryController');
    Route::delete('insidental_category/destroy', 'InsidentalCategoryController@massDestroy')->name('insidental_category.massDestroy');

    Route::resource('history_category', 'HistoryCategoryController');
    Route::delete('history_category/destroy', 'HistoryCategoryController@massDestroy')->name('History_category.massDestroy');

    Route::resource('master_agama', 'MasterAgamaController');
    Route::delete('master_agama/destroy', 'MasterAgamaController@massDestroy')->name('master_agama.massDestroy');

    Route::resource('master_gaji', 'MasterGajiController');
    Route::delete('master_gaji/destroy', 'MasterGajiController@massDestroy')->name('master_gaji.massDestroy');

    Route::resource('master_pekerjaan', 'MasterPekerjaanController');
    Route::delete('master_pekerjaan/destroy', 'MasterPekerjaanController@massDestroy')->name('master_pekerjaan.massDestroy');

    Route::resource('master_alamat', 'MasterAlamatController');
    Route::delete('master_alamat/destroy', 'MasterAlamatController@massDestroy')->name('master_alamat.massDestroy');

    Route::resource('insidental', 'InsidentalController');
    Route::delete('insidental/destroy', 'InsidentalController@massDestroy')->name('insidental.massDestroy');


    Route::resource('keuangan_category', 'KeuanganCategoryController');
    Route::delete('keuangan_category/destroy', 'KeuanganCategoryController@massDestroy')->name('Keuangan_category.massDestroy');


    Route::resource('history_warga', 'HistoryWargaController');
    Route::delete('history_warga/destroy', 'HistoryWargaController@massDestroy')->name('history_warga.massDestroy');

    Route::resource('rt', 'RtController');
    Route::delete('rt/destroy', 'RtController@massDestroy')->name('rt.massDestroy');

    Route::resource('event', 'EventController');
    Route::delete('event/destroy', 'EventController@massDestroy')->name('event.massDestroy');

    Route::resource('keuangan', 'KeuanganController');
    Route::delete('keuangan/destroy', 'KeuanganController@massDestroy')->name('keuangan.massDestroy');

    Route::resource('report_data_masyarakat_km', 'ReportController');


    Route::resource('rw', 'RwController');
    Route::delete('rw/destroy', 'RwController@massDestroy')->name('rw.massDestroy');

    Route::resource('kelurahan', 'KelurahanController');
    Route::delete('kelurahan/destroy', 'KelurahanController@massDestroy')->name('kelurahan.massDestroy');

    Route::resource('wilayah', 'WilayahController');
    Route::delete('wilayah/destroy', 'WilayahController@massDestroy')->name('wilayah.massDestroy');

    Route::resource('warga', 'WargaController');
    Route::delete('warga/destroy', 'WargaController@massDestroy')->name('warga.massDestroy');

    Route::resource('pendidikan', 'PendidikanController');
    Route::delete('pendidikan/destroy', 'PendidikanController@massDestroy')->name('pendidikan.massDestroy');

    Route::resource('sekolah', 'SekolahController');
    Route::delete('sekolah/destroy', 'SekolahController@massDestroy')->name('sekolah.massDestroy');

    Route::resource('sdm', 'SdmController');
    Route::delete('sdm/destroy', 'SdmController@massDestroy')->name('sdm.massDestroy');
    Route::resource('edit_password', 'EditPasswordController');
    Route::resource('logout', 'LogoutController');
});
