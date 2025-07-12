</php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">
    <body>

<?php
    include 'database.php';

if(isset($_POST['export'])){

    $form_id = $_POST['form_id'];
    
    $query_view = "SELECT * FROM forms WHERE id = $form_id";
    $result_view = mysqli_query($conn, $query_view);
    $data = mysqli_fetch_assoc($result_view);
    if ($data) {
    $form_table_name = $data['form_table_name'];
    $form_table_attributes = $data['form_table_attributes'];
    $form_name = $data['form_name'];

    $query = "SELECT * FROM $form_table_name";
    $result = mysqli_query($conn, $query);

    // print_r(mysqli_num_rows($result));
    $zip = new ZipArchive;
    $zip->open($form_name.'.zip', ZipArchive::CREATE);
    
    $hndl = opendir('assets/images/photos/'.$form_table_name);
    while($image = readdir($hndl)){
        if($image == "." || $image == "..") continue;
        $zip -> addFile("assets/images/photos/".$form_table_name."/".$image,$image);
    }

    $zip->close();
        
    $file_path = $form_name.".zip";
    $file_dest = 'assets/images/photos/'.$form_name.".zip";
    copy($file_path, $file_dest);
    unlink($form_name.".zip");


    $output= '';
    $form_attributes_query = "SELECT * FROM $form_table_attributes";
    $rs_attributes = mysqli_query($conn, $form_attributes_query);
    // $form_attributes_data = mysqli_fetch_assoc($rs_attributes);
// print_r($form_attributes_data);
    $output .= '<table border="1" id="example"><thead><tr>';

    while($form_attributes_data = mysqli_fetch_assoc($rs_attributes)) {
        // print_r($form_attributes_data);
        if($form_attributes_data['input_type'] != "file"){
            $output .= '
                <th style="width: 200px; height:25px;">'.$form_attributes_data['input_field_name'].'</th>
            ';
            // $output .= '';
            
        }else{
            $output .= '
                <th style="width: 250px; height:25px;">'.$form_attributes_data['input_field_name'].'</th>
                <th style="width: 250px; height:25px;">'.$form_attributes_data['input_field_name'].' path</th>
            ';
        }
    }
        $output .='</tr></thead><tbody>';

        if($data){
            if (mysqli_num_rows($result) > 0) {
                while($data2 = mysqli_fetch_assoc($result)) {
                    $output .= '<tr>';

        $form_attributes_query = "SELECT * FROM $form_table_attributes";
        $rs_attributes = mysqli_query($conn, $form_attributes_query);
        while($form_attributes_data = mysqli_fetch_assoc($rs_attributes)) {
            $val = $form_attributes_data['input_field_name'];
            $val = str_replace(' ','_',$val);
            $val = str_replace("'","",$val);
            if($form_attributes_data['input_type'] == 'file'){
                $output .= '
                    <td>'.$data2[$val].'</td>
                    <td>http://localhost/id-card-generator/admin/assets/images/photos/'.$form_table_name.'/'.$data2[$val].'</td>
                ';
                $output .= '
                    
                ';
                
            }else{
                $output .= '
                    <td>'.$data2[$val].' </td>
                '; 
            // print_r($data2);
            }
        }
        $output .= '</tr>';
    }}}
            $output .= '</tbody></table>';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename='.$form_name.'.xls');
            // header("Content-Transfer-Encoding: BINARY");
            ob_end_flush();
            // echo $output;
            // exit;

    //         header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    // header("Content-Disposition: attachment; filename=items.xls");
    // header("Cache-Control: max-age=0");
    //         ob_end_flush();

    echo $output;
}else{
    ?>
        <script>
            alert('No data found');
            // window.location = "forms.php";
        </script>
    <?php
}   
}
        
?>

    </body>
</html>