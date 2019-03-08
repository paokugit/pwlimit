<?php defined('IN_IA') or exit('Access Denied');?>
<div class="form-group">
    <label class="col-lg control-label">是否开启商品详情二维码分享</label>
    <div class="col-sm-9 col-xs-12">
        <div class="row">
            <?php if(cv('commission.set.edit')) { ?>
            <div class="col-sm-3">
                <label class="radio-inline">
                    <input type="radio" name="data[qrcodeshare]" value="1" <?php  if($data['qrcodeshare'] ==1) { ?> checked="checked"<?php  } ?> /> 是
                </label>
                <label class="radio-inline">
                    <input type="radio"  name="data[qrcodeshare]" value="0" <?php  if(empty($data['qrcodeshare'])) { ?> checked="checked"<?php  } ?> /> 否
                </label>
            </div>
            <div class="col-sm-8" id="codeShare" <?php  if($data['qrcodeshare'] ==1) { ?>style="display: block;"<?php  } else { ?>style="display: none;"<?php  } ?>>
            <label class="radio-inline">
                <input type="radio"  name="data[codeShare]" value="1" <?php  if($data['codeShare'] ==1 || empty($data['codeShare'])) { ?> checked="checked"<?php  } ?> />样式一
            </label>
            <label class="radio-inline">
                <input type="radio"  name="data[codeShare]" value="2" <?php  if($data['codeShare'] ==2) { ?> checked="checked"<?php  } ?> /> 样式二
            </label>
            <?php  if(com('goodscode')) { ?>
            <label class="radio-inline">
                <input type="radio"  name="data[codeShare]" value="3" <?php  if($data['codeShare'] ==3) { ?> checked="checked"<?php  } ?> /> 样式三
            </label>
            <?php  } ?>
        </div>
        <?php  } else { ?>
        <?php  if(empty($data['qrcodeshare'])) { ?>否<?php  } else { ?>是<?php  } ?>
        <?php  } ?>
    </div>

    <span class="help-block">商品分享二维码</span>
</div>
</div>
<div class="form-group">
    <label class="col-lg control-label">分销订单商品详情</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('commission.set.edit')) { ?>
        <label class="radio-inline"><input type="radio"  name="data[openorderdetail]" value="1" <?php  if($data['openorderdetail'] ==1) { ?> checked="checked"<?php  } ?> /> 显示</label>
        <label class="radio-inline"><input type="radio"  name="data[openorderdetail]" value="0" <?php  if(empty($data['openorderdetail'])) { ?> checked="checked"<?php  } ?> /> 关闭</label>
        <?php  } else { ?>
        <?php  if(empty($data['openorderdetail'])) { ?>关闭<?php  } else { ?>显示<?php  } ?>
        <?php  } ?>
        <span class="help-block">分销订单是否显示商品详情</span>
    </div>
</div>
<div class="form-group">
    <label class="col-lg control-label">分销订单购买者详情</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('commission.set.edit')) { ?>
        <label class="radio-inline"><input type="radio"  name="data[openorderbuyer]" value="1" <?php  if($data['openorderbuyer'] ==1) { ?> checked="checked"<?php  } ?> /> 显示</label>
        <label class="radio-inline"><input type="radio"  name="data[openorderbuyer]" value="0" <?php  if(empty($data['openorderbuyer'])) { ?> checked="checked"<?php  } ?> /> 关闭</label>
        <?php  } else { ?>
        <?php  if(empty($data['openorderbuyer'])) { ?>关闭<?php  } else { ?>显示<?php  } ?>
        <?php  } ?>
        <span class="help-block">分销订单是否显示购买者</span>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">是否关闭分销中心推广二维码</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('commission.set.edit')) { ?>
        <label class="radio-inline"><input type="radio"  name="data[closed_qrcode]" value="1" <?php  if($data['closed_qrcode'] ==1) { ?> checked="checked"<?php  } ?> /> 是</label>
        <label class="radio-inline"><input type="radio"  name="data[closed_qrcode]" value="0" <?php  if(empty($data['closed_qrcode'])) { ?> checked="checked"<?php  } ?> /> 否</label>
        <?php  } else { ?>
        <?php  if(empty($data['closed_qrcode'])) { ?>否<?php  } else { ?>是<?php  } ?>
        <?php  } ?>
    </div>
</div>

<div class="form-group">
    <label class="col-lg control-label">推广二维码用超级海报的关注海报</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('commission.set.edit')) { ?>
        <label class="radio-inline"><input type="radio"  name="data[qrcode]" value="1" <?php  if($data['qrcode'] ==1) { ?> checked="checked"<?php  } ?> /> 是</label>
        <label class="radio-inline"><input type="radio"  name="data[qrcode]" value="0" <?php  if(empty($data['qrcode'])) { ?> checked="checked"<?php  } ?> /> 否</label>
        <?php  } else { ?>
        <?php  if(empty($data['qrcode'])) { ?>否<?php  } else { ?>是<?php  } ?>
        <?php  } ?>
        <span class="help-block">推广二维码默认使用原来默认,如果选择则使用关注海报</span>
    </div>
</div>
<div id="qrcode" style="height: 620px"  <?php  if(empty($data['qrcode'])) { ?>style="display: none"<?php  } ?>>
    <div class="col-sm-5">
        <img src="../addons/ewei_shopv2/plugin/commission/static/images/bangzhu.jpg" height="100%" width="100%"/>
    </div>
    <div class="col-sm-7">
        <div class="form-group">
            <label class="col-lg control-label">标题</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('commission.set.edit')) { ?>
                <input type='text' class='form-control' name='data[qrcode_title]' value="<?php  echo $data['qrcode_title'];?>" />
                <?php  } else { ?>
                <?php  echo $data['qrcode_title'];?>
                <?php  } ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg control-label">内容</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('commission.set.edit')) { ?>
                <textarea class='form-control' name="data[qrcode_content]" rows="5"><?php  echo $data['qrcode_content'];?></textarea>
                <?php  } else { ?>
                <?php  echo $data['qrcode_content'];?>
                <?php  } ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg control-label">说明</label>
            <div class="col-sm-9 col-xs-12">
                <?php if(cv('commission.set.edit')) { ?>
                <textarea class='form-control' name="data[qrcode_remark]" rows="5"><?php  echo $data['qrcode_remark'];?></textarea>
                <?php  } else { ?>
                {$data['qrcode_remark ']}
                <?php  } ?>
            </div>
        </div>
    </div>
</div>


<div class="form-group">
    <label class="col-lg control-label">申请说明</label>
    <div class="col-sm-9 col-xs-12">
        <?php if(cv('commission.set.edit')) { ?>
        <label class="radio-inline"><input type="radio"  name="data[register_bottom]" value="0" <?php  if(empty($data['register_bottom'])) { ?> checked="checked"<?php  } ?> /> 默认</label>
        <label class="radio-inline"><input type="radio"  name="data[register_bottom]" value="1" <?php  if($data['register_bottom'] ==1) { ?> checked="checked"<?php  } ?> /> 模式1(标题和内容替换)</label>
        <label class="radio-inline"><input type="radio"  name="data[register_bottom]" value="2" <?php  if($data['register_bottom'] ==2) { ?> checked="checked"<?php  } ?> /> 模式2(整体替换)</label>
        <?php  } else { ?>
        <?php  if(empty($data['register_bottom'])) { ?>否<?php  } else { ?>是<?php  } ?>
        <?php  } ?>
        <span class="help-block"></span>
    </div>
</div>

<div class="r-group12" <?php  if(empty($data['register_bottom'])) { ?>style="display: none"<?php  } ?>>
    <div class="col-sm-5">
        <img src="../addons/ewei_shopv2/plugin/commission/static/images/register_example.jpg" height="100%" width="100%"/>
    </div>
</div>


<div class="col-sm-7 r-group1" <?php  if($data['register_bottom']!=1) { ?>style="display: none"<?php  } ?>>

    <div class="form-group">
        <label class="col-lg control-label"></label>
        <div class="col-sm-9 col-xs-12">
            图中的小图标不可替换
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg control-label">标题1</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('commission.set.edit')) { ?>
            <input type='text' class='form-control' name='data[register_bottom_title1]' value="<?php  echo $data['register_bottom_title1'];?>" />
            <?php  } else { ?>
            <?php  echo $data['register_bottom_title1'];?>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg control-label">内容1</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('commission.set.edit')) { ?>
            <textarea class='form-control' name="data[register_bottom_content1]" rows="3"><?php  echo $data['register_bottom_content1'];?></textarea>
            <?php  } else { ?>
            <?php  echo $data['register_bottom_content1'];?>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg control-label">标题2</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('commission.set.edit')) { ?>
            <input type='text' class='form-control' name='data[register_bottom_title2]' value="<?php  echo $data['register_bottom_title2'];?>" />
            <?php  } else { ?>
            <?php  echo $data['register_bottom_title2'];?>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg control-label">内容2</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('commission.set.edit')) { ?>
            <textarea class='form-control' name="data[register_bottom_content2]" rows="3"><?php  echo $data['register_bottom_content2'];?></textarea>
            <?php  } else { ?>
            <?php  echo $data['register_bottom_content2'];?>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg control-label">标题3</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('commission.set.edit')) { ?>
            <input type='text' class='form-control' name='data[register_bottom_title3]' value="<?php  echo $data['register_bottom_title3'];?>" />
            <?php  } else { ?>
            <?php  echo $data['register_bottom_title3'];?>
            <?php  } ?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-lg control-label">内容3</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('commission.set.edit')) { ?>
            <textarea class='form-control' name="data[register_bottom_content3]" rows="3"><?php  echo $data['register_bottom_content3'];?></textarea>
            <?php  } else { ?>
            <?php  echo $data['register_bottom_content3'];?>
            <?php  } ?>
        </div>
    </div>


    <div class="form-group">
        <label class="col-lg control-label">说明</label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('commission.set.edit')) { ?>
            <textarea class='form-control' name="data[register_bottom_remark]" rows="6"><?php  echo $data['register_bottom_remark'];?></textarea>
            <?php  } else { ?>
            {$data['register_bottom_remark ']}
            <?php  } ?>
        </div>
    </div>
</div>

 <script>
     $(function () {
         $(":radio[name='data[qrcode]']").on('click',function (e) {
             var $this = $(this);
             var $qrcode = $("#qrcode");
             if($this.val()==0){
                 $qrcode.hide();
             }else{
                 $qrcode.show();
             }
         })
         $(":radio[name='data[qrcodeshare]']").on("click",function(){
            var shareVal = $(this).val();
             if(shareVal == 1){
                $("#codeShare").show();
             }else{
                $("#codeShare").hide();
             }
         });
     });
 </script>
<div class="col-sm-7 r-group2" <?php  if($data['register_bottom']!=2) { ?>style="display: none"<?php  } ?>>
    <div class="form-group">
        <label class="col-lg control-label"></label>
        <div class="col-sm-9 col-xs-12">
            <?php if(cv('commission.set.edit')) { ?>
            <?php  echo tpl_ueditor('data[register_bottom_content]',$data['register_bottom_content'],array('height'=>200))?>
            <?php  } else { ?>
            <textarea id='register_bottom_content' style='display:none'><?php  echo $data['register_bottom_content'];?></textarea>
            <a href='javascript:preview_html("#register_bottom_content")' class="btn btn-default">查看内容</a>
            <?php  } ?>
        </div>
    </div>
</div>

<script>
    $(function () {
        $(":radio[name='data[qrcode]']").on('click',function (e) {
            var $this = $(this);
            var $qrcode = $("#qrcode");
            if($this.val()==0){
                $qrcode.hide();
            }else{
                $qrcode.show();
            }
        })
        $(":radio[name='data[register_bottom]']").on('click',function (e) {
            var $this = $(this);

            if($this.val()==0){
                $(".r-group12").hide();
                $(".r-group1").hide();
                $(".r-group2").hide();
            } else if($this.val()==1){
                $(".r-group12").show();
                $(".r-group1").show();
                $(".r-group2").hide();
            } else if($this.val()==2){
                $(".r-group12").show();
                $(".r-group1").hide();
                $(".r-group2").show();
            }
        })
    });
</script>

<!--913702023503242914-->