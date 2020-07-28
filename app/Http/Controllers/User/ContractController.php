<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\User\CustomerServiceProvider;
use App\Exports\ContractsFromView;
use Maatwebsite\Excel\Facades\Excel;

class ContractController extends Controller {

    public function showContracts() {
      $contracts = CustomerServiceProvider::ShowContractsAll();
      return view('restricted.modules.contracts.contracts', compact('contracts'));
    }

    public function createContract(){
      $CustomersList = CustomerServiceProvider::showallCostumersForm();
      return view('restricted.modules.contracts.create', compact('CustomersList'));
    }

    public function salvarContract(Request $request){
      CustomerServiceProvider::AddContracts($request);
      return redirect()->route('contracts.all');
    }

    public function editContract($id){
      $listPayment = CustomerServiceProvider::getPayment($id);
      $CustomersList = CustomerServiceProvider::showallCostumersForm();
      $contracts = CustomerServiceProvider::getContractInformationbyID($id);
      return view('restricted.modules.contracts.edit', compact('contracts','listPayment', 'CustomersList'));
    }

    public function updateContract(Request $request, $id){
      // $DadosContract = $request->all();
      CustomerServiceProvider::UpdateContract($request, $id);
      return redirect()->route('contracts.all');
    }

    public function removeContract($id){
      CustomerServiceProvider::deleteContractbyID($id);
      return back();
    }

    public function exportContract(){
      return Excel::download(new ContractsFromView, 'contracts.xlsx');
    }

}
