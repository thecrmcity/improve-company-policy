
<?php

require_once'../core/core.php';
$conn = mysqli_connect('localhost','root','','experiment_pslv');
$mod = new Models();
$postid = $_SESSION['post'];
$table = "pslv_post";
$cond = array(
    'pslv_postid' => $postid,
    'pslv_status' => '1',
);
$userP = $mod->getOnerowdata($table,$cond);
$sidemenu = explode(',',$userP['pslv_pagelinks']);
if($sidemenu != "")
{
    foreach($sidemenu as $smenu)
    {   
        echo substr($smenu,'0','-4');
        echo "<br>";
        ?>
        <!-- <li class="<?php echo $page_name == "create-pass" ? 'active' : ''; ?>">
            <a href="<?php echo VIWS;?>create-pass.php">
                <i class="fa fa-flag-checkered"></i> <span>Create Gate Pass</span>
            </a>
        </li> -->
        <?php
    }
}


       
    