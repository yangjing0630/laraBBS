<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{--<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width"/>--}}
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title>中行</title>
    <style>

        html, body {
            border: none;
            padding: 0;
            margin: 0;
        }

        {{--.bg {--}}
            {{--width: 100%;--}}
            {{--height: 100%;--}}
            {{--position: relative;--}}
            {{--background: url("{{asset('image/chinaBank/bg.png')}}");--}}
            {{--background-size: 100% 100%;--}}
        {{--}--}}

        html {
            width: 100%;
            height: 100%;
            background: url({{asset('image/chinaBank/bg.png')}});
            filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')";
            background-size: 100% 100%;
        }

        /*.xx {*/
        /*position: fixed;*/
        /*}*/

        .pic {
            position: relative;
            width: 7.18rem;
            height: 4.04rem;
            background: url("{{asset('image/chinaBank/img_kuang.png')}}");
            /*padding-top: 2.37rem;*/
            margin: 2.37rem auto 0rem;
        }

        .pic img {
            /*width: 95%;*/
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
        }

        .hh {
            width: 100%;
            position: absolute;
            bottom: 0.1rem;
            /*margin: 0 auto;*/
            /*position: relative;*/
            /*height: 5rem;*/
        }

        .boy {
            /*position: absolute;*/
            float: left;
            width: 3.73rem;
            height: 3.90rem;
            margin: 1.5rem 0.5rem 0.3rem 0.16rem;
        }

        .test {
            /*position: absolute;*/
            float: right;
            width: 1.98rem;
            height: 1.46rem;
            margin: 3.5rem 0.39rem 0.69rem 0.5rem;
        }


    </style>
    <script src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>

    {{--<script>--}}
    {{--window.setRem = function () {--}}
    {{--const doc = document.documentElement;--}}
    {{--let width = doc.getBoundingClientRect().width || document.all ? document.getElementsByTagName("html")[0].offsetWidth : window.innerWidth;--}}
    {{--let height = doc.getBoundingClientRect().height || document.all ? document.getElementsByTagName("html")[0].offsetHeight : window.innerHeight;--}}
    {{--window.a_rem = (width / (window.a_designWidth / 100)) < (height / (window.a_designHeight / 100)) ? (width / (window.a_designWidth / 100)) : (height / (window.a_designHeight / 100));--}}
    {{--doc.style.fontSize = window.a_rem + "px";--}}
    {{--console.info('setRem complete: rem = ' + window.a_rem + 'px');--}}
    {{--};--}}
    {{--window.initRem = function (designWidth, designHeight) {--}}
    {{--window.a_designWidth = designWidth || 750;--}}
    {{--window.a_designHeight = designHeight || 1206;--}}
    {{--window.setRem();--}}
    {{--window.addEventListener("resize", self.setRem, false);--}}
    {{--};--}}
    {{--initRem(814, 1481);--}}
    {{--</script>--}}


</head>
<body>

<div>

    <div class="xx">
        <div class="pic">
            {{--<img src="" alt="" id="picture" onload="getPicture()" width="100%">--}}
        </div>
    </div>
    <div class="hh">

        <div class="boy">

            <img src="/image/chinaBank/img_boy.png" alt="" width="100%">

        </div>

        <div class="test">
            <img src="/image/chinaBank/img_logo.png" alt="" width="100%">
        </div>
    </div>
</div>


<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    /**----------------------------------- 自适应 -----------------------------------------*/

    window.setRem = function () {
        const doc = document.documentElement;
        let width = doc.getBoundingClientRect().width || document.all ? document.getElementsByTagName("html")[0].offsetWidth : window.innerWidth;
        let height = doc.getBoundingClientRect().height || document.all ? document.getElementsByTagName("html")[0].offsetHeight : window.innerHeight;
        window.a_rem = (width / (window.a_designWidth / 100)) < (height / (window.a_designHeight / 100)) ? (width / (window.a_designWidth / 100)) : (height / (window.a_designHeight / 100));
        doc.style.fontSize = window.a_rem + "px";
        console.info('setRem complete: rem = ' + window.a_rem + 'px');
    };
    window.initRem = function (designWidth, designHeight) {
        window.a_designWidth = designWidth || 750;
        window.a_designHeight = designHeight || 1206;
        window.setRem();
        window.addEventListener("resize", self.setRem, false);
    };
    initRem();

    //获取照片
    {{--getPicUrl({{$photoId}});--}}

    function getPicUrl(photoId) {
        $.getJSON("https://fileupload.focuscv.com/index.php?appId=2&photoId=" + photoId, function (imgData) {
            if (imgData.status == 1000) {
                var img = document.getElementById('picture');
                img.src = imgData.message.url;
            } else {
                console.log(imgData);
            }
        });
    }

            @if(!empty($sign_package))
    var signPackage = {
            app_key: '{{$sign_package['app_key']}}',
            timestamp: '{{$sign_package['timestamp']}}',
            nonce_str: '{{$sign_package['nonce_str']}}',
            signature: '{{$sign_package['signature']}}',
            url: '{{$sign_package['url']}}',
            title: '中行',
            desc: '中行',
            link: '{{$sign_package['url']}}', // 分享链接
            imgUrl: '{{asset('/image/chinaBank/img_boy.png')}}' // 分享图标
        };
    console.log(signPackage);
    wx.config({
        debug: false,
        appId: signPackage.app_key,
        timestamp: signPackage.timestamp,
        nonceStr: signPackage.nonce_str,
        signature: signPackage.signature,
        jsApiList: [
            'onMenuShareTimeline', 'onMenuShareAppMessage'
        ]
    });

    var browser = {
        versions: function () {
            var u = navigator.userAgent, app = navigator.appVersion;
            return {         //移动终端浏览器版本信息
                trident: u.indexOf('Trident') > -1, //IE内核
                presto: u.indexOf('Presto') > -1, //opera内核
                webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
                ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或uc浏览器
                iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器
                iPad: u.indexOf('iPad') > -1, //是否iPad
                webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
            };
        }(),
        language: (navigator.browserLanguage || navigator.language).toLowerCase()
    };


    var ua = navigator.userAgent.toLowerCase();

    if (browser.versions.ios) {
        //ios系统
        $('#ios_download').show();
        $('#ios_open').show();
    } else if (browser.versions.android) {
        //android系统
        $('#android_download').show();
        $('#android_open').show();
        if (ua.match(/MicroMessenger/i) == "micromessenger") {
            $('#tip').show();
        } else {

        }
    }


    console.log(document.getElementById('picture'));
    function getPicture() {
        console.log($('#picture')[0].width);
        var img = $('#picture');
        var w = $('#picture')[0].width,
            h = $('#picture')[0].height;
        if (w < h) {
            img.css('height', '100%');
        } else if (h < w) {
            img.css('width', '100%');
        }
    }

    wx.ready(function () {
        wx.onMenuShareTimeline({
            title: signPackage.title,
            link: signPackage.link,
            imgUrl: signPackage.imgUrl
        });

        wx.onMenuShareAppMessage({
            title: signPackage.title,
            //            desc: signPackage.desc,
            link: signPackage.link,
            imgUrl: signPackage.imgUrl
        });

    });
    @endif
</script>
</body>

</html>