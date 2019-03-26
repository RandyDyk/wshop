@extends('must')
@section('content')
<body id="loadingPicBlock" class="g-acc-bg">
    <input name="hidUserID" type="hidden" id="hidUserID" value="-1" />
    <div>
        <!--首页头部-->
        <div class="m-block-header">
            <a href="/" class="m-public-icon m-1yyg-icon"></a>
            <a href="/" class="m-index-icon">编辑</a>
        </div>
        <!--首页头部 end-->
        <div class="g-Cart-list">
            <ul id="cartBody">
                @foreach($data as $v)
                <li goods_id="{{$v->goods_id}}">
                    <s class="xuan current" goods_id="{{$v->goods_id}}"></s>
                    <a class="fl u-Cart-img" href="{{url('IndexController/shopcontent')}}/{{$v->goods_id}}">
                        <img src="https://img.1yyg.net/GoodsPic/pic-200-200/20170607160417995.jpg" border="0" alt="">
                    </a>
                    <div class="u-Cart-r">
                        <a href="/v44/product/12501977.do" class="gray6">{{$v->goods_name}}</a>
                        <span class="gray9">
                            <em>{{$v->self_price}}</em>
                        </span>
                        
                        <div class="num-opt" >
                            <em class="num-mius dis min"><i></i></em>
                            <input class="text_box" name="num" maxlength="6" type="text" value="{{$v->buy_num}}" codeid="12501977">
                            <em class="num-add add"><i></i></em>
                        </div>
                        <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token(); ?>">
                        <a href="javascript:;" name="delLink"  id="del" goods_id="{{$v->goods_id}}" cid="12501977" isover="0" class="z-del"><s></s></a>
                    </div>    
                </li>
                @endforeach
            </ul>
            <div id="divNone" class="empty "  style="display: none"><s></s><p>您的购物车还是空的哦~</p><a href="https://m.1yyg.com" class="orangeBtn">立即潮购</a></div>
        </div>
        <div id="mycartpay" class="g-Total-bt g-car-new" style="">
            <dl>
                <dt class="gray6">
                    <s class="quanxuan current"></s>全选
                    <p class="money-total">合计<em class="orange total"><span>￥</span>17.00</em></p>
                    
                </dt>
                <dd>
                    <a href="javascript:;" id="a_payment" class="orangeBtn w_account remove">删除</a>
                    <a href="javascript:;" id="a_payment"  class="orangeBtn payment">去结算</a>
                </dd>
            </dl>
        </div>
        <div class="hot-recom">
            <div class="title thin-bor-top gray6">
                <span><b class="z-set"></b>人气推荐</span>
                <em></em>
            </div>
            <div class="goods-wrap thin-bor-top">
                <ul class="goods-list clearfix">
                    <li>
                        <a href="https://m.1yyg.com/v44/products/23458.do" class="g-pic">
                            <img src="https://img.1yyg.net/goodspic/pic-200-200/20160908092215288.jpg" width="136" height="136">
                        </a>
                        <p class="g-name">
                            <a href="https://m.1yyg.com/v44/products/23458.do">(第<i>368671</i>潮)苹果（Apple）iPhone 7 Plus 128G版 4G手机</a>
                        </p>
                        <ins class="gray9">价值:￥7130</ins>
                        <div class="btn-wrap">
                            <div class="Progress-bar">
                                <p class="u-progress">
                                    <span class="pgbar" style="width:1%;">
                                        <span class="pging"></span>
                                    </span>
                                </p>
                            </div>
                            <div class="gRate" data-productid="23458">
                                <a href="javascript:;"><s></s></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="" class="g-pic">
                            <img src="https://img.1yyg.net/goodspic/pic-200-200/20160908092215288.jpg" width="136" height="136">
                        </a>
                        <p class="g-name">
                            <a href="https://m.1yyg.com/v44/products/23458.do">(第368671潮)苹果（Apple）iPhone 7 Plus 128G版 4G手机</a>
                        </p>
                        <ins class="gray9">价值:￥7130</ins>
                        <div class="btn-wrap">
                            <div class="Progress-bar">
                                <p class="u-progress">
                                    <span class="pgbar" style="width:45%;">
                                        <span class="pging"></span>
                                    </span>
                                </p>
                            </div>
                            <div class="gRate" data-productid="23458">
                                <a href="javascript:;"><s></s></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="https://m.1yyg.com/v44/products/23458.do" class="g-pic">
                            <img src="https://img.1yyg.net/goodspic/pic-200-200/20160908092215288.jpg" width="136" height="136">
                        </a>
                        <p class="g-name">
                            <a href="https://m.1yyg.com/v44/products/23458.do">(第<i>368671</i>潮)苹果（Apple）iPhone 7 Plus 128G版 4G手机</a>
                        </p>
                        <ins class="gray9">价值:￥7130</ins>
                        <div class="btn-wrap">
                            <div class="Progress-bar">
                                <p class="u-progress">
                                    <span class="pgbar" style="width:1%;">
                                        <span class="pging"></span>
                                    </span>
                                </p>
                            </div>
                            <div class="gRate" data-productid="23458">
                                <a href="javascript:;"><s></s></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="https://m.1yyg.com/v44/products/23458.do" class="g-pic">
                            <img src="https://img.1yyg.net/goodspic/pic-200-200/20160908092215288.jpg" width="136" height="136">
                        </a>
                        <p class="g-name">
                            <a href="https://m.1yyg.com/v44/products/23458.do">(第368671潮)苹果（Apple）iPhone 7 Plus 128G版 4G手机</a>
                        </p>
                        <ins class="gray9">价值:￥7130</ins>
                        <div class="btn-wrap">
                            <div class="Progress-bar">
                                <p class="u-progress">
                                    <span class="pgbar" style="width:1%;">
                                        <span class="pging"></span>
                                    </span>
                                </p>
                            </div>
                            <div class="gRate" data-productid="23458">
                                <a href="javascript:;"><s></s></a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

       
        

<div class="footer clearfix">
<ul>
        <li class="f_home"><a href="{{url('/')}}" ><i></i>潮购</a></li>
        <li class="f_single"><a href="/v41/post/index.do" ><i></i>晒单</a></li>
        <li class="f_car"><a id="btnCart" href="{{url('IndexController/buycar')}}" class="hover"><i></i>购物车</a></li>
        <li class="f_personal"><a href="{{url('IndexController/userpage')}}" ><i></i>我的潮购</a></li>
    </ul>
</div>
@endsection
@section('my-js')
<!---商品加减算总数---->
<script type="text/javascript">
    $(function () {

        //删除
        layui.use(['layer'],function(){
            var layer=layui.layer;
            var _token=$('#_token').val();
            $(document).on('click','#del',function(){
                var goods_id=$('#del').attr('goods_id');
                
                $.post(
                    "{{url('IndexController/delcart')}}",
                    {goods_id:goods_id,_token:_token,type:1},
                    function(res){
                        // console.log(res);
                        if(res==1){
                            layer.msg('删除成功',{icon:1});
                            history.go(0);
                        }else{
                            layer.msg('删除失败',{icon:2});
                        }
                    }
                )
            })
            //批量删除
            $(document).on('click','.remove',function(){
                var goods_id='';
                $(".g-Cart-list .xuan").each(function(){
                    if($(this).hasClass('current')){
                        for (var i = 0 ; i<$(this).length; i++){
                            goods_id+=parseInt($(this).attr('goods_id'))+',';
                        }
                    }
                });
                goods_id=goods_id.substr(0,goods_id.length-1);
                // console.log(goods_id);
                $.post(
                    "{{url('IndexController/delcart')}}",
                    {goods_id:goods_id,_token:_token,type:2},
                    function(res){
                        console.log(res);
                        if(res==1){
                            layer.msg('删除成功',{icon:1});
                            history.go(0);
                        }else{
                            layer.msg('删除失败',{icon:2});
                        }
                    }
                )
            })
            //点击加号
            $(".add").click(function () {
                var _token=$('#_token').val();
                var t = $(this).prev();
                t.val(parseInt(t.val()) + 1);
                var num=t.val();
                var goods_id=$(this).parents('li').attr('goods_id');
                $.post(
                    "{{url('IndexController/updatecart')}}",
                    {num:num,goods_id:goods_id,_token:_token},
                    function(res){
                        if(res==1){
                            layer.msg('好',{icon:1});
                        }
                    }
                )
                GetCount();
            })
            //点击减号
            $(".min").click(function () {
                var t = $(this).next();
                if(t.val()>1){
                    t.val(parseInt(t.val()) - 1);
                    var num=t.val();
                    var goods_id=$(this).parents('li').attr('goods_id');
                    var _token=$('#_token').val();
                    $.post(
                        "{{url('IndexController/updatecart')}}",
                        {num:num,goods_id:goods_id,_token:_token},
                        function(res){
                            if(res==1){
                                layer.msg('好',{icon:1});
                            }
                        }
                    )
                    GetCount();
                }
            })
            //结算
            $('.payment').click(function(){
                var goods_id='';
                var _token=$('#_token').val();
                $(".g-Cart-list .xuan").each(function(){
                    if($(this).hasClass('current')){
                        for (var i = 0 ; i<$(this).length; i++){
                            goods_id+=parseInt($(this).attr('goods_id'))+',';
                        }
                    }
                });
                goods_id=goods_id.substr(0,goods_id.length-1);
                $.post(
                    "{{url('IndexController/payment')}}",
                    {goods_id:goods_id,_token:_token},
                    function(res){
                        // console.log(res);
                        location.href="{{url('IndexController/paymentshow')}}"
                    }
                )
            })


        })

      
    })
</script>

<script>
    // 全选        
    $(".quanxuan").click(function () {
        if($(this).hasClass('current')){
            $(this).removeClass('current');

             $(".g-Cart-list .xuan").each(function () {
                if ($(this).hasClass("current")) {
                    $(this).removeClass("current");

                } else {
                    $(this).addClass("current");
                } 
            });
            GetCount();
        }else{
            $(this).addClass('current');

             $(".g-Cart-list .xuan").each(function () {
                $(this).addClass("current");
                // $(this).next().css({ "background-color": "#3366cc", "color": "#ffffff" });
            });
            GetCount();
        }
        
        
    });
    // 单选
    $(".g-Cart-list .xuan").click(function () {
        if($(this).hasClass('current')){
            

            $(this).removeClass('current');

        }else{
            $(this).addClass('current');
        }
        if($('.g-Cart-list .xuan.current').length==$('#cartBody li').length){
                $('.quanxuan').addClass('current');

            }else{
                $('.quanxuan').removeClass('current');
            }
        // $("#total2").html() = GetCount($(this));
        GetCount();
        //alert(conts);
    });
    // 已选中的总额
    function GetCount() {
        var conts = 0;
        var aa = 0; 
        $(".g-Cart-list .xuan").each(function () {
            if ($(this).hasClass("current")) {
                // console.log($(this).length);
                for (var i = 0; i < $(this).length; i++) {
                    var self_price=$(this).parents('li').find('span.gray9').text();
                    var num=$(this).parents('li').find('input.text_box').val();
                    var all_price=num*self_price;
                    // console.log(all_price);
                    // conts += parseInt($(this).parents('li').find('span.gray9').text());
                    conts +=parseInt(all_price);
                     
                    // aa += 1;
                }
            }
        });
        
         $(".total").html('<span>￥</span>'+(conts).toFixed(2));
    }
    GetCount();
</script>
@endsection
</body>
</html>
