@extends('site.master')

@section('title', 'Grades')

@section('content')
    <x-header title="{{ $grade->name }}"></x-header>
    <div class="content-wrapper">
        <section class='levelsBox'>
            <div class="main">
                <div class="row">
                    @if(count($courses) === 0 )
                        <div class="col-12 text-center mb-5 p-3" data-sal='slide-up' data-sal-delay='0' data-sal-easing='ease-out-back' data-sal-duration='1800'>
                            <h1>لا يوجد كورسات متاحه لهذا الصف</h1>
                        </div>
                    @endif
                    @foreach($courses as $course)
                        <div class="col-xl-4 col-lg-6 col-md-6 myCard" data-sal='slide-up' data-sal-delay='0' data-sal-easing='ease-out-back' data-sal-duration='1800'>
                            <a class="latestCard grade2" href='../lectures/kors-shhr-9-kaml-tany-thanoy-aalmy.html'>
                                <div class="cardParent">
                                    <div class='contentParent'>
                                        <div class="image">
                                            <img width="100" height="100" class="ontop" src="{{ $course->image === null ? asset('imgs/teacher/bg_course.jpg') : asset($course->image)}}" alt="أ. أحمد فتحى">

                                            <span class="degree gradeBg2" dir="auto">
                                           {{ $grade->symbol }}
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
    </div>
@endsection
