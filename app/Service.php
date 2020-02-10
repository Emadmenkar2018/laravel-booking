<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'services';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'description', 'price', 'duration', 'max_spot_limit', 'close_booking_before_time','start_date', 'end_date', 'start_time', 'end_time', 'service_type', 'status'];

    public function scopeActive($query) {
        return $query->whereStatus('1');
    }
    
    public function schedule() {
        return $this->hasMany('App\Schedule');
    }
    
    public function booking() {
        return $this->hasMany('App\Booking');
    }
}
