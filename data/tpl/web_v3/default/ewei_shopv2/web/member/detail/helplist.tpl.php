<?php defined('IN_IA') or exit('Access Denied');?><style>

    .popover{

        width:170px;

        font-size:12px;

        line-height: 21px;

        color: #0d0706;

    }

    .popover span{

        color: #b9b9b9;

    }

    .nickname{

        display: inline-block;

        max-width:200px;

        overflow: hidden;

        text-overflow:ellipsis;

        white-space: nowrap;

        vertical-align: middle;

    }

    .tooltip-inner{

        border:none;

    }

</style>

<div class="page-content">

    <div class="fixed-header">

        <div class="flex1">助力好友</div>

        <div class="flex1">助力步数</div>

        <div class="flex1">助力时间</div>
    </div>

    <?php  if(empty($helpList)) { ?>

    <div class="panel panel-default">

        <div class="panel-body empty-data">未查询到相关数据</div>

    </div>

    <?php  } else { ?>

    <div class="row">

        <div class="col-md-12">
            <table class="table table-responsive">

                <thead>

                <tr>
                    <th style="">助力好友</th>

                    <th style="">助力步数</th>

                    <th style="">助力时间</th>

                </tr>

                </thead>

                <tbody>

                <?php  if(is_array($helpList)) { foreach($helpList as $row) { ?>
                <tr>
                    <td><?php  echo $row['nickname'];?></td>
                    <td><?php  echo $row['step'];?></td>
                    <td><?php  echo $row['day'];?></td>
                </tr>
                <?php  } } ?>

                </tbody>

                <tfoot>

                <tr>
                    <td>
                    <?php  echo $pager;?>
                    </td>
                    <td></td>
                    <td></td>
                </tr>

                </tfoot>

            </table>

        </div>

    </div>

    <?php  } ?>

</div>





<div id="modal-change"  class="modal fade form-horizontal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <button data-dismiss="modal" class="close" type="button">×</button>

                <h4 class="modal-title"><?php  if(!empty($group['id'])) { ?>编辑<?php  } else { ?>添加<?php  } ?>标签组</h4>

            </div>

            <div class="modal-body">



                <div class="form-group batch-level" style="display: none;">

                    <label class="col-sm-2 control-label must">会员等级</label>

                    <div class="col-sm-9 col-xs-12">

                        <select name="batch-level" class="form-control">

                            <option value="0"><?php  echo $default_levelname;?></option>

                            <?php  if(is_array($levels)) { foreach($levels as $level) { ?>

                            <option value="<?php  echo $level['id'];?>"><?php  echo $level['levelname'];?></option>

                            <?php  } } ?>

                        </select>

                    </div>

                </div>



                <div class="form-group batch-group" style="display: none;">

                    <label class="col-sm-2 control-label must">标签组</label>

                    <div class="col-sm-9 col-xs-12">

                        <select name="batch-group[]" class="form-control select2" placeholder="会员会被加入指定的分组中" multiple style="position:absolute;">

                            <?php  if(is_array($groups)) { foreach($groups as $group) { ?>

                            <option value="<?php  echo $group['id'];?>"><?php  echo $group['groupname'];?></option>

                            <?php  } } ?>

                        </select>

                    </div>

                </div>



            </div>

            <div class="modal-footer">

                <button class="btn btn-primary" type="submit" id="modal-change-btn">提交</button>

                <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>

            </div>

        </div>

    </div>

</div>



<script language="javascript">

    <?php  if($opencommission) { ?>

    require(['bootstrap'], function () {

        $("[rel=pop]").popover({

            trigger: 'manual',

            placement: 'right',

            title: $(this).data('title'),

            html: 'true',

            content: $(this).data('content'),

            animation: false

        }).on("mouseenter", function () {

            var _this = this;

            $(this).popover("show");

            $(this).siblings(".popover").on("mouseleave", function () {

                $(_this).popover('hide');

            });

        }).on("mouseleave", function () {

            var _this = this;

            setTimeout(function () {

                if (!$(".popover:hover").length) {

                    $(_this).popover("hide")

                }

            }, 100);

        });

    });

    <?php  } ?>



        $("[data-toggle='batch-group'], [data-toggle='batch-level']").click(function () {

            var toggle = $(this).data('toggle');

            $("#modal-change .modal-title").text(toggle=='batch-group'?"批量修改标签组":"批量修改会员等级");

            $("#modal-change").find("."+toggle).show().siblings().hide();

            $("#modal-change-btn").attr('data-toggle', toggle=='batch-group'?'group':'level');

            $("#modal-change").modal();

        });

        $("#modal-change-btn").click(function () {

            var _this = $(this);

            if(_this.attr('stop')){

                return;

            }

            var toggle = $(this).data('toggle');

            var ids = [];

            $(".checkone").each(function () {

                var checked = $(this).is(":checked");

                var id = $(this).val();

                if(checked && id){

                    ids.push(id);

                }

            });

            if(ids.length<1){

                tip.msgbox.suc("请选择要批量操作的会员");

                return;

            }

            var option = $("#modal-change .batch-"+toggle+" option:selected");

            level = '';

            if (toggle=='group'){

                for(i=0;i<option.length;i++){

                    if (level == ''){

                        level += $(option[i]).val();

                    }else{

                        level += ','+$(option[i]).val();

                    }

                }

            }else{

                var level = option.val();

            }



            var levelname = option.text();

            tip.confirm("确定要将选中会员移动到 "+levelname+" 吗？", function () {

                _this.attr('stop', 1).text("操作中...");

                $.post(biz.url('member/list/changelevel'),{

                    level: level,

                    ids: ids,

                    toggle: toggle

                }, function (ret) {

                    $("#modal-change").modal('hide');

                    if(ret.status==1){

                        tip.msgbox.suc("操作成功");

                        setTimeout(function () {

                            location.reload();

                        },1000);

                    }else{

                        tip.msgbox.err(ret.result.message);

                    }

                }, 'json')

            });

        });

</script>

