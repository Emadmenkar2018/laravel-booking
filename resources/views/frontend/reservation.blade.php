@extends('frontend.layouts.main')
{{-- Web site Title --}}
@section('title')
@parent :: {!! trans('user/reservation.calendar') !!}
@stop

@section('styles')
<style>
    .fc-day:hover{background:lightblue;cursor: pointer;}
    .fc-day-grid-event{padding: 5px;font-size: 15px;}
    .fc-day-grid-event{border-radius: 0px;padding: 5px;font-size: 15px;}
    .fc-day-grid-event:hover{border-radius: 10px}
    
    @media only screen and (max-width:480px){
        .fc-day-grid-event{padding: 0px;font-size: 10px;}
    }
    @media only screen and (min-width:480px) and (max-width:767px){
        .fc-day-grid-event{padding: 0px;font-size: 11px;}
    }
</style>
@stop
@section('content')
<!-- Dashboard Wrapper Start -->
<div class="dashboard-wrapper">

    <!-- Row Start -->
    <div class="row">
        <div class="col-lg-9 col-md-9">
            <div id="loading-overlay">
                <div class="loading-icon"></div>
            </div>
            <div class="widget">
                <div class="widget-header">
                    <div class="title">
                        {!! trans('user/reservation.calendar') !!}
                    </div>
                    <span class="tools">
                        <i class="fa fa-cogs"></i>
                    </span>
                </div>
                <div class="widget-body">
                    @include('admin.includes.notifications')
                    <div id='calendar'></div>
                </div>
            </div>{{-- widget-body End --}}
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="widget">
                <div class="widget-header">
                    <div class="title">{!! trans('user/reservation.available_services') !!}</div>
                    <span class="tools"><i class="fa fa-bars"></i></span>
                </div>
                <div class="widget-body">
                    <ul class="list-group">
                        @if(!$services->isEmpty())
                            @foreach($services as $key => $service)
                            <li class="list-group-item">{!! $service->title !!}</li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>{{-- widget-body End --}}
        </div>{{-- col-lg-4 col-md-4 End --}}
    </div>{{-- Row End --}}
</div>{{-- Dashboard Wrapper End --}}
@stop
@section('scripts')
<script>
    $(document).ready(function () {
        var mydate = new Date();
        var d = mydate.getDate();
        var m = mydate.getMonth() + 1;
        var y = mydate.getFullYear();
        var currDate = y + '-' + (m <= 9 ? '0' + m : m) + '-' + (d <= 9 ? '0' + d : d);

        var calendar = $('#calendar').fullCalendar({
            locale: "{!! config('app.locale') !!}",
            header: {
                left: 'prev,next today',
                center: 'title',
                //right: 'month,agendaWeek,agendaDay'
                right: ''
            },
            select: function (start, end) {
                if (start.isBefore(moment())) {
                    $('#calendar').fullCalendar('unselect');
                    return false;
                }
            },
            defaultView: 'month',
            dayRender: function (moment, cell) {
                var tomorrow = moment.add(2, 'day');
                var day = moment.add(-1, 'day').date();
                var today = new Date();
                if (tomorrow < today) {
                    cell.css("background-color", "#e6e6e6");
                }
            },
            eventLimit: true, // allow "more" link when too many events
            events: function (start, end, timezone, callback) {
                $.ajax({
                    url: '/getServices',
                    dataType: 'json',
                    cache: false,
                    data: {
                        // our hypothetical feed requires UNIX timestamps
                        //start: start.unix(),
                        //end: end.unix()
                    },
                    success: function (events) {
                        callback(events);
                    }
                });
            },
            loading: function (bool) {
                $("#loading-overlay").toggle(bool);
            }
        });
    });
</script>
@stop