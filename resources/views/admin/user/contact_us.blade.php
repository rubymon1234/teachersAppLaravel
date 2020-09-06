@extends('layouts.admin')
@section('title', 'Contact Us')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="clearfix"></div>
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Contact Us </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th class="avatar">Contact Name</th>
                                            <th> Contact Email</th>
                                            <th> Contact Landline </th>
                                            <th>Contact Mobile</th>
                                            <th>Contact Message</th>
                                            <th>Contact Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($contctDetail as $key=>$contact)
                                            <tr>
                                                <td class="serial">{{ ++$key}}</td>
                                                <td> <span class="name">{{ $contact->contact_name }} </span> </td>
                                                <td> <span class="product"> {{ $contact->contact_email }} </span> </td>
                                                <td> {{ $contact->contact_landline }} </td>
                                                <td> {{ $contact->contact_mobile }} </td>
                                                <td> {{ $contact->contact_message }} </td>
                                                <td> {{ $contact->updated_at }} </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6"> No Role in the list... for now! </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection