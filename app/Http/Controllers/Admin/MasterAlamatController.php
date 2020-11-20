<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMasterAlamatRequest;
use App\Http\Requests\StoreMasterAlamatRequest;
use App\Http\Requests\UpdateMasterAlamatRequest;
use App\Master_Alamat;
use Illuminate\Support\Facades\Auth;
use App\Rt;

class MasterAlamatController extends Controller
{
    public function index()
    {
        $user = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('master_alamat_access'), 403);
        if ($user != null) {
            $master_alamat = Master_Alamat::where('address_code_rt', $user)->get();
        } else {
            $master_alamat = Master_Alamat::all();
        }

        return view('admin.master_alamat.index', compact('master_alamat', 'user', 'userLogin'));
    }

    public function create()
    {
        $rts = Auth::user()->rt_id;
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('master_alamat_create'), 403);

        return view('admin.master_alamat.create', compact('userLogin', 'rts'));
    }

    public function store(StoreMasterAlamatRequest $request)
    {
        abort_unless(\Gate::allows('master_alamat_create'), 403);
        if (isset($_POST['address_code_name_start']) && isset($_POST['address_code_name_end'])) {
            for ($x = $_POST['address_code_name_start']; $x <= $_POST['address_code_name_end']; $x++) {
                $alamat = array(
                    'address_code_name' => $request->address_code_name,
                    'address_code_blok' => $request->address_code_blok . ' ' . $x,
                    'address_code_rt' => $request->address_code_rt,
                );
                $master_alamat = Master_Alamat::create($alamat);
            }
        }

        // return redirect()->route('admin.master_alamat.index');
        return redirect()->route('admin.master_alamat.index')->with(['success' => 'Pesan Berhasil']);
    }

    public function edit(master_alamat $master_alamat)
    {

        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('master_alamat_edit'), 403);

        return view('admin.master_alamat.edit', compact('master_alamat', 'userLogin'));
    }

    public function update(UpdateMasterAlamatRequest $request, master_alamat $master_alamat)
    {
        abort_unless(\Gate::allows('master_alamat_edit'), 403);

        $master_alamat->update($request->all());

        return redirect()->route('admin.master_alamat.index')->with(['edit' => 'Pesan Berhasil']);
    }

    public function show(master_alamat $master_alamat)
    {
        abort_unless(\Gate::allows('master_alamat_show'), 403);

        return view('admin.master_alamat.show', compact('master_alamat'));
    }

    public function destroy(master_alamat $master_alamat)
    {
        abort_unless(\Gate::allows('master_alamat_delete'), 403);

        $master_alamat->delete();

        return back();
    }

    public function massDestroy(MassDestroyMasterAlamatRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
