@extends('site.include.page')

@section('content')
    <section class='signup'>
        <div class="signupCard">
            <div class="customeRow">
                <div class="imageContent">
                    <div class="logo">
{{--                        <img src="{{ asset('imgs/logo.webp') }}" alt="">--}}
                    </div>
                    <p>سجل الأن مع أ. احمد </p>

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

                    <h2>تسجيل جديد</h2>
                    {{$errors}}
                    <form id="form" action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="box  ">
                            <div class="inputItem">
                                <span class='inputIcon'><i class="fa-solid fa-user"></i></span>
                                <input id="name" type="text" placeholder='&nbsp;'
                                    class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                                    required autocomplete="name" autofocus>
                                <label for="name">الاسم رباعي</label>
                                @error('name')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="box  ">
                            <div class="inputItem">
                                <span class='inputIcon'><i class="fa-solid fa-envelope"></i></span>
                                <input id="email" type="email" placeholder='&nbsp;'
                                    class="@error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                <label for="email">البريد الالكتروني</label>
                                @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="box ">
                            <div class="inputItem">
                                <span class='inputIcon'><i class="fa-solid fa-key"></i></span>
                                <input id="password" type="password" placeholder='&nbsp;'
                                    class="@error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">
                                <label for="password">كلمة المرور</label>
                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="box ">
                            <div class="inputItem">
                                <span class='inputIcon'><i class="fa-solid fa-key"></i></span>
                                <input id="password-confirm" type="password" placeholder='&nbsp;'
                                    name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm">أعد كتابة كلمة المرور</label>
                            </div>
                        </div>
                        <div class="box  ">
                            <div class="inputItem">
                                <span class='inputIcon'><i class="fa-solid fa-phone-flip"></i></span>
                                <input id="phone_number" type="tel" placeholder='&nbsp;'
                                    class="@error('phone_number') is-invalid @enderror" name="phone_number" required
                                    autocomplete="phone_number">
                                <label for="phone_number">رقم التليفون</label>
                                @error('phone_number')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="box  ">
                            <div class="inputItem">
                                <span class='inputIcon'><i class="fa-solid fa-phone-flip"></i></span>
                                <input id="parent_phone_number" type="tel" placeholder='&nbsp;'
                                    class="@error('parent_phone_number') is-invalid @enderror" name="parent_phone_number"
                                    required autocomplete="parent_phone_number">
                                <label for="">رقم ولي الأمر</label>
                                @error('parent_phone_number')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="box ">
                            <div class="inputItem ">
                                <span class='inputIcon'><i class="fa-solid fa-graduation-cap"></i></span>
                                <select name="grade_id" id="">
                                    <option value="">اختر المرحلة الدراسية</option>
                                    <option value="1">الصف الأول الثانوي
                                    </option>
                                    <option value="2">الصف الثاني الثانوي
                                    </option>
                                    <option value="3">الصف الثالث الثانوي
                                    </option>
                                    {{--<option value="4">الصف الثالث الثانوي - أزهر
                                   </option>
                                   <option value="5">الصف الثالث الثانوي - أدبي
                                   </option> --}}
                                </select>
                            </div>
                        </div>

                        <div class="box ">
                            <div class="inputItem ">
                                <span class='inputIcon'><i class="fa-solid fa-building"></i></span>
                                <select name="governorate_id" id="">
                                    <option value="">اختر المحافظة</option>
                                    <option value="القاهرة">
                                        القاهرة
                                    </option>
                                    {{-- <option value="2">
                                        الجيزة
                                    </option>
                                    <option value="3">
                                        الأسكندرية
                                    </option>
                                    <option value="4">
                                        الدقهلية
                                    </option>
                                    <option value="5">
                                        البحر الأحمر
                                    </option>
                                    <option value="6">
                                        البحيرة
                                    </option>
                                    <option value="7">
                                        الفيوم
                                    </option>
                                    <option value="8">
                                        الغربية
                                    </option>
                                    <option value="9">
                                        الإسماعلية
                                    </option>
                                    <option value="10">
                                        المنوفية
                                    </option>
                                    <option value="11">
                                        المنيا
                                    </option>
                                    <option value="12">
                                        القليوبية
                                    </option>
                                    <option value="13">
                                        الوادي الجديد
                                    </option>
                                    <option value="14">
                                        السويس
                                    </option>
                                    <option value="15">
                                        اسوان
                                    </option>
                                    <option value="16">
                                        اسيوط
                                    </option>
                                    <option value="17">
                                        بني سويف
                                    </option>
                                    <option value="18">
                                        بورسعيد
                                    </option>
                                    <option value="19">
                                        دمياط
                                    </option>
                                    <option value="20">
                                        الشرقية
                                    </option>
                                    <option value="21">
                                        جنوب سيناء
                                    </option>
                                    <option value="22">
                                        كفر الشيخ
                                    </option>
                                    <option value="23">
                                        مطروح
                                    </option>
                                    <option value="24">
                                        الأقصر
                                    </option>
                                    <option value="25">
                                        قنا
                                    </option>
                                    <option value="26">
                                        شمال سيناء
                                    </option>
                                    <option value="27">
                                        سوهاج
                                    </option>
                                    <option value="28">
                                        الواحات
                                    </option> --}}
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="reg">
                            تسجيل
                        </button>
                        <p class='haveAccount'>هل لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
                    </form>
                </div>
            </div>
        </div>

    </section>
@endsection
