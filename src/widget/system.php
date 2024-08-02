<div>
    <span>现在的时间是：</span>
    <span id="time-display"></span>
    <span id="week-display"></span>
    <script>
        document.getElementById('time-display').textContent = (new Date).toLocaleString();
        document.getElementById('week-display').textContent = new Intl.DateTimeFormat('zh-CN', {
            weekday: 'long'
        }).formatToParts(new Date())[0].value;
        setInterval(function() {
            document.getElementById('time-display').textContent = (new Date).toLocaleString();
            document.getElementById('week-display').textContent = new Intl.DateTimeFormat('zh-CN', {
                weekday: 'long'
            }).formatToParts(new Date())[0].value;
        }, 1000);
    </script>
</div>
<div>
    服务器信息：<span>{$_SERVER['SERVER_SOFTWARE']}</span>
</div>
<div>
    操作系统：<span>{:php_uname()}</span>
</div>