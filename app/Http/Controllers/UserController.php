<?php
    
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use DataTables;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','store']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $roles = Role::pluck('name','name')->all();
        return view('backend.users.index', compact('roles'));
    }

    public function getUsers(Request $request)
    {
        $data = User::with('roles')->latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', 'backend.users.action')
            ->rawColumns(['action'])
            ->toJson();
    }

    public function store(Request $request)
    {
        $userID = $request->id;
        $user = User::updateOrCreate(
            ['id' => $userID],
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]
        );
        $user->assignRole($request->input('roles'));

        return Response()->json($user);
    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $user  = User::with('roles')->where($where)->first();

        return Response()->json($user);
    }

    public function destroy(Request $request)
    {
        $user = User::where('id',$request->id)->delete();
        return Response()->json($user);
    }
}