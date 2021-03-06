<div class="widget-wrap">
    <h3 class="wrap-title">
        <i class="iconfont icon-tags-fill"></i> TagCloud
    </h3>
    <div class="widget tagcloud">
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
        <?php if($tags->have()): ?>
            <?php while ($tags->next()): ?>
                <a href="<?php $tags->permalink(); ?>" rel="tag" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题">
                    <?php $tags->name(); ?></a>
            <?php endwhile; ?>
        <?php else: ?>
            <a>
                <?php _e( '没有任何标签'); ?>
            </a>
        <?php endif; ?>
    </div>
</div>