<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'bookings';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'service_id', 'full_name', 'email', 'phone', 'address', 'amount', 'status'];

    public function scopeActive($query) {
        return $query->whereStatus('1');
    }
    
    public function scopeUserBy($query,$id) {
        return $query->whereUserId($id);
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function service() {
        return $this->belongsTo('App\Service');
    }
    
    public function bookingDetail() {
        return $this->hasMany('App\BookingDetail');
    }

}
