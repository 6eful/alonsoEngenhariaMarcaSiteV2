<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\User\CustomerServiceProvider;

class CustomerController extends Controller {

    public function showCustomer(){
      $customers = CustomerServiceProvider::showall();
      return view('restricted.modules.customers.customers', compact('customers'));
    }

    public function createCustomer(){
      return view('restricted.modules.customers.create');
    }

    public function salvarCustomer(Request $request){
      $customer = $request->all();
      CustomerServiceProvider::AddCustomers($customer);
      return redirect()->route('customer.all');
    }

    public function editCustomer($id){
      $customer = CustomerServiceProvider::getCustomerInformationbyID($id);
      return view('restricted.modules.customers.edit', compact('customer'));
    }

    public function updateCustomer(Request $request, $id){
      $DadosCustomer = $request->all();
      CustomerServiceProvider::UpdateCustomer($DadosCustomer, $id);
      return redirect()->route('customer.all');
    }

    //Não Funciona
    public function editarStatusContract(Request $request, $id){
      $DadosContract = $request->all();
      CustomerServiceProvider::UpdateStatus($request, $id);
      return redirect()->route('contract.all');
    }

    public function removeCustomer($id) {
      CustomerServiceProvider::deleteCustomerbyID($id);
      return back();
    }

    public function dataCustomer($id){
      $DadosCustomer = CustomerServiceProvider::getCustomerInformationbyID($id);
      $Contracts = CustomerServiceProvider::getAllContractsbyCustomer($id);
      return view('restricted.modules.customers.customersdata', compact('DadosCustomer','Contracts'));
    }

}
