<?php
// Kiểm tra file có  tồn tại không 
    // if (file_exists('kimsa.txt')) {
    //     echo 'file found';
    // } else {
    //     echo 'kimsa.txt does not exist';
    // }
   
    // $text = "Tớ là Sa đây!!" ;
    // fwrite($fh, $text) or die ('Không thể viết vào file');
    $fh = fopen('kimsa.txt','r') or die ('Tạo file thất bại');
    $line = fgets($fh);
    echo $line;
    fclose($fh); 
    // echo "File 'kimsa.txt' written successfully";
?>;
