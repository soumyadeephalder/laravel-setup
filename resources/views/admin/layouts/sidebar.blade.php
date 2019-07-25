<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="{{ Request::is('/admin/dashboard')?'active':''}}">
        <a href="<?php echo url('/admin/dashboard');?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
      </li>
     
      <li class="treeview {{ Request::segment(1)=="course"?'active':''}}">
        <a href="#">
        <i class="fa fa-user"></i> <span>Course</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ Request::segment(1)=="course"?'active':''}}">
            <a href="<?php echo url('/admin/course');?>"><i class="fa fa-circle-o"></i> View all</a>
          </li>
        
          <li class="{{ Request::segment(1)=="course/create"?'active':''}}">
            <a href="<?php echo url('/admin/course/create');?>"><i class="fa fa-circle-o"></i> Add</a>
          </li>
        </ul>
      </li>

    </ul>
  </section>
</aside>