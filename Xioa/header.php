<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<!-- QQCard BEGIN -->
	<meta itemprop="name" content="COME FROME XIOA">
	<meta itemprop="image" content="/usr/themes/Xioa/icons/高高.jpg">
	<meta name="description" itemprop="description" content="欢迎来到我的博客，这里将与您分享最朴实的文笔。">
<!-- QQCard END -->  
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?>
        <?php $this->options->title(); ?>
        <?php if($this->is('index')): ?> - <?php $this->options->description() ?><?php endif; ?>
    </title>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="bookmark" href="/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="http://adolesce.cn/usr/themes/Xioa/css/mdui.css" type="text/css">
    <link rel="stylesheet" href="http://adolesce.cn/usr/themes/Xioa/css/style.css" type="text/css">
    <link rel="stylesheet" href="http://adolesce.cn/usr/themes/Xioa/css/icon.css" type="text/css">
    <link rel="stylesheet" href="<?php echo $this->options->highlight_css ?>">
    <link rel="stylesheet" href="<?php echo $this->options->fancybox_css ?>">
</head>
