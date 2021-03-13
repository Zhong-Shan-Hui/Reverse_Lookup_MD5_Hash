<!DOCTYPE html>
<head><title>Zhong Shan Hui MD5 Cracker</title></head>
<body>
<h1>MD5 cracker</h1>
<p>This application takes an MD5 hash
of a four digit pin and check all 10,000 possible four digit pins to determine the pin</p>
<pre>
Debug Output:
<?php
$goodtext = "Not found";
// If there is no parameter, this code is all skipped
if ( isset($_GET['md5']) ) {
    $time_pre = microtime(true);
    $md5 = $_GET['md5'];
    // This is our number
    $txt = "0123456789";
    $show = 15;
    for($i=0; $i<strlen($txt); $i++ ) {
        $ch1 = $txt[$i];   
        for($j=0; $j<strlen($txt); $j++ ) {
            $ch2 = $txt[$j]; 
            for($k=0; $k<strlen($txt); $k++ ) {
                $ch3 = $txt[$k];
                for($l=0; $l<strlen($txt); $l++){
                    $ch4 = $txt[$l];
                    
                    $try = $ch1.$ch2.$ch3.$ch4;
                    // Run the hash and then check to see if we match
                    $check = hash('md5', $try);
                    if ( $check == $md5 ) {
                        $goodtext = $try;
                        break;   // Exit the inner loop
                    }
                    // Debug output until $show hits 0
                    if ( $show > 0 ) {
                        print "$check $try\n";
                        $show = $show - 1;
                    }
                    if($goodtext == $try){
                        break;
                    }
                }
                if($goodtext == $try){
                    break;
                }
            }
            if($goodtext == $try) {
                break;  
            }
        }
        if($goodtext == $try){
            break;
        }
    }
    // Compute ellapsed time
    $time_post = microtime(true);
    print "Ellapsed time: ";
    print $time_post-$time_pre;
    print "\n";
}
?>
</pre>
<!-- Use the very short syntax and call htmlentities() -->
<p>Original Text: <?= htmlentities($goodtext); ?></p>
<form>
<input type="text" name="md5" size="60" />
<input type="submit" value="Crack MD5"/>
</form>
<ul>
<li><a href="index.php">Reset</a></li>
<li><a href="md5.php">MD5 Encoder</a></li>
<li><a href="makecode.php">MD5 Code Maker</a></li>
</ul>
</body>
</html>