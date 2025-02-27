@extends('site.include.page')

@section('content')
    <section class='signup'>
        <div class="signupCard">
            <div class="customeRow">
                <div class="imageContent">
                    <div class="logo">
{{--                        <img src="{{ asset('imgs/logo.webp') }}" alt="">--}}
                    </div>
                    <p>سجل دخولك عند أ. احمد </p>

                    <span class='teacherName'>وخليك من الأوائل</span>
                    <div class="headerIcons
                        ">
                        <a class="facebook"
                            href='https://www.facebook.com/professorahmedfathy/'><i
                                class="fa-brands fa-facebook-f"></i></a>
                        <a class="whatsapp" href='https://wa.me/+201009597543'><i class="fa-brands fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="content">
                    <div class='contentBrand'>
                        <img src="{{ asset('imgs/logo.webp') }}" alt="">
                    </div>
                    <a href="{{ route('home') }}" class='back'>العودة الي الصفحة الرئيسية<i
                            class="fa-solid fa-arrow-left-long"></i></a>
                    <h2>تسجيل الدخول</h2>

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="box ">
                            <div class="inputItem">
                                <span class='inputIcon'><i class="fa-solid fa-envelope"></i></span>
                                <input id="email" type="email" placeholder='&nbsp;'
                                    class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                    required autocomplete="email" autofocus>
                                <label for="email"> البريد الالكتروني أو رقم الهاتف</label>
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="box  ">
                            <div class="inputItem">
                                <span class='inputIcon'><i class="fa-solid fa-lock"></i></span>
                                <input id="password" type="password" placeholder='&nbsp;'
                                    class="@error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                <label for="password">كلمة المرور</label>
                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div style="display: none;">
                            <input type="checkbox" checked name='remember' placeholder='&nbsp;'>
                            <label for="">تذكرني</label>
                        </div>
                        <button type="submit" class="reg">
                            تسجيل
                        </button>
                        <p class='haveAccount'>ليس لديك حساب؟ <a href="{{ route('register') }}">تسجيل جديد</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
