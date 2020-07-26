<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<body class="mdui-drawer-body-left">
    <?php $this->need('layout/_partial/background.php'); ?>
    <div id="xioa-drawer">
        <?php $this->need('layout/_partial/drawer.php'); ?>
    </div>
    <div id="xioa-content">
        <div class="content-primary">
            <div class="posts">
                <div class="post">
                    <div class="post-cover mdui-ripple">
                        <?php if ($this->fields->Cover){ ?>
                            <img src="<?php echo $this->fields->Cover ?>">
                        <?php } else { ?>
                            <img src="https://i.loli.net/2020/05/16/qztBr9pC6uSGgL7.jpg">
                        <?php } ?>
                        <h1><?php $this->title() ?></h1>
                    </div>
                    <div class="post-page">
                        <a class="color1"><i class="iconfont icon-appstore-fill -link"></i>
                            <?php artCount($this->cid);?> 汉字</a>
                        <a class="color2"><i class="iconfont icon-areachart"></i>
                            <?php echo post_view($this);?> 围观</a>
                            <?php echo " ⚓ ";$this->tags(' ', true); ?>
                    </div>
                    <article>
                        <?php
                        $content = preg_replace('#<h(.*?)>(.*?)</h(.*?)>#','<h$1 id="$2">$2</h$3>',$this->content);
                        echo $content;
                        ?>
                        <hr/>
                        <strong>版权声明：</strong>本文为博主原创文章，遵循
                        <a href="http://creativecommons.org/licenses/by-sa/4.0/"
                           target="_blank" rel="noopener"> CC 4.0 BY-SA </a>
                            版权协议，转载请附上原文出处链接和本声明。</p>
                        <strong>本文链接：</strong>
                        <a target="_blank" href="<?php $this->permalink() ?>"><?php $this->permalink() ?></a>
                        </p>
                        <strong>联系小编：</strong>
                        <a href="mailto:GXTXG@outlook.com">GXTXG@outlook.com</a>
                    </article>
                    <div class="post-right">
                        <div class="right-fixed">
                            <div class="fixed-valign">
                                <div class="valign-toc">
                                    <ol class="toc">
                                        <?php getCatalog(); ?>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="comments">
                        <?php $this->need('layout/_partial/comments.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->need('layout/_partial/footer.php'); ?>

    <?php if (!empty($this->options->function) && in_array('fancybox', $this->options->function)): ?>
        <script src="<?php echo $this->options->fancybox_js ?>"></script>
    <?php endif; ?>

    <?php if (!empty($this->options->function) && in_array('enableMathjax', $this->options->function)): ?>
        <?php if ($this->fields->math != "No"): ?>
            <script type="text/x-mathjax-config">MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});</script>'
            <script type="text/javascript" src="https://cdn.bootcss.com/mathjax/2.7.6/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
        <?php endif; ?>
    <?php endif; ?>

    <script src="<?php echo $this->options->highlight_js ?>"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>


