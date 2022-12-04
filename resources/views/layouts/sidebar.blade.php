<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="./assets/img/salary.png">
          </div>
          <p>CT</p>
        </a>
        <a class="simple-text logo-normal">
          AGK
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>

      
      <div class="sidebar-wrapper">
        <ul class="nav">

          <li class="active ">
            <a href="{{ route('pegawai.index') }}">
              <i class="nc-icon nc-single-02"></i>
              <p>Karyawan</p>
            </a>
          </li>

          <li class="active ">
            <a href="{{ route('gaji.index') }}">
              <i class="nc-icon nc-money-coins"></i>
              <p>Gaji</p>
            </a>
          </li>

          
          <li class="active ">
            <a href="{{ route('perusahaan.index') }}">
            <i class="nc-icon nc-bank"></i>
              <p>Perusahaan</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
<!--     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('ul,li,a').click(function(){
            $('li,a').removeClass("active");
            $(this).addClass("active");
        });
    });
</script> -->