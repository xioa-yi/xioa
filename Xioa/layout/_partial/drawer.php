<div class="mdui-drawer" id="left-drawer">
    <div class="mdui-ripple drawer-avatar">
        <a href="<?php $this->options->siteUrl(); ?>">
            <img src="/usr/themes/Xioa/icons/avatar.png">
        </a>
    </div>
    <div class="drawer-font">
        <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
        <div><span>文章</span><?php $stat->publishedPostsNum() ?></div>
        <div><span>标签</span><?php echo tagsNum() ?></div>
        <div><span>分类</span><?php $stat->categoriesNum() ?></div>
    </div>
    <ul class="drawer-list mdui-list">
        <a class="<?php if($this->is('index')): ?>active
        <?php endif; ?>list-item mdui-list-item mdui-ripple"
           href="<?php $this->options->siteUrl(); ?>" title="回到首页">
            <i class="mdui-list-item-icon iconfont icon-home"></i>
            <div class="mdui-list-item-content">回到首页</div>
        </a>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
        <a class="<?php if($this->is('page', $pages->slug)): ?>active
        <?php endif; ?>list-item mdui-list-item mdui-ripple"
           href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>">
            <i class="mdui-list-item-icon iconfont icon-info-circle"></i>
            <div class="mdui-list-item-content"><?php $pages->title(); ?></div>
        </a>
        <?php endwhile; ?>
        <?php if($this->user->hasLogin()):?>
        <a class="list-item mdui-list-item mdui-ripple"
           href="<?php $this->options->siteUrl(); ?>admin" title="后台管理">
            <i class="mdui-list-item-icon iconfont icon-unorderedlist"></i>
            <div class="mdui-list-item-content">后台管理</div>
        </a>
        <?php endif;?>
    </ul>
    <?php $this->need('layout/_partial/sidebar.php'); ?>
    <div class="copyright">
        © <?php echo date("Y") ?> By <?php $this->options->title(); ?>
        <br/>	辽ICP备20002091号
    </div>
</div>