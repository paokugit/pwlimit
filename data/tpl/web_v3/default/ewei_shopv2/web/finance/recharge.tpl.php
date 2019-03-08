<?php defined('IN_IA') or exit('Access Denied');?><style>
    .recharge_info{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        justify-content: space-around;
        margin-bottom: 10px;
    }
    .recharge_info>div{
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
        border:1px solid #efefef;
        margin: 0 10px;
        padding:10px 22px;
        line-height: 25px;
        color: #333;
    }
</style>
<form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data">

    <input type="hidden" name="c" value="site" />
    <input type="hidden" name="a" value="entry" />
    <input type="hidden" name="m" value="ewei_shopv2" />
    <input type="hidden" name="do" value="web" />
    <input type="hidden" name="r" value="finance.recharge" />
    <input type='hidden' name='type' value="<?php  echo $type;?>" />
    <input type='hidden' name='id' value="<?php  echo $id;?>" />


    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">会员充值</h4>
            </div>
            <div class="modal-body">



                <div class="recharge_info">
                    <div>
                        <label class="pull-left" style="margin-right: 25px">粉丝</label>
                        <div class="pull-left">
                            <img class="radius50" src='<?php  echo $profile['avatar'];?>' style='width:20px;height:20px;padding:1px;border:1px solid #ccc' onerror="this.src='../addons/ewei_shopv2/static/images/noface.png'"/>
                            <?php  echo $profile['nickname'];?>
                        </div>
                    </div>
                    <div>
                        <label class="pull-left " style="margin-right: 25px">会员信息</label>
                            <div class="pull-left">
                                ID: <?php  echo $profile['id'];?></br>
                                姓名: <?php  echo $profile['realname'];?></br>
                                手机号: <?php  echo $profile['mobile'];?>
                            </div>
                    </div>

                </div>
                <div class="tabs-container">

                    <div class="tabs">
                        <ul class="nav nav-tabs">
                            <?php if(cv('finance.recharge.credit1')) { ?>
                            <li <?php  if($type=='credit1') { ?>class="active"<?php  } ?>><a data-toggle="tab" href="#tab-1" data-rechargetype="credit1" aria-expanded="true"> 充值卡路里</a></li>
                            <?php  } ?>

                            <?php if(cv('finance.recharge.credit2')) { ?>
                            <li <?php  if($type=='credit2') { ?>class="active"<?php  } ?>><a data-toggle="tab" href="#tab-2"  data-rechargetype="credit2" aria-expanded="false"> 充值余额</a></li>
                            <?php  } ?>

                        </ul>
                        <div class="tab-content ">
                            <div id="tab-1" class="tab-pane <?php  if($type=='credit1') { ?>active<?php  } ?>">
                                <div class="form-group"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">当前卡路里</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <div class="form-control-static"><?php  echo $profile['credit1'];?></div>
                                    </div>
                                </div>

                            </div>
                            <div id="tab-2" class="tab-pane <?php  if($type=='credit2') { ?>active<?php  } ?>">

                                <div class="form-group"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">当前余额</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <div class="form-control-static"><?php  echo $profile['credit2'];?></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">变化</label>
                    <div class="col-sm-9 col-xs-12">
                        <label class='radio-inline'>
                            <input type='radio' name='changetype' value='0' checked /> 增加
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' name='changetype' value='1' /> 减少
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' name='changetype' value='2' /> 最终<span class='name'><?php  if($type=='credit1') { ?>卡路里<?php  } else { ?>余额<?php  } ?></span>
                        </label>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label mustl">充值数目</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="num" class="form-control" value="" data-rule-number='true' data-rule-required='true' data-rule-min='0.01' />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">备注</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea name="remark" class="form-control richtext" cols="70"></textarea>
                    </div>
                </div>

            </div> <div class="modal-footer">
            <button class="btn btn-primary btn-submit" type="submit">确认充值<?php  if($type=='credit1') { ?>卡路里<?php  } else { ?>余额<?php  } ?></button>
            <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
        </div>
        </div>
    </div>

</form>
<script language='javascript'>
    $(function(){
        $('[data-toggle="tab"]').click(function(){
            var type =$(this).data('rechargetype');
            if(type=='credit1') {
                $('.name').html('卡路里');
                $(".btn-submit").text('确认充值卡路里');
            }else{
                $('.name').html('余额');
                $(".btn-submit").text('确认充值余额');
            }
            $(':hidden[name=type]').val( type) ;
        });

    })
</script>

<!--OTEzNzAyMDIzNTAzMjQyOTE0-->