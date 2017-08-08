<?php

class Property extends Eloquent {

	use SortableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'properties';
	
	/**
	 * The table fields to be filled or updated.
	 *
	 * @var array
	 */
	 
	protected $fillable = array('user_id', 'order_number', 'title', 'description', 'buddy_description', 'first_name','last_name','company_name','telephone','ad_type','room_size','bed_size','property_type','already_in_property','post_code','i_am_type','email','area','street_name','living_room_type','available_from','minimum_stay_type','maximum_stay_type','short_term','days_available_type','is_references_required','is_bills_included','is_broadband_included','is_smoking','is_gender','is_occupation','is_pets','minimum_age','maximum_age','language_id','is_couples_welcome','misc','rent_amt','rent_amt_type','security_deposit','i_am_we_are','looking_for','is_buddy_ups','country_id','your_interests','is_dss','is_fees_apply','is_furnishings','status','daily_email_alerts','instant_email_alerts');
	
	/**
	 * The validation rules for form fields.
	 *
	 * @var array
	 */
	 
	
	public static function validate($input, $type=null){
		
		$rules = array(
			'title'    => 'required',
			'description'    => 'required',
			'first_name'    => 'required',
			'last_name'    => 'required',
			'post_code'    => 'required',
			'i_am_type'    => 'required',
			'area'    => 'required',
		);
		
		$messages = array(
			'title.required' => 'Title is required.',   
			'description.required' => 'Description is required.',   
			'first_name.required' => 'First name is required.',   
			'last_name.required' => 'Last name is required.',   
			'post_code.required' => 'Postcode is required.',   
			'i_am_type.required' => 'This field is required.',   
			'area.required' => 'This field is required.',   
		);
		 
        return Validator::make($input, $rules, $messages);
	} 
	
	public static function validate_front($input, $type=1,$slug='rooms-to-rent'){
	
		//echo $type; die; 
		
		$rules = array();
		
		if($slug=='rooms-to-rent') {
		
			if($type==1) {
				$rules = array(
					'post_code'    => 'required',
					'i_am_type'    => 'required',
					'email'        => 'required|email'
				);
			}elseif($type==2) {
				$rules = array(
					'area'    => 'required',
				);
			}elseif($type==4) {
				$rules = array(
					'is_gender'    => 'required',
				);
			}elseif($type==5) {
				$rules = array(
					'title'        => 'required|max:50',
					'description'  => 'required|min:25',
					'first_name'   => 'required',
					'last_name'    => 'required',
				);
			}
		} elseif($slug=='whole-property-to-let') {
			
			//echo $type; die; 
			
			if($type==1) {
				$rules = array(
					'rent_amt'      => 'required',
					'rent_amt_type' => 'required',
					'post_code'     => 'required',
					'i_am_type'     => 'required',
					'my_email'      => 'required|email'
				);
			}elseif($type==2) {
				$rules = array(
					'area'    => 'required',
				);
			}elseif($type==3) {
				$rules = array(
					//'is_gender'    => 'required',
				);
			}elseif($type==4) {
				$rules = array(
					'title'        => 'required|max:50',
					'description'  => 'required|min:25',
					'first_name'   => 'required',
					'last_name'    => 'required',
					'company_name' => 'required',
				);
			}
		
		} elseif($slug=='room-wanted') {
		
			//echo '<pre>'; print_r($input); die; 
			
			//echo $type; die; 
			
			if($type==1) {
				$rules = array(
					'i_am_we_are'      => 'required',
					'looking_for' => 'required',
					//'is_buddy_ups'     => 'required', 
				);
			}elseif($type==2) {
				$rules = array(
					'area'    => 'required',
					'rent_amt'      => 'required',
					'rent_amt_type' => 'required',
					'title'        => 'required|max:50',
					'description'  => 'required|min:25',
					'first_name'   => 'required',
					'last_name'    => 'required',
					//'company_name' => 'required',
				);
			} 
		}
		
		//echo '<pre>'; print_r($input); DIE; 
		
		
		$messages = array(
			'post_code.required' 		=> 'Postcode is required.',   
			'i_am_type.required'	 	=> 'This field is required.',   
			'email.required'  		 	=> 'Email is required.',
			'email.email'  		 	 	=> 'Invalid Email.',
			'title.required' 			=> 'Title is required.',   
			'description.required' 		=> 'Description is required.',   
			'first_name.required' 		=> 'First name is required.',   
			'last_name.required' 		=> 'Last name is required.',   
			'area.required' 			=> 'This field is required.',   
			'is_gender.required' 		=> 'Gender is required.', 
			
			'rent_amt.required' 		=> 'This field is required.',   
			'rent_amt_type.required' 	=> 'This field is required.',   
			'company_name.required' 	=> 'Company name is required.',   
			'my_email.required'  		=> 'Email is required.',
			'my_email.email'  		 	=> 'Invalid Email.',
			
			'i_am_we_are.required' 		=> 'This field is required.',  
			'looking_for.required' 		=> 'This field is required.',  
			'is_buddy_ups.required' 	=> 'This field is required.',  
			
		);
		 
        return Validator::make($input, $rules, $messages);
	} 
	
	public static function validate_front_edit($input, $type=1){
	
		//echo $type; die; 
		
		$rules = array();
		
		if($type=='1') {
	 
			$rules = array(
				'post_code'    => 'required',
				'i_am_type'    => 'required',
				'email'        => 'required|email',
				'area'    => 'required',
				'is_gender'    => 'required',
				'title'        => 'required|max:50',
				'description'  => 'required|min:25',
				'first_name'   => 'required',
				'last_name'    => 'required',
			); 
			
		} elseif($type=='2') {
			 
			$rules = array(
				'rent_amt'      => 'required',
				'rent_amt_type' => 'required',
				'post_code'     => 'required',
				'i_am_type'     => 'required',
				'my_email'      => 'required|email',
				'area'          => 'required',
				'title'         => 'required|max:50',
				'description'   => 'required|min:25',
				'first_name'    => 'required',
				'last_name'     => 'required',
				'company_name'  => 'required',
			);
			 
		
		} elseif($type=='3') { 
			 
			$rules = array(
				'i_am_we_are'      => 'required',
				'looking_for' => 'required',
				//'is_buddy_ups'     => 'required', 
				'area'    => 'required',
				'rent_amt'      => 'required',
				'rent_amt_type' => 'required',
				'title'        => 'required|max:50',
				'description'  => 'required|min:25',
				'first_name'   => 'required',
				'last_name'    => 'required',
				//'company_name' => 'required',
			); 
		}
		
		//echo '<pre>'; print_r($input); DIE; 
		
		
		$messages = array(
			'post_code.required' 		=> 'Postcode is required.',   
			'i_am_type.required'	 	=> 'This field is required.',   
			'email.required'  		 	=> 'Email is required.',
			'email.email'  		 	 	=> 'Invalid Email.',
			'title.required' 			=> 'Title is required.',   
			'description.required' 		=> 'Description is required.',   
			'first_name.required' 		=> 'First name is required.',   
			'last_name.required' 		=> 'Last name is required.',   
			'area.required' 			=> 'This field is required.',   
			'is_gender.required' 		=> 'Gender is required.', 
			
			'rent_amt.required' 		=> 'This field is required.',   
			'rent_amt_type.required' 	=> 'This field is required.',   
			'company_name.required' 	=> 'Company name is required.',   
			'my_email.required'  		=> 'Email is required.',
			'my_email.email'  		 	=> 'Invalid Email.',
			
			'i_am_we_are.required' 		=> 'This field is required.',  
			'looking_for.required' 		=> 'This field is required.',  
			'is_buddy_ups.required' 	=> 'This field is required.',  
			
		);
		 
        return Validator::make($input, $rules, $messages);
	} 
	 
	
}