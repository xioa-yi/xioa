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
                <div class="post">
                    <div class="post-cover mdui-ripple">
                        <?php if ($this->fields->Cover){ ?>
                            <img src="<?php echo $this->fields->Cover ?>">
                        <?php } else { ?>
                            <img src="https://i.loli.net/2020/05/16/qztBr9pC6uSGgL7.jpg">
                        <?php } ?>
                    </div>
                    
                    <div class="flag">
                		<span class="Time">Continued：</span><span id="run_time" style="color:#78909C"></span>
        			</div>

                    <div class="mdui-progress">
                        <div class="mdui-progress-indeterminate"></div>
                    </div>
        
                    <article>
                        <?php $this->content(''); ?>
                    </article>
                    
                    <div id="comments">
                        <?php $this->need('layout/_partial/comments.php'); ?>
                    </div>
                    
                    <?php session_start(); 
                    $_SESSION['val']=post_view($this);?>
                </div>
        </div>
    </div>
    <?php $this->need('layout/_partial/footer.php'); ?>
</body>

</html>
