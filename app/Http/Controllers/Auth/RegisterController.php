<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function showRegistrationForm()
    {
        return view('site.pages.register');
    }

    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));

            if (!$user->save()) {
                throw new \Exception('error_create_student');
                // return redirect()->back()->withInput()->withErrors('error_create_student');
            }

            $student = new Student();
            $student->user_id = $user->id;
            $student->phone = $request->input('phone_number');
            $student->parent_phone = $request->input('parent_phone_number');
            $student->city = $request->input('governorate_id');
            $student->grade_id = $request->input('grade_id');
            $student->balance = 0;


            if ($student->save()) {
                $this->guard()->login($user);
            }
            DB::commit();
            return $request->wantsJson()
                ? new JsonResponse([], 201)
                : redirect($this->redirectPath());
        } catch (\Exception $e) {
            DB::rollBack();
            // Redirect with the error message
            return $request->wantsJson()
                ? new JsonResponse(['error' => $e->getMessage()], 400) // Return error in JSON response
                : redirect()->back()->withInput()->withErrors(['error' => __('error_create_student')]); // Show error message in the form
        }
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
