<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $id=Auth::id();
        $user=User::find($id);
        if(isset($user['i']))
        {
            session(['i'=> $user['i']]);
            $sub=unserialize($user['submit']);
            session(['arrayanswer' => $sub]);
        }

        $f=Session::get('start');
        if(!isset($f)){
            $sorder=$user['order'];
            $order=unserialize($sorder);
            session(['order' => $order]);
            session(['start' => $order[0][0]]);
        }
        $i=Session::get('i');
        $order=Session::get('order');
        if(!isset($i)){
            $i=0;
        }
        if ($i<10){
            while ($i<10) {
                $j = $order[0][$i];
                session(['start' => $j]);
                $i++;
                session(['i' => $i]);
                DB::table('users')->where('id', $id)->update(['i' => $i]);
                return view('question');
            }
        }
        else{
            Auth::guard('web')->logout();
            return redirect('/');
        }

    }

    public function answersave(Request $request)
    {
        $id=Auth::id();
        $i=Session::get('i');
        if(10<$i) {
            Auth::guard('web')->logout();
            return redirect('/');
        }
        else{
                //Validate form data
            try {
                $this->validate($request,
                    [
                        'submit' => ['required']
                    ]
                );
            } catch (ValidationException $e) {
                session(['message' => "Please choose any answer"]);
                return view('question');
            }
            $answers = array();
                $submit = [$request->submit];

                if(!isset($submit))
                    $option="";
                else
                    $option=$submit;

                $_SESSION['arrayanswer']=Session::get('arrayanswer');

                if(!isset($_SESSION['arrayanswer'])){
                    $_SESSION['arrayanswer']=$answers;
                }
                $answers=$_SESSION['arrayanswer'];

                array_push($answers,$option);

                print_r($answers);

                $_SESSION['arrayanswer']=$answers;

                session(['arrayanswer' => $_SESSION['arrayanswer']]);

                $serialarray=serialize($_SESSION['arrayanswer']);

                //Submit answer

                DB::table('users')->where('id', $id)->update(['submit' => $serialarray]);


//                while ($i<10) {
//                    $j = $order[0][$i];
//                    session(['start' => $j]);
//                    $i++;
//                    session(['i' => $i]);
//                    DB::table('users')->where('id', $id)->update(['i' => $i]);
//                }
                    return redirect()->route('question');

                Auth::guard('web')->logout();
                return redirect('/');

        }



        }
}
