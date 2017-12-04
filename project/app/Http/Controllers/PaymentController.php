<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use DateTime;
use date;
class PaymentController extends Controller
{
     public function goToPaymentPage(){
        return view('payment');
     }
    public function savePayment(Request $request){
//    $values = array('id' => 1,'name' => 'Dayle');
//    DB::table('users')->insert($values);
      // $date = new DateTime('2000-01-01');      // $name = $request->input('1', 1, 12, 'stud_name', null);
        $card_type = $request->input('card_type');
        $card_nbr = $request->input('card_nbr');
        $card_expiry_date = $request->input('card_expiry_date');
        $card_cvv = $request->input('card_cvv');
        $card_details = $card_type+$card_nbr+$card_expiry_date+$card_cvv;
        $date = new DateTime('now');
        
        // DB::insert('insert into payments values(?)',[$name]);
        //'payment_id' => 2,
        $values = array('user_id' => Auth::user()->id, 'amount'=> '1', 'card_details'=> $card_details, 'payment_date' => $date);
        DB::table('payment_management_system')->insert($values);
        
        return view('payment_confirmation');
        // echo "Payment Transaction Successfully Completed.<br/>";
        // echo '<a href = "/payment">Click Here</a> to go back.';
    }
    /**
     * display a listing of the resource.
     *
     * @return \illuminate\http\response
     */
    public function index()
    {
        //
    }

    public function backup()
    {
        $p = DB::table('payment_management_system')->get();
            //echo json_encode($p);
            foreach ($p as $record){
                //echo json_encode($record);
                DB::table('backup')->insert(get_object_vars($record));
            }

        return redirect()->intended('/paymentList');
    }
    /**
     * show the form for creating a new resource.
     *
     * @return \illuminate\http\response
     */
    public function create()
    {
        
    }
    /**
     * store a newly created resource in storage.
     *
     * @param  \illuminate\http\request  $request
     * @return \illuminate\http\response
     */
    public function store(request $request)
    {
        //
    }
    /**
     * display the specified resource.
     *
     * @param  int  $id
     * @return \illuminate\http\response
     */
    public function show($id)
    {
        //
    }
    /**
     * show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \illuminate\http\response
     */
    public function edit($id)
    {
        //
    }
    /**
     * update the specified resource in storage.
     *
     * @param  \illuminate\http\request  $request
     * @param  int  $id
     * @return \illuminate\http\response
     */
    public function update(request $request, $id)
    {
        //
    }
    /**
     * remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \illuminate\http\response
     */
    public function destroy($id)
    {
        //
    }
}