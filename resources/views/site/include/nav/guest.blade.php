<nav class="myNav active ">
    <div class="navProgress">
        <span class='navProgChild'></span>
    </div>
    <div class="customeContainer">
        <div class="right">

            <a href="{{ route('home') }}" class="navLogo" name="mainLogo">
                <div class="logoBrand">

                    <img width='100' height='100' src="{{ asset('imgs/logo.webp') }}" alt="logo">

                    <h2 class="brandTitle">
                        ماستر <span>الرياضيات</span>
                    </h2>

                </div>
            </a>
            <div class="sunMoon" style="display: none"></div>
            <label class="theme-switch ">
                <input type="checkbox" class="theme-switch__checkbox">
                <div class="theme-switch__container">
                    <div class="theme-switch__clouds"></div>
                    <div class="theme-switch__stars-container">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 55" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M135.831 3.00688C135.055 3.85027 134.111 4.29946 133 4.35447C134.111 4.40947 135.055 4.85867 135.831 5.71123C136.607 6.55462 136.996 7.56303 136.996 8.72727C136.996 7.95722 137.172 7.25134 137.525 6.59129C137.886 5.93124 138.372 5.39954 138.98 5.00535C139.598 4.60199 140.268 4.39114 141 4.35447C139.88 4.2903 138.936 3.85027 138.16 3.00688C137.384 2.16348 136.996 1.16425 136.996 0C136.996 1.16425 136.607 2.16348 135.831 3.00688ZM31 23.3545C32.1114 23.2995 33.0551 22.8503 33.8313 22.0069C34.6075 21.1635 34.9956 20.1642 34.9956 19C34.9956 20.1642 35.3837 21.1635 36.1599 22.0069C36.9361 22.8503 37.8798 23.2903 39 23.3545C38.2679 23.3911 37.5976 23.602 36.9802 24.0053C36.3716 24.3995 35.8864 24.9312 35.5248 25.5913C35.172 26.2513 34.9956 26.9572 34.9956 27.7273C34.9956 26.563 34.6075 25.5546 33.8313 24.7112C33.0551 23.8587 32.1114 23.4095 31 23.3545ZM0 36.3545C1.11136 36.2995 2.05513 35.8503 2.83131 35.0069C3.6075 34.1635 3.99559 33.1642 3.99559 32C3.99559 33.1642 4.38368 34.1635 5.15987 35.0069C5.93605 35.8503 6.87982 36.2903 8 36.3545C7.26792 36.3911 6.59757 36.602 5.98015 37.0053C5.37155 37.3995 4.88644 37.9312 4.52481 38.5913C4.172 39.2513 3.99559 39.9572 3.99559 40.7273C3.99559 39.563 3.6075 38.5546 2.83131 37.7112C2.05513 36.8587 1.11136 36.4095 0 36.3545ZM56.8313 24.0069C56.0551 24.8503 55.1114 25.2995 54 25.3545C55.1114 25.4095 56.0551 25.8587 56.8313 26.7112C57.6075 27.5546 57.9956 28.563 57.9956 29.7273C57.9956 28.9572 58.172 28.2513 58.5248 27.5913C58.8864 26.9312 59.3716 26.3995 59.9802 26.0053C60.5976 25.602 61.2679 25.3911 62 25.3545C60.8798 25.2903 59.9361 24.8503 59.1599 24.0069C58.3837 23.1635 57.9956 22.1642 57.9956 21C57.9956 22.1642 57.6075 23.1635 56.8313 24.0069ZM81 25.3545C82.1114 25.2995 83.0551 24.8503 83.8313 24.0069C84.6075 23.1635 84.9956 22.1642 84.9956 21C84.9956 22.1642 85.3837 23.1635 86.1599 24.0069C86.9361 24.8503 87.8798 25.2903 89 25.3545C88.2679 25.3911 87.5976 25.602 86.9802 26.0053C86.3716 26.3995 85.8864 26.9312 85.5248 27.5913C85.172 28.2513 84.9956 28.9572 84.9956 29.7273C84.9956 28.563 84.6075 27.5546 83.8313 26.7112C83.0551 25.8587 82.1114 25.4095 81 25.3545ZM136 36.3545C137.111 36.2995 138.055 35.8503 138.831 35.0069C139.607 34.1635 139.996 33.1642 139.996 32C139.996 33.1642 140.384 34.1635 141.16 35.0069C141.936 35.8503 142.88 36.2903 144 36.3545C143.268 36.3911 142.598 36.602 141.98 37.0053C141.372 37.3995 140.886 37.9312 140.525 38.5913C140.172 39.2513 139.996 39.9572 139.996 40.7273C139.996 39.563 139.607 38.5546 138.831 37.7112C138.055 36.8587 137.111 36.4095 136 36.3545ZM101.831 49.0069C101.055 49.8503 100.111 50.2995 99 50.3545C100.111 50.4095 101.055 50.8587 101.831 51.7112C102.607 52.5546 102.996 53.563 102.996 54.7273C102.996 53.9572 103.172 53.2513 103.525 52.5913C103.886 51.9312 104.372 51.3995 104.98 51.0053C105.598 50.602 106.268 50.3911 107 50.3545C105.88 50.2903 104.936 49.8503 104.16 49.0069C103.384 48.1635 102.996 47.1642 102.996 46C102.996 47.1642 102.607 48.1635 101.831 49.0069Z"
                                fill="currentColor"></path>
                        </svg>
                    </div>
                    <div class="theme-switch__circle-container">
                        <div class="theme-switch__sun-moon-container">
                            <div class="theme-switch__moon">
                                <div class="theme-switch__spot"></div>
                                <div class="theme-switch__spot"></div>
                                <div class="theme-switch__spot"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </label>
        </div>
        <div class='bigLeft '>
            <button class='toggleBarBtn' type="button" title="toggle">
                <span class='topLine'></span>
                <span class='middleLine'></span>
                <span class='bottomLine'></span>
            </button>
            <div class="left ">
{{--                <form class="search mainSearch" action="https://alfawakhry-math.com/search">--}}
{{--                    <input title="search" placeholder="ابحث هنا" type="search" name="q" value="">--}}
{{--                    <span><i class="fa-solid fa-magnifying-glass"></i></span>--}}
{{--                </form>--}}

                <div class="register">
                    @guest
                        <div class="login">
                            <a href="{{ route('login') }}" class="regItem lineParent">

                                <span class="regIcon">
                                    <img width='100' height='100' src="{{ asset('imgs/login-icon.svg') }}"
                                        alt="signup">
                                </span>

                                <span class="regType">
                                    تسجيل <span> الدخول </span>
                                </span>
                            </a>
                        </div>

                        <div class="signup">

                            <a href="{{ route('register') }}" class="regItem lineParent">

                                <span class="regIcon">
                                    <img width='100' height='100' src="{{ asset('imgs/signupBtn.svg') }}"
                                        alt="signup">
                                </span>
                                <div class="signupCircles">
                                    <span></span>
                                    <span></span>
                                </div>
                                <span class="regType">
                                    سجل معنا
                                </span>


                            </a>
                        </div>
                    @endguest


                    @auth
                        @if (auth()->user()?->is_teacher == 0)
                            <div class="studentInfo">
                                <div class="studentBtn">
                                    <button role="button" type="button" class="btn ftu-btn lineParent" data-toggle="dropdown">
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class='studentIcon'>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 35 35"
                                         style="enable-background:new 0 0 35 35;" xml:space="preserve">
                                        <style type="text/css">

                                        </style>
                                        <g id="Layer_1" class="st0">

                                            <image style="display:inline;overflow:visible;" width="33"
                                                   height="34"
                                                   xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACEAAAAiCAYAAADRcLDBAAAABHNCSVQICAgIfAhkiAAAA1JJREFU
                                                    WEe9l1uITVEYx88Z1yKJ3Ckl1ycvKLcoCSG8uRQlGTxQitwyjnhASiHX3ApPCg1PauRWLokoMmea
                                                    ByW3MA0zbjP+P76t7Tiz1tr7yFe/1p5Z3/et/15nrW+tnc0kt64KmStmiuGii6gXj8UlcUbUJEmb
                                                    TeDcSr7zxBHR1hO3Sf27RGNI/lARbZRsj1gWS/pezy9Fg4nqphYiu6aHqeKjT0ioiM1KVGHJvqrl
                                                    TXeI5oIBZuvv06KdIPd5wf8K/f4ICxExThFVokx8Ef3FC8fbtVffc8HaYfCl4rBrNkJEVCrBNPFd
                                                    jBa3XQmtr4faatFRsEgHlCKCZLxVa/FAsBtC7ZQcF5jzWLU3Wgr0zcQMBV6w4HK1B0MVmOD75r9B
                                                    7fa0ItgN+y14oE1xAh0/tyiLFPG8RFHzzcRyRe2zSH7XREVI/mxfFuohwQJNJYLtdc4iF6o9mWAa
                                                    Bsv3ifmzxXNpRfRTYK1ge94RIxOIOBB7+0l6vpJWBHFXxXjBFkWUq0ZE4yD6negkqKo9XeJ9a4LY
                                                    KeKyJfmgtq/gwHIZNSKqDav1vLtUEQjdK1ikGG9I4uOisBxP1P9OmFDiquwlPpcqgvgOgkU5J5as
                                                    Vs8PBQcZ/cPE0Fg/xW2yeOUSQF/Iz4EflXOJ2OpLaP3H1K4SdSH+PhG9lGSdYI+3dIdoUt8nQQ2h
                                                    NFNXuOAEm0vELGU5Krg5Yfz+TO09wQ3qumABeu8LPjXFRLC9WM0rY4NziG0TSc4O39i/+4uJ4C25
                                                    EWHfTNDa4Iy/HDkvKNch1lwoguN3vuD/FKcJgmlPasxcb8vji22Ki5gu74sWwRVuhGCbpbE3CuJm
                                                    FWSRCFTnY1NImeaimtYGKXBI4Ew0RiK4xi+2Edeo3Zl29DRxiKDSPTLVb9X2Ec4ym2YgVwwi2Hrr
                                                    BUWHm/XNUgfJ5asrM9ksl+MQa0AER213wWKKf7yEJCjqk6vJc9pyjAcZIqKT8Kye+cYs2bbkn1Vk
                                                    smXcxPzWnKmPixjzL34K/6h/e8RFcFbw2fbfDREsSFpuxnxdOb8biyjE/5bg2yIyPnoWCb7kffaa
                                                    wbkjbPR5evoRwiX4rvlx++ocmhMRqOUjZ4Wg0nGKJjEEPBWjRHSJofyzRUNy1f0A3Buhi0E41pMA
                                                    AAAASUVORK5CYII="
                                                   transform="matrix(1 0 0 1 0.6921 0.5)">
                                            </image>
                                        </g>
                                        <g id="Layer_2">
                                            <path class="st1"
                                                  d="M17.91,33.23H2.34c-1.3-2.35,3.94-14.71,10.85-16.21" />
                                            <circle class="st1" cx="17.5" cy="9.85" r="8.36" />
                                            <path class="st1" d="M22.32,22.51h10.6H22.32z" />
                                            <path class="st2" d="M22.32,27.87h10.6H22.32z" />
                                            <path class="st1" d="M22.32,32.64h10.6H22.32z" />
                                        </g>
                                    </svg>

                                </span>
                                        <span class='studentName'>احمد الصغير عبد العال الصغير</span>
                                    </button>
                                    <ul class="dropdown-menu navDrop">
                                        <li>
                                            <a class="dropdown-item navDropItem lineParent" href="https://alfawakhry-math.com/profile">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class='navDropIcon'>
                                            <i class="fa-solid fa-house-chimney-user"></i>

                                        </span>
                                                الملف الشخصي
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item navDropItem lineParent"
                                               href="https://alfawakhry-math.com/my-courses">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class='navDropIcon'>
                                            <i class="fa-solid fa-graduation-cap"></i>
                                        </span>
                                                محاضراتي
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:{}" onclick="window.logoutForm.submit()" class="dropdown-item navDropItem lineParent">
                                                <form id="logoutForm" action="{{ route('logout') }}" class="regItem lineParent" method="POST">
                                                    @csrf
                                                    <span class="line"></span>
                                                    <span class="line"></span>
                                                    <span class="line"></span>
                                                    <span class="line"></span>
                                                    <span class='navDropIcon'>
                                                        <i class="fa-solid fa-right-from-bracket"></i>
                                                    </span>تسجيل الخروج<span class=""></span>
                                                </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mobDetails">
                                    <div class="studentImage">
                                        <a href="https://alfawakhry-math.com/profile">
                                            <img width='100' height='100' src="https://alfawakhry-math.com/imgs/user.webp"
                                                 alt="">
                                        </a>
                                    </div>
                                    <h3 class='studentNameMob'>احمد الصغير عبد العال الصغير</h3>
                                    <form class="search mobSearch" action="https://alfawakhry-math.com/search">
                                        <input title="search" placeholder="ابحث هنا"
                                               type="search" name="q" value="">
                                        <span><i class="fa-solid fa-magnifying-glass"></i></span>
                                    </form>
                                    <ul class=" navDrop">
                                        <li>
                                            <a class="dropdown-item navDropItem lineParent"
                                               href="https://alfawakhry-math.com/profile">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class='navDropIcon'>
                                            <i class="fa-solid fa-house-chimney-user"></i>
                                        </span>
                                                الملف الشخصي
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item navDropItem lineParent"
                                               href="https://alfawakhry-math.com/my-courses">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class='navDropIcon'>
                                            <i class="fa-solid fa-graduation-cap"></i>
                                        </span>
                                                محاضراتي
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:{}" onclick="window.logoutFrm.submit()"
                                               class="dropdown-item navDropItem lineParent">
                                                <form action="https://alfawakhry-math.com/logout" method="post">
                                                    <input type="hidden" name="_token" value="GgvtMQT4GI37o2wa6og29zxUwfgenYUdoV7yagtT">                                                <span class="line"></span>
                                                    <span class="line"></span>
                                                    <span class="line"></span>
                                                    <span class="line"></span>
                                                    <span class='navDropIcon'>
                                                <i class="fa-solid fa-right-from-bracket"></i>
                                            </span>
                                                    <span class="">تسجيل الخروج</span>
                                                    </span>
                                                </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="studentInfo">
                                <div class="studentBtn">
                                    <button role="button" type="button" class="btn ftu-btn lineParent" data-toggle="dropdown">
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class="line"></span>
                                        <span class='studentIcon'>
                                        <i class="fa-solid fa-graduation-cap"></i>

                                        </span>
                                                <span class='studentName'>أ\احمد فتحي</span>
                                    </button>
                                    <ul class="dropdown-menu navDrop">
                                        <li>
                                            <a class="dropdown-item navDropItem lineParent" href="{{route('students.index')}}">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class='navDropIcon'>
                                                    <i class="fa-solid fa-house-chimney-user p-1"></i>
                                                </span>
                                                    الطلاب
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item navDropItem lineParent" href="{{route('grades.index')}}">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class='navDropIcon'>
                                                    <i class="fa-solid fa-user-graduate p-1"></i>
                                                </span>
                                                الصفوف
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item navDropItem lineParent" href="{{route('courses.index')}}">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class='navDropIcon'>
                                                    <i class="fa-solid fa-photo-film p-1"></i>
                                                </span>
                                                الكورسات
                                            </a>
                                        </li>

                                        <li>
                                        <a href="javascript:{}" onclick="window.logoutForm.submit()" class="dropdown-item navDropItem lineParent p-1">
                                            <span class="line"></span>
                                            <span class="line"></span>
                                            <span class="line"></span>
                                            <span class="line"></span>
                                            <span class='navDropIcon'>
                                                    <i class="fa-solid fa-right-from-bracket p-1"></i>
                                                </span>تسجيل الخروج
                                            <form id="logoutForm" action="{{ route('logout') }}" class="regItem lineParent" method="POST">
                                                @csrf
                                            </form>
                                        </a>
                                    </li>
                                    </ul>
                                </div>
                                <div class="mobDetails">
                                    <div class="studentImage">
                                        <a href="https://alfawakhry-math.com/profile">
                                            <img width='100' height='100' src="https://alfawakhry-math.com/imgs/user.webp"
                                                 alt="">
                                        </a>
                                    </div>
                                    <h3 class='studentNameMob'>أ\احمد فتحي</h3>
{{--                                    <form class="search mobSearch" action="https://alfawakhry-math.com/search">--}}
{{--                                        <input title="search" placeholder="ابحث هنا"--}}
{{--                                               type="search" name="q" value="">--}}
{{--                                        <span><i class="fa-solid fa-magnifying-glass"></i></span>--}}
{{--                                    </form>--}}
                                    <ul class=" navDrop">
                                        <li>
                                            <a class="dropdown-item navDropItem lineParent"
                                               href="{{route('students.index')}}">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class='navDropIcon'>
                                                    <i class="fa-solid fa-house-chimney-user"></i>
                                                </span>
                                               الطلاب
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item navDropItem lineParent"
                                               href="{{route('grades.index')}}">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class='navDropIcon'>
                                                    <i class="fa-solid fa-graduation-cap"></i>
                                                </span>
                                                الصفوف
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item navDropItem lineParent"
                                               href="{{route('courses.index')}}">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class='navDropIcon'>
                                                    <i class="fa-solid fa-graduation-cap"></i>
                                                </span>
                                                الكورسات
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:{}" onclick="window.logoutFormM.submit()" class="dropdown-item navDropItem lineParent p-1">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class='navDropIcon'>
                                                    <i class="fa-solid fa-right-from-bracket p-1"></i>
                                                </span>تسجيل الخروج
                                                <form id="logoutFormM" action="{{ route('logout') }}" class="regItem lineParent" method="POST">
                                                    @csrf
                                                </form>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>

            </div>
        </div>
    </div>
</nav>
