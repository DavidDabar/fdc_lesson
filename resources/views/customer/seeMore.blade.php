@extends('mylayout.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <div class="card">
                <div class="card-header text-center fs-3">
                    Customer Data
                </div>
                <div class="card-body">
                    <div class="px-5 mx-3 my-3">
                        <label for="">ID :</label><label for="">{{ $customer[0]['customer_id'] }}</label>
                    </div>
                    <div class="px-5 mx-3 my-3">
                        <label for="">Name :</label><label for="">{{ $customer[0]['name'] }}</label>
                    </div>
                    <div class="px-5 mx-3 my-3">
                        <label for="">Email :</label><label for="">{{ $customer[0]['email'] }}</label>
                    </div>
                    <div class="px-5 mx-3 my-3">
                        <label for="">Address :</label><label for="">{{ $customer[0]['address'] }}</label>
                    </div>
                    <div class="px-5 mx-3 my-3">
                        <label for="">Gender :</label>
                        <label for="">
                            @if ($customer[0]['gender'] == 1)
                                Male
                            @elseif ($customer[0]['gender'] == 2)
                                Female
                            @elseif ($customer[0]['gender'] == 0)
                                Others
                            @endif
                        </label>
                    </div>
                    <div class="px-5 mx-3 my-3">
                        <label for="">Phone :</label><label for="">{{ $customer[0]['phone'] }}</label>
                    </div>
                    <div class="px-5 mx-3 my-3">
                        <label for="">Date of Birth :</label><label for="">{{ $customer[0]['date_of_birth'] }}</label>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('customer#list') }}"><button class="btn btn-dark btn-sm">Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
