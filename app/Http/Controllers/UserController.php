<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(5);
        return view('users.index', ['users' => $users]);
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
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = md5('$request->password');
        $users->is_admin = $request->is_admin;
        $users->save();
        if ($users) {
            return redirect()->back()->with('Thêm người dùng thành công');
        } else
        return redirect()->back()->with('Thêm người dùng thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        if (!$users){
            return back()->with('Error', 'Không tìm thấy người dùng');
        }
        $users->update($request->all());
        return back()->with('Success', 'Thay đổi thông tin người dùng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *

     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        if (!$user){
            return back()->with('Error', 'Xóa người dùng thất bại');
        }else
        $user->delete();
        return back()->with('Success', 'Xóa người dùng thành công!');
    }
}
