 	$file = fopen('/Users/yeyuhang/Desktop/test.txt','r+');
        $new_file = fopen('/Users/yeyuhang/Desktop/test_2.txt','r+');
        $count = 0;
        while(!feof($file)){
            $data = fgetc($file);
            if($data == '.'){
                $count++;
            }
            if($data == "\r" || $data == "\n"){
                $data = ' ';
            }
            $data = trim($data,"\r\n");
            fwrite($new_file,$data);
            echo $data;
            if($count == 3){
                fwrite($new_file,"\r\n");
                fwrite($new_file,"    ");
                $count = 0;
            }

        }