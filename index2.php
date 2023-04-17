<?php
include "convert.php";
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prasa</title>
    <!-- Internal CSS -->
    <style type="text/css">
        a:link {color: #000000; text-decoration: none;}
        a:visited {color: #000000; text-decoration: none;}
        a:hover {color: #FF0000; text-decoration: underline;}
    </style>
    <!-- Internal JavaScript -->
    <script type="text/javascript">
        function SelectAll(id){
            document.getElementById(id).focus();
            document.getElementById(id).select();
        }
        function Info(id){
            alert("Prasetyo Ari Wibowo"+'\n'+"NPM : 2113030014"+'\n'+"Kelas : Sistem Informasi 2 - C");
        }
        function InfoCaesar(){
            alert("KEY Default 3")
        }

    </script>
</head>
 <!-- Body -->
<body>
    <center>
    <h2>Encrypt & Decrypt Chesar</h2>
    <h4><a onclick="Info()">Prasetyo Ari Wibowo</a></h4>
    </center>
    <table width="600" align="center">
    <tr><td width="50%" valign="top">
    <fieldset>
    <legend><b>Caesar</b></legend>
    <form action="" method="post">
    <input type="text" name="key_caesar" id="key_caesar" value="3" onclick="SelectAll('key_caesar')" />
    <input type="submit" value="?" onclick="InfoCaesar()" /><br/>
    <textarea rows="4" name="plantext_caesar" id="plantext_caesar" cols="33" onclick="SelectAll('plantext_caesar')" >plan text...</textarea><br/>
    <input type="submit" name="encrypt_caesar" value="Encrypt" />
    <input type="submit" name="decrypt_caesar" value="Decrypt" />
    </form>
    </fieldset>
    </td><td valign="top" colspan="3">
    <fieldset>
    <legend><b>Result</b></legend>
    <?php
    // Logic caesar                                                    //
    //----------------------------------------------------------------//
        if((isset($_POST['key_caesar'])) && (isset($_POST['plantext_caesar'])) && isset($_POST['encrypt_caesar'])){
            $key=$_POST['key_caesar'];
            $plantext=$_POST['plantext_caesar'];
            $split_key=str_split($key);
            $i=0;
            $split_chr=str_split($plantext);
            while ($key>52){
                $key=$key-52;
            }
            foreach($split_chr as $chr){
                if (char_to_dec($chr)!=null){
                    $split_nmbr[$i]=char_to_dec($chr);
                } else {
                    $split_nmbr[$i]=$chr;
                }
                $i++;
            }
            echo '<textarea rows="4" id="result" cols="33" onclick="SelectAll(\'result\')" >';
            foreach($split_nmbr as $nmbr){
                if (($nmbr+$key)>52){
                    if (dec_to_char($nmbr)!=null){
                        echo dec_to_char(($nmbr+$key)-52);
                    } else {
                        echo $nmbr;
                    }
                } else {
                    if (dec_to_char($nmbr)!=null){
                        echo dec_to_char($nmbr+$key);
                    } else {
                        echo $nmbr;
                    }
                }
            }
            echo '</textarea><br/>';
        } else if ((isset($_POST['key_caesar'])) && (isset($_POST['plantext_caesar'])) && isset($_POST['decrypt_caesar'])){
            $key=$_POST['key_caesar'];
            $plantext=$_POST['plantext_caesar'];
            $i=0;
            $split_chr=str_split($plantext);
            while ($key>52){
                $key=$key-52;
            }
            foreach($split_chr as $chr){
                if (char_to_dec($chr)!=null){
                    $split_nmbr[$i]=char_to_dec($chr);
                } else {
                    $split_nmbr[$i]=$chr;
                }
                $i++;
            }
            echo '<textarea rows="4" id="result" cols="33" onclick="SelectAll(\'result\')" >';
            foreach($split_nmbr as $nmbr){
                if (($nmbr-$key)<1){
                    if (dec_to_char($nmbr)!=null){
                        echo dec_to_char(($nmbr-$key)+52);
                    } else {
                        echo $nmbr;
                    }
                } else {
                    if (dec_to_char($nmbr)!=null){
                        echo dec_to_char($nmbr-$key);
                    } else {
                        echo $nmbr;
                    }
                }
            }
            echo '</textarea><br/>';
 
        } else {
            echo "result here...";
        }
    ?>
    </fieldset>
    </td>
    </table>
</body>
</html>