@extends('layouts.admin')
@section('title', 'Event Management')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            @if(session('error_message'))
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('error_message') }}
                </div>
            @endif
            @if(session('success_message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success_message') }}
                </div>
            @endif
            @if(session('warning_message'))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('warning_message') }}
                </div>
            @endif
        </div>
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">@yield('title') :: View Event</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                          <div class="input-group-btn">
                            <a href="{{ route('event.create.event') }}" class="btn btn-block btn-success btn-lg">Create Event</a>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th class="center"> SI_NO </th>
                                <th class="center"> Event StartDate </th>
                                <th class="center"> Event EndDate </th>
                                <th class="center"> Rate </th>
                                <th class="center"> Manage </th>
                            </tr>
                            @forelse($eventDetail as $key=>$event)
                                <tr>
                                    <td>{{ $key + $eventDetail->firstItem()}}</td>
                                    <td><b>{{ $event->event_start_date }}</b></td>
                                    <td><b>{{ $event->event_end_date }}</b></td>
                                    <td>{{ $event->rate }}</td>
                                    <td>
                                        <a href="{{ route('event.edit.event', $event->id) }}" class="btn btn-primary btn-xs">Edit Event</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"> No Event in the list... for now! </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
