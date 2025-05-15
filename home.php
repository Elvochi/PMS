<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 2): ?>
  <div class="row">
    <div class="col-12 col-sm-6 col-md-4">
      <div class="small-box bg-gradient-primary">
        <div class="inner">
          <h3><?php echo $conn->query("SELECT * FROM department_list ")->num_rows; ?></h3>
          <p>Total Departments</p>
        </div>
        <div class="icon">
          <i class="fas fa-building"></i>
        </div>
        <a href="index.php?page=department" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <div class="small-box bg-gradient-info">
        <div class="inner">
          <h3><?php echo $conn->query("SELECT * FROM designation_list")->num_rows; ?></h3>
          <p>Total Designations</p>
        </div>
        <div class="icon">
          <i class="fas fa-id-card"></i>
        </div>
        <a href="index.php?page=designation" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <div class="small-box bg-gradient-success">
        <div class="inner">
          <h3><?php echo $conn->query("SELECT * FROM users")->num_rows; ?></h3>
          <p>Total Users</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="index.php?page=user_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <div class="small-box bg-gradient-warning">
        <div class="inner">
          <h3><?php echo $conn->query("SELECT * FROM employee_list")->num_rows; ?></h3>
          <p>Total Employees</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-tie"></i>
        </div>
        <a href="index.php?page=employee_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <div class="small-box bg-gradient-danger">
        <div class="inner">
          <h3><?php echo $conn->query("SELECT * FROM evaluator_list")->num_rows; ?></h3>
          <p>Total Evaluators</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-shield"></i>
        </div>
        <a href="index.php?page=evaluator_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-4">
      <div class="small-box bg-gradient-secondary">
        <div class="inner">
          <h3><?php echo $conn->query("SELECT * FROM task_list")->num_rows; ?></h3>
          <p>Total Tasks</p>
        </div>
        <div class="icon">
          <i class="fas fa-tasks"></i>
        </div>
        <a href="index.php?page=task_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>

<?php else: ?>
  <div class="col-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">Welcome</h3>
      </div>
      <div class="card-body">
        <div class="alert alert-info">
          <h5><i class="icon fas fa-user"></i> Hello <?php echo $_SESSION['login_name'] ?>!</h5>
          Welcome to <?php echo $_SESSION['system']['name'] ?>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="info-box bg-gradient-info">
              <span class="info-box-icon"><i class="fas fa-tasks"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Tasks</span>
                <span class="info-box-number"><?php echo $conn->query("SELECT * FROM task_list")->num_rows; ?></span>
                <a href="index.php?page=task_list" class="small-box-footer">View Tasks <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <?php if($_SESSION['login_type'] == 1): ?>
          <div class="col-md-6">
            <div class="info-box bg-gradient-success">
              <span class="info-box-icon"><i class="fas fa-clipboard-check"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Evaluations</span>
                <span class="info-box-number">0</span>
                <a href="index.php?page=evaluation" class="small-box-footer">View Evaluations <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>