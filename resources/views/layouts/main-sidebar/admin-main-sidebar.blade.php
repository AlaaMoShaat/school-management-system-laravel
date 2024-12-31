<div class="scrollbar side-menu-bg">
    <ul class="nav navbar-nav side-menu" id="sidebarnav">
        <!-- menu item Dashboard-->
        <li>
            <a href="{{ url('/dashboard') }}">
                <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.Dashboard')}}</span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <!-- menu item Elements-->
        <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('admindash_trans.MyLists')}} </li>

        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#admins">
                <div class="pull-left"><i class="ti-palette"></i><span
                        class="right-nav-text">{{ trans('main_trans.Grade') }}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="admins" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{ route('users.index') }}">{{ trans('main_trans.Grades_list') }}</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                <div class="pull-left"><i class="ti-palette"></i><span
                        class="right-nav-text">{{ trans('main_trans.Grade') }}</span></div>
                <div class="pull-right"><i class="ti-plus"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="elements" class="collapse" data-parent="#sidebarnav">
                <li><a href="{{ route('grades.index') }}">{{ trans('main_trans.Grades_list') }}</a></li>
            </ul>
        </li>
       <!-- classes-->
       <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
            <div class="pull-left"><i class="fa fa-building"></i><span
                    class="right-nav-text">{{trans('main_trans.classes')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
            <li><a href="{{route('classrooms.index')}}">{{trans('main_trans.List_classes')}}</a></li>
        </ul>
        </li>


    <!-- sections-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
            <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span
                    class="right-nav-text">{{trans('main_trans.sections')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
            <li><a href="{{route('sections.index')}}">{{trans('main_trans.List_sections')}}</a></li>
        </ul>
    </li>


    <!-- subjects-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#subjects-menu">
            <div class="pull-left"><i class="fas fa-chalkboard"></i></i><span
                    class="right-nav-text">{{trans('main_trans.subjects')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="subjects-menu" class="collapse" data-parent="#sidebarnav">
            <li><a href="{{route('subjects.index')}}">{{trans('main_trans.List_subjects')}}</a></li>
        </ul>
    </li>

    <!-- students-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu">
            <div class="pull-left"><i class="fas fa-user-graduate"></i></i></i><span
                    class="right-nav-text">{{trans('main_trans.students')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="students-menu" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{ route('students.index') }}">{{ trans('main_trans.List_students') }}</a></li>
            <li> <a href="{{ route('promotions.index') }}">{{ trans('main_trans.Students_Promotions') }}</a></li>
            <li> <a href="{{ route('indexGraduation') }}">{{ trans('student_trans.Graduate_Students') }}</a></li>
        </ul>
    </li>



    <!-- Teachers-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
            <div class="pull-left"><i class="fas fa-chalkboard-teacher"></i></i><span
                    class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{ route('teachers.index') }}">{{ trans('main_trans.List_teachers') }}</a> </li>
        </ul>
    </li>


    <!-- Parents-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
            <div class="pull-left"><i class="fas fa-user-tie"></i><span
                    class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{ route('add_parent') }}">{{ trans('main_trans.List_Parents') }} </a> </li>
        </ul>
    </li>

    <!-- Accounts-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                    class="right-nav-text">{{trans('main_trans.Financial_Accounts')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{ route('fees.index') }}">{{ trans('main_trans.List_Fees') }}</a> </li>
            <li> <a href="{{ route('fee_invoices.index') }}">{{ trans('main_trans.List_Invoices') }}</a> </li>
            <li> <a href="{{ route('receipt_students.index') }}">{{ trans('main_trans.List_Receipts') }}</a> </li>
            <li> <a href="{{ route('processing_fees.index') }}">{{ trans('main_trans.List_Processing_fees') }}</a> </li>
            <li> <a href="{{ route('payment_students.index') }}">{{ trans('main_trans.List_Payments') }}</a> </li>
        </ul>
    </li>

    <!-- library-->
    <li>
        <a href="javascript:void(0);" data-toggle="collapse" data-target="#library-icon">
            <div class="pull-left"><i class="fas fa-book"></i><span class="right-nav-text">{{trans('main_trans.library')}}</span></div>
            <div class="pull-right"><i class="ti-plus"></i></div>
            <div class="clearfix"></div>
        </a>
        <ul id="library-icon" class="collapse" data-parent="#sidebarnav">
            <li> <a href="{{ route('library.index') }}">{{ trans('main_trans.َList_books') }}</a> </li>
        </ul>
    </li>


    <!-- Settings-->
    <li>
        <a href="{{route('settings.index')}}"><i class="fas fa-cogs"></i><span class="right-nav-text">{{trans('main_trans.Settings')}} </span></a>
    </li>

            </ul>
        </li>
    </ul>
</div>
