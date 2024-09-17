<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CareMeds</title>
    <link rel="stylesheet" href="admin-styles/admin-dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
  </head>
  <body>
    <div class="admin-dashboard-container">
      <div class="side-navbar">
        <div class="div-logo">
        <img src="./admin-images/logo1.png" class="logo-img" alt="">
        </div>
        <div class="admin-user">
          <img src="./admin-images/driver.png" class="admin-user-img" alt="">
          <div class="admin-user-text" >
          <h2>John Doe</h2>
          <p>Admin</p>
          </div>
        </div>

        <ul class="side-nav-ul">
          <li>
            <i class="fa-solid fa-gauge admin-icons"></i>
            <span>Dashboard </span>
            <!-- <i class="fa-solid fa-chevron-right side-arrow" style=" margin-left: 43px"></i> -->
          </li>

          <li class="manufactures-item">
            <i class="fa-solid fa-industry admin-icons"></i>
            <span>Manufactures</span>
            <i class="fa-solid fa-chevron-right side-arrow" style=" margin-left: 18px"></i>
            <ul class="dropdown-ul">
              <li class="dropdown-ul-li-1">Manage Manufactures</li>
              <li class="dropdown-ul-li-2">Add Manufactures</li>
            </ul>
        </li>

          <li><i class="fa-solid fa-clipboard-check admin-icons"></i><span> Manage Orders</span>
        </li>
          <li class="products-item">
            <i class="fa-solid fa-prescription-bottle-medical admin-icons"></i>
            <span>Products</span>
            <i class="fa-solid fa-chevron-right side-arrow" ></i>
            <ul class="dropdown-ul">
              <li class="dropdown-ul-li-1">Manage Products</li>
              <li class="dropdown-ul-li-2">Add products</li>
            </ul>
          </li>
          <li><i class="fa-solid fa-users admin-icons"></i><span>Manage Customers</span></li>
        </ul>
        <ul class="side-nav-ul">
          <li><img src="./admin-images/logout.png "width="30px" class="admin-logout" alt=""><span>Logout</span></li>
        </ul>
    
      </div>
      <div class="content-dashboard">
        <div class="grid-container">
        <div class="grid-item">
          <h2>No of Orders</h2>
          <p>1</p>
      </div>
        <div class="grid-item large-width">
          <h2>No of Products</h2>
           <p>1</p>
        </div>
        <div class="grid-item large-height">
          <h2>No of Customers</h2>
          <p>1</p>
        </div>
        <div class="grid-item">
          <h2>No of Category</h2>
          <p>1</p>
        </div>
        <div class="grid-item">
          <h2>No of Manufactures</h2>
          <p>1</p>
        </div>
        <div class="grid-item">
          <h2>Total net</h2>
          <p><a href="admin-add-products.php">hello</a></p>
        </div>
        </div>
        
      </div>
    </div>

    <script src="admin-dashboard.js"></script>
  </body>
</html>
