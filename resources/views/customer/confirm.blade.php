@extends('mylayout.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <div class="card">
                <div class="card-header text-center fs-3">
                    Confirm Customer Data
                </div>
                <div class="card-body">
                    <div class="px-5 mx-3 my-3">
                        <label for="">Name :</label><label for="">{{ $customer['name'] }}</label>
                    </div>
                    <div class="px-5 mx-3 my-3">
                        <label for="">Email :</label><label for="">{{ $customer['email'] }}</label>
                    </div>
                    <div class="px-5 mx-3 my-3">
                        <label for="">Address :</label><label for="">{{ $customer['address'] }}</label>
                    </div>
                    <div class="px-5 mx-3 my-3">
                        <label for="">Gender :</label>
                        <label for="">
                            @if ($customer['gender'] == 1)
                                Male
                            @elseif ($customer['gender'] == 2)
                                Female
                            @elseif ($customer['gender'] == 0)
                                Others
                            @endif
                        </label>
                    </div>
                    <div class="px-5 mx-3 my-3">
                        <label for="">Phone :</label><label for="">{{ $customer['phone'] }}</label>
                    </div>
                    <div class="px-5 mx-3 my-3">
                        <label for="">Date of Birth :</label><label for="">{{ $customer['date_of_birth'] }}</label>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-end">
                        <a href="{{ route('customer#realUpdate') }}"><button class="btn btn-dark btn-sm">Save</button></a>
                    </div>
                    <div class="float-start">
                        <a href="{{ route('customer#edit', $customer['id']) }}"><button
                                class="btn btn-danger btn-sm">Cancel</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
