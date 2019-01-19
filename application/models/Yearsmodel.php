<?php
Class Yearsmodel extends CI_Model
{
    public function __construct()
    {
      parent::__construct();
    }

    function getYear()
    {
      $sqlYear ="SELECT * FROM edu_year_duration WHERE NOW() >= from_month AND NOW() <= to_month AND status = 'Active'";
      $year_result = $this->db->query($sqlYear);
      $ress_year   = $year_result->result();
      if ($year_result->num_rows() == 1) {
       foreach ($year_result->result() as $rows) {
         $year_id = $rows->year_id;
         }
          return $year_id;
        }
    }

   function add_years($formatted_date,$formatted_date1,$status,$user_id)
   {

    $date_now = new DateTime($formatted_date1);
    $date2    = new DateTime($formatted_date);
      if ($date_now > $date2) {
          $check_exist="SELECT * FROM edu_year_duration   WHERE '$formatted_date' between period_from AND period_to AND pia_id='$user_id'";
          $result = $this->db->query($check_exist);
                if ($result->num_rows() == 0) {
                  $check_exist_1="SELECT * FROM edu_year_duration   WHERE '$formatted_date1' between period_from AND period_to AND pia_id='$user_id'";
                  $result_1 = $this->db->query($check_exist_1);
                            if ($result_1->num_rows() == 0) {
                              $query     = "INSERT INTO edu_year_duration(period_from,period_to,pia_id,status,created_at,created_by)VALUES('$formatted_date','$formatted_date1','$user_id','$status',NOW(),'$user_id')";
                              $resultset = $this->db->query($query);
                                    if($resultset){
                                      echo "success";
                                    }else{
                                        echo "Something Went Wrong";
                                    }
                            }else{
                                  echo "Date Already Present in Database";
                            }
                }else{
                    echo "Date Already Present in Database";
                }
          }else{
            echo 'Less than';
         }



    }


    function edit_year($year_id)
    {
      $id=base64_decode($year_id)/98765;
     $query1 = "SELECT * FROM  edu_year_duration WHERE id='$id'";
      $res    = $this->db->query($query1);
      return $res->result();
    }

    function update_years($year_id,$formatted_date,$formatted_date1,$status,$user_id)
    {
        $id=base64_decode($year_id)/98765;
      $date_now = new DateTime($formatted_date1);
      $date2    = new DateTime($formatted_date);
        if ($date_now > $date2) {
             $check_exist="SELECT * FROM edu_year_duration   WHERE '$formatted_date' between period_from AND period_to AND pia_id='$user_id' AND id!='$id'";
            $result = $this->db->query($check_exist);
                  if ($result->num_rows() == 0) {
                    $check_exist_1="SELECT * FROM edu_year_duration   WHERE '$formatted_date1' between period_from AND period_to AND pia_id='$user_id' AND id!='$id'";
                    $result_1 = $this->db->query($check_exist_1);
                              if ($result_1->num_rows() == 0) {
                                $query     = "UPDATE edu_year_duration SET period_from='$formatted_date',period_to='$formatted_date1',status='$status',updated_at=NOW(),updated_by='$user_id' WHERE id='$id'";
                                $resultset = $this->db->query($query);
                                      if($resultset){
                                        echo "Updated";
                                      }else{
                                          echo "Something Went Wrong";
                                      }
                              }else{
                                    echo "Date  Present in Database";
                              }
                  }else{
                      echo "Date Already Present in Database";
                  }
            }else{
              echo 'Less than';
           }



    }

    function admisn_year()
    {
      $query  = "SELECT e.*,y.year_id,y.from_month,y.to_month FROM edu_enrollment AS e,edu_year_duration AS y WHERE e.admit_year=y.year_id";
      $result = $this->db->query($query);
      return $result->result();
    }

    //GET ALL Years

    function getall_years($user_id)
    {
      $query  = "SELECT * FROM edu_year_duration WHERE pia_id='$user_id'";
      $result = $this->db->query($query);
      return $result->result();
    }

}
?>
