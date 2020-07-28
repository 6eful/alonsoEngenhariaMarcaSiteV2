<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contract extends Model {
  protected $fillable = [
    'CustomerID', 'ContractAddress', 'ContractAmount', 'ContractSign', 'ContractQtPayment', 'ContractFile', 'ContractStatus',
  ];

  public function getContract() {
    $contract = DB::table('contracts')
            ->distinct()
            ->join('payments', 'contracts.id', '=', 'payments.ContractID')
            ->leftJoin('customers', 'contracts.CustomerID', '=', 'customers.id')
            ->select('contracts.*', 'customers.CustomerNome','payments.PaymentDate','payments.PaymentAmount as vPaymentAmount')
            ->groupBy('id')
            ->get();
    return $contract;
  }
}
