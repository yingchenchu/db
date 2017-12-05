<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DateTime;
use date;
use Auth;
use App\Payment; //for the Model Payment


class PaymentController extends Controller
{
     // public function __construct(){

     //         $this->load->model('Payment'); //Load the Model here   

     // }

     public function goToPaymentPage(Request $request, $id){


        $chosen_promo = $request->input('promotion_package');
        $chosen_membership = $request->input('membership_plan');
        
        if($chosen_promo!= NULL){
            $whichItemBuying = "Buying promotion package: ";
            return view('payment', ['whichItemBuying' => $whichItemBuying, 'promo_or_membership' => $chosen_promo, 'id' => $id ]); //id of ad
         }
         else if ($chosen_membership!= NULL) {
            $whichItemBuying = "Buying membership plan: ";
            return view('payment', ['whichItemBuying' => $whichItemBuying, 'promo_or_membership' => $chosen_membership, 'id' => $id ]); //id of ad
             
         }
            $whichItemBuying = "Buying item from ad: ";
            $neither_is_an_ad = "";
            return view('payment', ['whichItemBuying' => $whichItemBuying, 'promo_or_membership' => $neither_is_an_ad, 'id' => $id ]); //id of ad

       
     }
     

    public function getAdId($id) {
        return $id;
    }

    //save payment for Ad
    public function savePaymentAd(Request $request, $ad_id){
//    $values = array('id' => 1,'name' => 'Dayle');
//    DB::table('users')->insert($values);
      // $date = new DateTime('2000-01-01');      // $name = $request->input('1', 1, 12, 'stud_name', null);
        $card_type = $request->input('card_type');
        $card_nbr = $request->input('card_nbr');
        $card_expiry_date = $request->input('card_expiry_date');
        $card_cvv = $request->input('card_cvv');
        $card_details = (string)$card_type.(string)$card_nbr.(string)$card_expiry_date.(string)$card_cvv;

        $date = new DateTime('now');
        // $date->format('Y-m-d H:i:s');

        // DB::insert('insert into payments values(?)',[$name]);
        //'payment_id' => 2,

        $logged_user_id = Auth::user()->id; //NEED TO CHANGE TO Auth::user()->username;

        $ad =DB::table('ads')->where('ad_id', $ad_id)->first();
        

        $values = array('ad_id_of_payment' => $ad_id,
                        'membership_id_of_payment' => null,
                        'promotion_id_of_payment' => null,
                        'user_id_of_payment' => $logged_user_id,
                        'amount'=> $ad->price, 
                        'card_details'=> $card_details, 
                        'payment_date' => $date);
        DB::table('payments')->insert($values);

        // $payment_test = new Payment(1, 1,"balahabaalah my card details"); //user id, amount, card details
        // $payment_test->save();

        return view('payment_confirmation',  ['type' => "ad", 'ad_id'=> $ad_id]);
        return view('payment_confirmation',  ['type' => "ad"]);
        // echo "Payment Transaction Successfully Completed.<br/>";
        // echo '<a href = "/payment">Click Here</a> to go back.';
    }

    public function submitRating(Request $request, $ad_id){
        $given_rating = $request->input('rating');
        // $ad_current_rating = DB::table('ads')->where('ad_id', $ad_id)->value('rating');
        DB::table('ads')->where('ad_id', $ad_id)->insert(array('rating' => $given_rating));
        return redirect()->intended('/main');
    }

    public function savePaymentPromoPack(Request $request, $ad_id, $promo_name){
//    $values = array('id' => 1,'name' => 'Dayle');
//    DB::table('users')->insert($values);
      // $date = new DateTime('2000-01-01');      // $name = $request->input('1', 1, 12, 'stud_name', null);
        $card_type = $request->input('card_type');
        $card_nbr = $request->input('card_nbr');
        $card_expiry_date = $request->input('card_expiry_date');
        $card_cvv = $request->input('card_cvv');
        $card_details = (string)$card_type.(string)$card_nbr.(string)$card_expiry_date.(string)$card_cvv;

        $date = new DateTime('now');
        // $date->format('Y-m-d H:i:s');
        $logged_user_id = Auth::user()->id; //NEED TO CHANGE TO Auth::user()->username;

        // DB::insert('insert into payments values(?)',[$name]);
        //'payment_id' => 2,
        if($promo_name=="7 days"){
                $promo_id = 1;
        }
        else if($promo_name=="30 days")
                $promo_id = 2;

        else{
                $promo_id = 3;
        }
        $promo_pack_chosen = DB::table('promotion_packages')->where('promotion_id', $promo_id)->first();




        $values = array('ad_id_of_payment' => $ad_id,
                        'membership_id_of_payment' => null,
                        'promotion_id_of_payment' => $promo_id,
                        'user_id_of_payment' => $logged_user_id,
                        'amount'=> $promo_pack_chosen->price, 
                        'card_details'=> $card_details, 
                        'payment_date' => $date);
        DB::table('payments')->insert($values);

        //Update the ad with the promotion package info
        $promo_pack_bought_nbr_days = DB::table('promotion_packages')->where('promotion_id', 'promo_id')->value('nbr_days');

        $rank_expiring_date = $date->modify("+" . (string)$promo_pack_bought_nbr_days . "7 days");

        DB::table('ads')
            ->where('ad_id', $ad_id)
            ->update(['rank' => $promo_id, 'expire_rank' => $rank_expiring_date]);

        DB::table('payments')->insert($values);

        
        return view('payment_confirmation',   ['type' => "promotion"]);
        // echo "Payment Transaction Successfully Completed.<br/>";
        // echo '<a href = "/payment">Click Here</a> to go back.';
    }

public function savePaymentMembership(Request $request, $user_id, $membership_name){
//    $values = array('id' => 1,'name' => 'Dayle');
//    DB::table('users')->insert($values);
      // $date = new DateTime('2000-01-01');      // $name = $request->input('1', 1, 12, 'stud_name', null);
        $card_type = $request->input('card_type');
        $card_nbr = $request->input('card_nbr');
        $card_expiry_date = $request->input('card_expiry_date');
        $card_cvv = $request->input('card_cvv');
        $card_details = (string)$card_type.(string)$card_nbr.(string)$card_expiry_date.(string)$card_cvv;

        $date = new DateTime('now');
        $logged_user_id = 1; //NEED TO CHANGE TO Auth::user()->username;

        if($membership_name=="normal plan"){
                $membership_id = 1;
        }
        else if($membership_name=="silver plan")
                $membership_id = 2;

        else{
                $membership_id = 3;
        }

        $membership_plan_chosen = DB::table('membership_plans')->where('membership_id', $membership_id)->first();

        $values = array('ad_id_of_payment' => null,
                        'membership_id_of_payment' => $membership_id,
                        'promotion_id_of_payment' => null,
                        'user_id_of_payment' => $logged_user_id,
                        'amount'=> $membership_plan_chosen->price, 
                        'card_details'=> $card_details, 
                        'payment_date' => $date);
        DB::table('payments')->insert($values);

         $membership_duration = DB::table('membership_plans')->where('membership_id', $membership_id)->value('duration');

         $membership_expiring_date = $date->modify("+" . (string)$membership_duration . " 7days");

        //update membership 
         DB::table('users')
             ->where('id', $logged_user_id)
             ->update(['membership_plan_expiry' => $membership_duration]);

        return view('payment_confirmation',   ['type' => "membership"]);
        // echo "Payment Transaction Successfully Completed.<br/>";
        // echo '<a href = "/payment">Click Here</a> to go back.';
    }
    
    public function backup()
    {
        $p = DB::table('payments')->get();
            //echo json_encode($p);
            foreach ($p as $record){
                //echo json_encode($record);
                DB::table('backup')->insert(get_object_vars($record));
            }

        return redirect()->intended('/paymentList');
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
