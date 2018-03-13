<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deliveryman;
use App\Customer;
use App\SaleMan;
use Redirect;
use Validator;
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users_form()
    {
        return view('myusers.users_form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users_form_save(Request $r)
    {
         
            $name = $r->input('name');
            $phone= $r->input('phone');
            $email = $r->input('email');
            $address = $r->input('address');
            $type = $r->input('type');

            $data = ['name' => $name,'phone'=> $phone,'email' => $email,'address' => $address];

            $rules = ['name' => 'required' ,'phone' => 'required','email'=> 'required','address' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                if($type == 1)
                {

               
                $user = new SaleMan();
                $user->name = $name;
                $user->phone = $phone;
                $user->email = $email;
                $user->address = $address; 
                $user->status = 0;
             
                $user->save();
            }
             if($type == 2)
                {

               
                $user = new Deliveryman();
               $user->name = $name;
                $user->phone = $phone;
                $user->email = $email;
                $user->address = $address; 
                $user->status = 0;
             
                $user->save();
            }
             if($type == 3)
                {

               
                $user = new Customer();
               $user->name = $name;
                $user->phone = $phone;
                $user->email = $email;
                $user->address = $address; 
                $user->status = 0;
             
                $user->save();
            }

return Redirect::back()->with('success', 'New User successfuly Created');


            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_salesman($id)
    {
        Session::put('user_type',$id);
        if($id == 1)
        {
            $users = SaleMan::orderBy('id','DESC')->get();

            return view('myusers.view_users',compact('users'));


        }
        else if($id == 2)
        {

 $users = Deliveryman::orderBy('id','DESC')->get();

            return view('myusers.view_users',compact('users'));

        }
        else{

 $users = Customer::orderBy('id','DESC')->get();

            return view('myusers.view_users',compact('users'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_user($id)
    {
        $type = Session::get('user_type');

if($type == 1)
{

    $user = SaleMan::findOrFail($id);
      $user->delete();
  return Redirect::back()->with('success', 'New Sales Man successfuly Deleted');
  }
else if($type == 2)
{

          $user = Deliveryman::findOrFail($id);
      $user->delete();
 return Redirect::back()->with('success', 'New Delivery Man successfuly Deleted');
  }
  else if($type == 3)
{

          $user = Customer::findOrFail($id);
      $user->delete();
  return Redirect::back()->with('success', 'New Customer successfuly Deleted');
  }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
