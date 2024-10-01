<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <title>Donate Blood</title>
</head>

<body>
  <?php
  $active = 'donate';
  include('head.php'); 
  ?>

  <div id="page-container" style="margin-top:50px; position:relative; min-height:84vh;">
    <div class="container">
      <div id="content-wrap" style="padding-bottom:50px;">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="mt-4 mb-3">Donate Blood</h1>
          </div>
        </div>

        <form name="donor" action="savedata.php" method="post">
          <div class="row">
            <div class="col-lg-4 mb-4">
              <label for="fullname" class="font-italic">Full Name<span style="color:red">*</span></label>
              <input type="text" id="fullname" name="fullname" class="form-control" required>
            </div>

            <div class="col-lg-4 mb-4">
              <label for="mobileno" class="font-italic">Mobile Number<span style="color:red">*</span></label>
              <input type="text" id="mobileno" name="mobileno" class="form-control" required pattern="[0-9]{10}" title="Enter a valid 10-digit mobile number">
            </div>

            <div class="col-lg-4 mb-4">
              <label for="emailid" class="font-italic">Email Id</label>
              <input type="email" id="emailid" name="emailid" class="form-control">
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4 mb-4">
              <label for="age" class="font-italic">Age<span style="color:red">*</span></label>
              <input type="number" id="age" name="age" class="form-control" required min="18" max="65">
            </div>

            <div class="col-lg-4 mb-4">
              <label for="gender" class="font-italic">Gender<span style="color:red">*</span></label>
              <select id="gender" name="gender" class="form-control" required>
                <option value="" disabled selected>Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

            <div class="col-lg-4 mb-4">
              <label for="blood" class="font-italic">Blood Group<span style="color:red">*</span></label>
              <select id="blood" name="blood" class="form-control" required>
                <option value="" disabled selected>Select</option>
                <?php
                include 'conn.php';
                $sql = "SELECT * FROM blood";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . htmlspecialchars($row['blood_id']) . "'>" . htmlspecialchars($row['blood_group']) . "</option>";
                  }
                } else {
                  echo "<option value='' disabled>Error loading blood groups</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4 mb-4">
              <label for="address" class="font-italic">Address<span style="color:red">*</span></label>
              <textarea id="address" name="address" class="form-control" required></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4 mb-4">
              <input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer">
            </div>
          </div>
        </form>
      </div>
    </div>

    <?php include('footer.php'); ?>
  </div>
</body>

</html>
