<?php include("includes/header.php"); ?>
<?php 
$is_logged_in = $session->is_signed_in();
if (!$is_logged_in){
    redirect("login.php");
}
?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include("includes/top_nav.php"); ?>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include("includes/side_nav.php"); ?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <?php include("includes/admin_content.php"); ?>
    </div>
    
<?php include("includes/footer.php"); ?>