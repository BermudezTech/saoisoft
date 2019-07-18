<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 

  <!-- include libraries BS -->
  <link rel="stylesheet" href="bootstrap.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.js"></script> 

  <!-- include summernote -->
  <link rel="stylesheet" href="../dist/summernote-bs4.css">
  <script type="text/javascript" src="../dist/summernote-bs4.js"></script>
<style>
  #btn{
    cursor: pointer;
  }
  input{
    width: 100%;
  }
  .label{
    font-weight: bold;
  }
</style>
<script type="text/javascript">
    $(function() {
      $('.summernote').summernote({
        height: 400,
      });
    });
  </script>
<div class="textarea">
	<textarea name="text" class="summernote" id="contents" title="Contents"></textarea>
</div>