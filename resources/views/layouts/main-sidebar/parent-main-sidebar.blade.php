<div class="scrollbar side-menu-bg" style="overflow: scroll">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <li>
            <a href="{{ url('/parent/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span
                        class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>


        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('admindash_trans.MyLists')}} </li>

        <li>
            <a href="{{ route('MySons') }}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">{{ trans('parentdash_trans.MySons') }}</span></a>
        </li>

        <li>
            <a href="{{ route('sonsFees') }}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">{{ trans('parentdash_trans.Invoices') }}</span></a>
        </li>

        <li>
            <a href="{{ url('/Parents_profile') }}"><i class="fas fa-id-card-alt"></i><span
                    class="right-nav-text">{{ trans('teacherdash_trans.Profile') }}</span></a>
        </li>

    </ul>
</div>
