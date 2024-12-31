<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">
            <div class="page-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0">{{ trans('studentdash_trans.Welcome') }} {{ auth()->user()->name }}</h4><br>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>
            @foreach ($subjects as $subject)
                <div class="row" >
                    <div class="col-xl-12 col-lg-6 col-md-6 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <div class="clearfix">
                                    <div class="float-left">
                                            <h5>{{$subject->name}}</h5>
                                    </div>
                                    <div class="float-right text-right">
                                        <span class="text-warning">
                                            <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>

                                        </span>
                                        <h6>{{trans('studentdash_trans.Teacher')}}/{{$subject->teacher->Name}}</h6>
                                    </div>
                                </div>
                                <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                    <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{ route('showContent' , $subject->id) }}"><span class="text-danger">{{ trans('studentdash_trans.ShowContent') }}</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
