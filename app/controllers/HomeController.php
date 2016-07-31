<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}


	public function register( $username, $password, $name, $role){

		return Response::json("user added", 200);
	}

//completed w.r.t lee123 user
	public function login($username, $password){
		if(($username == "lee123") && ($password=="build456")){
			return Response::json("user logged in", 200);
		}
		else{
			return Response::json("Invalid", 200);
		}
	}

	public function createMustRoll( $mustroll ){
		$roll = json_decode($mustroll);
		$roll = $roll[0];
    // set timezone to user timezone
    date_default_timezone_set('Asia/Kolkata');
		$datetime = new DateTime('now');
    $date = $datetime->format('Y-m-d');
		$dt = new DateTime($roll->main->date);
		$roll->main->date = $dt->format('Y-m-d');
    $time = $datetime->format('H:i:s A');
		$main_id =null;

		$main_id = DB::table('mustroll_main')->insertGetId(
		 array(
		    'date' => $roll->main->date,
		    'created_date' => $date,
		    'created_time' => $time,
		    'site_id' => $roll->main->site_name,
		    'total_expense' => $roll->main->total_expense,
		    'site_incharge' => $roll->main->site_incharge,
		    'reporter' => $roll->main->reporter,
				'cash_office'=> $roll->main->cash_office,
				'cash_needed' => $roll->main->cash_needed,
				'cash_in_hand' => $roll->main->cash_in_hand
		)
	);

					if(isset($main_id) && ( $main_id > 0 )){

						$dataHuman = array();
						foreach ($roll->human as $key => $human) {
							if($human->contractor !=""){
								array_push($dataHuman, array (
									'mustrolls_main_id' => $main_id,
									'number_of_workers' => $human->number_of_workers,
									'total_wage' => $human->total_wage,
									'wageHr' => $human->wageHr,
									'workHr' =>$human->workHr,
									'wage_per_person' => $human->wage_per_person,
									'contractor' => $human->contractor,
									'skill' => $human->skill,
									'language' =>$human->language,
									'number_of_OT'=>$human->ot_number
								));
							}
				    }

				    //DB::table('mustrolls_human')->insert($dataHuman);



/*
						foreach ($humanId as $id) {
							$count = DB::table('mustrolls_human')
							 ->where('id', '=',  $id)
							 ->first();
							 for ($x = 0; $x <= $count->number_of_OT; $x++) {
								 DB::table('human_overtime')->insert([
									 'mustrolls_main_id' => $main_id,
									 'mustrolls_human_id' => $id,
									 'wrkr_id' => $roll->human

								 ]);
							 }
						}*/

						 /*foreach ($roll->rented as $rented) {
							 if($rented->rented_equipment != ""){
								 $insertRented[] = array(
								  'mustrolls_main_id'=> $main_id,
								  'rented_equipment'=> $rented->rented_equipment,
								  'make'=> $rented->make,
								  'model'=> $rented->model,
								  'owner'=> $rented->owner,
								  'condition'=> $rented->condition,
								  'count'=> $rented->count,
								  'rent_per_unit_for_day'=> $rented->rent_per_unit_for_day,
								  'total_rent'=> $rented->total_rent
							  );
						  }
					   }
					   DB::table('mustrolls_rented')->insert($insertRented);

						foreach ($roll->owned as $owned) {
							if($owned->equipment != ""){
								$dataOwned [] = array(
										'mustrolls_main_id'=> $main_id,
										'equipment'=> $owned->equipment,
										'owned_equip_id' =>'0',
										'make'=> $owned->make,
										'model' => $owned->model,
										'count' => $owned->count,
										'condition' => $owned->condition,
									  'maintenance_amount' => $owned->maintenance_amount
                );
              }
						}
						DB::table('mustrolls_owned')->insert($dataOwned);

						foreach ($roll->purchase as $purchase) {
							if($purchase->item != ""){
							$dataPurchase[] = array(
										'mustrolls_main_id'=> $main_id,
										'item'=> $purchase->item,
										'unit'=> $purchase->unit,
										'count'=> $purchase->count,
										'price_per_unit'=> $purchase->price_per_unit ,
										'total_price'=> $purchase->total_price
							);
						 }
						}
						DB::table('mustrolls_purchase')->insert($dataPurchase);

						foreach ($roll->misc as $misc) {
							if($misc->comment != ""){
							$dataMisc[] = array(
									'mustrolls_main_id'=> $main_id,
									'comment'=> $misc->comment,
									'amount'=> $misc->amount
							 );
						 }
					  }
						DB::table('mustrolls_purchase')->insert($dataMisc);
*/

						return Response::json($dataHuman, 200);

					}
					else{
						return Response::json($roll, 200);
					}
	}

	public function deleteMustRoll($id){

		DB::table('mustroll_main')
					->where('id', '=',  $id)
					->delete();
		DB::table('mustrolls_human')
				 ->where('mustrolls_main_id', '=',  $id)
				 ->delete();
		DB::table('mustrolls_owned')
				 ->where('mustrolls_main_id', '=',  $id)
				 ->delete();
  	DB::table('mustrolls_rented')
				 ->where('mustrolls_main_id', '=',  $id)
			   ->delete();
		DB::table('mustrolls_purchase')
				 ->where('mustrolls_main_id', '=',  $id)
				 ->delete();
		DB::table('mustrolls_misc')
				 ->where('mustrolls_main_id', '=',  $id)
				 ->delete();
		return Response::json("must roll deleted", 200);

	}

	public function modifyMustRoll($id){
		return Response::json("must roll modified", 200);
	}

	public function viewMustRoll($id){
		$mustroll = [];
		$mustroll['main'] = DB::table('mustroll_main')
					->where('id', '=',  $id)
					->first();
		$mustroll['human']= DB::table('mustrolls_human')
								->where('mustrolls_main_id', '=',  $id)
								->get();
		$mustroll['owned']= DB::table('mustrolls_owned')
						->where('mustrolls_main_id', '=',  $id)
						->get();
  	$mustroll['rented']= DB::table('mustrolls_rented')
					  ->where('mustrolls_main_id', '=',  $id)
						->get();
		$mustroll['purchase']= DB::table('mustrolls_purchase')
						->where('mustrolls_main_id', '=',  $id)
						->get();
		$mustroll['misc']= DB::table('mustrolls_misc')
						->where('mustrolls_main_id', '=',  $id)
						->get();
			return Response::json($mustroll, 200);

	}

	public function getAllMustRolls(){
		$mustrolls = DB::table('mustroll_main')
					->get();
		return Response::json($mustrolls, 200);
	}

	public function addWorker(){

	}
	public function deleteWorker($id){

	}
	public function getWorkers(){

	}
	public function modifyWorker($id){

	}
	public function addProject( $project ){
		$p = json_decode($project);
		/*DB::table('projects')->insert([
			'name' => $p->name,
			'type_of_work' => $p->type_of_work,
			'start_date' => $p->start_date,
			'end_date' => $p->end_date
		]);*/
		return Response::json($project, 200);

	}
	public function modifyProject($id){

	}
	public function deleteProject($id){

	}
	public function getProjects(){

	}
	public function addSite($site){


	}
	public function modifySite($id){

	}
	public function deleteSite($id){

	}
	public function getSites(){

	}
	public function addOwnedEquip(){

	}
	public function modifyOwnedEquip($id){

	}
	public function deleteOwnedEquip($id){

	}
	public function getAllOwnedEquip(){

	}
	public function getAllPurchase(){

	}
	public function getSiteIncharge(){

	}


}
