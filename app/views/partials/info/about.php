<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .about-header {
			background: linear-gradient(135deg, #000000, #3a3a3a);
			background-size: cover;
            height: 400px;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .about-header h1 {
            font-size: 3em;
            font-weight: bold;
        }
        .about-section {
            padding: 50px 0;
        }
        .about-section h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .about-section p {
            font-size: 1.1em;
            color: #666;
            line-height: 1.7;
        }
        .team-member {
            text-align: center;
        }
        .team-member img {
            width: 100%;
            border-radius: 50%;
            max-width: 150px;
        }
        .team-member h5 {
            margin-top: 15px;
            font-weight: bold;
        }
        .team-member p {
            color: #999;
        }
    </style>
</head>
<body>

<!-- Header Section -->
<div class="about-header">
    <div>
        <h1>About Us</h1>
        <p class="lead">Our mission, values, and the team that makes it all possible</p>
    </div>
</div>

<!-- About Section -->
<section class="about-section container">
    <div class="row">
        <div class="col-lg-6">
            <h2>Who We Are</h2>
            <p>Our company has been dedicated to delivering quality solutions since its inception. With a passion for innovation and commitment to excellence, we have expanded our reach across multiple industries, making a positive impact in each.</p>
            <p>Our values are grounded in integrity, quality, and teamwork, guiding us as we strive to exceed our clients' expectations. By embracing new technologies and industry trends, we constantly evolve to stay ahead in a rapidly changing world.</p>
        </div>
        <div class="col-lg-6 d-flex justify-content-center"> <!-- Tambahkan kelas flexbox untuk sentrasi -->
            <img src="../assets/images/kau1.jpg" alt="About Us" class="img-fluid rounded">
        </div>
    </div>
</section>

<!-- Mission Section -->
<section class="about-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <h2>Our Mission</h2>
                <p class="mt-3">To create value for our customers by delivering superior solutions and empowering our team to achieve their potential.</p>
            </div>
        </div>
    </div>
</section>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
