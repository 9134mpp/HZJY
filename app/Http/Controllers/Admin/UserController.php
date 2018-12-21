<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{


    //显示添加管理员表单
    public function create(Role $role){
        $roles=$role->all();
        return view('user.add',compact('roles'));
    }
    //添加管理员
    public function store(Request $request){
        //数据验证
       $this->validate($request,[
            'username' => 'required',
            'tel' => 'required',
            'email'=>'required',
            'password'=>'required',
            'role'=>'required'
        ],
            //自定义错误
            [
                'username.required'=>'用户名不能为空',
                'password.required'=>'密码不能为空',
                'tel.required'=>'手机号不能为空',
                'email.required'=>'邮箱不能为空',
                'role.required'=>'所属角色不能为空',
            ]);
        //验证用户名 如果用户名以存在返回注册界面
        $username=DB::table('users')->where('name',"$request->username")->first();
        $useremail=DB::table('users')->where('email',"$request->email")->first();
        $usertel=DB::table('users')->where('tel',"$request->tel")->first();

        if($username){
            return redirect()->route('user.create')->with('success','用户名存在');
        }elseif ($useremail){
            return redirect()->route('user.create')->with('success','邮箱以存在');
        }elseif($usertel){
            return redirect()->route('user.create')->with('success','手机号以存在');
        }

        //将数据保存在数据库中
        $user=User::create([
            'name'=>$request->username,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'tel'=>$request->tel,
            'remember_token'=>str_random(50),//自动登陆相关随机字符串
            'status'=>1,//状态值 1：正常  2：异常
        ]);
        //分配管理员角色
        $user->assignRole($request->role);

        return redirect()->route('user.index')->with('success','添加成功');

    }

    //显示管理员信息
    public function index(){
        $users=User::paginate(15);
        return view('user.index',compact('users'));
    }

    //回显管理员信息
    public function edit(User $user,Role $role){
        $roles=$role->all();
        return view('user.edit',compact('user','roles'));
    }
    //修改管理员信息
    public function update(Request $request,User $user){
        //数据验证
        $this->validate ($request,[
            'username' => 'required',
            'tel' => 'required',
            'email'=>'required',
            'password'=>'required',
        ],
            [
                'username.required'=>'用户名不能为空',
                'password.required'=>'密码不能为空',
                'tel.required'=>'手机号不能为空',
                'email.required'=>'邮箱不能为空',
            ]);

        $user->update([
            'name'=>$request->username,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'tel'=>$request->tel,
        ]);
        //为管理员修改角色
        $user->syncRoles($request->role);
        return redirect()->route('user.index')->with('success','修改成功');
    }
    //删除管理员
    public function destroy(User $user){
        $user->delete($user);
        return "success";
    }

    public function show(){
        //登陆首页
        return view('user.list');
    }
    //登陆
    public function login(Request $request){
        //验证数据有效性
        $this->validate($request,[
            'username'=>'required|max:20',
            'password'=>'required|max:20',
            'captcha'=>'required|captcha'
        ],
            [//自定义错误提示
                'username.required'=>'用户不能为空',
                'username.min'=>'用户不能少于一位',
                'username.max'=>'用户不能多于20位',
                'password.required'=>'密码不为空',
                'captcha.required' => '验证码不能为空',
                'captcha.captcha' => '请输入正确的验证码',
            ]);
        //验证登陆
        if(Auth::attempt(['name'=>$request->username,'password'=>$request->password])){
            //认证成功
            return redirect()->route('user.index')->with('success','登陆成功');
        }else{

            //认证失败
            return redirect()->route('user.show',1)->with('danger','用户名密码错误');
        }
    }

    //邮箱方法
    public function mail($name,$mail){
        //
        Mail::send('mail',['name'=>$name],
            function($message)
            use($mail)
            {
                $message->to($mail)->subject('用户登陆成功');
            }
        );

    }
    //注销登陆
    public function logout(){
        //用户推出注销
        Auth::logout();
        return redirect()->route('user.show',1)->with('success','退出成功');
    }

}

