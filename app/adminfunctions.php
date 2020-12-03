<?php
function createAdminUser($conn,$data)
{
	$data['adm_password'] = md5($data['adm_password']);
	$stmtInsert = $conn->prepare("INSERT INTO tbl_admin (`adm_username`,`adm_password`,`adm_role`,`adm_status`)
     VALUES (:adm_username, :adm_password, :adm_role, :adm_status)");
	 	
	$stmtInsert->bindParam(':adm_username', $data['adm_username']);
	$stmtInsert->bindParam(':adm_password',$data['adm_password']);
	$stmtInsert->bindParam(':adm_role', $data['adm_role']);
	$stmtInsert->bindParam(':adm_status', $data['adm_status']);
	if($stmtInsert->execute())
		return true;


	return false;


}
function getAllAdminUsers($conn)
{
	$stmtSelect = $conn->prepare("SELECT * FROM tbl_admin");
	$stmtSelect->execute();
	if($stmtSelect->rowCount()>0)
		return $stmtSelect->fetchAll();

	return false;
}

function updateAdminUser($conn,$data)
{
	$stmtUpdate = $conn->prepare('UPDATE tbl_admin SET adm_username=:adm_username,adm_role=:adm_role, adm_status=:adm_status WHERE adm_id=:adm_id');
	$stmtUpdate->bindParam(':adm_username', $data['adm_username']);
	$stmtUpdate->bindParam(':adm_role', $data['adm_role']);
	$stmtUpdate->bindParam(':adm_status', $data['adm_status']);
    $stmtUpdate->bindParam(':adm_id', $data['adm_id']);
	if($stmtUpdate->execute())
		return true;


	return false;
}

function deleteAdminUser($conn,$username)
{
 $stmtDelete = $conn->prepare("DELETE FROM tbl_admin WHERE adm_username=:adm_username");
 $stmtDelete ->bindparam(':adm_username',$username);
 if($stmtDelete->execute())
 	return true;

 return false;
}