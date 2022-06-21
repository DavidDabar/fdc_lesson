<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //customer home page
    public function register(){
        return view('customer.register');
    }

    //customer create account
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'userName' => 'required',
            'userEmail' => 'required',
            'userAddress' => 'required',
            'userGender' => 'required',
            'userPhone' => 'required',
            'userDateOfBirth' => 'required',
        ],[
            'userName.required' => 'လူကြီးမင်း၏နာမည်ထည့်သွင်းရန်လိုအပ်ပါသည်။',
            'userEmail.required' => 'Need to Field Your Email !',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $this->getCustomerData($request);

        //MVC = Model View Controller
        Customer::create($data);
        return back()->with(['insertSuccess' => 'Customer Information recorded....']);
    }

    //list page
    public function list(){
        $data = Customer::paginate(10); //object
        return view('customer.list')->with(['customer' => $data]);
    }

    //Customer info seemore page
    public function seeMore($id){
        $data = Customer::where('customer_id','=',$id)->get()->toArray(); //array
        return view('customer.seeMore')->with(['customer' => $data]);
    }

    //Customer data delete
    public function delete($id){
        Customer::where('customer_id',$id)->delete();
        return back()->with(['deleteSuccess' => 'Customer data deleted!']);
    }

    //Edit customer data
    public function edit($id){
        $data = Customer::where('customer_id',$id)->first(); //object
        return view('customer.edit')->with(['customer' => $data]);
    }

    //Update customer data
    public function update($id , Request $request){
        $validator = Validator::make($request->all(), [
            'userName' => 'required',
            'userEmail' => 'required',
            'userAddress' => 'required',
            'userGender' => 'required',
            'userPhone' => 'required',
            'userDateOfBirth' => 'required',
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $upDateData = $this->getCustomerData($request);
        $upDateData['id'] =$id;
        Session::put('CUSTOMER_DATA', $upDateData);
        return redirect()->route('customer#confirm');
        // Customer::where('customer_id',$id)->update($updata);
        // return redirect()->Route('customer#list')->with(['updateSuccess' => 'Customer Data Upadated Successfully...']);
    }

    //Confirm Customer Data
    public function confirm(){
        $data = Session::get('CUSTOMER_DATA');
        return view('customer.confirm')->with(['customer' => $data]);
    }

    //RealUpdate Customer Data
    public function realUpdate(){
        $data = Session::get('CUSTOMER_DATA');
        $id = $data['id'];
        unset($data['id']);
        Session::forget('CUSTOMER_DATA');
        Customer::where('customer_id',$id)->update($data);
        return redirect()->route('customer#list')->with(['updateSuccess' => 'Customer Data Updated Successfully...']);
    }

    //customer data request
    private function getCustomerData($request){
        return [
            'name' => $request->userName,
            'email' => $request->userEmail,
            'address' => $request->userAddress,
            'gender' => $request->userGender,
            'phone' => $request->userPhone,
            'date_of_birth' => $request->userDateOfBirth,
        ];
    }
}
