@extends('must')
@section('content')
<body>
    
<!--触屏版内页头部-->
<div class="m-block-header" id="div-header">
    <strong id="m-title">注册</strong>
    <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
    <a href="/" class="m-index-icon"><i class="m-public-icon"></i></a>
</div>
    <div class="wrapper">
        <input name="hidForward" type="hidden" id="hidForward" />
        <div class="registerCon">

            <ul>
                <li class="accAndPwd">
                    <dl>
                        <s class="phone"></s><input id="userMobile" maxlength="11" type="number" placeholder="请输入您的手机号码" value="" />
                        <span class="clear">x</span>
                    </dl>
                    <dl>
                        <s class="password"></s>
                        <input class="pwd" maxlength="11" type="text" placeholder="6-16位数字、字母组成" value="" style="display: none" />
                        <input class="pwd" maxlength="11" id="pwd" type="password" placeholder="6-16位数字、字母组成" value=""  />
                        <span class="mr clear">x</span>
                        <s class="eyeclose"></s>
                    </dl>
                    <dl>
                        <s class="password"></s>
                        <input class="conpwd" maxlength="11" type="text" placeholder="请确认密码" value=""  style="display: none" />
                        <input class="conpwd" maxlength="11" type="password" placeholder="请确认密码" value="" />
                        <span class="mr clear">x</span>
                        <s class="eyeclose"></s>
                    </dl>
                    <dl>
                        <input  type="text" id="code" placeholder="请输入验证码"  maxlength="4" /><b></b>
                        <a href="javascript:;" id="btn">获取验证码</a>
                    </dl>
                    <dl class="a-set">
                        <i class="gou"></i><p>我已阅读并同意《666潮人购购物协议》</p>
                    </dl>
                    
                    <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">

                </li>
                <li><a id="btnNext" href="javascript:;" class="orangeBtn loginBtn">下一步</a></li>
            </ul>
        </div>
        

<div class="footer clearfix" style="display:none;">
    <ul>
        <li class="f_home"><a href="/v44/index.do" ><i></i>云购</a></li>
        <li class="f_announced"><a href="/v44/lottery/" ><i></i>最新揭晓</a></li>
        <li class="f_single"><a href="/v44/post/index.do" ><i></i>晒单</a></li>
        <li class="f_car"><a id="btnCart" href="/v44/mycart/index.do" ><i></i>购物车</a></li>
        <li class="f_personal"><a href="/v44/member/index.do" ><i></i>我的云购</a></li>
    </ul>
</div>
<div class="layui-layer-move"></div>
</body>
@endsection
@section('my-js')
<script>
    $('.registerCon input').bind('keydown',function(){
        var that = $(this);
        if(that.val().trim()!=""){
            
            that.siblings('span.clear').show();
            that.siblings('span.clear').click(function(){
                console.log($(this));
                
                that.parents('dl').find('input:visible').val("");
                $(this).hide();
            })

        }else{
           that.siblings('span.clear').hide();
        }

    })
    function show(){
        if($('.registerCon input').attr('type')=='password'){
            $(this).prev().prev().val($("#passwd").val()); 
        }
    }
    function hide(){
        if($('.registerCon input').attr('type')=='text'){
            $(this).prev().prev().val($("#passwd").val()); 
        }
    }
    $('.registerCon s').bind({click:function(){
        if($(this).hasClass('eye')){
            $(this).removeClass('eye').addClass('eyeclose');
            
            $(this).prev().prev().prev().val($(this).prev().prev().val());
            $(this).prev().prev().prev().show();
            $(this).prev().prev().hide();

           
        }else{
                console.log($(this  ));
                $(this).removeClass('eyeclose').addClass('eye');
                $(this).prev().prev().val($(this).prev().prev().prev().val());
                $(this).prev().prev().show();
                $(this).prev().prev().prev().hide();

             }
         }
     })

    function registertel(){
        // 手机号失去焦点
        $('#userMobile').blur(function(){
            reg=/^1(3[0-9]|4[57]|5[0-35-9]|8[0-9]|7[06-8])\d{8}$/;//验证手机正则(输入前7位至11位)  
            var that = $(this);
          
            if( that.val()==""|| that.val()=="请输入您的手机号")  
            {   
                layer.msg('请输入您的手机号！');
            }  
            else if(that.val().length<11)  
            {     
                layer.msg('您输入的手机号长度有误！'); 
            }  
            else if(!reg.test($("#userMobile").val()))  
            {   
                layer.msg('您输入的手机号不存在!'); 
            }  
            else if(that.val().length == 11){
                // ajax请求后台数据
            }
        })
        // 密码失去焦点
        $('.pwd').blur(function(){
            reg=/^[0-9a-zA-Z]{6,16}$/;
            var that = $(this);
            if( that.val()==""|| that.val()=="6-16位数字或字母组成")  
            {   
                layer.msg('请设置您的密码！');
            }else if(!reg.test($(".pwd").val())){   
                layer.msg('请输入6-16位数字或字母组成的密码!'); 
            }
        })

        // 重复输入密码失去焦点时
        $('.conpwd').blur(function(){
            var that = $(this);
            var pwd1 = $('.pwd').val();
            var pwd2 = that.val();
            if(pwd1!=pwd2){
                layer.msg('您俩次输入的密码不一致哦！');
            }
        })

    }
        registertel();
    // 购物协议
    $('dl.a-set i').click(function(){
    	var that= $(this);
    	if(that.hasClass('gou')){
    		that.removeClass('gou').addClass('none');
    		$('#btnNext').css('background','#ddd');

    	}else{
    		that.removeClass('none').addClass('gou');
    		$('#btnNext').css('background','#f22f2f');
    	}

    })
    

</script>
<script>
    $(function(){
      layui.use('layer',function(){
          var layer=layui.layer;
          var type=true;
          
          //验证手机号
          $('#userMobile').blur(function(){
              var phone=$(this).val();
              if(!(/^1[34578]\d{9}$/.test(phone))){
                  layer.msg('手机号码有误，请重填',{icon :2});
                  type=false;
              }else{
                  type=true;
              }
          })
          //验证码
            $("#btn").click(function(){
                var reg_tel=$('#userMobile').val();
                // var code=$("#number").val();
                // console.log(reg_tel);
                var _token=$('#_token').val();
                $.post(
                    "code",
                    {reg_tel:reg_tel,_token:_token},
                    function(res){
                        console.log(res)
                    }
                )

            })
          //验证密码
          $('#pwd').blur(function(){
              var reg=/[a-z0-9]{6,16}/;
              var pwd=$(this).val();
              if(!reg.test(pwd)){
                  layer.msg('密码格式错误',{icon :2});
                  type=false;
              }else{
                  type=true;
              }
          })
          //确认密码
          $('.conpwd').blur(function(){
              var conpwd=$(this).val();
              var pwd=$('#pwd').val();
              if(conpwd!=pwd){
                  layer.msg('两次密码输入不一致',{icon :2});
                  type=false;
              }else{
                  type=true;
              }
          })
          //阻止提交
          $('#btnNext').click(function(){
              var _token=$('#_token').val();
              var phone=$('#userMobile').val();
              var pwd=$('#pwd').val();
              var code=$('#code').val();
              if(type==false){
                  return false;
              }
              $.post(
                  "{{url('IndexController/registerdo')}}",
                  {username:phone,pwd:pwd,code:code,_token:_token},
                  function (res) {
                    if(res==1){
                        layer.msg('注册成功',{icon:1,time:3000},function(){
                            location.href="{{url('IndexController/Login')}}";
                        });
                    }else if(res==2){
                        layer.msg('注册失败',{icon:2});
                    }else if(res==3){
                        layer.msg('账号已存在',{icon:2});
                    }else if(res==4){
                        layer.msg('验证码错误',{icon:2})
                    }
                  }
              )
          })
      })
    })
</script>
@endsection
</html>
