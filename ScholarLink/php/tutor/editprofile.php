<?php

session_start();

// $tutor_name = "Md. Rifat Hosen";
// $tutor_email = "rifatdv98@gmail.com";
// $tutor_id = "418280";
// $tutor_since = "Jul 17, 2025";
// $total_cv_view = 3;

// $name = "Md. Samir Ansari";
// $contact = "01303044423";
// $email = "ansari.sam2018@gmail.com";
// $gender = "Male";
// $facebook = "Not Given";
// $city = "Dhaka";
// $location = "Bashundhara R/A";
// $address = "House: 7I, Road: 3, Block: G";

// $em_name = "Md. Shamim Ansari";
// $em_relation = "Father";
// $em_contact = "01715367711";
// $em_address = "Uttara, Dhaka";


// if ($_SERVER["REQUEST_METHOD"] === "POST") {

//   $name = $_POST['name'];
//   $contact = $_POST['contact'];
//   $email = $_POST['email'];
//   $gender = $_POST['gender'];
//   $facebook = $_POST['facebook'];
//   $city = $_POST['city'];
//   $location = $_POST['location'];
//   $address = $_POST['address'];
//   $em_name = $_POST['em_name'];
//   $em_relation = $_POST['em_relation'];
//   $em_contact = $_POST['em_contact'];
//   $em_address = $_POST['em_address'];

  
//   if (isset($_SESSION['profile'])) {
//     extract($_SESSION['profile']);
// }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ScholarLink Profile</title>
    <link rel="stylesheet" href="../../css/tutor/eidtprofile.css" />
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="navdiv">
          <div class="platformname">
            <div class="main">
              <a href="#" class="logo"><span>Scholar</span>Link</a>
            </div>
            <h5>A Tutoring platform that releases potential</h5>
          </div>
        </div>
        <div class="show">
          <ul>
            <li class="info">Be with us</li>
          </ul>
        </div>
      </nav>
    </header>

    <main class="dashboard-container">
      <aside class="sidebardash">
        <div class="sidebar-profile">
          <img src="https://i.imgur.com/3j6h2s0.png" alt="Profile Image" class="profileimg" />
          <h3><?php echo $tutor_name; ?></h3>
          <p><?php echo $tutor_email; ?></p>
          <p><small>Tutor ID: <?php echo $tutor_id; ?> | Since <?php echo $tutor_since; ?></small></p>
          <p><small>Total CV View: <?php echo $total_cv_view; ?></small></p>
        </div>
        <hr />
        <nav class="sidebar-nav">
          <ul>
            <li><a href="tutor.php">🏛️ Dashboard</a></li>
            <li><a href="job.php">📋 Job Board</a></li>
            <li><a href="profile.php">👤 Profile</a></li>
            <li><a href="students.php">🧑‍🎓 Students</a></li>
            <li><a href="attendence.php">📝 Attendance</a></li>
            <li><a href="resources.php">📚 Resources</a></li>
            <li><a href="status.php">🏷️ Status</a></li>
            <li><a href="confrim.php">✉️ Confirmation Letter</a></li>
            <li><a href="payment.php">🪙 Payment</a></li>
            <li><a href="certificate.php">📑 Certificate</a></li>
            <li><a href="refer.php">🗞️ Refer & Earn</a></li>
            <li><a href="setting.php">⚙️ Settings</a></li>
            <li><a href="commt.php">🔗 Join Tutor Community</a></li>
            <li><a href="howw.php">🔩 How Its Work</a></li>
          </ul>
        </nav>
      </aside>

      <section class="allprofileinfo">
        <form method="POST" action="">
          <h3><img src="../image/logo.png" alt="" />Personal Information</h3>
          <div class="p_allinfo">
            <div class="p_info">
              <p>Name</p>
              <p>Contact Number</p>
              <p>Email</p>
              <p>Gender</p>
              <p>Facebook Link</p>
              <p>City</p>
              <p>Location</p>
              <p>Address</p>
            </div>
            <div class="p_details">
              <p>: <input type="text" name="name" value="<?php echo $name; ?>" /></p>
              <p>: <input type="number" name="contact" value="<?php echo $contact; ?>" /></p>
              <p>: <input type="email" name="email" value="<?php echo $email; ?>" /></p>
              <p>: <input type="text" name="gender" value="<?php echo $gender; ?>" /></p>
              <p>: <input type="text" name="facebook" value="<?php echo $facebook; ?>" /></p>
              <p>: <input type="text" name="city" value="<?php echo $city; ?>" /></p>
              <p>: <input type="text" name="location" value="<?php echo $location; ?>" /></p>
              <p>: <input type="text" name="address" value="<?php echo $address; ?>" /></p>
            </div>
          </div>

          <div class="emergency">
            <h3><img src="../image/emergency.png" alt="" />Emergency Contact</h3>
          </div>

          <div class="p_allinfo">
            <div class="p_info">
              <p>Name</p>
              <p>Relation</p>
              <p>Contact Number</p>
              <p>Address</p>
            </div>
            <div class="p_details">
              <p>: <input type="text" name="em_name" value="<?php echo $em_name; ?>" /></p>
              <p>: <input type="text" name="em_relation" value="<?php echo $em_relation; ?>" /></p>
              <p>: <input type="number" name="em_contact" value="<?php echo $em_contact; ?>" /></p>
              <p>: <input type="text" name="em_address" value="<?php echo $em_address; ?>" /></p>
            </div>
          </div>

          <div class="submit">
            <input type="submit" value="Update" />
          </div>
        </form>
      </section>
    </main>

    <footer class="bottom">
      <div class="botdesign">
        <div class="use">
          <div class="use-head"><h4>Useful Links</h4></div>
          <div class="use-body">
            <ul>
              <li class="use-li"><a href="">Terms & conditions</a></li>
              <li class="use-li"><a href="">Become Tutor</a></li>
              <li class="use-li"><a href="">Available Resources</a></li>
              <li class="use-li"><a href="">About us</a></li>
            </ul>
          </div>
        </div>

        <div class="social">
          <div class="social-head"><h4>ScholarLink social</h4></div>
          <div class="social-body">
            <div class="sociolink">
              <img class="image" src="../image/facebook.png" alt="Facebook" /><a href="">Facebook</a>
            </div>
            <div class="sociolink">
              <img class="image" src="../image/instagram.png" alt="Instagram" /><a href="">Instagram</a>
            </div>
            <div class="sociolink">
              <img class="image" src="../image/x.png" alt="X" /><a href="">X</a>
            </div>
          </div>
        </div>

        <div class="join">
          <div class="join-head"><h4>Join our community</h4></div>
          <div class="join-body">
            <div class="joinlink">
              <a href=""><img class="joinimg" src="../image/tutorcommunity.png" alt="Join tutor community" /></a>
            </div>
            <div class="joinlink">
              <a href=""><img class="joinimg" src="../image/guardiancommunity.png" alt="Join guardian community" /></a>
            </div>
          </div>
          <div class="join-head"><h4>Download our app</h4></div>
          <div class="join-body">
            <div class="joinlink">
              <a href=""><img class="joinimg" src="../image/googleplay.jpg" alt="Get it on Google Play Store" /></a>
            </div>
            <div class="joinlink">
              <a href=""><img class="joinimg" src="../image/applestore.jpg" alt="Get it on App Store" /></a>
            </div>
          </div>
        </div>

        <div class="join">
          <div class="join-head"><h4>Stay Connected</h4></div>
          <div class="add-body"><h4>ScholarLink</h4></div>
          <div class="add">
            <p>
              Headoffice: Kusholi Bhaban, 2nd Floor,<br />
              238/1 Begum Rokeya Sharani, Agargaon, <br />Dhaka-1207
            </p>
          </div>
        </div>
      </div>
      <div class="version"><p>Web App Version : 2.2.21</p></div>
      <div class="copyright">
        <p>Copyright &copy; 2025 ScholarLink. All rights reserved.</p>
      </div>
    </footer>
  </body>
</html>
