<div class="card card-tasks" style = 'height : 100%;'>
  <div class="card-header ">
    <h3 style = "margin : 0px 0px 0px 0px;">Laporan Menu</h3>
  </div>
  <div class="card-body">
    <form action = "<?=BASEURL;?>/admin/laporan_menu/show", method = "POST">
      <div class="form-group-apend">
        <div class="row pb-3">
          <div class="col align-self-center pr-0">
            <div class="input-group-prepended ">
              <input type="text" class="form-control" name='search' placeholder="cari berdasarkan nama menu">        
            </div>
          </div>
          <div class="col-md-auto align-self-center">
            <div class="input-group-apend">
              <button type = "submit" class="btn btn-sm p-2 text-white"><i class="fa fa-search mr-2 text-white"></i>SEARCH</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <table class="table">
      <thead>
        <tr>
          <th class="text-center" width = "30px"><p class="title">No</p></th>
          <th class="text-center" width = "80px"><p class="title">Gambar</p></th>
          <th class="text-left" width = "200px"><p class="title">Nama Menu</p></th>
          <th class="text-center" width = "80px"><p class="title">Terjual</p></th>
          <th class="text-center" width = "80px"><p class="title">Rating</p></th>
          <th class="text-right"><p class="title"></p></th>
          <th class="text-center" width = "100px"><p class="title">Review</p></th>
        </tr>
      </thead>
    </table>
    <div class="table-full-width table-responsive" style="border-collapse:collapse;">
      <table class="table">
        <thead>
          <tr>
            <th class="text-center py-0" width = "30px"><p></p></th>
            <th class="text-center py-0" width = "80px"><p></p></th>
            <th class="text-left py-0" width = "200px"><p></p></th>
            <th class="text-center py-0" width = "80px"><p></p></th>
            <th class="text-center py-0" width = "80px"><p></p></th>
            <th class="text-right py-0"><p></p></th>
            <th class="text-center py-0" width = "100px"><p></p></th>
            </tr>
          <tr>
        </thead>
        <tbody>
          <!-- buat perulangan untuk menampilkan laporan menu -->
          <?php 
          $menus = $data['menus'];
          $url = BASEURL;
          for($i = 0; $i < count($menus); $i++){
            $menu = $menus[$i];
            $reviews = $menus[$i]->reviews;
            $no = $i + 1; 
            echo "
              <tr>
                <td><p class='text-center'>$no</p></td>
                <td class='text-center'><img src='$url/img/menus/$menu->image' alt='' height = '40px' width = '40px'></td>
                <td><p>$menu->title</p></td>
                <td><p class='text-center'>$menu->sold</p></td>
                <td><p class='text-center'>$menu->rating</p></td>
                <td></td>
                <td class='text-center'><h2 style='margin-bottom: 0;'><i class='bi-caret-down-fill text-mute accordion-toggle' data-toggle='collapse' data-target='#demo$no'></i></h2></td>
              </tr>
              <tr>
                <td colspan='12' class='py-0 hiddenRow'>
                  <div class='accordion accordion-flush collapse mx-4' id='demo$no'>
                    <div class='accordion-item'>
            ";

            for ($j = 0; $j < count($reviews); $j++){
              $name = $reviews[$j]->customer->name;
              $review = htmlspecialchars($reviews[$j]->review);
              echo "
                <div class='card px-2 py-2 my-2 shadow'>
                  <div class='row'>
                    <div class='col-sm-1'>
                    <img
                      class='rounded-circle ml-2'
                      width='30'
                      src='https://ui-avatars.com/api/?name=$name&amp;background=4e73df&amp;color=ffffff&amp;size=100'
                    />
                    </div>
                    <div class='col-sm-11'>
                      <p>$name</p>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='col-sm-1'>
                      <p></p>
                    </div>
                    <div class='col-sm-11'>
                      <p>$review</p>
                    </div>
                  </div>
                </div>
              ";
            }

            echo"
                    </div>
                  </div>
                </td>
              </tr>
            ";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div> 