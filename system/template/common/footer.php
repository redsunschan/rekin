<?php
use rekin\core\rekin;
?>
<footer>
<hr>
<p><a href="index.php"><?php echo rekin::$config->get ( "site_title" ); ?></a> Powered By <b><a href="http://rekin.nets.hk"><?php echo rekin::name." ".rekin::code." ".rekin::version; ?></a></b></p>
<?php echo rekin::copyright; ?>
</footer>
