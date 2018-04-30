<html>

<body>

          <div class="bs-docs-section clearfix">
            <div class="bs-component">
              <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="index.php">CTS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <ul class="nav nav-pills2">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="dailyentry.php" role="button" aria-haspopup="true" aria-expanded="false">Cash Tracking</a>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                          <a class="dropdown-item" href="dailyentry.php">Daily Entry</a>
                          <a class="dropdown-item" href="records.php">Records</a>
                          <a class="dropdown-item" href="recordsemployees.php">Employee Records</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="employees.php">Employee List</a>
                        </div>
                      </li>
                    </ul>
                    <ul class="nav nav-pills2">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="phonebookrecords.php" role="button" aria-haspopup="true" aria-expanded="false">Phonebook</a>
                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                          <a class="dropdown-item" href="phonebookrecords.php">Phonebook</a>
                          <a class="dropdown-item" href="phonebookentry.php">Phonebook Entry</a>
                        </div>
                      </li>
                    </ul>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                   </ul>
                   <ul class="nav navbar-nav navbar-right">
                    <ul class="nav nav-pills2">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="terms.php" role="button" aria-haspopup="true" aria-expanded="false">Agreements</a>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="terms.php">Terms of Service</a>
                            <a class="dropdown-item" href="privacy.php">Privacy Agreement</a>
                          </div>
                        </li>
                    </ul>
                   <ul class="nav navbar-nav navbar-right">
                    <ul class="nav nav-pills2">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="changelog.php" role="button" aria-haspopup="true" aria-expanded="false">Administration</a>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item">User: <?php echo $_SESSION['username']; ?></a>
                            <a class="dropdown-item" href="globalformatinput.php">Settings</a>
                            <a class="dropdown-item" href="admindailyentry.php">Entry Review</a>
                            <a class="dropdown-item" href="adminstores.php">Stores</a>
                            <a class="dropdown-item" href="adminusers.php">Users</a>
                            <a class="dropdown-item" href="changelog.php">Changelog</a>
                          </div>
                        </li>
                    </ul>
                    <li class="nav-item">
                      <a class="nav-link" href="/login/logout.php">Logout</a>
                    </li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script scr="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
  </body>
</html>