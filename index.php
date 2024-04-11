<?php
include 'connection.php';
function createUser($firstname, $lastname, $salary, $department)
{
    $conn = connection();
    $sql = "INSERT INTO employees (first_name, last_name, salary, department) VALUES ('$firstname','$lastname','$salary','$department')";

    if ($conn->query($sql)) {
        header('refresh:0');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function display()
{
    $conn = connection();
    $sql = "SELECT * FROM employees";

    if ($result = $conn->query($sql)) {
        return $result;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// print_r(display()->fetch_assoc());
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="card w-50 mx-auto mt-5">
            <div class="card-header">
                <p class="font-monospace text-center">
                    Create an employee
                </p>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="first_name" id="" class="form-control" placeholder="First Name">
                        </div>
                        <div class="col">
                            <input type="text" name="last_name" id="" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                    <input type="number" name="salary" id="" class="form-control mb-3" placeholder="Salary">
                    <input type="text" name="department" id="" class="form-control mb-3" placeholder="Department">
                    <button type="submit" name="create" class="btn btn-primary px-3">Create employee</button>
                </form>

                <?php
                if (isset($_POST['create'])) {
                    $first_name = $_POST['first_name'];
                    $last_name = $_POST['last_name'];
                    $salary = $_POST['salary'];
                    $department = $_POST['department'];

                    createUser($first_name, $last_name, $salary, $department);
                }

                ?>
            </div>
        </div>

        <table class="mt-5 table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Department</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php foreach (display() as $row) : ?>
                    <tr>    
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['first_name'] ?></td>
                        <td><?= $row['last_name'] ?></td>
                        <td><?= $row['salary'] ?></td>
                        <td><?= $row['department'] ?></td>
                        <td>
                            <a href="#" class="btn btn-outline-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>