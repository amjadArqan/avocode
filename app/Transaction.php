<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use Notifiable;
    protected $table='transactions';
    protected $primaryKey='id';

    protected $fillable = [
        'TransactionStatus'	,'TransationValue','CustomerEmail','InvoiceId','InvoiceReference','InvoiceDisplayValue'	,'CustomerName'	,'CustomerMobile'	,'PaidCurrency',	'TransactionId'	,'Error','PaymentGateway'
        	,'ReferenceId',	'TrackId',	'InvoiceStatus',	'PaymentId'	,'AuthorizationId'
    ];

}
