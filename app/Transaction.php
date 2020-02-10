<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transactions';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','trans_id','payment_method','credit','amount','currency','status'];

    public function scopeUserBy($query,$id) {
        return $query->whereUserId($id);
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
