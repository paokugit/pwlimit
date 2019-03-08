<?php defined('IN_IA') or exit('Access Denied');?><?php  $no_left=true?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>
<style>
    .ibox-content h3{
        font-size:14px;
        line-height: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .ibox-content p{
        line-height: 1.5;
    }
</style>
<div class="page-header">当前位置：<span class="text-primary">首页</span></div>

<div class="page-content transparent">
    <div class="row">
        <div class="col-md-4">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><i class="icow icow-shop"></i>店铺信息</h5>
                    <?php if(mcv('sysset')) { ?>
                    <ul>
                        <a href="<?php  echo merchUrl('sysset')?>" class="text-primary">修改</a>
                    </ul>
                    <?php  } ?>
                </div>
                <div class="ibox-content" style="height: 107px;">
                    <div class="col-sm-2" style="padding:0">
                        <img onerror="this.src='<?php echo EWEI_SHOPV2_LOCAL;?>static/images/nopic.png'" src="<?php  echo tomedia($user['logo'])?>" style="width:65px;height:65px;border-radius:5px">
                    </div>
                    <div class="col-sm-10"  style="padding-left:30px">
                        <h3><?php  echo $user['merchname'];?></h3>
                        <p><?php  echo $user['desc'];?></p>
                        <p class=''>
                            店铺小程序码: <a href='merchant.php?c=site&a=entry&m=ewei_shopv2&do=web&r=download_shopcode' target="_blank" class="js-clip text-primary" title='点击下载' data-url="<?php  echo $url?>" >点击下载</a>
                            <span style="cursor: pointer;" data-toggle="popover" data-trigger="hover" data-html="true"
                                  data-content="<img src='<?php  echo $qrcode;?>' width='130' alt='店铺小程序码'>" data-placement="auto right">
                            <i class="glyphicon glyphicon-qrcode"></i>
                        </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="ibox">
                <div class="ibox-content no-border">
                    <ul class="fui-list-group noborder">
                        <?php if(mcv('goods.out')) { ?>
                            <li class="fui-list">
                                <a href="<?php  echo merchUrl('goods/out')?>">
                                    <div class="fui-list-media">
                                        <span class="icow text-info icow-goodsL"></span>
                                    </div>
                                    <div class="fui-list-inner">
                                        <h5 class="goods_totals">--</h5>
                                        <p>已售罄商品</p>
                                    </div>
                                </a>
                            </li>
                        <?php  } ?>
                        <?php if(mcv('order.list.status1')) { ?>
                            <li class="fui-list">
                                <a href="<?php  echo webUrl('order/list/status1')?>">
                                    <div class="fui-list-media">
                                        <span class="icow text-green icow-fahuo"></span>
                                    </div>
                                    <div class="fui-list-inner">
                                        <h5 class="status1">--</h5>
                                        <p>待发货订单</p>
                                    </div>
                                </a>
                            </li>
                        <?php  } ?>
                        <?php if(mcv('order.list.status4')) { ?>
                            <li class="fui-list">
                                <a href="<?php  echo webUrl('order/list/status4')?>">
                                    <div class="fui-list-media">
                                        <span class="icow text-primary icow-tuihuo"></span>
                                    </div>
                                    <div class="fui-list-inner">
                                        <h5 class="status4">--</h5>
                                        <p>维权中订单</p>
                                    </div>
                                </a>
                            </li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5><i class="icow icow-shop"></i>订单信息</h5>
                    <?php if(mcv('order')) { ?>
                    <ul>
                        <a href="<?php  echo webUrl('order')?>" class="text-primary">更多</a>
                    </ul>
                    <?php  } ?>
                </div>
                <div class="ibox-content">
                    <?php  if(empty($order_ok)) { ?>
                    <p style="line-height: 100px;" class="text-center">暂时没有任何待处理订单</p>
                    <?php  } else { ?>
                    <table class="table table-hover no-margins">
                        <thead>
                        <tr>
                            <th style="width: 100px">状态</th>
                            <th style="width: 200px">日期</th>
                            <th style="width: 200px">金额</th>
                            <th>用户</th>
                            <th>订单号</th>
                            <th style="width: 80px">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php  if(is_array($order_ok)) { foreach($order_ok as $key => $value) { ?>
                        <tr>
                            <td><span class="label label-warning">待发货</span>
                            </td>
                            <td><?php  echo date('Y-m-d H:i',$value['createtime'])?></td>
                            <td class="text-navy"><?php  echo $value['price'];?></td>
                            <td><?php echo !empty($value['address']['realname']) ? $value['address']['realname'] : $value['invoicename']?></td>
                            <td class="text-navy"><?php  echo $value['ordersn'];?></td>
                            <td>
                                <?php if(mcv('order.detail')) { ?>
                                    <a href="<?php  echo merchUrl('order/detail',array('id'=>$value['id']))?>" class="btn btn-xs btn-primary">查看详情</a>
                                <?php  } ?>
                            </td>
                        </tr>
                        <?php  } } ?>
                        </tbody>
                    </table>
                    <?php  } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
            type: "GET",
            url: "<?php  echo merchUrl('order/list/ajaxgettotals')?>",
            dataType: "json",
            success: function (data) {
                shopajax();
                var res = data.result;
                $("h5.status1").text(res.status1);
                $("h5.status4").text(res.status4);
            }
        });

        function shopajax() {
            $.ajax({
                type: "GET",
                url: "<?php  echo merchUrl('shop/ajax')?>",
                dataType: "json",
                success: function (data) {
                    var res = data.result;
                    $("h5.goods_totals").text(res.goods_totals);
                }
            });
        }
    });
</script>


    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--6Z2S5bKb5piT6IGU5LqS5Yqo572R57uc56eR5oqA5pyJ6ZmQ5YWs5Y+4-->