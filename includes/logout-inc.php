<?php
     // ��ʼ��session.
     session_start();
     /*** ɾ�����е�session����..Ҳ����unset($_SESSION[xxx])���ɾ����****/
     $_SESSION = array();
     /***ɾ��sessin id.����sessionĬ���ǻ���cookie�ģ�����ʹ��setcookieɾ������session id��cookie.***/
     if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-42000, '/');
     }
     // ��󳹵�����session.
     session_destroy();
	 echo "<script>alert('Log Out!');history.go(-1);</script>";		
?>