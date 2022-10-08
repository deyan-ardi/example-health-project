<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php include('component/_header.php') ?>
    <title>RUSSEL STREET MEDICAL CENTRE - BOOKING</title>
</head>

<body>
    <?php include('component/_navbar.php') ?>
    <main>
        <p id="bookingform">BOOK YOUR APPOINTMENT</p><br>
        <div class="form">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center my-4">
                    </h2>
                    <form>
                        <div class="form">
                            <label class="col-sm-4 col-lg-4">
                                <h1> Patient Name </h1>
                            </label>
                            <div class="col-sm-8 col-lg-8">
                                <input type="text" id="pid" class="form-control" placeholder="Name" required>
                            </div>
                        </div>
                        <div class="form">
                            <label class="col-sm-4 col-lg-4">
                                <h1> Date </h1>
                            </label>
                            <div class="col-sm-8 col-lg-8">
                                <input type="date" id="date" class="form-control">
                            </div>
                        </div>
                        <div class="form">
                            <label class="col-sm-4 col-lg-4">
                                <h1>Time</h1>
                            </label>
                            <div class="col-sm-8 col-lg-8">
                                <input type="time" id="time" class="form-control">
                            </div>
                        </div>
                        <div class="form">
                            <label class="col-sm-4 col-lg-4">
                                <h1>Appointnment Reason :</h1>
                            </label>
                            <br>
                            <select id="reason" onchange=doreason();>
                                <option selected> PLEASE SELECT </option>
                                <option> Childhood Vaccination Shots </option>
                                <option> Influenza Shot </option>
                                <option> Covid Booster Shot </option>
                                <option> Blood Test </option>
                            </select>
                        </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-5">
                        <button type="submit" class="btn-form">
                            BOOK NOW
                        </button>
                    </div>
                </div>

                </form>
            </div>
            <div class="col-md-6">
                <h2 id="services" class="text-center my-4"></h2>
                <ul id="consultations" class="list-group"></ul>
            </div>
        </div>
        </div>



    </main>
    <?php include('component/_footer.php') ?>
</body>

</html>