<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Service;
use App\Schedule;
use App\Booking;
use DateTime;
use DatePeriod;
use DateInterval;
use DB;

class ReservationController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $services = Service::active()->get();
        return view('frontend.reservation', compact('services'));
    }
    
    public function show() {
        return redirect()->route('reservation.index')->with('error_message', trans('user/reservation.invalid_url_message'));
    }
    
    /**
     * get all the services display in calendar
     * @author Dhaval Bharadva
     * @param 
     * @return json
     */
    public function getServices() {
        $services = Service::active()->get()->toArray();
        $outputArray = array();
        if ($services) {
            foreach ($services as $key => $value) {
                $begin = new DateTime($value['start_date']);
                $end = new DateTime($value['end_date']);
                if ($value['service_type'] == 'daily') {

                    $interval = DateInterval::createFromDateString('1 day');
                    $period = new DatePeriod($begin, $interval, $end);

                    foreach ($period as $key => $dt) {
                        $timestamp = strtotime($dt->format("Y-m-d"));
                        $myobj = new \stdClass();
                        $myobj->title = $value['title'];
                        $myobj->start = $dt->format("Y-m-d");
                        
                        $scheduleArray = $this->getScheduleService($value['id'], $timestamp);
                        
                        if (date("Y-m-d") <= $dt->format("Y-m-d") && !empty($scheduleArray['availability'])) {
                            $myobj->color = "#605ca8";
                            $myobj->url = url("/reservation/" . $value['id'] . '/' . $timestamp);
                        } else {
                            $myobj->color = "gray";
                        }
                        array_push($outputArray, $myobj);
                    }
                }
                if ($value['service_type'] == 'weekly') {

                    $schedule = Schedule::where('service_id', $value['id'])->get()->toArray();

                    $weekNumber = array();
                    for ($i = 0; $i < count($schedule); $i++) {
                        $weekNumber[] = $schedule[$i]['week_number'];
                    }

                    $interval = DateInterval::createFromDateString('1 day');
                    $period = new DatePeriod($begin, $interval, $end);

                    foreach ($period as $key => $dt) {
                        $timestamp = strtotime($dt->format("Y-m-d"));
                        if (in_array($dt->format("w"), $weekNumber)) {
                            $myobj = new \stdClass();
                            $myobj->title = $value['title'];
                            $myobj->start = $dt->format("Y-m-d");
                            
                            $scheduleArray = $this->getScheduleService($value['id'], $timestamp);
                            
                            if (date("Y-m-d") <= $dt->format("Y-m-d") && !empty($scheduleArray['availability'])) {
                                $myobj->color = "#f012be";
                                $myobj->url = url("/reservation/" . $value['id'] . '/' . $timestamp);
                            } else {
                                $myobj->color = "gray";
                            }
                            array_push($outputArray, $myobj);
                        }
                    }
                }

                if ($value['service_type'] == 'monthly') {
                    $interval = DateInterval::createFromDateString('1 month');
                    $period = new DatePeriod($begin, $interval, $end);

                    foreach ($period as $key => $dt) {
                        $timestamp = strtotime($dt->format("Y-m-d"));
                        $myobj = new \stdClass();
                        $myobj->title = $value['title'];
                        $myobj->start = $dt->format("Y-m-d");
                        
                        $scheduleArray = $this->getScheduleService($value['id'], $timestamp);
                        
                        if (date("Y-m-d") <= $dt->format("Y-m-d") && !empty($scheduleArray['availability'])) {
                            $myobj->color = "#00a65a";
                            $myobj->url = url("/reservation/" . $value['id'] . '/' . $timestamp);
                        } else {
                            $myobj->color = "gray";
                        }
                        array_push($outputArray, $myobj);
                    }
                }

                if ($value['service_type'] == 'yearly') {
                    $interval = DateInterval::createFromDateString('1 year');
                    $period = new DatePeriod($begin, $interval, $end);

                    foreach ($period as $key => $dt) {
                        $timestamp = strtotime($dt->format("Y-m-d"));
                        $myobj = new \stdClass();
                        $myobj->title = $value['title'];
                        $myobj->start = $dt->format("Y-m-d");
                        
                        $scheduleArray = $this->getScheduleService($value['id'], $timestamp);
                        
                        if (date("Y-m-d") <= $dt->format("Y-m-d") && !empty($scheduleArray['availability'])) {
                            $myobj->color = "orange";
                            $myobj->url = url("/reservation/" . $value['id'] . '/' . $timestamp);
                        } else {
                            $myobj->color = "gray";
                        }
                        array_push($outputArray, $myobj);
                    }
                }
            }
        }
//        echo "<pre>";
//        print_r($outputArray);
//        echo "</pre>";
        echo json_encode($outputArray);
    }
    
    /**
     * display booking form with spots available
     * @author Dhaval Bharadva
     * @param integer $id (service id)
     * @param integer $timestamp (timestamp of select day from calendar)
     * @return display booking form with available spots
     */
    public function getSpots($servicId, $timestamp) {
        $service = Service::find($servicId);
        if(!is_numeric($timestamp) || date("Y-m-d") > date("Y-m-d",$timestamp)){
            return redirect()->route('reservation.index')->with('error_message', trans('user/reservation.invalid_url_message'));
        }
        $scheduleArray = $this->getScheduleService($servicId, $timestamp);
        if($scheduleArray['availability']){
            return view('frontend.booking',compact('scheduleArray','service'));
        }else{
            return redirect()->route('reservation.index')->with('error_message', trans('user/reservation.no_spot_available'));
        }
    }
    
    /**
     * get available spots of given service and given day
     * @author Dhaval Bharadva
     * @param integer $servicId (service id)
     * @param integer $timestamp (timestamp of select day from calendar)
     * @return display booking form with available spots
     */
    public static function getScheduleService($servicId, $timestamp) {
        $bookedArr = array();
        $availabilityArr = array();
        $date = date('Y-m-d',$timestamp);
        
        //get already booked spot
        $booking = Booking::select('bd.start_time','bd.end_time')
                    ->join('bookings_details as bd','bookings.id','=','bd.booking_id')
                    ->where('service_id',$servicId)
                    ->where(DB::raw("date(start_time)"),'=',$date)->get()->toArray();
        
        if($booking){
            foreach ($booking as $key => $value) {
                $bookedArr[] = date("H:i", strtotime($value['start_time']));
            }
        }
        //end code
        
        $service = Service::find($servicId);
        $closeTime = $service->close_booking_before_time != "" ? $service->close_booking_before_time : 30;
        $int = $service->duration;
        
        if ($service->service_type != 'weekly') {
            $n = 0;
            $start_time = explode(':', $service['start_time']);
            $startMinutes = ($start_time[0]*60) + ($start_time[1]) + ($start_time[2]/60);

            $end_time = explode(':', $service['end_time']);
            $endMinutes = ($end_time[0]*60) + ($end_time[1]) + ($end_time[2]/60);

            $st = date("Y-m-d H:i", strtotime($date . " +" . $startMinutes . " minutes"));
            $et = date("Y-m-d H:i", strtotime($date . " +" . $endMinutes . " minutes"));
            
            $a = $st;
            $b = date("Y-m-d H:i", strtotime($a . " +" . $int . " minutes")); //default value for B is start time.

            for ($a = $st; $b <= $et; $b = date("Y-m-d H:i", strtotime($a . " +" . $int . " minutes"))) {
                //echo "a: ".$a." // "."b: ".$b."<br />";

                //$availabilityArr[date("Y-m-d", strtotime($a))][] = date("H:i", strtotime($a));
                if(strtotime($a) > strtotime('+'.$closeTime.' minutes', time())){
                    $availabilityArr[] = date("H:i", strtotime($a));
                }
                $a = $b;
                $n++;
            }
        }
        
        if ($service->service_type == 'weekly') {
            $dayOfWeek = date("w", strtotime($date));
            $schedule = Schedule::where('service_id', $servicId)->where('week_number',$dayOfWeek)->get()->toArray();
            $n = 0;
            for ($i = 0; $i < count($schedule); $i++) {
                $start_time = explode(':', $schedule[$i]['start_time']);
                $startMinutes = ($start_time[0]*60) + ($start_time[1]) + ($start_time[2]/60);
                
                $end_time = explode(':', $schedule[$i]['end_time']);
                $endMinutes = ($end_time[0]*60) + ($end_time[1]) + ($end_time[2]/60);
                
                $st = date("Y-m-d H:i", strtotime($date . " +" . $startMinutes . " minutes"));
                $et = date("Y-m-d H:i", strtotime($date . " +" . $endMinutes . " minutes"));
                
                $a = $st;
                $b = date("Y-m-d H:i", strtotime($a . " +" . $int . " minutes")); //default value for B is start time.

                for ($a = $st; $b <= $et; $b = date("Y-m-d H:i", strtotime($a . " +" . $int . " minutes"))) {
                    //echo "a: ".$a." // "."b: ".$b."<br />";
                    
                    //$availabilityArr[date("Y-m-d", strtotime($a))][] = date("H:i", strtotime($a));
                    if(strtotime($a) > strtotime('+'.$closeTime.' minutes', time())){
                        $availabilityArr[] = date("H:i", strtotime($a));
                    }
                    $a = $b;
                    $n++;
                }
            }
        }
        return array("availability" => $availabilityArr, "booked" => $bookedArr, "duration" => $int,"total_spots" => $n);
    }
}
