<?php
	header('Content-type: application/json; charset=UTF-8');
	$response = array();
	if ($_POST['blog_auther_id']) 
	{
		include '../../inc/connection/connection.php';
        require_once '../../inc/helper/constant.php';
        require_once '../../inc/helper/core_function.php';
        $blog_auther_id = intval($_POST['blog_auther_id']);
        $blog = $db->query("SELECT * FROM phtv_blog_auther WHERE id = '$blog_auther_id'");
        $feblog = $blog->fetch(PDO::FETCH_ASSOC);
		$query = "DELETE FROM phtv_blog_auther WHERE id= :blog_auther_id";
		$stmt = $db->prepare( $query );
		$stmt->execute(array(':blog_auther_id'=>$blog_auther_id));
		if ($stmt) 
		{
            unlink('../../images/blog_auther/'.$feblog['image']);
			$response['success']  = 'success';
			$response['message'] = 'Blog auther deleted successfully';
		} else {
			$response['success']  = 'fail';
			$response['message'] = 'Oops! Something went wrong';
		}
		echo json_encode($response);
	}
?>