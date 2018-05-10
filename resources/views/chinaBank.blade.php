<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width"/>
    <title>中行</title>
    <style>

        html, body {
            margin: 0;
            border: 0;
            padding: 0;
        }

        html {
            width: 100%;
            height: 100%;
            background: url({{asset('image/chinaBank/bg.png')}}) no-repeat;
            /*filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='scale')";*/
            background-size: 100% 100%;
        }

        * {
            box-sizing: border-box;
        }

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
            position: relative;
            /*height: 5rem;*/
        }

        .boy {
            /*position: absolute;*/
            float: left;
            width: 3.73rem;
            height: 3.90rem;
            margin: 2rem 0.5rem 0.69rem 0.16rem;
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
</head>
<body>

<div class="pic">
    <img src="" alt="" id="picture" onload="getPicture()">
</div>

<div class="hh">

    <div class="boy">

        <img src="/image/chinaBank/img_boy.png" alt="" width="100%">

    </div>

    <div class="test">
        <img src="/image/chinaBank/img_logo.png" alt="" width="100%">
    </div>
</div>


<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
    /**----------------------------------- 自适应 -----------------------------------------*/
    (function (doc, win) {
        var docEl = doc.documentElement,
            resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
            recalc = function () {
                var clientWidth = docEl.clientWidth;
                if (!clientWidth) return;
                if (clientWidth >= 750) {
                    docEl.style.fontSize = '100px';
                } else {
                    docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';
                }
            };

        if (!doc.addEventListener) return;
        win.addEventListener(resizeEvt, recalc, false);
        doc.addEventListener('DOMContentLoaded', recalc, false);
    })(document, window);


    //获取照片
    {{--getPicUrl({{$photoId}});--}}

        getPicUrl(2348);

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

            {{--@if(!empty($sign_package))--}}
            {{--var signPackage = {--}}
            {{--app_key: '{{$sign_package['app_key']}}',--}}
            {{--timestamp: '{{$sign_package['timestamp']}}',--}}
            {{--nonce_str: '{{$sign_package['nonce_str']}}',--}}
            {{--signature: '{{$sign_package['signature']}}',--}}
            {{--url: '{{$sign_package['url']}}',--}}
            {{--title: 'AR小虎随便撩---助力冬奥？我靠拍照！',--}}
            {{--desc: 'AR小虎随便撩---助力冬奥？我靠拍照！',--}}
            {{--link: '{{$sign_package['url']}}', // 分享链接--}}
            {{--imgUrl: '{{asset('/image/life/share_icon.jpg')}}' // 分享图标--}}
            {{--};--}}
            {{--console.log(signPackage);--}}
            {{--wx.config({--}}
            {{--debug: false,--}}
            {{--appId: signPackage.app_key,--}}
            {{--timestamp: signPackage.timestamp,--}}
            {{--nonceStr: signPackage.nonce_str,--}}
            {{--signature: signPackage.signature,--}}
            {{--jsApiList: [--}}
            {{--'onMenuShareTimeline', 'onMenuShareAppMessage'--}}
            {{--]--}}
            {{--});--}}

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

    {{--wx.ready(function () {--}}
    {{--wx.onMenuShareTimeline({--}}
    {{--title: signPackage.title,--}}
    {{--link: signPackage.link,--}}
    {{--imgUrl: signPackage.imgUrl--}}
    {{--});--}}

    {{--wx.onMenuShareAppMessage({--}}
    {{--title: signPackage.title,--}}
    {{--//            desc: signPackage.desc,--}}
    {{--link: signPackage.link,--}}
    {{--imgUrl: signPackage.imgUrl--}}
    {{--});--}}

    {{--});--}}
    {{--@endif--}}
</script>
</body>

</html>