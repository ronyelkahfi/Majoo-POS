<section class="mt-5 pt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          
            <h2>Login</h2>
          <?= !empty(validation_errors()) ? '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>' : ''; ?>
          <?= !empty($error) ? '<div class="alert alert-danger" role="alert">'.$error.'</div>' : ''; ?>
          <form action="" method="post">
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" />
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" />
            </div>
            <div class="mb-3 d-grid gap-2">
            <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block">Login</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
