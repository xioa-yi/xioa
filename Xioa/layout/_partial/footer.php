
<script src="http://adolesce.cn/usr/themes/Xioa/js/mdui.min.js"></script>
<script src="<?php echo $this->options->mdui_js ?>"></script>
<script src="<?php echo $this->options->jquery_js ?>"></script>

<?php if (!empty($this->options->function) && in_array('SmoothScroll',
    $this->options->function)):?>
    <script src="<?php echo $this->options->SmoothScroll_js ?>"></script>
<?php endif; ?>
<script src="<?php echo $this->options->lazysizes_js ?>"></script>
<script>
    function a() {
        var audio=document.getElementById("music");
        if(audio.paused){
            audio.play();
            $("#spin").css({"-webkit-animation-iteration-count":"0"})
            $("#spin").css({"-webkit-animation-play-state":"paused"});
        }
        else{
            audio.pause();
            $("#spin").css({"-webkit-animation-play-state":"running"});
        }
    }
</script>

<script>
    function runTime() {
        var d = new Date(), str = '';
        BirthDay = new Date("February 19,2020");
        today = new Date();
        timeold = (today.getTime() - BirthDay.getTime());
        sectimeold = timeold / 1000
        secondsold = Math.floor(sectimeold);
        msPerDay = 24 * 60 * 60 * 1000
        msPerYear = 365 * 24 * 60 * 60 * 1000
        e_daysold = timeold / msPerDay
        e_yearsold = timeold / msPerYear
        daysold = Math.floor(e_daysold);
        yearsold = Math.floor(e_yearsold);
        //str = yearsold + "年";
        str += daysold + " D ";
        str += d.getHours() + ' H ';
        str += d.getMinutes() + ' M ';
        str += d.getSeconds() + ' S ';
        return str;
    }
    setInterval(function () { $('#run_time').html(runTime()) }, 1000);
</script>
