<?php
include('../../inc/connection/connection.php');
$reoutput = array();
$query = "SELECT * FROM phtv_product_order";
$statement = $db->query($query);
$result = $statement->fetchAll();
$data = array();
$i = 1;
foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $i;
    $sub_array[] = $row["invoice_no"];
    $sub_array[] = $row["full_name"];
    $sub_array[] = $row["email"];
    // $sub_array[] = $row["mobile"];
    // $sub_array[] = $row["address"];
    $sub_array[] = $row["payment_type"];
    $sub_array[] = $row["total_amount"];
    // $sub_array[] = $row["total_used_coin"];
    $sub_array[] = $row["final_amount"];
    $aa = '<select name="order_status" class="form-control order_status" id="'.$row['id'].'">';
    if($row['status'] == 0){
        $aa .= '<option selected value="0">Panding</option><option value="1">Confirm</option><option value="2">Shipped</option><option value="6">Out For Delivery</option><option value="3">Delivered</option><option value="4">Completed</option><option value="5">Cancel</option>';
    } elseif ($row['status'] == 1) {
        $aa .= '<option selected value="1">Confirm</option><option value="2">Shipped</option><option value="6">Out For Delivery</option><option value="3">Delivered</option><option value="4">Completed</option><option value="5">Cancel</option>';
    } elseif ($row['status'] == 2) {
        $aa .= '<option selected value="2">Shipped</option><option value="6">Out For Delivery</option><option value="3">Delivered</option><option value="4">Completed</option>';
    } elseif ($row['status'] == 3) {
        $aa .= '<option selected value="3">Delivered</option><option value="4">Completed</option>';
    } elseif ($row['status'] == 5) {
        $aa .= '<option selected value="5">Cancel</option>';
    } elseif ($row['status'] == 6) {
        $aa .= '<option selected value="6">Out For Delivery</option><option value="3">Delivered</option><option value="4">Completed</option>';
    } else {
        $aa .= '<option selected value="4">Completed</option>';
    }
    $aa .= '</select>';
    $sub_array[] = $aa;
    $eqURLID = base64_encode($row['id']);
    $sub_array[] = '<div style="display: flex;"><a href="order-invoice?id='.$eqURLID.'" style="padding: 10px;" class="text-white btn btn-success fa fa-file view_order_details" type="button" id="'.$row['id'].'"></a>&nbsp;<a href="order-details?id='.$eqURLID.'" style="padding: 10px;" class="text-white btn btn-info fa fa-eye" type="button" id="'.$row['id'].'"></a></div>';
    $data[] = $sub_array;
    $i++;
}
$reoutput = array(
"data" => $data
);
echo json_encode($reoutput);