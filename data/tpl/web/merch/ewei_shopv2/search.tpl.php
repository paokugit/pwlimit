<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_header', TEMPLATE_INCLUDEPATH)) : (include template('_header', TEMPLATE_INCLUDEPATH));?>

<div class="page-header">当前位置：<span class="text-primary">搜索</span></div>


<style>

    .search-top {
        padding: 20px 0 30px;
        border-bottom: 1px solid #efefef;
    }

    .search-top .search-inner {
        width: 680px;
        margin: auto;
    }
    .search-top .search-inner .search-input {
        height: 36px;
        width: inherit;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }
    .search-top .search-inner .search-input .input {
        display: block;
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
        border: 1px solid #efefef;
        border-right: 0;
        padding: 0 10px;
        font-size: 14px;
    }
    .search-top .search-inner .search-input .input:focus {
        border-color: #44abf7;
    }
    .search-top .search-inner .search-input .btn {
        width: 65px;
        font-size: 16px;
        padding: 0;
        height: 36px;
        line-height: 34px;
        display: block;
        border-bottom-left-radius: 0;
        border-top-left-radius: 0;
        border: 0;
    }
    .search-panel {
        padding: 30px 0;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }
    .search-panel-l {
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }
    .search-panel-r {
        min-height: 500px;
        width: 330px;
        padding: 0 15px;
        border-left: 1px solid #efefef;
    }
    .search-panel .title {
        font-size: 15px;
    }
    .search-panel .inner {
        padding-top: 20px;
    }
    .search-panel .inner .line {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }
    .search-panel .inner .line-title {
        width: 110px;
        font-size: 15px;
        line-height: 30px;
        color: #666;
    }
    .search-panel .inner .line-navs {
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }

    .search-panel .search-panel-l .inner a {
        background: #eff8fd;
        padding: 8px 12px;
        font-size: 14px;
        display: inline-block;
        margin: 0 8px 12px 0;
    }
    .search-panel .search-panel-l .inner a span {
        color: #999;
        font-size: 12px;
        padding-left: 5px;
    }
    .search-panel .search-panel-l .inner a:hover,
    .search-panel .search-panel-l .inner a:hover span {
        background: #44abf7;
        color: #fff;
    }
    .search-panel .search-panel-l .inner b {
        font-weight: 100;
        color: red;
    }

    .search-panel .search-panel-r .inner a {
        background: #eff8fd;
        padding: 6px 8px;
        width: auto;
        display: inline-block;
        margin: 2px 2px 2px 0;
        font-size: 14px;
    }
    .search-panel .search-panel-r .inner a:hover {
        background: #44abf7;
        color: #fff;
    }
    .search-panel .search-panel-r .inner .empty-data {
        text-align: center;
        color: #999;
        display: inline-block;
        width: 100%;
    }

    .search-panel .search-panel-l .empty-data {
        padding-top: 135px;
        width: 200px;
        margin: 100px auto;
        background: url('../addons/ewei_shopv2/static/images/nodata.jpg') no-repeat center top;
        font-size: 15px;
        color: #999;
        text-align: center;
    }
</style>

<div class="page-content">

    <form action="">
        <input type="hidden" name="c" value="site" />
        <input type="hidden" name="a" value="entry" />
        <input type="hidden" name="m" value="ewei_shopv2" />
        <input type="hidden" name="do" value="web" />
        <input type="hidden" name="r" value="search" />
        <div class="search-top">
            <div class="search-inner">
                <div class="search-input">
                    <input class="input" name="keyword" placeholder="请输入关键字进行搜索..." value="<?php  echo $keyword;?>" maxlength="10" />
                    <input type="submit" class="btn btn-primary btn-lg" value="搜索" />
                </div>
            </div>
        </div>
    </form>

    <div class="search-panel">
        <div class="search-panel-l">
            <div class="title">搜索结果：</div>
            <?php  if(empty($list)) { ?>
                <div class="empty-data">抱歉，没有找到相关内容</div>
            <?php  } else { ?>
                <div class="inner">
                    <?php  if(is_array($list)) { foreach($list as $item) { ?>
                        <div class="line">
                            <div class="line-title"><?php  echo $item['title'];?></div>
                            <div class="line-navs">
                                <?php  if(is_array($item['items'])) { foreach($item['items'] as $child) { ?>
                                    <a href="<?php  echo $child['url'];?>"><?php  echo $child['title'];?> <?php  if(!empty($child['desc'])) { ?><span><?php  echo $child['desc'];?></span><?php  } ?></a>
                                <?php  } } ?>
                            </div>
                        </div>
                    <?php  } } ?>
                </div>
            <?php  } ?>
        </div>
        <div class="search-panel-r">
            <div class="title">历史搜索：</div>
            <div class="inner">
                <?php  if(!empty($history)) { ?>
                    <?php  if(is_array($history)) { foreach($history as $history_item) { ?>
                        <a href="<?php  echo webUrl('search', array('keyword'=>$history_item))?>"><?php  echo $history_item;?></a>
                    <?php  } } ?>
                    <a href="javascript:;" id="btn-clear-search">清除历史搜索</a>
                <?php  } ?>
                <span class="empty-data" <?php  if(!empty($history)) { ?>style="display: none"<?php  } ?>>暂时没有历史搜索哦~</span>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $("#btn-clear-search").click(function () {
            tip.confirm("确定清空历史搜索吗？", function () {
                $.post(biz.url('clearhistory', null, true), {type:1}, function (ret) {
                    location.href = biz.url('search', null, true);
                });
            });
        });
    </script>


</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('_footer', TEMPLATE_INCLUDEPATH)) : (include template('_footer', TEMPLATE_INCLUDEPATH));?>
<!--OTEzNzAyMDIzNTAzMjQyOTE0-->