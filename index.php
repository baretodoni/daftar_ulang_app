<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include('template/head.php');
      include('template/link.php');
    ?>
  </head>

<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form action="action/action_login.php" method="POST">
              <h1>Login DU & LB</h1>
              <div>
                <input type="text" name="no_pendaftaran" class="form-control" placeholder="Nomor Pendaftaran Contoh : 2021000111000222" required="" />
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Masukan Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" type="submit" name="submit">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-user"></i> APPDULB!</h1>
                  <p>©2019 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
  </html>