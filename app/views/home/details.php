<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Car Rental</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Cars</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6">
                <img src="<?php echo $data['car']->image; ?>" class="img-fluid" alt="<?php echo $data['car']->brand . ' ' . $data['car']->model; ?>">
            </div>
            <div class="col-md-6">
                <h2><?php echo $data['car']->brand . ' ' . $data['car']->model; ?></h2>
                <p>
                    <strong>Year:</strong> <?php echo $data['car']->year; ?><br>
                    <strong>Color:</strong> <?php echo $data['car']->color; ?><br>
                    <strong>License Plate:</strong> <?php echo $data['car']->license_plate; ?><br>
                    <strong>Price per day:</strong> $<?php echo $data['car']->price_per_day; ?><br>
                    <strong>Availability:</strong> <?php echo $data['car']->is_available ? 'Available' : 'Not Available'; ?>
                </p>
                <a href="<?php echo URLROOT; ?>/bookings/book/<?php echo $data['car']->id; ?>" class="btn btn-primary">Book Now</a>
            </div>
        </div>
    </div>

    <footer class="text-center mt-5">
        <p>&copy; 2025 Car Rental</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
