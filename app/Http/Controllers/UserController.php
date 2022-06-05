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
        $roles = Role::all();
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
        $data = User::find($request->id);
        $role = $data->roles()->first()->id;

        return Response()->json([$data, $role]);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id)->delete();
        return Response()->json($user);
    }
}