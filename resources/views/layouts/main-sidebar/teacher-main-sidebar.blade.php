<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <li>
            <a href="{{ url('/teacher/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('admindash_trans.MyLists')}} </li>


        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#meetings-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span
                        class="right-nav-text">{{trans('main_trans.OnlineMeetings')}}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="meetings-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Online_meetings.index')}}">{{trans('main_trans.List_OnlineMeetings')}}</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#quizzes-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                        class="right-nav-text">الامتحانات</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="quizzes-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{route('Quizzes.index')}}">الامتحانات</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                        class="right-nav-text">التقارير</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{url('/attendance_report')}}">تقرير الحضور والغياب</a></li>
            </ul>

        </li>

        <li>
            <a href="{{ url('/Teacher_profile') }}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">{{ trans('teacherdash_trans.Profile') }}</span></a>
        </li>

    </ul>
</div>
