<section class="sidebar">
    <ul class="sidebar-menu">
        <li>
            <a href="{{ action('Front\IndexController@getIndex') }}" target="_blank">
                <i class="fa  fa-desktop "></i> <span>На главную</span>
            </a>
        </li>
        <!--
        <li>
            <a href="{{ action('Admin\ModelGenController@getIndex') }}" >
                <i class="fa  fa-desktop "></i> <span>Блоки</span>
            </a>
        </li>
        -->
        <li>
            <a href="{{ action('Admin\SiteSettingController@getIndex') }}" >
                <i class="fa  fa-desktop "></i> <span>Настройки сайта</span>
            </a>
        </li>
        <li>
            <a href="{{ action('Admin\MailController@getIndex') }}" >
                <i class="fa  fa-desktop "></i> <span>Входящие сообщения</span>
            </a>
        </li>

        @foreach (App\Model\ModelGen::where('has_rel', 0)->orderBy('sort_num', 'asc')->get() as $el)
            <li>
                <a href="{{ action('Admin\GenTemplateController@getIndex', $el->id) }}" >
                    <i class="fa  fa-desktop "></i> <span>{{ $el->name }}</span>
                </a>
            </li>
        @endforeach

        @foreach (App\Model\ModelGen::where('has_rel', 1)->orderBy('sort_num', 'asc')->get() as $el)
            <li>
                <a href="{{ action('Admin\GenTemplateController@getIndex', $el->id) }}" >
                    <i class="fa  fa-desktop "></i> <span>{{ $el->name }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</section>
