@include('includes.header')
    <section class="header-section">
      <div class="center-div">
      <h1 class="font-weight-bold">Parking Tickets</h1>
      <div class="table-wrapper">
    <table class="fl-table">
        <thead>
        <tr>
            <th>Location</th>
            <th>Vehicle</th>
            <th>Entry time</th>
            <th>Exit time</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
          <?php 
          foreach($tickets as $data){
        ?>
        <tr>
            <td><?= $data->name; ?></td>
            <td><?= $data->plate_code.' '.$data->plate_number.'<br>'.$data->emirates; ?></td>
            <td><?= $data->entry_time; ?></td>
            <td><?= $data->exit_time; ?></td>
            <td><?= ($data->status==1) ? "Open" : "Closed"; ?></td>
        </tr>
        <?php } ?>
        <tbody>
    </table>
</div>
      </div>
    </section>
  </div>

  @include('includes.footer')