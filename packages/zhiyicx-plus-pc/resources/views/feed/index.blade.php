@section('title')
动态
@endsection

@extends('pcview::layouts.default')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/pc/css/feed.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/pc/css/topic.css') }}"/>
@endsection

@section('content')
    {{-- 左侧菜单 --}}
    @include('pcview::layouts.partials.leftmenu')

    <div class="feed_cont">

        {{-- 发布动态 --}}
        @if (!empty($TS))
        @include('pcview::widgets.postfeed', ['list' => $hot_topics, 'follow_users' => $follow_users])
        @endif

        {{-- 动态列表 --}}
        <div class="feed_content">
            <div class="feed_menu">
                <a href="javascript:;" data-type="new" class="font16 @if ($type == 'new')selected @endif">最新</a>
                <a href="javascript:;" data-type="hot" class="font16 @if ($type == 'hot')selected @endif">热门</a>
                @if (!empty($TS))
                <a href="javascript:;" data-type="follow" class="font16 @if ($type == 'follow')selected @endif">关注的</a>
                @endif
            </div>
            <div id="content_list"></div>
        </div>
    </div>


    <div class="right_container">
        {{-- 签到 --}}
        @if (!empty($TS))
        @include('pcview::widgets.checkin')
        @endif

        {{-- 推荐用户 --}}
        @include('pcview::widgets.recusers')

        {{-- 收入达人排行榜 --}}
        @include('pcview::widgets.incomerank')
    </div>
@endsection

@section('scripts')
<script src="{{ asset('assets/pc/js/module.picshow.js') }}"></script>
<script src="{{ asset('assets/pc/js/module.weibo.js') }}"></script>
<script src="{{ asset('assets/pc/js/module.mention.js') }}"></script>
<script src="{{ asset('assets/pc/js/jquery.uploadify.js') }}"></script>
<script src="{{ asset('assets/pc/js/md5.min.js') }}"></script>
<script type="text/javascript">
$(function(){
    // 加载微博
    var params = {
        type: '{{ $type }}',
        isAjax: true
    };

    var options = {
        container: '#content_list',
        loading: '.feed_content',
        url: '/feeds',
        params: params,
    };
    loader.init(options);

    // 切换分类
    $('.feed_menu a').on('click', function() {
        var type = $(this).data('type');
        // 清空数据
        $('#content_list').html('');

        // 加载相关微博
        options.params = {
            type: type,
            isAjax: true,
        };
        if(options.params.type == 'hot') {
            options.paramtype = 2;
            options.params.hot = 0
        } else {
            options.paramtype = 0;
        }

        loader.init(options);

        // 修改样式
        $('.feed_menu a').removeClass('selected');
        $(this).addClass('selected');
    });

    // 发布微博
    var up = $('.post_extra').Huploadify({
        auto:true,
        multi:true,
        newUpload:true,
        buttonText:'',
        onUploadSuccess: weibo.afterUpload
    });

    $('#content_list').PicShow({
        bigWidth: 635,
        bigHeight: 400
    });
});
</script>
@endsection