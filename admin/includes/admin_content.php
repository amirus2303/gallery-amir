<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                DASHBOARD
                <small>Subheading</small>
            </h1>
            
            <?php 
            echo '<h4>All users</h4>';
            $users = User::find_all_users();
            foreach ($users as $user) {
                echo $user->last_name.'<br />';
            }
            ?>

            <?php 
            echo '<h4>Specific user</h4>';
            $user = User::find_user_by_id(2);
            echo $user->username;
            ?>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
</div>