<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\City;
use App\Models\FriendRequest;
use App\Models\User;
use Session;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    //

    public function Index(){

        // toastr()->info('Welcome Login page');
        return view('index')->with('success','Welcome To Login Page');
    }

    public function Login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
       $credentials = $request->only('email','password');
        if (Auth::attempt($credentials)) {
            
            return redirect()->intended('view')
                ->withSuccess('Signed in');
        }
        return redirect()->route('index')->withSuccess('Login details are not valid');
    }
    
    

    public function NewRegister(){


        $all_city = City::orderby('id','DESC')->get();
        
        
        return view('register',compact('all_city'));

    }


    public function StoreData(Request $request){

        $user = User::Where('email',$request->email)->first();
        if($user){
            toastr()->error('Email Alrady Exists');
            return redirect()->route('register');
        }

        $store_data = new User ;
        $store_data->name = $request->fname .' '. $request->lname;
        $store_data->email = $request->email;
         // password is form field
        if($store_data->password == $store_data->cpassword){
            $store_data->password = Hash::make($request->password);
        }else{
            toastr()->error('Password is not encrypted');
            return redirect()->route('register');
        }
        $store_data->address = $request->address;
        $store_data->gender = $request->gender;
        $store_data->subject = implode(',',$request->subject);
        $store_data->phone = $request->phone;
        $store_data->city_id = $request->city_id;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move(public_path('upload/add_images'), $filename);
            $store_data['image'] = $filename;
        }
        //dd($store_data);

        $store_data->save();
        toastr()->success('Data Successfully Submited Now You can Login.');
        return redirect()->route('index');

    }


  

    public function ViewData(){

        
        $id = Auth::user()->id;

       

        $del_user_view = FriendRequest::Where('id','!=',$id)->first();
        $city_table = City::all();
        $not_need = User::Where('id','!=',$id)->get();
        $new_registration = User::whereDate('created_at', Carbon::today())->get();
        $adminData= User::find($id);
        $all_admin_data = User::all();
        return view('view',compact('adminData','all_admin_data','new_registration','city_table','id','not_need','del_user_view'));
    }


    public function SendFriendRequest($id){
    
        
        $admin= User::find($id);
         //$friend_request->save();
        return view('send_request',compact('admin'));


    }

    public function StoreData1(Request $request){
       //$request->all();
    $user = FriendRequest::Where('sending_to',$request->id)->first();
       if($user){
           toastr()->error('You Alrady Send A friend Request');
           return redirect()->route('view');
       }
    
        $request_send = new FriendRequest ;
        

        $id = Auth::user()->id;
         
        $request_send->sending_from = $request->user()->id;
         
       
        $request_send->sending_to = $request->id;
          
       //dd($request_send);

       $request_send->save();
        toastr()->success('Friend Request Successfully Submited..');
        return redirect()->route('view');
                

    }

  public function DeleteFriendRequest($id){
      $del_req= FriendRequest::find($id);

    if($del_req->status == 0)
    {
        return $delete_req = FriendRequest::where('status',0)->where('id',$id)->update(['status' => 2]);
    }
    return redirect()->route('view');
  }
    

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect()->route('index')->withSuccess('Logout Done Successfully ');
    }
    
}
