<?php
error_reporting(0);
session_start();

    if($_SESSION['email']==true){

    }else 
    header('location:/login');
    $page='home';
    


    include('include/header.php');

?> 

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>
        <p class="fs-1">Welcome to Main Dashboard.</p>


        <p class="text-sm-start">To add News, simply go to "News Section".</p>
        <p class="text-sm-start">"Categories" is used for adding new categories.</p>

    </main>
  </div>
</div>

<?php

     include('include/footer.php')

?>