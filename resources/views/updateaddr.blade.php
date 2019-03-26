<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>修改收货地址</title>
    <meta content="app-id=984819816" name="apple-itunes-app" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no, maximum-scale=1.0" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <link href="/css/comm.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/writeaddr.css">
    <link rel="stylesheet" href="/layui/css/layui.css">
    <link rel="stylesheet" href="/dist/css/LArea.css">
</head>
<body>
    
  <!--触屏版内页头部-->
  <div class="m-block-header" id="div-header">
      <strong id="m-title">修改收货地址</strong>
      <a href="javascript:history.back();" class="m-back-arrow"><i class="m-public-icon"></i></a>
      <a href="javascript:;" class="m-index-icon" id="btn">保存</a>
  </div>
  <div class=""></div>
  <!-- <form class="layui-form" action="">
    <input type="checkbox" name="xxx" lay-skin="switch">  
    
  </form> -->
  <form class="layui-form" action="">
    <div class="addrcon">
    <input type="hidden" id="address_id" value="{{$data->address_id}}">
      <ul>
        <li><em>收货人</em><input type="text" placeholder="请填写真实姓名"  id="address_name" value='{{$data->address_name}}'></li>
        <li><em>手机号码</em><input type="number" placeholder="请输入手机号" id="address_tel" name="address_tel" value='{{$data->address_tel}}'></li>
        <li><em>所在区域</em><input type="text" placeholder="请选择所在区域" name="address_area" id="address_area" value='{{$data->address_area}}'></li></li>
        <li class="addr-detail"><em>详细地址</em><input type="text" placeholder="20个字以内" class="addr" name="address_desc" id="address_desc" value='{{$data->address_desc}}'></li>
      </ul>
      @if($data->is_default==1)
      <div class="setnormal"><span>设为默认地址</span><input type="checkbox" id="checked" name="is_default" lay-skin="switch" checked>  </div>
      @else
      <div class="setnormal"><span>设为默认地址</span><input type="checkbox" id="checked" name="is_default" lay-skin="switch">  </div>
      @endif
      <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
    </div>
  </form>

  <!-- SUI mobile -->
  <script src="/dist/js/LArea.js"></script>
  <script src="/dist/js/LAreaData1.js"></script>
  <script src="/dist/js/LAreaData2.js"></script>
  <script src="/js/jquery-1.11.2.min.js"></script>
  <script src="/layui/layui.js"></script>
  
  <script>
      $(function(){
        layui.use(['layer'],function(){
          var layer=layui.layer;
            $(document).on('click','#btn',function(){
              var address_id=$('#address_id').val();
              var obj={};
              obj.address_name=$('#address_name').val();
              obj.address_tel=$('#address_tel').val();
              obj.address_area=$('#address_area').val();
              obj.address_desc=$('#address_desc').val();
              var checked = $("#checked").prop('checked');
              // console.log(checked);
              var _token = $('#_token').val();
              if(checked==true){
                obj.is_default=1;
              }else{
                obj.is_default=2;
              }
              $.post(
                "{{url('IndexController/updateaddrdo')}}",
                {obj:obj,address_id:address_id,_token:_token},
                function(res){
                  console.log(res)
                  if(res==1){
                    layer.msg('修改成功');
                    location.href="{{url('IndexController/address')}}";
                  }else{
                    layer.msg('修改失败');
                  }
                }
              )
            })
        })
      })
  </script>
  <script>
    //Demo
      layui.use('form', function(){
        var form = layui.form();
        
        //监听提交
        form.on('submit(formDemo)', function(data){
          layer.msg(JSON.stringify(data.field));
          return false;
        });
      });

      var area = new LArea();
      area.init({
          'trigger': '#demo1',//触发选择控件的文本框，同时选择完毕后name属性输出到该位置
          'valueTo':'#value1',//选择完毕后id属性输出到该位置
          'keys':{id:'id',name:'name'},//绑定数据源相关字段 id对应valueTo的value属性输出 name对应trigger的value属性输出
          'type':1,//数据源类型
          'data':LAreaData//数据源
      });


  </script>


</body>
</html>
