<!-- Sign in Modal -->
<div id="mySignin" class="modal styled hide fade" tabindex="-1" role="dialog" aria-labelledby="mySigninModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 id="mySigninModalLabel">Login to your <strong>account</strong></h4>
  </div>
  <div class="modal-body">
    <div class="contactForm">
      <div class="divMessage"></div>
      <div class="control-group">
        <label class="control-label" for="txt_email">Email</label>
        <div class="controls">
          <input type="text" id="txt_email" placeholder="Your email">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="txt_password">Password</label>
        <div class="controls">
          <input type="password" id="txt_password" placeholder="Your password"
          style="height: 90%; width: 95%; padding: 12px 12px 10px 12px; color: black; background-color: transparent;">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn">Sign in</button>
        </div>
        <p class="aligncenter margintop20">
          Forgot password? <a href="#myReset" data-dismiss="modal" aria-hidden="true" data-toggle="modal">Reset</a>
        </p>
      </div>
    </div>
  </div>
</div>
<!-- end signin modal -->