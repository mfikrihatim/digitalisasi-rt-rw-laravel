<?php

namespace App\Http\Controllers\Admin;

use App\History_Category;
use App\Master_agama;
use App\Master_Pekerjaan;
use App\Rt;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWargaRequest;
use App\Http\Requests\StoreWargaRequest;
use App\Http\Requests\UpdateWargaRequest;
use App\Warga;
use App\Pendidikan;
use App\Master_Alamat;
use App\Master_Gaji;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ImportWargaRequest;
use Maatwebsite\Excel\Facades\Excel;

class WargaController extends Controller
{
    public function index()
    {
        if (isset($_GET['is_import'])) {
            $result = $this->import();
            return $result;
        } else {
            $userLogin = Auth::user()->user_fullname;
            abort_unless(\Gate::allows('warga_access'), 403);

            $user = Auth::user()->rt_id;
            if ($user != null) {
                $warga = Warga::select(
                    'warga.*',
                    'religion.religion_name',
                    'rt.rt_name',
                    'pendidikan.pendidikan_name',
                    'address_code.address_code_name',
                    'job.job_name',
                    'salary.salary_start',
                    'salary.salary_end'
                )
                    ->leftJoin('religion', 'religion.id', '=', 'warga.warga_religion')
                    ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                    ->leftJoin('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                    ->leftJoin('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                    ->leftJoin('job', 'job.id', '=', 'warga.warga_job')
                    ->leftJoin('salary', 'salary.id', '=', 'warga.warga_salary_range')
                    ->where('warga.warga_rt', $user)
                    ->get();
            } else {
                $warga = Warga::select(
                    'warga.*',
                    'religion.religion_name',
                    'rt.rt_name',
                    'pendidikan.pendidikan_name',
                    'address_code.address_code_name',
                    'job.job_name',
                    'salary.salary_start',
                    'salary.salary_end'
                )
                    ->leftJoin('religion', 'religion.id', '=', 'warga.warga_religion')
                    ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                    ->leftJoin('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                    ->leftJoin('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                    ->leftJoin('job', 'job.id', '=', 'warga.warga_job')
                    ->leftJoin('salary', 'salary.id', '=', 'warga.warga_salary_range')->get();
            }

            // $warga = Warga::all();
            return view('admin.warga.index', compact('warga', 'userLogin'));
        }
    }
    public function import()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('warga_access'), 403);

        $user = Auth::user()->rt_id;
        if ($user != null) {
            $warga = Warga::select(
                'warga.*',
                'religion.religion_name',
                'rt.rt_name',
                'pendidikan.pendidikan_name',
                'address_code.address_code_name',
                'job.job_name',
                'salary.salary_start',
                'salary.salary_end'
            )
                ->join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')
                ->where('warga.warga_rt', $user)
                ->get();
        } else {
            $warga = Warga::select(
                'warga.*',
                'religion.religion_name',
                'rt.rt_name',
                'pendidikan.pendidikan_name',
                'address_code.address_code_name',
                'job.job_name',
                'salary.salary_start',
                'salary.salary_end'
            )
                ->join('religion', 'religion.id', '=', 'warga.warga_religion')
                ->join('rt', 'rt.id', '=', 'warga.warga_rt')
                ->join('pendidikan', 'pendidikan.id', '=', 'warga.warga_pendidikan')
                ->join('address_code', 'address_code.id', '=', 'warga.warga_address_code')
                ->join('job', 'job.id', '=', 'warga.warga_job')
                ->join('salary', 'salary.id', '=', 'warga.warga_salary_range')->get();
        }

        // $warga = Warga::all();
        return view('admin.warga.import', compact('warga', 'userLogin'));
    }

    public function importExcel(StoreWargaRequest $request)
    {
        $rt_id = Auth::user()->rt_id;
        if($request->file('input') == null){
            return redirect()->route('admin.warga.index' , '?is_import=true')->with(['error' => 'Harap Masukan File Import Terlebih dahulu']);
        }
        $rows = Excel::toArray(new ImportWargaRequest, $request->file('input'));
        $test = "";
       
        foreach ($rows[0] as $key => $row) {
            if ($key != 0) {
                //format tanpa id join
                // $warga = array(
                //     'warga_no_ktp' => $row[0],
                //     'warga_no_kk' => $row[1],
                //     'warga_first_name' => $row[2],
                //     'warga_last_name' => $row[3],
                //     'warga_sex' => null,
                //     'warga_religion' => null,
                //     'warga_address' => $row[4],
                //     'warga_phone' => $row[5],
                //     'warga_address_code' => null,
                //     'warga_job' => null,
                //     'warga_salary_range' => null,
                //     'warga_email' => $row[6],
                //     'warga_birth_date' => $row[7],
                //     'warga_is_ktp_sama_domisili' => null,
                //     'warga_join_date' => $row[8],
                //     'warga_pendidikan' => null,
                //     'warga_rt' => $rt_id,
                //     'warga_status' => $row[9],
                // );
                $warga = array(
                    'warga_no_ktp' => $row[0],
                    'warga_no_kk' => $row[1],
                    'warga_first_name' => $row[2],
                    'warga_last_name' => $row[3],
                    'warga_sex' => $row[4],
                    'warga_religion' => $row[5],
                    'warga_address' => $row[6],                   
                    'warga_address_code' => $row[7],
                    'warga_job' => $row[8],
                    'warga_salary_range' => $row[9],
                    'warga_phone' => $row[10],
                    'warga_email' => $row[11],
                    'warga_birth_date' => $row[12],
                    'warga_is_ktp_sama_domisili' => $row[13],
                    'warga_join_date' => $row[14],
                    'warga_pendidikan' => $row[15],
                    'warga_rt' => $rt_id,
                    'warga_status' => $row[16],
                );
                $isNumeric = is_numeric($row[1]);
                if($isNumeric == true){
                    $insert = Warga::create($warga);
                }else{
                    $rowExcel = $key;
                    return redirect()->route('admin.warga.index' , '?is_import=true')->with(['error' => 'Kesalahan Data Tidak Valid Pada Row ' . (string)$rowExcel]);
                }               
            }
        }
        return redirect()->route('admin.warga.index' , '?is_import=true')->with(['success' => 'Data Berhasil di Import']);
    }
    public function create()
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('warga_create'), 403);

        $user = Auth::user()->rt_id;

        $religions = Master_agama::all()->pluck('religion_name', 'id');
        $jobs = Master_Pekerjaan::all()->pluck('job_name', 'id');

        if ($user != null) {
            $rts = Rt::where('id', $user)->pluck('rt_name', 'id');
            $master_alamats = Master_Alamat::where('address_code_rt', $user)->get();
            $warga_salary_range = Master_Gaji::where('salary_rt', $user)->get();
        } else {
            $rts = Rt::all()->pluck('rt_name', 'id');
            $master_alamats = Master_Alamat::all();
            $warga_salary_range = Master_Gaji::all();
        }
        $pendidikans = Pendidikan::all()->pluck('pendidikan_name', 'id');

        return view('admin.warga.create', compact('religions', 'jobs', 'rts', 'pendidikans', 'master_alamats', 'userLogin', 'warga_salary_range'));
    }

    public function store(StoreWargaRequest $request)
    {
        abort_unless(\Gate::allows('warga_create'), 403);
        if (isset($_FILES['input'])) {
            $result = $this->importExcel($request);
            return $result;
        } else {
            $warga = Warga::create($request->all());

            return redirect()->route('admin.warga.index');
        }
    }

    public function edit(Warga $warga)
    {
        $userLogin = Auth::user()->user_fullname;
        abort_unless(\Gate::allows('warga_edit'), 403);
        $user = Auth::user()->rt_id;

        $warga_religion = Master_agama::all()->pluck('religion_name', 'id');
        $warga_job = Master_Pekerjaan::all()->pluck('job_name', 'id');
        if ($user != null) {
            $warga_rt = Rt::where('id', $user)->pluck('rt_name', 'id');
            $warga_address_code = Master_Alamat::where('address_code_rt', $user)->get();
            $warga_salary_range = Master_Gaji::where('salary_rt', $user)->get();
        } else {
            $warga_rt = Rt::all()->pluck('rt_name', 'id');
            $warga_address_code = Master_Alamat::all();
            $warga_salary_range = Master_Gaji::all();
        }
        $warga_pendidikan = Pendidikan::all()->pluck('pendidikan_name', 'id');
        $joinDate = date('Y-m-d', strtotime($warga->warga_join_date));
        $dob =  date('Y-m-d', strtotime($warga->warga_birth_date));

        return view('admin.warga.edit', compact(
            'warga',
            'warga_religion',
            'warga_job',
            'warga_rt',
            'warga_pendidikan',
            'warga_address_code',
            'warga_salary_range',
            'userLogin',
            'joinDate',
            'dob'
        ));
    }

    public function update(UpdateWargaRequest $request, Warga $warga)
    {

        abort_unless(\Gate::allows('warga_edit'), 403);

        $warga->update($request->all());

        return redirect()->route('admin.warga.index');
    }

    public function show(Warga $warga)
    {
        abort_unless(\Gate::allows('warga_show'), 403);

        return view('admin.warga.show', compact('warga'));
    }

    public function destroy(Warga $warga)
    {
        abort_unless(\Gate::allows('warga_delete'), 403);

        $warga->delete();

        return back();
    }

    public function massDestroy(MassDestroyWargaRequest $request)
    {
        Warga::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
