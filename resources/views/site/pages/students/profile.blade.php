@extends('site.master')

@section('title', 'Students')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}" class="rel">
    <link rel="stylesheet" href="{{ asset('css/profile-responsive.css') }}" class="rel">

@endsection
@section('content')
    <section class="secMain">
        <div class="bg nonePrint paper2" style="z-index: -1">
            <img src="" alt="">
        </div>

        <div class="container bigParent">
            <div class="row">
                <div class="col-xl-8 col-lg-7   rightProfile">
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 mb-30">
                            <div class="addCharge ">
                                <span class="iconCharge">
                                    <i class="fa-solid fa-wallet"></i>
                                </span>
                                <span class='yourMoney'>{{$student->balance." ج.م"}}</span>
                                <button class='addChargeBtn' type='button' data-toggle="modal" data-target="#payment"
                                        class='editBtn'>اضافة
                                </button>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 mb-30">
                            <div class="whiteBox statBox">
                                <span class="statICon">
                                    <i class="fa-solid fa-question"></i>
                                </span>
                                <div class="statContent">
                                    <span class='num totalAnswers'>
                                       0
                                    </span>
                                    <span class='detail'>الاختبارات </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 mb-30">
                            <div class="whiteBox statBox">
                                <span class="statICon">
                                    <i class="fa-solid fa-circle-check"></i>
                                </span>
                                <div class="statContent">
                                    <span class='num correctAnswers'>
                                        {{$student->courses->count()}}
                                    </span>
                                    <span class='detail'>عدد&nbsp;الكورسات</span>
                                </div>
                            </div>
                        </div>
{{--                        <div class="col-xl-12 col-sm-12 mb-30">--}}
{{--                            <div class="whiteBox donutParent">--}}

{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5  mb-30 leftProfile ">
                    <div class="whiteBox profileDetails ">
                        <div class="profileImg">
                            <img src="{{asset('imgs/user.webp')}}" alt="">
                        </div>
                        <div class="profileContent">
                            <div class="personalInformation">
                                <h3 class='profileName'>{{auth()->user()->name}}</h3>
                                <span class='profileType'>طالب</span>
                            </div>
                            <div class="paper">
                                <img src="" alt="">
                            </div>
                            <div class="someDetails">
                                <div class="control">
                                    <h3 class='someDetailsHeading'>معلومات الطالب</h3>
                                </div>
                                <div class="item">
                                    <span class='type'>الاسم:</span>
                                    <span class='info'>{{auth()->user()->name}}</span>
                                </div>
                                <div class="item">
                                    <span class='type'>المرحلة الدراسية:</span>
                                    <span class='info'>{{$student->grade->name}}</span>
                                </div>
                                <div class="item">
                                    <span class='type'>الرقم:</span>
                                    <span class='info'>{{$student->phone}}</span>
                                </div>
                                <div class="item">
                                    <span class='type'>رقم ولي الامر:</span>
                                    <span class='info'>{{$student->parent_phone}}</span>
                                </div>
                                <div class="item">
                                    <span class='type'> المحافظة:</span>
                                    <span class='info'>{{$student->city}}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class='myCourses row'>
                @foreach($student->courses as $course)
                    <div class="col-xl-4 col-lg-6 col-md-6 myCard" data-sal='slide-up' data-sal-delay='0' data-sal-easing='ease-out-back' data-sal-duration='1800'>
                        <a class="latestCard grade2" href='{{route('courses.show',$course->id)}}'>
                            <div class="cardParent">
                                <div class='contentParent'>
                                    <div class="image">
                                        <img width="100" height="100" class="ontop" src="{{ $course->image === null ? asset('imgs/teacher/bg_course.jpg') : asset($course->image)}}" alt="أ. أحمد فتحى">

                                        <span class="degree gradeBg2" dir="auto">
                                           {{ $course->grade->symbol }}
                                        </span>
                                        <div class="cardHover">
                                            <span class="playIcon">
                                                <i class="fa fa-play"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="nameDate">
                                            <div class="teachInfo">
                                                <div class="infoImg">
                                                    <img width="30" height="30" style="object-position: top;" src="{{asset('imgs/teacher/teacher.png')}}" alt="أ. أحمد فتحى">
                                                </div>
                                                <span class='cardName'>
                                                    أ. أحمد فتحى
                                                </span>
                                            </div>
                                            <span class='cardDate'>{{Date_format_($course->created_at)}}</span>
                                        </div>

                                        <h3  class="monthName" dir="auto">{{$course->title}}</h3>
                                        <p  class='monthText' dir="auto">{{$course->sub_title}}</p>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="detailItem lecPrice">
                                        <span class='cardPrice'>{{$course->sale_price}}</span>
                                        <span>ج.م</span>
                                    </div>
                                    <div class="detailItem users">
                                        <span><i class="fa-solid fa-book"></i></span>
                                        <span>{{$course->sections->count() . ' درس'}} </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <x-payModal></x-payModal>
@endsection
