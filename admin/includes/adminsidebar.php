<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
             <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Posts
                <i class="fas fa-angle-left right"></i>
             
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo BASE_URL . 'admin/create_post.php' ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo BASE_URL . 'admin/posts.php' ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Posts</p>
                </a>
              </li>
            </ul>
            
          </li>
            <li class="nav-item">
            <a href="<?php echo BASE_URL . 'admin/users.php' ?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Users
              </p>
            </a>
          </li>
             <li class="nav-item">
            <a href="<?php echo BASE_URL . 'admin/categories.php' ?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo BASE_URL . 'admin/complaints.php' ?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Complaints
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo BASE_URL . 'admin/emails.php' ?>" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Emails
              </p>
            </a>
          </li>
        </ul>
      </nav>