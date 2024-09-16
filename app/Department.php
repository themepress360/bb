<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $fillable = [ 'name','status','deleted','prefix'];

	static function getdepartmentmembersValidation($requestData)
    {
   		$validate = array(
      		"status"   => true,
      		"message"  => "",
      		"ref"      => "",
    	);
    	$department = self::where(['id' => (int) $requestData['department_id'],"status" => '1', "deleted" => '0'])->first();
	    if(empty($department))
	    {
	      $validate['status']  = false;
	      $validate['message'] = trans('messages.error_department_id_invalid');
	      $validate['ref']     = "error_department_id_invalid";
	      return $validate;
	    }
	    $validate['department'] = $department;
    	return $validate;
    } 
}
