<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserActivation
 *
 * @package App
 * @author Pisyek K
 * @url www.pisyek.com
 * @copyright © 2017 Pisyek Studios
 */
class UserActivation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_activations';

    /**
     * The attributes for mass assignment
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'token'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
