{{--<div class="modal fade chargeModal" id="charge" tabindex="-1" role="dialog"--}}
{{--     aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <form method="POST" action="https://alfawakhry-math.com/recharge" class="modal-content chargeForm">--}}
{{--            <input type="hidden" name="_token" value="egMOg5Ztej0zy3xPLFPz8CIIUv4Ujqrr9b2nRpqC">                <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">كود الشحن</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <div class="chargeField">--}}
{{--                    <label for="">كود الشحن</label>--}}
{{--                    <input type="text" name="code" placeholder='ادخل كود الشحن'>--}}
{{--                </div>--}}
{{--                <p class='finishText'></p>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="submit" class="btn myButton">شحن رصيد</button>--}}
{{--                <button type="button" class="btn secBtn" data-dismiss="modal">إغلاق</button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="modal fade choseChargeType" id="choseChargeType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog" role="document">--}}
{{--        <form method="POST" action="https://alfawakhry-math.com/recharge" class="modal-content">--}}
{{--            <input type="hidden" name="_token" value="egMOg5Ztej0zy3xPLFPz8CIIUv4Ujqrr9b2nRpqC">                <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">اختر طريقة الشحن</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}

{{--                <button class='fromPlatform' id="fromPlatform" type='button' data-toggle="modal" data-target="#charge">--}}
{{--                    شحن باستخدام كود--}}
{{--                </button>--}}
{{--                <button class='fromPayment' id="fromPayment" type='button' data-toggle="modal" data-target="#payment">--}}
{{--                    شحن بدون كود--}}
{{--                </button>--}}
{{--            </div>--}}

{{--        </form>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="modal fade payment" id="payment" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="GET" action="{{route('payment.index')}}" class="modal-content">
            @csrf
            @auth()
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            @endauth
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">شحن بدون كود</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="chargeField">
                    <label for="">ادخل المبلغ</label>
                    <input type="text" name="price" placeholder='ادخل المبلغ'>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn myButton">شحن رصيد</button>
                <button type="button" class="btn secBtn" data-dismiss="modal">إغلاق</button>
            </div>
        </form>
    </div>
</div>
