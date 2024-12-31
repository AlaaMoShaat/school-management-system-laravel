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
                        <h4 class="mb-0" style="white-space: nowrap;">{{ trans('parentdash_trans.Welcome') }} {{ auth()->user()->Name_Father }} && {{ auth()->user()->Name_Mother }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                </div>
            </div>

            <section>
                <div class="container py-5">
                    <div class="row justify-content-center">
                         @foreach($students as $student)
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                    <div class="card text-black">
                                        <img src="{{URL::asset('assets/images/student.png')}}"/>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <h5 style="font-family: 'Cairo', sans-serif"
                                                    class="card-title">{{$student->name}}</h5>
                                                <p class="text-muted mb-4">{{ trans('parentdash_trans.StudentInfo') }}</p>
                                            </div>
                                            <div>
                                                <div class="d-flex justify-content-between">
                                                    <span>{{ trans('student_trans.Grade') }}</span><span>{{$student->grade->name}}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>{{ trans('student_trans.Classroom') }}</span><span>{{$student->classroom->name}}</span>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span>{{ trans('student_trans.Section') }}</span><span>{{$student->section->name}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

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
