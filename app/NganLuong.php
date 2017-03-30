<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NganLuong extends Model
{
    protected $table = 'ngan_luongs';
    protected $fillable = ['name','order_code','payment_type','payment_method','price','information','transaction_status','voucher_percent','voucher_money','customer_id','transaction_info','payment_id','error_text','secure_code','user_id'];
}
