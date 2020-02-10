<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_chat_messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'message_content', 'message_read', 'message_type'];

    public function user() {
        return $this->belongsTo('App\User');
    }

}
