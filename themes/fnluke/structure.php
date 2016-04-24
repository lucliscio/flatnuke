<?php

// security options
if (preg_match("/structure.php/",$_SERVER['PHP_SELF'])) {
  die();
}

$req = $_SERVER["REQUEST_URI"];
if(strstr($req,"myforum="))
  die(_NONPUOI);

// check if you're in the forum sections
$mod = getparam("mod", PAR_GET, SAN_FLAT);
if(preg_match("/_Forum/", $mod)) {
  $into_forum = TRUE;
} else {
  $into_forum = FALSE;
}

?>


<!-- THEME STRUCTURE START -->

<!-- NAVIGATION BAR -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php"><span class="fa fa-home"></span></a>
  </div>
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <?php create_menu_horiz(); ?>
    </ul>
    <form class="navbar-form navbar-right" role="search" method="post" action="index.php?mod=none_Search">
      <div class="form-group">
        <input name="find"   type="text"   class="form-control" placeholder="<?php echo _CERCA; ?>">
        <input name="method" type="hidden" value="AND">
        <input name="mod"    type="hidden" value="none_Search">
        <input name="where"  type="hidden" value="allsite">
      </div>
      <button type="submit" class="btn btn-default"><span class="fa fa-search"></span></button>
    </form>
  </div><!-- /.navbar-collapse -->
</nav>

<!-- BODY OF THE PAGE -->
<div class="row; grid-gutter-width: 5px;">

  <!-- LEFT -->
  <?php
    if(!$into_forum) {
  ?>
  <div class="col-lg-3">
    <div id="fnleftcolumn" >
      <div class="list-group">
        <?php create_block_menu(); ?>
      </div>
      <?php
        create_blocks("sx");
      ?>
    </div>
  </div>
  <?php
    }
  ?>

  <!-- CENTER -->
  <?php
    if($into_forum) {
      echo "<div class=\"col-lg-12 fnpage\">";
    } else {
      echo "<div class=\"col-lg-6 fnpage\">";
    }
  ?>
    <div id="fnpage">
      <?php getflopt(); ?>
    </div>
  </div>

  <!-- RIGHT -->
  <?php
    if(!$into_forum) {
  ?>
  <div class="col-lg-3">
    <div id="fnrightcolumn">
      <?php create_blocks("dx"); ?>
    </div>
  </div>
  <?php
    }
  ?>

</div>

<!-- FOOTER -->
<div class="container">
  <div class="row">
    <div class="text-center">
      <div id="fnfooter">
        <small><?php CreateFooterSite(); ?></small>
      </div>
    </div>
  </div>
</div>
