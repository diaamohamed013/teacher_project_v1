@extends('site.master')

@section('title', 'Courses')

@section('css')
    <link rel="stylesheet" href="{{asset('css/lecture.css')}}" class="rel">
    <link rel="stylesheet" href="{{asset('css/lecture-responsive.css')}}" class="rel">
@endsection

@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
            <div class="header">
                <div class="main">
                <div class="headerContent">
                    <h2 class='lectureName'>{{$course->title}}</h2>
                    <p class='lectureDescription'>{{$course->sub_title}}</p>
                    <div class='lectureRelease'>
                <span class='publisherBy'>
                    نشر بواسطة:&nbsp;
                </span>
                        <a class='publisherName'>أ. أحمد فتحى</a>
                    </div>
                    <div class="lectureUbdateDate">
                        <span class='updateIcon'><i class="fa-solid fa-file-pen"></i></span>
                        اخر تحديث تم في
                        <span class='updateDate'>{{Date_format_($course->created_at)}}</span>
                    </div>
                </div>
            </div>
            </div>
            </div>

            <div class="month">
                <div class="main">
                    <div class="row">
                        <div class="col-xl-8 col-md-7 rightCard">
                            <div class="monthParts">

                                <div class="mainTitle">
                                    <h2 class="title" data-sal="slide-down" data-sal-delay="0"
                                        data-sal-easing="ease-out-back" data-sal-duration="1800">
                                        الاقسام
                                    </h2>
                                    <svg class="titleLine" width="155" height="12" viewBox="0 0 155 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.417137 3.25745L154.719 2.8595L18.7378 5.47683L126.75 8.45495L49.5322 9.20728"
                                              stroke="#5acdff" stroke-width="4"/>
                                    </svg>
                                </div>
                                <div id="accordion" class="monthsLists">
                                    @isset($course->sections)
                                        @foreach($course->sections as $section)
                                            <div class="card">
                                                <div class="card-header" id="heading_{{$section->id}}">
                                                    <button
                                                        class="d-flex align-items-center justify-content-between btn btn-link collapsed"
                                                        data-toggle="collapse" data-target="#collapse_{{$section->id}}"
                                                        aria-expanded="false" aria-controls="collapse_{{$section->id}}">
                                                        <div class='nameOfPart'>
                                                            <span class='partIcon'><i class="fa-solid fa-indent"></i></span>
                                                            {{$section->name}}
                                                        </div>
                                                        <div class='monthBtnDetails'>
                                                            <span>{{$section->sectionDetails->count()}}  شرح</span>
{{--                                                            <span>0  تطبيق</span>--}}
                                                            <span class='monthArrow'>
                                                                <i class="fa-solid fa-angle-down"></i>
                                                            </span>
                                                        </div>
                                                    </button>
                                                </div>

                                                @isset($section->sectionDetails)
                                                    @foreach($section->sectionDetails as $detail)
                                                        <div id="collapse_{{$section->id}}" class="collapse" aria-labelledby="heading_{{$section->id}}">
                                                            <div class="card-body">
                                                                <div class="monthItem">
                                                                    <a>
                                                                        <span class='monthIcon'>
                                                                            <i class="fa-solid fa-circle-play"></i>
                                                                        </span>
                                                                        <span>{{$detail->section_title}}</span>
                                                                    </a>
                                                                    <span>{{$detail->details}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endisset
                                            </div>
                                        @endforeach
                                    @endisset
                                </div>
                                <div class="mainTitle">
                                    <h2 class="title" data-sal="slide-down" data-sal-delay="0"
                                        data-sal-easing="ease-out-back" data-sal-duration="1800">
                                        الوصف
                                    </h2>
                                    <svg class="titleLine" width="155" height="12" viewBox="0 0 155 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.417137 3.25745L154.719 2.8595L18.7378 5.47683L126.75 8.45495L49.5322 9.20728"
                                              stroke="#5acdff" stroke-width="4"/>
                                    </svg>
                                </div>
                                <div class="monthDescriptionParent ">
                                    <p class='monthDescription'>
                                        <blockquote>
                                            <p>{{$course->description}}</p>
                                        </blockquote>
                                    </p>
                                    <div class="loadMore">
                                        <div class="loadMoreContent">
                                            عرض المزيد <i class="fa-solid fa-angle-down"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-5 leftCard first">
                            <div class="preview-card">
                                <div class="preview-card-image ">
                                    <span class="degree gradeBg3">3ث</span>
                                    <img width="100" class="ontop" height="100" src="{{url($course->image)}}" alt=""/>
                                </div>
                                <div class="card-content">
                                    <div class="price">
                                    <span class="real-price"><span class="number">{{$course->price}}</span><span
                                            class="unit">ج.م</span>
                                    </span>
                                        <span class="price-before-dis ontop">
                                            <span class="number">{{$course->sale_price}}</span>
                                            <span class="unit">ج.م</span>
                                        </span>
                                        <span class="discount">  خصم
                                            {{number_format($course->sale_price/$course->price * 100,2)}}%</span>
                                    </div>

                                    <a href="
                                         @auth()
                                            {{route('payment.index',['course_id'=> $course->id,'price' => $course->sale_price , 'user_id' => auth()->user()->id])}}
                                         @else
                                            {{route('login')}}
                                         @endauth"
                                       class="buy-now mainHover"> <span class='ontop'> شراء الأن</span></a>
                                    <div class="coupon">
                                        <button  id="couponBtn" class='add-coupon' type='button' data-toggle="modal" data-target="#payment"
                                                class='editBtn'>شحن رصيد
                                        </button>
                                    </div>
                                    <div class="course-content">
                                        <h2>محتوي المحاضرة:</h2>
                                        <div class="item ">
                                            <i class="fa-solid fa-calendar-days ml-2"></i>
                                            <p>المحاضرة ستكون متاحة طول العام</p>
                                        </div>
                                        <div class="item">
                                            <i class="fa-solid fa-hourglass  ml-2"></i>
                                            <p>
                                                <span>0.00 دقيقة</span>
                                                من الفيديو
                                            </p>
                                        </div>
                                        <div class="item">
                                            <i class="fa-solid fa-clipboard-question ml-2"></i>
                                            <p><span>0</span> من الاسئلة</p>
                                        </div>
                                        <div class="item">
                                            <i class="fa-solid fa-location-dot ml-2"></i>
                                            <p>الوصول من اي مكان</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.content -->
    </div>

    <x-payModal></x-payModal>
@endsection

@push('course-js')
    <script src="{{asset('js/lecture.js')}}"></script>
@endpush
