<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasklist extends Model {
	protected $table = "tasklist";
    protected $fillable=[
        
      'headline',
      'info',     
    ];

}
