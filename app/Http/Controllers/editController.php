<?php

namespace App\Http\Controllers;
use App\User;
use Session;

use Illuminate\Http\Request;

class editController extends Controller
{

	public function edit( $id)
    {
         $user = User::find($id);
        return view('Mains.edit', compact('user','id')); 


    }

   public function update(Request $request)
    {

             $id = $request->id;
        $this->validate($request,[
            'name' => ['required', 'string', 'max:20', 'min:2'],
            'email' => ['required','email']
        ]);
        $check_user_email = User::where(['email'=>$request->get('email')])->where(function($query) use($id)
        {
            if(isset($id))
            {
                $query->where('id', '<>', $id);
            }
        })->exists();
        if($check_user_email)
        {
            return redirect()->back()->with('error','Email already exist');
        }
        else
        {
            $user = User::find($id);
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->save();
            return redirect('/')->with('success','Profile Updated!!');
        }
        // // $this->validate($request,[
        // //   'name' =>'required',
        // //   'email' => 'required'
        // // ]);
        
        // $id = $request->id; 
        
        // $user = User::find($id);
        
        // $user->name= $request->get('name');
        // $user->email = $request->get('email');
        
        // $user->save();
        // return redirect('/')->with('success', 'User has been updated!!');

        // if(isset($id)) {
        //   User::where('id', $id)->update(['name' => $request->get('name'),'email' =>$request->get('email')]);          
        // }

        //  return redirect('Mains.edit');
        // Session::flash('success','Your profile has been edited'); 
        

         // $user->update('name','email');
        // return redirect()->route('login')->with('Success', 'Your profile has been edited');
        //return back()->with('success','Item created successfully!');

    }

    public function store(Request $request)
     {//dd('helo');
      $this->validate($request, [
        'name' => 'required | min:4',
        'email' => 'required',
        
        ]);
       
       $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
             'password' => $request->get('password'),
             
            ]);

        $user->save();
        return redirect('/');
        Session::flash('success','The blog post was successfully created'); 
    }

}


