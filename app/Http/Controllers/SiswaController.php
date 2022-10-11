<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Str;
use Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::paginate(5);
        $kelas_id = Kelas::all();
        $mapel_id = Mapel::all();

        $title = "Guru";

        return view('siswa.index', compact('siswa', 'kelas_id', 'mapel_id', 'title'));
    }

    public function data()
    {
        $siswa = siswa::orderBy('id', 'desc')->get();

        return datatables()
            ->of($siswa)
            ->addIndexColumn()
            ->editColumn('nama', function($siswa){
                return '
                <a href="/siswa/profile/'.$siswa->id.'">'.$siswa->nama.'</a>
                ';
            })
            ->editColumn('mapel_id', function($guru){
                return $guru->mapel->nama;
            })
            ->editColumn('kelas_id', function($guru){
                return $guru->kelas->nama;
            })
            ->addColumn('action', function($siswa){
                return '
                <div class="btn-group">
                    <button onclick="editData(`' .route('siswa.update', $siswa->id). '`)" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                    <button onclick="deleteData(`' .route('siswa.destroy', $siswa->id). '`)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['action', 'mapel_id', 'kelas_id', 'nama'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas_id = Kelas::all();
        $mapel_id = Mapel::all();
        return view('component.siswa.form', compact('kelas_id', 'mapel_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(20);
        $user->save();

        $request->request->add(['user_id' => $user->id]);
        // $validator = Validator::make($request->all(), [
        //     'nama' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'alamat' => 'required',
        //     'kelas_id' => 'required',
        //     'mapel_id' => 'required'
        // ]);


        // if($validator->fails()){
        //     return response()->json($validator->errors(), 422);
        // }

        $siswa = Siswa::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $siswa
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return response()->json($siswa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->alamat = $request->alamat;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->mapel_id = $request->mapel_id;
        $siswa->update();

        return response()->json('Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect('siswa');
    }

    public function profile($id){
        $siswa = Siswa::find($id);
        return view('siswa.profile');
    }
}
