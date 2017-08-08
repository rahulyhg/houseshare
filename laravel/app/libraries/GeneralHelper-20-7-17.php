<?php

class GeneralHelper {
	
	public static function getUsersCount($role_id = 2){
		$total = DB::table('users')->where('role_id', $role_id)->count();
		return $total;
	} 
	
	public static function getTemplateCount(){
		$total = DB::table('templates')->count();
		return $total;
	}
	
	public static function getPagesCount(){
		$total = DB::table('pages')->count();
		return $total;
	}
	
	public static function getMyadCount(){
		$total = DB::table('properties')->where('user_id',Auth::id())->count();
		return $total;
	}
	
	public static function getInterestedCount(){
	
		$total =  Property::sortable()->rightjoin('ad_interesteds', 'ad_interesteds.property_id', '=', 'properties.id')->where('ad_interesteds.is_interested',1);;
		$total =  $total->select('properties.*','ad_interesteds.user_id as interesteds_user_id')->where('properties.user_id',Auth::id())->groupBy('properties.id')->orderBy('properties.created_at','desc')->count();
	 
		return $total;
	}
	
	public static function getInterestedCheck($id=null){
		$total = DB::table('ad_interesteds')->where('property_id',$id)->where('is_interested',1)->where('user_id',Auth::id())->count();
		return $total;
	}
	
	public static function getSavedAdCheck($id=null){
		$total = DB::table('ad_saved_ads')->where('property_id',$id)->where('is_interested',1)->where('user_id',Auth::id())->count();
		return $total;
	}
	
	public static function getSavedAdCount(){
		$total = DB::table('ad_saved_ads')->where('is_interested',1)->where('user_id',Auth::id())->count();
		return $total;
	}
	 
	
	public static function getFaqsCount(){
		$total = DB::table('faqs')->count();
		return $total;
	}
	
	public static function getLanguagesCount(){
		$total = DB::table('languages')->count();
		return $total;
	}
	
	public static function getHobbiesCount(){
		$total = DB::table('hobbies')->count();
		return $total;
	}
	
	public static function getAmenitiesCount(){
		$total = DB::table('amenities')->count();
		return $total;
	}
	
	public static function getAmenitiesData(){
		$result = DB::table('amenities')->where('status',1)->orderBy('name','ASC')->get();
		return $result;
	}
	
	
	public static function getAmenitiesRoomData($ids=array()){
		$result = DB::table('amenities')->whereIn('id',$ids)->orderBy('name','ASC')->lists('name');
		return $result;
	}
	
	public static function change_currency_format($val = null){
		return "$".number_format($val, 2);
	}
	
	public static function showUserImg($file=null, $class='', $width='', $height='', $title='', $type='thumb', $maxHeight=""){
		$title  = strtolower($title);
		if($type==''){
			$type = 'thumb';
		}
		$path	= 'upload/users/profile-photo/'.$type.'/'. $file;
		$style = '';
		if($width!=''){
			$style = 'width:'. $width .';';
		}
		
		if($height!=''){
			$style .= 'height:'. $height .';';
		}
		
		if($maxHeight!=''){
			$style .= 'max-height:'. $maxHeight .';';
		}
		
		if($file != '' and file_exists($path)){ 
			return HTML::image($path, '', array('title'=>$title, 'alt'=>$title, 'class'=>$class, 'style'=>$style)); 
		}else{
			return HTML::image('img/no_profile.png', '', array('title'=>$title, 'alt'=>$title, 'class'=>$class, 'style'=>$style)); 
		}
	} 
	
	
	public static function getCountryName($id= null){
		$data = DB::table('countries')->where('countries.id', $id)->first(array('name'));
		$name = $data?$data->name:"";
		return $name;
	}
	
	
	public static function getUserDetail($user_id = null){
		$data  = DB::table('users')->where('id', $user_id)->first();
		return $data;
	}
	
	
	public static function showCardTemplateImg($file=null, $class='', $width='', $height='', $title='', $type='', $max_height = "360px",$divid= null){
	
		$title  = strtolower($title);
		$path	= 'upload/card_templates/'.$type.'/'. $file;
		
		$style = '';
		if($width!=''){
			$style = 'width:'. $width .';';
		}
		
		if($height!=''){
			// $style .= 'height:'. $height .';';
		}
		$style .= 'max-height:'.$max_height;
		
		if($file != '' and file_exists($path)){ 
			return HTML::image($path, '', array('title'=>$title, 'alt'=>$title, 'class'=>$class, 'style'=>$style, 'id'=>$divid)); 
		}else{
			return HTML::image('img/no_profile.png', '', array('title'=>$title, 'alt'=>$title, 'class'=>$class, 'style'=>$style, 'id'=>$divid)); 
		}
	}  
	
	
	public static function showImg($file=null, $class='', $width='', $height='', $title='', $type='', $max_height = "360px",$divid= null){
	
		$title  = strtolower($title);
		$path	= 'upload/'.$type.'/'. $file;
		
		//echo $path; die; 
		
		$style = '';
		if($width!=''){
			$style = 'width:'. $width .';';
		}
		
		if($height!=''){
			// $style .= 'height:'. $height .';';
		}
		$style .= 'max-height:'.$max_height;
		
		if($file != '' and file_exists($path)){ 
			return HTML::image($path, '', array('title'=>$title, 'alt'=>$title, 'class'=>$class, 'style'=>$style, 'id'=>$divid)); 
		}else{
			return HTML::image('img/no_profile.png', '', array('title'=>$title, 'alt'=>$title, 'class'=>$class, 'style'=>$style, 'id'=>$divid)); 
		}
	}  
	
 	public static function getcardidtotemplate_id($card_id){
		$data = DB::table('countries')->where('countries.id', $id)->first(array('name'));
		return $data;
	}
	
 	public static function getcardTemplate($temp_id){
		$data = DB::table('card_templates')->where('card_templates.id', $temp_id)->first(array('tpl_html'));
		return $data;
	} 
	
	public static function geocode($address){
		// url encode the address
		$address = urlencode($address);
		//echo $address; die;
		
		// google map geocode api url
		$url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
	 
		// get the json response
		$resp_json = file_get_contents($url);
		//$resp_json = "1=>'sadada'";
		 
		// decode the json
		$resp = json_decode($resp_json, true);
		$data_arr = array();  
		// response status will be 'OK', if able to geocode given address 
		if($resp['status']=='OK'){
	 
			// get the important data
			$lati = $resp['results'][0]['geometry']['location']['lat'];
			$longi = $resp['results'][0]['geometry']['location']['lng'];
			$formatted_address = $resp['results'][0]['formatted_address'];
			 
			// verify if data is complete
			if($lati && $longi && $formatted_address){
			 
				// put the data in the array
				          
				
				array_push(
					$data_arr, 
						$lati, 
						$longi, 
						$formatted_address
					);
				 
				return $data_arr;
				 
			}else{
				return $data_arr;
			}
			 
		}else{
			return $data_arr;
		}
	}
	
	
 	public static function getProperyRoomByPropertyId($property_id=null){
		$data = DB::table('ad_rooms')->where('property_id', $property_id)->orderBy('id','ASC')->get();
		return $data;
	}
	
	public static function getPagesBannerById($id=null){
		$data = DB::table('page_banners')->where('property_id', $id)->orderBy('id','ASC')->get();
		return $data;
	}
	
	
	
	public static function showBannerImage($file = null, $class = '', $width = '', $height = '', $title = '', $fpath='large', $style="", $no_img="img/no_images.png"){
		
		$title  = strtolower($title);
		$path	= 'upload/'.$fpath.'/'.$file;
		
		//echo $path; die; 
		
		$style = $style;
		if($width!=''){
			$style .= 'width:'. $width .';';
		}
		
		if($height!=''){
			$style .= 'height:'. $height .';';
		}
		
		if($file != '' and file_exists($path)){ 
			return HTML::image($path, $title, array('class'=>$class, 'style'=>$style)); 
		}else{
			return HTML::image($no_img, $title, array('class'=>$class, 'style'=>$style)); 
		}
	}
	
	
	
	
 	public static function getAmenitiesByPropertyId($property_id=null){
		$data = DB::table('ad_amenities')->where('property_id', $property_id)->lists('amenitie_id');
		return $data;
	} 

 	public static function getblogCategory(){
	
		$blog_category = DB::table('subjects')
			->where('subjects.status', 1)
			->select('subjects.*',DB::raw("(SELECT COUNT(id) as count FROM blogs as b where b.subject_id=subjects.id) as blog_category_count"))
			->orderBy('blog_category_count','DESC')
			->get();  
	
		return $blog_category;
	} 
	
	
	public static function showImage($file = null, $class = '', $width = '', $height = '', $title = '', $fpath='large', $style="", $no_img="img/no_images.png"){
		
		$title  = strtolower($title);
		$path	= 'upload/'.$fpath.'/'.$file;
		
		//echo $path; die; 
		
		$style = $style;
		if($width!=''){
			$style .= 'width:'. $width .';';
		}
		
		if($height!=''){
			$style .= 'height:'. $height .';';
		}
		
		if($file != '' and file_exists($path)){ 
			return HTML::image($path, $title, array('class'=>$class, 'style'=>$style)); 
		}else{
			return HTML::image($no_img, $title, array('class'=>$class, 'style'=>$style)); 
		}
	}
	
	
	
	
	public static function showAdImage($file = null, $class = '', $width = '', $height = '', $title = '', $fpath='large', $style="", $no_img="img/no_housesharemarket.jpg"){
		
		$title  = strtolower($title);
		$path	= 'upload/'.$fpath.'/'.$file;
		
		//echo $path; die; 
		
		$style = $style;
		if($width!=''){
			$style .= 'width:'. $width .';';
		}
		
		if($height!=''){
			$style .= 'height:'. $height .';';
		}
		
		if($file != '' and file_exists($path)){ 
			return HTML::image($path, $title, array('class'=>$class, 'style'=>$style)); 
		}else{
			return HTML::image($no_img, $title, array('class'=>$class, 'style'=>$style)); 
		}
	}
	
	
	public static function get_time_formate($datetime, $full = false) {
	
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);

		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;
		 
		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}

		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}
	
	
 	public static function getAdImageByAdId($property_id=null, $is_default=null){
		
		$data = '';
		if($is_default) {
			$data_get = DB::table('ad_images')->where('property_id', $property_id)->where('is_default',1)->first();
			if(!empty($data_get)) {
				$data = $data_get->image;
			}
		} else {
			$data = DB::table('ad_images')->where('property_id', $property_id)->orderBy('id','ASC')->get();
		}  
		
		return $data;
	}
	
	
	public static function get_lat_long($full_address = null) {
		$result = array();
		if($full_address){
			$formattedAddr = str_replace(' ','+',$full_address);
			$geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
			$output = json_decode($geocodeFromAddr);
			if(!empty($output)){
				$result['latitude']  = !empty($output->results[0]->geometry->location->lat)?$output->results[0]->geometry->location->lat:''; 
				$result['longitude'] = !empty($output->results[0]->geometry->location->lng)?$output->results[0]->geometry->location->lng:'';
			} 
		}
		return $result; 
	}
	
	
	public static function messages_count(){ 
	
		$total = DB::table('messages')->where('messages.receiver_id', Auth::id())->where('messages.istrash', 0)->where('messages.read_status', 0)->count();
		return $total;
	}
	
	public static function important_count(){
		$total = DB::table('messages')->where('messages.receiver_id', Auth::id())->where('messages.istrash', 0)->where('messages.is_important', 1)->count();
		return $total;
	} 
	
	public static function getImageExt($file_name=null, $post_id=null, $file_path='posts/') {
	
		$path	= 'upload/'.$file_path.$file_name;
	
		if($file_name != '' and file_exists($path)){ 
	
			$fsize = 20;    
			
			$pdfImg = 'pdf.png';
			$docImg = 'word.png';
			$pptImg = 'power_point.png';
			$txtImg = 'txt2.png';
			$xlsImg = 'excel.png';
			$audioImg = 'audio.png';
			$videoImg = 'video_file.png';
			$htmlImg = 'html.png';
			$pngImg = 'png.png';
			$jpgImg = 'jpg.png';
			$fileImg = 'new.png';
			
			$ftype     = pathinfo($file_name); 
			$extension = isset($ftype['extension'])?$ftype['extension']:'';  
   
			switch ($extension) {
				case 'pdf':
					$img = $pdfImg;
					break;
				case 'doc':
					$img = $docImg;
					break;
				case 'docx':
					$img = $docImg;
					break;
				case 'txt':
					$img = $txtImg;
					break;
				case 'xls':
					$img = $xlsImg;
					break;
				case 'xlsx':
					$img = $xlsImg;
					break;
				case 'xlsm':
					$img = $xlsImg;
					break;
				case 'ppt':
					$img = $pptImg;
					break;
				case 'pptx':
					$img = $pptImg;
					break;
				case 'mp3':
					$img = $audioImg;
					break;
				case 'wmv':
					$img = $videoImg;
					break;
				case 'mp4':
					$img = $videoImg;
					break;
				case 'mpeg':
					$img = $videoImg;
					break;
				case 'html':
					$img = $htmlImg;
					break;
				case 'png':
					$img = $pngImg;
					break;
				case 'jpg':
					$img = $jpgImg;
					break;
				case 'jpeg':
					$img = $jpgImg;
					break;
				default:
					$img = $fileImg;
					break;
			}   
			if($file_path=='posts/'){
				return "<a style='display: contents;' href='".URL::to('/download-file/'.$post_id)."'>".HTML::image('img/'.$img,'', array('title'=>'Download', 'style'=>'width:20px;'))."</a>";
			} else {
				return "<a style='display: contents;' href='".URL::to('/download/'.$post_id)."'>".HTML::image('img/'.$img,'', array('title'=>'Download', 'style'=>'width:20px;'))."</a>";
			}
			
		} 
	}
	
}