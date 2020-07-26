<div class="widget-wrap">
    <h3 class="wrap-title">
        <i class="iconfont icon-unorderedlist"></i> 文章分類
    </h3>
    <div class="widget">
        <ul class="category-list">
            <?php $this->widget('Widget_Metas_Category_List')->to($mates); ?>
            <?php while($mates->next()): ?>
                <li class="category-list-item">
                    <a class="category-list-link mdui-ripple" href="<?php $mates->permalink(); ?>" title="<?php $mates->name(); ?>"><?php $mates->name(); ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>