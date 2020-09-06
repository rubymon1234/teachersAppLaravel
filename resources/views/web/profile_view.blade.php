@extends('layouts.master')
@section('title', 'Listing')
@section('content')
<section class="banner-section banner-img" style="background-image: url({{asset('assets/images/bg.jpg')}});">
   <img src="{{ asset('assets/images/bg.jpg') }}">
   <div class="banner-content">
      <h2>Profile Views List</h2>
   </div>
</section>
<div class=" inner-page reg-page">
   <section class="main-content">
   <div class="page-center">
      <div class="main-wrapper">
            <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>Qualification</th>
                        <th>View Count</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewers_details as $item)
                            
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->user_role }}</td>
                            <td>{{ $item->qualification }}</td>
                            <td>{{ $item->view_count + 1 }}</td>
                        </tr>

                        @endforeach
                    </tbody>
            </table>
   </div>
</div>
@endsection

