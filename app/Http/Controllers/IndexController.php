<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Goods;
use App\Model\Cart;
use App\Model\Category;
use App\Http\Requests\UserValidate;
use  App\Model\UserModel;
class IndexController extends Controller
{
    //首页
    public function index(Request $request)
    {
        $data=Category::where('pid',0)->get();
        $arr=Goods::get();

        return view('index',['arr'=>$arr,'data'=>$data]);
    }
    //所有商品
    public function allshops(Request $request)
    {
        $id=$request->id;
        $cate=Category::where('pid',0)->get();
        if(empty($id)){
            $arr=Goods::get();
        }else{
            $allid=Category::get();
            $id=intval($id);
            $idall=$this->getID($allid,$id);
            $arr=[];
            foreach($idall as $v){
                $onegoods=Goods::where('cate_id',$v['cate_id'])->first();
                if($onegoods!=''){
                    $arr[]=$onegoods;
                }
            }
        }
       // print_r($arr);die;
        return view('allshops',['cate'=>$cate,'arr'=>$arr,'id'=>$id]);
    }
    //无限极分类
    public function getId($allid,$id)
    {
        static $idall=[];
        foreach($allid as $v){
            if($id==$v['pid']){
                $idall[]=$v;
            }
        }
        return $idall;
    }
    //购物车
    public function buycar()
    {
        $data=Cart::join('goods','cart.goods_id','=','goods.goods_id')->get();
        // var_dump($data);exit;
        $id=session('id');
        
        if(empty($id)){
           return view('login');
        }else{
            return view('shopcart',['data'=>$data]);
        }
    }
    //添加购物车
    public function addcart(Request $request)
    {
        $data=$request->post();
        $user_id=session('id');
        if(empty($user_id)){
            echo 3;exit;
        }
        $goods_id=$data['goods_id'];
        $goods=Cart::where('goods_id',$goods_id)->first();
        if($goods!=''){
            $data1=[
                'buy_num'=>$goods['buy_num']+1,
            ];
            $res=Cart::where('goods_id',$goods_id)->update($data1);
        }else{
            $data=[
                'user_id'=>$user_id,
                'goods_id'=>$goods_id
            ];
            $res=Cart::insert($data);
        }

        if($res){
            echo 1;
        }else{
            echo 2;exit;
        }
    }
    //删除购物车
    public function delcart(Request $request){
        $goods_id=$request->goods_id;
        // var_dump($goods_id);
        $res=Cart::where('goods_id',$goods_id)->delete();
        if($res){
            echo 1;
        }else{
            echo 2;exit;
        }
    }
    //个人页
    public function userpage()
    {
        return view('userpage');
    }
    //商品详情
    public function shopcontent(Request $request)
    {
        $id=$request->id;
        $arr=Goods::where('goods_id',$id)->first();
        return view('shopcontent',['arr'=>$arr]);
    }
    //登陆
    public function login()
    {
        return view('login');
    }
    //登陆执行
    public function logindo(UserValidate $request)
    {
            $request->validated();
            $username=$request->username;
            $pwd=$request->pwd;
            $verifycode=$request->verifycode;
            $code=session(',');
            if($verifycode!=$code){
                echo 4;exit;
            }
            $pwd=$request->pwd;
            $arr=UserModel::where('username',$username)->first();
            if(empty($arr)){
                echo  3;exit;
            }else{
                if($pwd!=decrypt($arr['pwd'])){
                    echo  2;exit;
                }else{
                    $data=[
                        'id'=>$arr['user_id'],
                        'username'=>$username,
                    ];
                    session($data);
                    echo 1;
                }
            }
    }
    //注册
    public function register()
    {
        return view('register');
    }
    //注册执行 跳验证码
    public function registerdo(UserValidate $request)
    {
        $request->validated();
        $arr=$request->all();
        if($arr['code']!=session('code')){
            echo 4;exit;
        }
        $re=UserModel::where('username',$arr['username'])->first();
        if(!empty($re)){
            echo 3;exit;
        }
        unset($arr['_token']);
        unset($arr['code']);
        $arr['pwd']=encrypt($arr['pwd']);
        $res=UserModel::insert($arr);
        if($res){
            echo 1;
        }else{
            echo 2;exit;
        }
    }
    //短信验证码
    public function code(Request $request){
        $data=$request->post();
        $code=rand(1000,9999);
        $phone=$data['reg_tel'];
        session(['code'=>$code]);
        session(['reg_tel'=>$phone]);
        $this->sendcode($code,$phone);
    }
    //发送短信验证码
    public function sendcode($code,$phone)
    {
        $host = env("MOBILE_HOST");
        $path = env("MOBILE_PATH");
        $method = "POST";
        $appcode = env("MOBILE_APPCODE");
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        $querys = "content=【创信】你的验证码是：".$code."，3分钟内有效！&mobile=".$phone;
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
            var_dump(curl_exec($curl));
    }
    
}
