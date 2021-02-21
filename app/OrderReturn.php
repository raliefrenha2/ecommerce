<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderReturn extends Model
{
    protected $guarded = [];
    protected $appends = ['status_label'];

    public function getStatusLabelAttribute()
	{
	    if ($this->status == 0) {
	        $status = '<span class="badge badge-secondary">Pending</span>';
	    } elseif ($this->status == 1) {
	        $status = '<span class="badge badge-primary">Diterima</span>';
	    } elseif ($this->status == 2) {
	        $status = '<span class="badge badge-info">Ditolak</span>';
	    } 
	    return $status;
	}
}
