<?php

namespace App\Http\Controllers;

use App\Models\UserCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;

class PushController extends Controller
{   
    # For Show Code Push Form
    public function index(Request $request) {
        return view('pages.pushform');
    }

    # For Store Code
    public function store(Request $request) {
       
        $request->validate([
            'code_title' => ['required', 'string'],
        ]);

        $code=UserCode::create([
            'user_id'=>Auth::id(),
            'title'=>$request->code_title,
            'code_text'=>$request->code_text,
        ]);

        flash('Code Added Successfully!');

        return back();
    }

    # For View List

    public function viewBasket(Request $request) {

        $codes=UserCode::where('user_id',Auth::id())->paginate(15);

        return view('pages.code_list',compact('codes'));
    }

    # For View Code

    public function viewCode(Request $request,$code) {
    
        $CodeObject=UserCode::where(['user_id'=>Auth::id(),'code_id'=>$code])->first();
        return view('pages.code_view',compact('CodeObject'));

    }

    # For Edit Code

    public function editCode(Request $request,$code) {
        
        $CodeObject=UserCode::where(['user_id'=>Auth::id(),'code_id'=>$code])->first();
       
        return view('pages.code_edit',compact('CodeObject'));

    }

    # For Update Code

    public function updateCode(Request $request) {
        $request->validate([
            'code_title' => ['required', 'string'],
            'code_title' => ['required'],
        ]);

        UserCode::where(['user_id'=>Auth::id(),'code_id'=>$request->code_id])->update([
            'user_id'=>Auth::id(),
            'title'=>$request->code_title,
            'code_text'=>$request->code_text,
        ]);

        flash('Code Updated Successfully!');
        return redirect()->route('ViewToBasket');
    }

    # For Delete Code

    public function deleteCode(Request $request) {
        
        UserCode::where(['user_id'=>Auth::id(),'code_id'=>$request->code_id])->delete();

        return response()->json(['status' => 200, 'message' => "Deleted SuccessFully."]);

    }

    public function searchCode(Request $request) {
        
        if(empty($request->searchkey))
            return back();
    
        $codes = UserCode::where('title', 'like', '%' .$request->searchkey. '%')->paginate(15);

        return view('pages.code_list',compact('codes'));
    
    }
}