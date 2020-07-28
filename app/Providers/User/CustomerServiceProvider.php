<?php

namespace App\Providers\User;

use Illuminate\Support\ServiceProvider;
use App\Customer;
use App\Contract;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Exception;

class CustomerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    static function showall() {
      $allCustumers = Customer::all();
      return $allCustumers;
    }

    static function ShowContractsAll(){
      $db = new Contract();
      $allContracts = $db->getContract();
      return $allContracts;
    }

    static function showallCostumersForm(){
      $allCostumers = Customer::all('id','CustomerNome');
      return $allCostumers;
    }

    static function AddCustomers($customer){
      $newCustomer = new Customer;
      $newCustomer->CustomerRazaoSocial   = $customer['CustomerRazaoSocial'];
      $newCustomer->CustomerNomeFantasia  = $customer['CustomerNomeFantasia'];
      $newCustomer->CustomerCNPJ          = $customer['CustomerCNPJ'];
      $newCustomer->CustomerAddress       = $customer['CustomerCNPJ'];
      $newCustomer->CustomerEmail         = $customer['CustomerEmail'];
      $newCustomer->CustomerTelefone      = $customer['CustomerTelefone'];
      $newCustomer->CustomerNome          = $customer['CustomerNome'];
      $newCustomer->CustomerCPF           = $customer['CustomerCPF'];
      $newCustomer->CustomerCelular       = $customer['CustomerCelular'];
      $newCustomer->save();
    }

    static function AddContracts(Request $request){
      $DetailsContract = $request->all();
      $newContract = [
      'CustomerID'        => $DetailsContract['CustomerID'],
      'ContractAddress'   => $DetailsContract['ContractAddress'],
      'ContractAmount'    => $DetailsContract['ContractAmount'],
      'ContractSign'      => $DetailsContract['ContractSign'],
      'ContractQtPayment' => $DetailsContract['ContractQtPayment'],
      'ContractStatus'    => $DetailsContract['ContractStatus'],
      ];

      if($request->hasfile('ContractFile')) {
        $doc = $request->file('ContractFile');
        $num = rand(1111,9999);
        $dir = "doc/upload";
        $ex = $doc->guessClientExtension();
        $nomeDoc = "doc".$num.".".$ex;
        $doc->move($dir,$nomeDoc);
        $newContract['ContractFile'] = $dir."/".$nomeDoc;
      }

      try {
        $acordo = Contract::create($newContract);
        $contractID_temp = $acordo->id;
        foreach ($DetailsContract as $key => $value) {
          $reg = 0;
          $cont = 0;
          for($i=0; $i < sizeof($DetailsContract); $i++){
            if($key == "Payment".$cont){
              $parcela[$reg]['ContractID'] = $contractID_temp;
              $parcela[$reg]['PaymentAmount'] = $value;
            }
            if($key == "DataPayment".$cont) {
              $parcela[$reg]['PaymentDate'] = $value;
              $enviar = Payment::create($parcela[$reg]);
            }

            $cont++;
            $reg++;
          }
        }
      } catch(Exception $e){
        return $e->getMessage();
      }

    }

    static function getCustomerInformationbyID($id){
      $DadosCustomers = Customer::find($id);
      return $DadosCustomers;
    }

    static function getContractInformationbyID($id){
      $DadosContracts = Contract::find($id);
      return $DadosContracts;
    }

    static function getAllContractsbyCustomer($id){
      $Contracts = Contract::where('CustomerID',$id)->get();
      return json_decode($Contracts, true);
    }

    static function UpdateCustomer($customer, $id){
      $newCustomer = [
        'CustomerRazaoSocial'   => $customer['CustomerRazaoSocial'],
        'CustomerNomeFantasia'  => $customer['CustomerNomeFantasia'],
        'CustomerCNPJ'          => $customer['CustomerCNPJ'],
        'CustomerAddress'       => $customer['CustomerCNPJ'],
        'CustomerEmail'         => $customer['CustomerEmail'],
        'CustomerTelefone'      => $customer['CustomerTelefone'],
        'CustomerNome'          => $customer['CustomerNome'],
        'CustomerCPF'           => $customer['CustomerCPF'],
        'CustomerCelular'       => $customer['CustomerCelular'],
      ];

      Customer::find($id)->update($newCustomer);
    }

    static function UpdateContract(Request $request, $id){
      $DetailsContract = $request->all();
      $UpdateContract = [
        'CustomerID'        => $DetailsContract['CustomerID'],
        'ContractAddress'   => $DetailsContract['ContractAddress'],
        'ContractAmount'    => $DetailsContract['ContractAmount'],
        'ContractSign'      => $DetailsContract['ContractSign'],
        'ContractQtPayment' => $DetailsContract['ContractQtPayment'],
        'ContractStatus'    => $DetailsContract['ContractStatus'],
      ];

      if($request->hasfile('ContractFile')) {
        $doc = $request->file('ContractFile');
        $num = rand(1111,9999);
        $dir = "doc/upload";
        $ex = $doc->guessClientExtension();
        $nomeDoc = "doc".$num.".".$ex;
        $doc->move($dir,$nomeDoc);
        $UpdateContract['ContractFile'] = $dir."/".$nomeDoc;
      }

      try {
        Contract::find($id)->update($UpdateContract);
        $contractID_temp = $id;
        $del = Payment::where('ContractID', $id)->delete();

        foreach ($DetailsContract as $key => $value) {
          $reg = 0;
          $cont = 0;
          for($i=0; $i < sizeof($DetailsContract); $i++){
            if($key == "PaymentAmount".$cont){
              $parcela[$reg]['ContractID'] = $contractID_temp;
              $parcela[$reg]['PaymentAmount'] = $value;
            }
            if($key == "DataPayment".$cont) {
              $parcela[$reg]['PaymentDate'] = $value;
              $enviar = Payment::create($parcela[$reg]);
            }

            $cont++;
            $reg++;
          }
        }
      } catch(Exception $e){
        return $e->getMessage();
      }

    }

    static function UpdateStatus(Request $request, $id){
      $status = $request->ContractStatus;
      //var_dump($status);
      // $update = Contract::
    }

    static function getPayment($id){
      $payments = Payment::where('ContractID',$id)->get();
      return json_decode($payments, true);
    }

    static function deleteCustomerbyID($id){
      $customer = Customer::find($id)->delete();
      $contract = Contract::where('CustomerID', $id)->delete();
    }

    static function deleteContractbyID($id){
      $contract = Contract::find($id)->delete();
      $DeletePayment = Payment::where('ContractID',$id)->delete();
    }


}
