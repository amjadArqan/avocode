<?php

namespace App\Http\Controllers;

use App\Exports\LogExport;
use App\Transaction;
use bawes\myfatoorah\MyFatoorah;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class PaymentContoller extends Controller
{
    public function processPayment(Request $request){
####### Initiate Payment ######
$token = "7Fs7eBv21F5xAocdPvvJ-sCqEyNHq4cygJrQUFvFiWEexBUPs4AkeLQxH4pzsUrY3Rays7GVA6SojFCz2DMLXSJVqk8NG-plK-cZJetwWjgwLPub_9tQQohWLgJ0q2invJ5C5Imt2ket_-JAlBYLLcnqp_WmOfZkBEWuURsBVirpNQecvpedgeCx4VaFae4qWDI_uKRV1829KCBEH84u6LYUxh8W_BYqkzXJYt99OlHTXHegd91PLT-tawBwuIly46nwbAs5Nt7HFOozxkyPp8BW9URlQW1fE4R_40BXzEuVkzK3WAOdpR92IkV94K_rDZCPltGSvWXtqJbnCpUB6iUIn1V-Ki15FAwh_nsfSmt_NQZ3rQuvyQ9B3yLCQ1ZO_MGSYDYVO26dyXbElspKxQwuNRot9hi3FIbXylV3iN40-nCPH4YQzKjo5p_fuaKhvRh7H8oFjRXtPtLQQUIDxk-jMbOp7gXIsdz02DrCfQIihT4evZuWA6YShl6g8fnAqCy8qRBf_eLDnA9w-nBh4Bq53b1kdhnExz0CMyUjQ43UO3uhMkBomJTXbmfAAHP8dZZao6W8a34OktNQmPTbOHXrtxf6DS-oKOu3l79uX_ihbL8ELT40VjIW3MJeZ_-auCPOjpE3Ax4dzUkSDLCljitmzMagH2X8jN8-AYLl46KcfkBV";
$basURL = "https://apitest.myfatoorah.com";
$curl = curl_init();
//[{\"ItemName\": \"Product 01\",\"Quantity\": 1,\"UnitPrice\": 33}]
 $InvoiceItems = "[";
 $count = 0;
 $products =json_decode($request->product);
 foreach ($products as $item) {
    $count ++ ;
     $InvoiceItems.= "{\"ItemName\": \"{$item->product[0]->name}\",\"Quantity\": {$item->quantity},\"UnitPrice\": {$item->price}}";
     if($count != count($products)){
        $InvoiceItems.=",";
     };

    }
 $InvoiceItems .="]";
 // dd(json_encode($json),$json,$request->all());
 curl_setopt_array($curl, array(
  CURLOPT_URL => "$basURL/v2/ExecutePayment",
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"PaymentMethodId\":\"2\",\"CustomerName\": \"{$request->CustomerName}\",\"DisplayCurrencyIso\": \"USD\", \"MobileCountryCode\":\"+965\",\"CustomerMobile\": \"{$request->CustomerMobile}\",\"CustomerEmail\": \"{$request->CustomerEmail}\",\"InvoiceValue\": \"{$request->InvoiceValue}\",\"CallBackUrl\": \"http://127.0.0.1:8000/processPaymentGetResponse\",\"ErrorUrl\": \"http://127.0.0.1:8000/processPaymentGetResponse\",\"Language\": \"en\",\"CustomerReference\" :\"ref 1\",\"CustomerCivilId\":12345678,\"UserDefinedField\": \"Custom field\",\"ExpireDate\": \"\",\"CustomerAddress\" :{\"Block\":\"\",\"Street\":\"\",\"HouseBuildingNo\":\"\",\"Address\":\"\",\"AddressInstructions\":\"\"},\"InvoiceItems\": {$InvoiceItems}}",
  CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

 $json  = json_decode((string)$response, true);
 //echo "json  json: $json '<br />'";

$payment_url = $json["Data"]["PaymentURL"];
//dd($payment_url);

    # after getting the payment url call it as a post API and pass card info to it
    # if you saved the card info before you can pass the token for the api
return redirect($payment_url);



    }




     public function GetResponse(Request $request){
        $token = "7Fs7eBv21F5xAocdPvvJ-sCqEyNHq4cygJrQUFvFiWEexBUPs4AkeLQxH4pzsUrY3Rays7GVA6SojFCz2DMLXSJVqk8NG-plK-cZJetwWjgwLPub_9tQQohWLgJ0q2invJ5C5Imt2ket_-JAlBYLLcnqp_WmOfZkBEWuURsBVirpNQecvpedgeCx4VaFae4qWDI_uKRV1829KCBEH84u6LYUxh8W_BYqkzXJYt99OlHTXHegd91PLT-tawBwuIly46nwbAs5Nt7HFOozxkyPp8BW9URlQW1fE4R_40BXzEuVkzK3WAOdpR92IkV94K_rDZCPltGSvWXtqJbnCpUB6iUIn1V-Ki15FAwh_nsfSmt_NQZ3rQuvyQ9B3yLCQ1ZO_MGSYDYVO26dyXbElspKxQwuNRot9hi3FIbXylV3iN40-nCPH4YQzKjo5p_fuaKhvRh7H8oFjRXtPtLQQUIDxk-jMbOp7gXIsdz02DrCfQIihT4evZuWA6YShl6g8fnAqCy8qRBf_eLDnA9w-nBh4Bq53b1kdhnExz0CMyUjQ43UO3uhMkBomJTXbmfAAHP8dZZao6W8a34OktNQmPTbOHXrtxf6DS-oKOu3l79uX_ihbL8ELT40VjIW3MJeZ_-auCPOjpE3Ax4dzUkSDLCljitmzMagH2X8jN8-AYLl46KcfkBV";
        $basURL = "https://apitest.myfatoorah.com";
        $curl = curl_init();


        curl_setopt_array($curl, array(
            CURLOPT_URL => "$basURL/v2/GetPaymentStatus",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"key\":\"{$request->paymentId}\",\"keyType\": \"PaymentId\"}",
            CURLOPT_HTTPHEADER => array("Authorization: Bearer $token","Content-Type: application/json"),
          ));
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

          $response = curl_exec($curl);
          $err = curl_error($curl);
          curl_close($curl);

           $json  = json_decode((string)$response, true);
           $errs = ($json['ValidationErrors']);
           if(!$errs){
          $log = new Transaction();
          $log->PaymentGateway = $json['Data']['InvoiceTransactions'][0]['PaymentGateway'];
          $log->ReferenceId =  $json['Data']['InvoiceTransactions'][0]['ReferenceId'];
          $log->TrackId =  $json['Data']['InvoiceTransactions'][0]['TrackId'];
          $log->InvoiceStatus =  $json['Data']['InvoiceTransactions'][0]['PaymentGateway'];
          $log->PaymentId =  $json['Data']['InvoiceTransactions'][0]['PaymentGateway'];
          $log->AuthorizationId =  $json['Data']['InvoiceTransactions'][0]['AuthorizationId'];
          $log->TransactionStatus =  $json['Data']['InvoiceTransactions'][0]['TransactionStatus'];
          $log->TransationValue =  $json['Data']['InvoiceTransactions'][0]['TransationValue'];
          $log->CustomerName =  $json['Data']['CustomerName'];
          $log->CustomerMobile =  $json['Data']['CustomerMobile'];
          $log->PaidCurrency =  $json['Data']['InvoiceTransactions'][0]['PaidCurrency'];
          $log->TransactionId =  $json['Data']['InvoiceTransactions'][0]['TransactionId'];
          $log->CustomerEmail =  $json['Data']['CustomerEmail'];
          $log->InvoiceReference =  $json['Data']['InvoiceReference'];
          $log->InvoiceDisplayValue =  $json['Data']['InvoiceDisplayValue'];
          $log->InvoiceId =  $json['Data']['InvoiceId'];
          $errs = ($json['ValidationErrors']);
          $log->Error = null;
          $log->save();
          $coustmer = $log->CustomerName;
          /** and delte card when it sucess  */
          return view('orderComplate',compact('coustmer'));
          }
          else{
            $log->Error = null;

          }
          return redirect(route('cart.index'));
     }


     public function log(){
        $log = Transaction::all();

        return view('log',compact('log'));

     }
     public function export()
{
    return Excel::download(new LogExport, 'invoices.xlsx');
}

}
