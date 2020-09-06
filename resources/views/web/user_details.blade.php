@extends('layouts.master')
@section('title', 'Listing')
@section('content')
<section class="banner-section banner-img" style="background-image: url({{asset('assets/images/bg.jpg')}});">
    <img src="{{ asset('assets/images/bg.jpg') }}">
    <div class="banner-content">
        <p> View only the following search details <br>
        (don’t exhibit communication and contact address)</p>
    </div>
    <div class="page-center">
        <div class="custom-breadcrumb flex">
           {{-- <span class="mr-2">Category : </span>
             <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="white-text" href="#">Teacher</a></li>
                <li class="breadcrumb-item "><a href="">RP</a></li>
                <li class="breadcrumb-item "><a href="">Trainer</a></li>
            </ol> --}}
            </div>  
        </div>
    </section>
    <section class="main-content">
        <div class="page-center">

            <div class="main-wrapper">
                <div class="custom-row">
                    <div class="user-details-wrapper flex">
                      <div class="user-left user-imgV2 user-img" style="background-image: url({{ asset('userImages/'. (json_decode($data->userImages)[0])) }});">
                        <img src="{{ asset('assets/images/'. (json_decode($data->userImages)[0])) }}" alt="user-img">
                    </div>
                    <div class="user-right">
                        <h3>{{ $data->name }}</h3>
                        <div class="details-row flex">
                            <span>Educational Qualification  : <strong>{{ $data->qualification }}</strong></span>
                            <p></p>
                        </div>
                        <div class="details-row flex">
                            <span>Subject  : <strong>{{ $data->subject }}</strong></span>
                            <p></p>
                        </div>
                        <div class="age-wrapper">
                            <span>Age : <strong> {{ $data->age }}</strong></span>
                            <span>Experience  : <strong> {{ $data->working_exp }}</strong></span>
                        </div>
                        <div class="details-row flex">
                            <span>Gender   : <strong>{{ $data->sex }}</strong></span>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-section">
                <div class="user-detail-row">
                    <label>Martials Status  </label>
                    <span>{{ $data->marital_status }}</span>
                </div>
                <div class="user-detail-row">
                    <label>Interested to work in  </label>
                    <span>{{ $data->intrested_to_work }}</span>
                </div>
                <div class="user-detail-row">
                    <label>Expected Salary   </label>
                    <span>{{ $data->expected_salary }}</span>
                </div>
                <div class="user-detail-row">
                    <label>Facitilies Required(Accomodation) </label>
                    <span>{{ $data->other_facilities_accomodation }}</span>
                </div>
                <div class="user-detail-row">
                    <label>Facitilies Required(Spouse Stay) </label>
                    <span>{{ $data->other_facilities_spouce_stay }}</span>
                </div>{{ $data->other_facilities_accomodation }}</span>
            </div>
            <div class="user-detail-row">
                <label>Facitilies Required(Transportation) </label>
                <span>{{ $data->other_facilities_transportation }}</span>
            </div>
            <div class="user-detail-row">
                <label>Check Contact Details </label>
                <span> <a href="{{ route('account.details.info',$viewerId) }}">Contact Immediately</a></span>
            </div>
        </div>
    </div>

</div>
@endsection

