<?php require_once 'views/layout/head.php'; ?>

<?php require_once 'views/layout/header.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-8 mx-auto">
      <h1 class="my-4">Profile</h1>

      <div id="alertMessage"></div>

      <form action="<?= URL ?>profile/update" id="form_profile" method="post">
        <div class="mb-3">
          <label for="names">Names</label>
          <input type="text" class="form-control" id="names" name="names" value="<?= $this->d['user']['names'] ?>">
        </div>
        <div class="mb-3">
          <label for="phoe">Phone</label>
          <input type="text" class="form-control" id="phoe" name="phoe" value="<?= $this->d['user']['phone'] ?>">
        </div>

        <div class="d-grid">
          <button type="submit" class="btn button-project">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once 'views/layout/footer.php'; ?>
<script src="<?= URL ?>public/js/profile.js"></script>
<?php require_once 'views/layout/foot.php'; ?>