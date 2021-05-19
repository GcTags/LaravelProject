<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $users = DB::table('users')->get();
        // $users['users'] = User::withTrashed()->paginate(11);
        // $search = $request->input('term');
        // // dd($search);
        // return view('dashboards.admin.usertable.index', $users,compact('users'));

        $users = User::where([
            ['name','!=',Null],
            [function($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name','LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->withTrashed()
            ->orderBy("id")
            ->paginate(10);

            return view('dashboards.admin.usertable.index', $users,compact('users'))
                ->with('i', (request()->input('page', 1) -1) * 5);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboards.user.users.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        User::withTrashed()->find($user)->restore();
        // dd($user);
        $message = "Successfully Activated" ;
        return redirect('/users')->with('message', $message);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(User $user ,Request $request)
    {  
        $request->validate([
            'name' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'address' => 'required',
            'contact' => 'required|numeric',
            'birthdate' => 'required|date'
        ]);
        $name = $user->name;
        $user_id = User::find($user->id);
        $user_id->fill($request->all());
    
        if($user_id->save()){
            $message =  $name.' '."Successfully Updated";
            return redirect('/products')->with('message', $message);
        }
    }
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = User::find($user->id);
        
        if($user != null) {
            $user->delete();
            $message = "Successfully Deleted";
            return redirect('/users')->with('message', $message);
        }
        else {
        $message = "Wrong ID" ;
        return redirect('/users')->with('message', $message);
        }
    }
    
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('term');
        dd($search);

        // Search in the title and body columns from the posts table
        // $user = User::query()
        //     ->where('name', 'LIKE', "%{$search}%")
        //     ->orWhere('email', 'LIKE', "%{$search}%")
        //     ->get();
    
        // Return the search view with the resluts compacted
        // return view('users', compact('users'));
    }
}
