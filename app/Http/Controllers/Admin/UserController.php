<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Models\Membership;
use App\Models\Subscription;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function datatables()
    {
        $query = User::query();

        return DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('tindakan', function ($user) {
            return view('admin.users.tindakan', compact('user'));
        })
        ->make(true); // ->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $senaraiUsers = DB::table('users')->get();
        // $senaraiUsers = DB::table('users')
        // // ->where('status', '=', 'active')
        // // ->where('username', '=', 'ali')
        // ->orderBy('id', 'desc')
        // ->paginate(5); //->get();
        // $senaraiUsers = User::orderBy('id', 'desc')->paginate(5);

        // Die and dump
        // dd($senaraiUsers);

        // Cara 1 nak pass variable ke template
        // return view('admin.users.index')->with('senaraiUsers', $senaraiUsers);
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($request->password); // Hash::make($request->password);

        // DB::table('users')->insert($data);
        User::create($data);
        // Bila nak guna create(), kena setkan mass assignment pada model User
        // protected $fillable
        // Cara 2 simpan data
        // $user = new User;
        // $user->name = $request->name; // $request->input('name');
        // $user->username = $request->username; // $request->input('name');
        // $user->email = $request->email; // $request->input('email');
        // $user->password = bcrypt($request->password); // $request->input('password');
        // $user->status = $request->status; // $request->input('status');
        // $user->save();

        return redirect()->route('users.index')
        ->with('mesej-sukses', 'Rekod berjaya ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $memberships = Membership::select('id', 'name')->get();

        return view('admin.users.show')->with('user', $user)->with('memberships', $memberships);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $user = User::findOrFail($id);
        // $user = DB::table('users')->where('id', '=',$id)->first();

        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, User $user)
    {
        $data = $request->validated();

        if (!is_null($request->password))
        {
            $data['password'] = bcrypt($request->password);
        }

        // $user = DB::table('users')->where('id', '=', $id)->update($data);
        $user->update($data);

        return redirect()->route('users.index')
        ->with('mesej-sukses', 'Rekod berjaya dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // DB::table('users')->where('id', '=',$id)->delete();
        $user->delete();

        return redirect()->route('users.index')
        ->with('mesej-sukses', 'Rekod berjaya di hapuskan');
    }

    public function subscribe(Request $request, User $user)
    {
        $data = $request->validate([
            'membership_id' => ['required', 'integer']
        ]);

        // Cara pertama menerusi Subscription Model
        // Menerusi Model - protected $fillable
        // $data['user_id'] = $user->id; // Cara 1
        // Subscription::create($data); // Cara 1

        // $subscription = new Subscription();  // Cara 1
        // $subscription->user_id = $user->id;  // Cara 1
        // $subscription->membership_id = $request->input('membership_id');  // Cara 1
        // $subscription->save();  // Cara 1

        // Cara yang kedua menerusi relation antara user kepada subscription
        $user->subscriptions()->create($data);

        return redirect()->route('users.show', $user->id)
        ->with('mesej-sukses', 'Subscription telahpun berjaya!');
    }
}
