<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaypalSetting extends Model
{
   
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'paypal_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['client_id_sandbox', 'secret_sandbox', 'client_id_live', 'secret_live', 'mode'];
}
