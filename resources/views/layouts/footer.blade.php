 <!-- Footer -->
 <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>
 <!--modals-->
 <!--register-->

   <register></register>
    <!--login-->
    <login></login>
   <!--modals-->
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.switch-tologin-modal').on('click',function(){
        $('#register-modal').modal('hide');
        $('#login-modal').modal('show');
      })
      $('.switch-toregister-modal').on('click',function(){
        $('#login-modal').modal('hide');
        $('#register-modal').modal('show');
      })
    })
  </script>
