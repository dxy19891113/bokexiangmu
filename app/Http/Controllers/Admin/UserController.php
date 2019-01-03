<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_info;
use DB;
use Hash;
use App\Http\Requests\UserStore;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        //dump($data);
       return view('admin/user/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStore $request)
    {

    //     //验证字段
    //     $this->validate($request, [
    //     'uname'=>'required|unique:user|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
       
    //     'password'=>'required|regex:/^[\w]{6,18}$/',
    //     'repass'=>'required|same:password',
    //     'email'=>'required|email',
    //     'phone'=>'required|regex:/^1{1}[3-9]{1}[0-9]{9}$/',
    // ],[
    //     'uname.required'=>'用户名必填',
    //     'uname.regex'=>'用户名格式不正确',
    //     'uname.unique'=>'用户名已存在',
    //     'password.required'=>'密码必填',
    //     'password.regex'=>'密码格式不正确',
    //     'repass.required'=>'密码必填',
    //     'repass.same'=>'两次密码不一致',
    //     'email.required'=>'邮箱必填',
    //     'email.email'=>'邮箱格式不正确',
    //     'phone.required'=>'电话必填',
    //     'phone.regex'=>'电话格式不正确',

    // ]);
       $data = ($request->except(['_token','repass']));
       $data['password'] = Hash::make($data['password']);
        //dump($data);

        DB::beginTransaction();//开启事务
        //添加数据
       $user = new User;
       $user->uname = $request->uname;
       $user->password = Hash::make($request->password);
        $res1 = $user->save();

        //添加详情表
        $user_info = new user_info;
        $user_info->uid = $user->id;
        $user_info->email = $request->email;
        $user_info->phone = $request->phone;
        $res2 = $user_info->save();

        if ($res1 && $res2) {
            DB::commit();//提交事务
            return redirect('admin/user')->with('success','添加成功');
        }else {
            DB::rollBack();//回滚事务
            return back()->with('error','添加失败');
        }
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
       $data = user::all();
      dump($data);die;
      return view('admin/user/edit',['data'=>$data]);
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
        dump($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
