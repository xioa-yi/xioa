<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeInit($archive) {
    Helper::options()->commentsAntiSpam = false;
    if ($archive->is('single')) {
        $archive->content = createCatalog($archive->content);
    }
}

function themeConfig($form) {
    $function = new Typecho_Widget_Helper_Form_Element_Checkbox('function',
        array('fancybox' => '灯箱功能',
            'SmoothScroll' => '平滑滚动',
            'enableMathjax' => '全局启用Mathjax'),
        array('fancybox', 'SmoothScroll'), '功能开关');
    $form->addInput($function->multiMode());

    $jquery_js = new Typecho_Widget_Helper_Form_Element_Text('jquery_js',NULL,'https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js','CDN > jquery > JS',NULL);
    $form->addInput ($jquery_js);

    $fancybox_css = new Typecho_Widget_Helper_Form_Element_Text('fancybox_css',NULL,'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css','CDN > fancybox > CSS',NULL);
    $form->addInput ($fancybox_css);
    $fancybox_js = new Typecho_Widget_Helper_Form_Element_Text('fancybox_js',NULL,'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js','CDN > fancybox > JS',NULL);
    $form->addInput ($fancybox_js);

    $SmoothScroll_js = new Typecho_Widget_Helper_Form_Element_Text('SmoothScroll_js',NULL,'https://cdn.jsdelivr.net/npm/smoothscroll-for-websites@1.4.9/SmoothScroll.min.js','CDN > SmoothScroll > JS',NULL);
    $form->addInput ($SmoothScroll_js);

    $lazysizes_js = new Typecho_Widget_Helper_Form_Element_Text('lazysizes_js',NULL,'https://cdn.jsdelivr.net/npm/lazysizes@5.1.0/lazysizes.min.js','CDN > lazysizes > JS',NULL);
    $form->addInput ($lazysizes_js);

    $highlight_css = new Typecho_Widget_Helper_Form_Element_Text('highlight_css',NULL,'https://cdn.jsdelivr.net/npm/highlight.js@9.15.8/styles/atom-one-dark.css','CDN > highlight > CSS',NULL);
    $form->addInput ($highlight_css);
    $highlight_js = new Typecho_Widget_Helper_Form_Element_Text('highlight_js',NULL,'https://cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.15.8/build/highlight.min.js','CDN > highlight > JS',NULL);
    $form->addInput ($highlight_js);

    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji',NULL,'<script src="https://mixcm.com/core.js"></script>','统计代码','为你的网站添加统计代码');
    $form->addInput ($tongji);
}

function themeFields($layout) {
    $Cover = new Typecho_Widget_Helper_Form_Element_Textarea('Cover',
        NULL, NULL, '自定义缩略图', '输入缩略图地址');
    $layout->addItem($Cover);
    $math = new Typecho_Widget_Helper_Form_Element_Textarea('math',
        NULL, NULL, '单独控制Mathjax', '输入Yes启用，No禁用，否则跟随全局');
    $layout->addItem($math);
}

function createCatalog($obj) {
    $obj = preg_replace_callback('/<h([1-6])(.*?)>(.*?)<\/h\1>/i', function ($obj) {
        global $catalog;
        global $catalog_count;
        $catalog_count++;
        $catalog[] = array('text' => trim(strip_tags($obj[3])), 'depth' => $obj[1], 'count' => $catalog_count);
        return '<h'.$obj[1].$obj[2].'>'.$obj[3].'</h'.$obj[1].'>';
    }, $obj);
    return $obj;
}

function getCatalog() {
    global $catalog;
    $index = '';
    if ($catalog) {
        $index = '<ul>' . "\n";
        $prev_depth = '';
        $to_depth = 0;
        foreach ($catalog as $catalog_item) {
            $catalog_depth = $catalog_item['depth'];
            if ($prev_depth) {
                if ($catalog_depth == $prev_depth) {
                    $index .= '</li>' . "\n";
                } elseif ($catalog_depth > $prev_depth) {
                    $to_depth++;
                    $index .= '<ul>' . "\n";
                } else {
                    $to_depth2 = ($to_depth > ($prev_depth - $catalog_depth)) ? ($prev_depth - $catalog_depth) : $to_depth;
                    if ($to_depth2) {
                        for ($i = 0; $i < $to_depth2; $i++) {
                            $index .= '</li>' . "\n" . '</ul>' . "\n";
                            $to_depth--;
                        }
                    }
                    $index .= '</li>';
                }
            }
            $index .= '<li><a href="#'. $catalog_item['text'] .'">' . $catalog_item['text'] . '</a>';
            $prev_depth = $catalog_item['depth'];
        }
        for ($i = 0; $i <= $to_depth; $i++) {
            $index .= '</li>' . "\n" . '</ul>' . "\n";
        }
    }
    echo $index;
}

function  artCount ($cid) {
    $db = Typecho_Db::get ();
    $rs = $db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
    $text = preg_replace("/[^\x{4e00}-\x{9fa5}]/u","",$rs['text']);
    echo mb_strlen($text,'UTF-8');
}

function  post_view ($archive)
{
    $cid    = $archive->cid;
    $db     = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $db->query($db->update('table.contents')->rows(array('views' => (int) $row['views'] + 1))->where('cid = ?', $cid));
    }
    return $row['views'];
}

function comment_at($coid) {
    $db = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')
        ->from('table.comments')
        ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')
            ->from('table.comments')
            ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href = '<a class="at" href="#comment-'.$parent.'">回复 '.$author.':</a> ';
        echo $href;
    } else {
        echo '';
    }
}

function  cid_info ($cid,$biao) {
    $db = Typecho_Db::get ();
    $rs = $db->fetchRow ($db->select ('table.contents.'.$biao)->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
    return $rs[$biao];
}



/**
 * 获取标签数目
 * https://github.com/typecho/typecho/blob/master/var/Widget/Stat.php
 * @return integer
 */
function tagsNum() {
    $db = Typecho_Db::get ();
    return $db->fetchobject($db->select(array('COUNT(mid)' => 'num'))
        ->from('table.metas')
        ->where('table.metas.type = ?', 'tag'))->num;
}

/**
 * 获取模板信息
 * 可选值 package,author,version,link
 * http://docs.qqdie.com/#/post/常用模板函数?id=获取模板版本号
 * @return string
 */
function getThemeInfo($key) {
    $info = Typecho_Plugin::parseInfo(__DIR__ . '/index.php');
    return $info[$key];
}
?>