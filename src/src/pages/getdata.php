<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />
</head>
<html>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.html">E-SIT IWT LAB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href=" ./createdb.php " tabindex="-1">Crt DB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" ./createtable.php " tabindex="-1">Crt TB</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=" ./addstudent.php " tabindex="-1">Ins</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=" ./update.php " tabindex="-1">Upd</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=" ./delete.php " tabindex="-1">Del</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=" ./getdata.php " tabindex="-1">Disp *</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href=" ./displaybycategory.php " tabindex="-1">Disp w Cat</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="crd mx-auto">
                    <h2 class="subheading">Get Data from Database</h2>
                    <form method="POST" action="#" class="mt-4 d-flex flex-column">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Server Name</label>
                            <input name="servername" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter servername" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">UserName</label>
                            <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Database Name</label>
                            <input name="dbname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter DB Name" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Table Name</label>
                            <input name="tablename" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Table Name" />
                        </div>
                        <button type="submit" class="btn__primary mt-2" id="butsubm" name="SubmitButton">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-sm">
                <div class="crd mx-auto">
                    <h2 class="subheading">Get Data from Database</h2>
                    <form class="mt-4 d-flex flex-column">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Server Name</label>
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['SubmitButton'])) {
                                        $servername  = $_POST["servername"];
                                        echo $servername;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">UserName</label>
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['SubmitButton'])) {
                                        $username  = $_POST["username"];
                                        echo $username;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <div class="card">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Database Name</label>
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['SubmitButton'])) {
                                        $dbname  = $_POST["dbname"];
                                        echo $dbname;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Table Name</label>
                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (isset($_POST['SubmitButton'])) {
                                        $tablename  = $_POST["tablename"];
                                        echo $tablename;
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>





                        <?php
                        if (isset($_POST['SubmitButton'])) { // Check if form was submitted

                            $servername = $_POST["servername"];
                            $username = $_POST["username"];
                            $password = $_POST["password"];
                            $dbname = $_POST["dbname"];
                            $tablename = $_POST["tablename"];

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT id, firstname, lastname, email,reg_date FROM $tablename";
                            $result = $conn->query($sql);

                        ?>
                            <h2 class="subheading">Database</h2>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">FirstName</th>
                                        <th scope="col">LastName</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">reg_date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo
                                        "<tr>
              <td>{$row['id']}</th>
              <td>{$row['firstname']}</td>
              <td>{$row['lastname']}</td>
              <td>{$row['email']}</td>
              <td>{$row['reg_date']}</td>
            </tr>\n";
                                    }
                                } else {
                                    echo "no results found";
                                }
                            }
                                ?>
                                <a class="text-primary text-center" style="text-decoration: none;" href="../../index.html">Home</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>