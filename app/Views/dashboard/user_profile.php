<?= $this->extend('snippet.php'); ?>
<?= $this->section('content'); ?>

<?php
use App\Models\UserDetailsModel;

$model = new UserDetailsModel();
//get user id to update particular user details
$user_id = session()->user_id;
$record = $model->where('user_id', $user_id)->first();
// var_dump($record);
?>

<div class="container mt-5">
    <div class="box d-flex">
    <div class="text">
        <h2>User Details Form</h2>
    </div>
    <div class="back">
        <a href="<?= base_url('user_dashboard') ?>">
            <button type="back" class="btn btn-secondary mt-2">Back</button>
        </a>
    </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('profile') ?>" method="post">
                <div class="row">
                    <div class="form-group col">
                        <label for="country">Full Name:</label>
                        <input type="text" class="form-control" id="country" name="name"
                            value="<?= !is_null($record) ? $record['name'] : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="country">Country:</label>
                        <input type="text" class="form-control" id="country" name="country"
                            value="<?= !is_null($record) ? $record['country'] : '' ?>">
                    </div>
                    <div class="form-group col">
                        <label for="state">State:</label>
                        <input type="text" class="form-control" id="state" name="state"
                            value="<?= !is_null($record) ? $record['state'] : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="district">District:</label>
                        <input type="text" class="form-control" id="district" name="district"
                            value="<?= !is_null($record) ? $record['district'] : '' ?>">
                    </div>
                    <div class="form-group col">
                        <label for="pincode">Pincode:</label>
                        <input type="text" class="form-control" id="pincode" name="pincode"
                            value="<?= !is_null($record) ? $record['pincode'] : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="phone">Contact No.:</label>
                        <input type="tel" class="form-control" id="phone" name="phone"
                            value="<?= !is_null($record) ? $record['phone'] : '' ?>">
                    </div>
                    <div class="form-group col">
                        <label for="address">Address:</label>
                        <input class="form-control" id="address" name="address"
                            value="<?= !is_null($record) ? $record['address'] : '' ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="permanentAddress">Permanent Address:</label>
                        <input class="form-control" id="permanentAddress" name="permanent_address"
                            value="<?= !is_null($record) ? $record['permanent_address'] : '' ?>">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-2">Save Changes</button>
            </form>

        </div>
    </div>
</div>

<?= $this->endSection() ?>