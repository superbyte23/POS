
    <div class="header py-4">
      <div class="container-fluid">
        <div class="d-flex">
          <a class="header-brand" href="./index.php">
            <img src="./demo/brand/POS_brand.png" class="header-brand-img" alt="POS logo">
          </a>
          <div class="d-flex order-lg-2 ml-auto">
            <div class="dropdown">
              <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                <span class="avatar" style="background-image: url(./demo/administrator.png)"></span>
                <span class="ml-2 d-none d-lg-block">
                  <span class="text-default">POS System</span>
                  <small class="text-muted d-block mt-1">Administrator</small>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <a class="dropdown-item" href="#">
                  <i class="dropdown-icon fe fe-log-out"></i> Sign out
                </a>
              </div>
            </div>
          </div>
          <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
            <span class="header-toggler-icon"></span>
          </a>
        </div>
      </div>
    </div>
    <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
      <div class="container-fluid">
        <div class="row align-items-center">
          <!-- <div class="col-lg-3 ml-auto">
            <form class="input-icon my-3 my-lg-0">
              <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
              <div class="input-icon-addon">
                <i class="fe fe-search"></i>
              </div>
            </form>
          </div> -->
          <div class="col-lg order-lg-first">
            <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
              <li class="nav-item">
                <a href="./index.php" class="nav-link text-dark"><img src="./demo/menu/calculator.png" class="menu-icon"> <strong>Point Of Sale</strong></a>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link text-dark" data-toggle="dropdown"><img src="./demo/menu/box.png" class="menu-icon"> <strong>Stock Master</strong></a>
                <div class="dropdown-menu dropdown-menu-arrow">
                  <a href="./Categories.php" class="dropdown-item ">Categories</a>
                  <a href="./products.php" class="dropdown-item ">Products</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a href="javascript:void(0)" class="nav-link text-dark" data-toggle="dropdown"><img src="./demo/menu/barcode.png" class="menu-icon"> <strong>Inventory</strong></a>
                <div class="dropdown-menu dropdown-menu-arrow">
                  <a href="./maps.php" class="dropdown-item ">Stock-In</a>
                  <a href="./icons.php" class="dropdown-item ">Stock-out</a>
                </div>
              </li>
              <li class="nav-item">
                <a href="./index.php" class="nav-link text-dark"><img src="./demo/menu/note.png" class="menu-icon"> <strong>Reports</strong></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
