<?php
Class Trackingmodel extends CI_Model
{
  public function __construct()
  {
      parent::__construct();
  }

        function get_lat_and_long_id($user_id,$selected_date){
			$select="SELECT (@cnt := @cnt + 1) AS DisplayText,user_location AS ADDRESS, CONCAT(user_lat,',',user_long) AS LatitudeLongitude,created_at FROM edu_tracking_details CROSS JOIN (SELECT @cnt := 0) AS dummy WHERE user_id='$user_id' AND DATE_FORMAT(created_at, '%Y-%m-%d')='$selected_date'  ORDER BY created_at ASC";
			$get_result=$this->db->query($select);
			return $get_result->result();
        }

        function testing_track($user_id,$selected_date){
          $select="SELECT etd.user_location AS address,etd.user_lat AS lat ,etd.user_long AS lng FROM edu_users AS eu LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$user_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$selected_date' ORDER BY created_at ASC";
          $get_result=$this->db->query($select);
          $get_res=$get_result->result();
       
        if($get_result->num_rows()==0){
          $address[]= array ("address"  => array("address" => "nofound", "lat" => "nofound", "lng" => "nofound"), "title" => "nofound","status" =>"nofound");
        }else{
			foreach($get_res as $rows){
				$lat=$rows->lat;
				$lng=$rows->lng;
				$loca=$rows->address;
				$address[] = array ("address"  => array("address" => $loca, "lat" => $lat, "lng" => $lng), "title" => "title","status" =>"found");
			}
        }
          return $address;
        }

        function get_lat_and_long_id_table_view($user_id,$selected_date){
			$select="SELECT etd.user_location,eu.name,etd.user_lat,etd.user_long, (@cnt := @cnt + 1) AS rowNumber,etd.created_at,etd.id FROM edu_users AS eu  CROSS JOIN (SELECT @cnt := 0) AS dummy LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$user_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$selected_date' ORDER BY created_at ASC";
			$get_result=$this->db->query($select);
			return $get_result->result();

        }


        function map_inter($user_id,$selected_date){
            $select="SELECT (@cnt := @cnt + 1) AS DisplayText,user_location AS ADDRESS, CONCAT(user_lat,',',user_long) AS LatitudeLongitude,created_at FROM edu_tracking_details
            CROSS JOIN (SELECT @cnt := 0) AS dummy  WHERE user_id='$user_id' AND DATE_FORMAT(created_at, '%Y-%m-%d')='$selected_date'  ORDER BY created_at ASC";
            $get_result=$this->db->query($select);
            return $get_result->result();
        }

        function only_lat_long($user_id,$selected_date){
			$select="SELECT etd.user_location AS address,etd.user_lat AS lat ,etd.user_long AS lng FROM edu_users AS eu LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$user_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$selected_date'  ORDER BY created_at ASC ";
			$get_result=$this->db->query($select);
			return $get_result->result();
        }
		
        function location_map($user_id,$selected_date){
			$select="SELECT etd.user_location AS address,etd.user_lat AS lat ,etd.user_long AS lng FROM edu_users AS eu LEFT JOIN edu_tracking_details AS etd ON eu.user_id=etd.user_id  WHERE eu.user_id='$user_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$selected_date' group by minute(created_at) ORDER BY created_at ASC ";
			$get_result=$this->db->query($select);
			$get_res=$get_result->result();

			if($get_result->num_rows()==0){
				$address[] = array ("Geometry"  => array("Latitude" => "no records", "Longitude" => "no records"));
			}else{
				foreach($get_res as $rows){
					$lat=$rows->lat;
					$lng=$rows->lng;
					$loca=$rows->address;
					$address[] = array ("Geometry"  => array("Latitude" => $lat, "Longitude" => $lng));
             }
        }
          return $address;
        }

        function get_mobilizer_id($user_id){
			$select="SELECT
					*
				FROM
					edu_users AS eu,
					 edu_staff_details AS es
				WHERE
					eu.user_type = '5' AND eu.pia_id = '$user_id' AND eu.user_master_id =es.id";
			$get_result=$this->db->query($select);
			return $get_result->result();
        }

        function calculatekms($user_id,$selected_date){
			  $select="SELECT eu.user_id, SUM(eu.miles) AS miles FROM edu_tracking_details as eu WHERE eu.user_id='$user_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$selected_date'  GROUP BY user_id";
			  $get_result=$this->db->query($select);
			  return $get_result->result();
        }


        function kms_using_lat($user_id,$selected_date){
          $select="SELECT (6371 * ACOS(
                COS( RADIANS(to_lat) )
              * COS( RADIANS( user_lat ) )
              * COS( RADIANS( user_long ) - RADIANS(to_long) )
              + SIN( RADIANS(to_lat) )
              * SIN( RADIANS( user_lat ) )
                ) ) AS distance,SUM((6371 * ACOS(
                COS( RADIANS(to_lat) )
              * COS( RADIANS( user_lat ) )
              * COS( RADIANS( user_long ) - RADIANS(to_long) )
              + SIN( RADIANS(to_lat) )
              * SIN( RADIANS( user_lat ) )
                ) )) AS km FROM edu_tracking_details WHERE user_id='$user_id'  AND DATE_FORMAT(created_at, '%Y-%m-%d')='$selected_date'";
          $get_result=$this->db->query($select);
          return $get_result->result();
        }
		
		
	function tracking_report($user_id,$frmdate,$tdate){	
			$select="SELECT user_id,created_at,sum((6371 * ACOS(
					COS( RADIANS(to_lat) )
				  * COS( RADIANS( user_lat ) )
				  * COS( RADIANS( user_long ) - RADIANS(to_long) )
				  + SIN( RADIANS(to_lat) )
				  * SIN( RADIANS( user_lat ) )
					) )) AS km
					FROM
						edu_tracking_details
					WHERE
						user_id = '$user_id' AND DATE_FORMAT(created_at, '%Y-%m-%d') >= '$frmdate' AND DATE_FORMAT(created_at, '%Y-%m-%d') <= '$tdate' GROUP BY DATE_FORMAT(created_at, '%Y-%m-%d')";
		  $get_result=$this->db->query($select);
		  return $get_result->result();
	}

	 function mob_details($mob_id){
		  $select="SELECT * FROM edu_users WHERE user_id = '$mob_id' ";
		  $get_result=$this->db->query($select);
		  return $get_result->result();
	}


	function start_stop_status($mob_id,$selected_date){
			$select="SELECT
				etd.id,
				etd.user_id,
				etd.tracking_status,
				etd.user_location AS address,
				etd.user_lat AS lat,
				etd.user_long AS lng,
				etd.created_at
			FROM
				edu_users AS eu
			LEFT JOIN edu_tracking_details AS etd
			ON
				eu.user_id = etd.user_id
			WHERE
				eu.user_id = '$mob_id' AND DATE_FORMAT(etd.created_at, '%Y-%m-%d') = '$selected_date' AND (etd.tracking_status = 'Start' OR etd.tracking_status='Stop')
			ORDER BY
				id";
		  $get_result=$this->db->query($select);
		  return $get_result->result();
	}

}
?>
