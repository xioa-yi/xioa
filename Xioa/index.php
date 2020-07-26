<?php
/**
 * Created by IntelliJ IDEA.
 * User: GXTXG
 * Date: 2020/5/24
 * Time: 18:43
 * Version: 1.0
 */
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
            <section class="posts" id="brand-waterfall">
                <?php while($this->next()): ?>
					<?php if($this->category != "LifeStyles"): ?>
						<div class="post">
							<a href="<?php $this->permalink() ?>">
								<div class="post-cover mdui-ripple">
									<?php if ($this->fields->Cover){ ?>
										<img src="<?php echo $this->fields->Cover ?>">
									<?php } else { ?>
										<img src="https://i.loli.net/2020/05/16/qztBr9pC6uSGgL7.jpg">
									<?php } ?>
										<h1><?php $this->title() ?></h1>
								</div>
							</a>
							<div class="post-meta">
								<a class="page0">
									<i class="iconfont icon-calendar-fill">
										<?php $this->date('Y年n月d日');?>
									</i>
								</a>
								<label class="mdui-slider">
									<input type="range" step="1" min="0" max="100" value="50" disabled/>
								</label>
							</div>
						</div>
					<?php endif; ?>
                <?php endwhile; ?>
                <?php if($this->is('index') || $this->category == "LifeStyles"): ?>
                	<div class="post">
                    	<div class="post-cover mdui-ripple">
                        	<a href="<?php $this->widget('Widget_Archive@index',
                    'pageSize=1&type=category', 'mid=3')->parse('{permalink}');?>">    
                            	<img src="https://i.loli.net/2020/06/14/wtGEfBz3jHpueYT.jpg">
                            	<h1><?php $this->widget('Widget_Archive@index', 'pageSize=1&type=category', 'mid=3')->parse('{title}');?>
                            	</h1>
                        	</a>
                    	</div>
                		<div class="post-meta">
                        	<a class="page1">
                            	<i class="iconfont icon-calendar-fill">
                                	<?php $this->widget('Widget_Archive@index', 'pageSize=1&type=category', 'mid=3')->date('Y年n月d日');?>
                        		</i>
                        	</a>
                        	<label class="mdui-slider">
                            	<input type="range" step="1" min="0" max="100" value="50" disabled/>
                        	</label>
                    	</div>
                	</div>
                <?php endif; ?>	
            </section>
            <br/>
            <div>
                <?php $this->need('layout/_partial/paginate.php'); ?>
                <span class="footer">
					<?php if($this->is('index') || $this->category != "LifeStyles"){ ?>
						浏览人次：<?php session_start();
							if($_SESSION['val']){
								echo $_SESSION['val'];}
							else {echo '???';}?>
					<?php } else { ?>
						往期内容已隐藏
					<?php } ?>
				</span>
            </div>
        </div>
    </div>
    <?php $this->need('layout/_partial/footer.php'); ?>
</body>

</html>
