<?php require APPROOT . '/views/inc/header.php'; ?>
    <h1 class="mt-5">Our Cars</h1>
    <div class="row">
        <?php if (!empty($data['cars'])) : ?>
            <?php foreach($data['cars'] as $car) : ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?php echo $car->image; ?>" class="card-img-top" alt="<?php echo $car->brand . ' ' . $car->model; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $car->brand . ' ' . $car->model; ?></h5>
                            <p class="card-text">
                                <strong>Year:</strong> <?php echo $car->year; ?><br>
                                <strong>Color:</strong> <?php echo $car->color; ?><br>
                                <strong>Price per day:</strong> $<?php echo $car->price_per_day; ?>
                            </p>
                            <a href="<?php echo URLROOT; ?>/home/details/<?php echo $car->id; ?>" class="btn btn-primary">Book Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No cars available at the moment.</p>
        <?php endif; ?>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
