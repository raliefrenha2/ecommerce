<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $appends = ['status_label'];

    //MEMBUAT RELASI KE MODEL DISTRICT.PHP
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    //MEMBUAT RELASI KE TABLE ORDER_DETAILS DENGAN JENIS RELASI ONE TO MANY
	public function details()
	{
	    return $this->hasMany(OrderDetail::class);
	}

	public function payment()
	{
	    return $this->hasOne(Payment::class);
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function return()
	{
		return $this->hasOne(OrderReturn::class);
	}

    public function getStatusLabelAttribute()
	{
	    if ($this->status == 0) {
	        return '<span class="badge badge-secondary">Baru</span>';
	    } elseif ($this->status == 1) {
	        return '<span class="badge badge-primary">Dikonfirmasi</span>';
	    } elseif ($this->status == 2) {
	        return '<span class="badge badge-info">Proses</span>';
	    } elseif ($this->status == 3) {
	        return '<span class="badge badge-warning">Dikirim</span>';
	    }
	    return '<span class="badge badge-success">Selesai</span>';
	}
}
