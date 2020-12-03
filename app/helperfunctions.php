<?php function redirect($path)
{
  header('location:'.$path);
}
function redirection($path)
{
 echo '<script> window.location.href="'.$path.'";</script>';
}
function checkAdminLogin()
{
    if(isset($_SESSION['admin']['role']))
  return true;

  return false;
}
function showSuccessMsg($msg)
{
	  $_SESSION['showmsg'] = '<div class="alert alert-success">
                                <div class="bg-green alert-icon">
                                    <i class="glyph-icon"></i>
                                </div>
                                <div class="alert-content">
                                    <h4 class="alert-title">Congrats</h4>
                                   	'.$msg.'</p>
                                </div>
                                </div>';


}
function dump($data)
{
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}