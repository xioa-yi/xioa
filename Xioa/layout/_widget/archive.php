<div class="widget-wrap">
    <h3 class="wrap-title">
        <i class="iconfont icon-container"></i> 文章歸檔
    </h3>
    <div class="widget">
        <ul class="category-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y 年 m 月')->parse('<li class="category-list-item"><a class="category-list-link mdui-ripple" href="{permalink}">{date}<span class="category-list-count">{count}</span></a></li>'); ?>
        </ul>
    </div>
</div>