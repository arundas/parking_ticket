@include('includes.header')
    <section class="header-section">
      <div class="center-div">
      <h1 class="font-weight-bold">Vehicles</h1>
      <div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Plate Code</th>
            <th>Plate Number</th>
            <th>Emirate</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          foreach($vehicles as $data){
        ?>
        <tr>
            <td><?= $data->plate_code; ?></td>
            <td><?= $data->plate_number; ?></td>
            <td><?= $data->emirates; ?></td>
        </tr>
        <?php } ?>
        <tbody>
    </table>
</div>
      </div>
    </section>
  </div>

  @include('includes.footer')